<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Employee;
use App\EmployeeLeave;
use App\User;
use App\EmployeeAttendance;
use App\EmployeeSalary;
use Session;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employee', 'preventbackhistory']);
    }
    
    public function viewDashboard()
    {
        $id = Auth::user()->id;
        $empId = User::find($id)->employee->id;
       
        $attendance = DB::table('employee_attendances')
        ->select('employee_attendances.*')
        ->where('employee_attendances.employee_id', $empId)
        ->get()->last();
        
        $calendar =  DB::table('employee_attendances')
        ->select('employee_attendances.*')
        ->where('employee_attendances.employee_id', $empId)
        ->get();
        return view('employee.dashboard', compact('attendance', 'calendar'));
    }

    public function clockOut($id, Request $request)
    {
        $attendance = EmployeeAttendance::find($id);
        $attendance->clock_out = now()->setTimezone('Asia/Singapore');
        $attendance->save();
        return redirect('employee/dashboard');
    }

    public function viewAttendance()
    {
        $id = Auth::user()->id;
        $empId = User::find($id)->employee->id;
        $attendances =  DB::table('employee_attendances')
        ->where('employee_attendances.employee_id', $empId)
        ->get();
        return view('employee.attendance', compact('attendances'));
    }

    public function viewSalary()
    {
        $id = Auth::user()->id;
        $empId = User::find($id)->employee->id;
        
        $salary = DB::table('employees')
        ->join('employee_salaries', 'employees.id', '=', 'employee_salaries.employee_id')
        ->join('currencies', 'employee_salaries.currency_id', '=', 'currencies.id')
        ->select('employee_salaries.amount', 'employee_salaries.updated_at', 'currencies.name')
        ->where('employees.id', $empId)
        ->get();
        return view('employee.salary', compact('salary'));
    }

    public function viewLeaveRequest()
    {
        $id = Auth::user()->id;
        $employee = User::find($id)->employee->id;
        //dd($employee);
        $leave = DB::table('employee_leaves')
        ->join('employees', 'employee_leaves.employee_id', '=', 'employees.id')
        ->select('employee_leaves.*')
        ->where('employee_leaves.employee_id', $employee)
        ->get();

        return view('employee.leave-request', compact('leave'));
    }

    public function addLeaveRequest(Request $request)
    {
        $id = Auth::user()->id;
        $employerId = User::find($id)->employee->employer_id;
        $employeeId = User::find($id)->employee->id;
        
        $add_leave = new EmployeeLeave;
        $add_leave->employee_id = $employeeId;
        $add_leave->employer_id = $employerId;
        $add_leave->leave_type = $request->leaveType;
        $add_leave->leave_reason = $request->leaveReason;
        $add_leave->start_date = $request->leaveStartDate;
        $add_leave->end_date = $request->leaveEndDate;
        $add_leave->save();
        return redirect('employee/leave-request');
    }

    public function editLeaveRequest($id, Request $request)
    {
        //dd($id);
        $add_leave = EmployeeLeave::find($id);
        $add_leave->leave_type = $request->leaveType;
        $add_leave->leave_reason = $request->leaveReason;
        $add_leave->start_date = $request->leaveStartDate;
        $add_leave->end_date = $request->leaveEndDate;
        $add_leave->save();
        return redirect('employee/leave-request');
    }

    public function deleteLeave($id)
    {
        //dd($id);
        $delete_leave = EmployeeLeave::find($id);
        $delete_leave->delete();
        return redirect('employee/leave-request');
    }

    public function multipleDeleteLeave(Request $request)
    {
        $ids = $request->ids;
        DB::table("employee_leaves")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success'=>"Leave Deleted successfully."]);
    }

    public function viewProfile()
    {
        $logged_id = Auth::user()->id;
        $emp = User::find($logged_id)->employee->id;
        
        $employee = DB::table('users')
        ->join('employees', 'users.id', '=', 'employees.user_id')
        ->select('users.*', 'employees.id as emp_id', 'employees.contact_number', 'employees.address', 'employees.employee_picture_path')
        ->where('users.id', $logged_id)
        ->get();
        return view('employee.profile', compact('employee'));
    }
    
    public function updateEmployeeProfile($id, Request $request)
    {
        $user_info = User::find($id);
        //dd($user_info);
        $emp_id = User::find($id)->employee->id;
        //dd($emp_id);
        $emp_info = Employee::find($emp_id);
        //dd($emp_info);

        $rules = array(
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required'
        );
    
        $this->validate($request, $rules);
        $user_info->first_name = $request->firstName;
        $user_info->last_name = $request->lastName;
        $user_info->middle_name = $request->middleName;
        $user_info->email = $request->email;
        $user_info->save();

        $emp_info->address = $request->address;
        $emp_info->contact_number = $request->contactNumber;
        // $emp_info->employee_picture_path = $request->employeePhoto;
        $emp_info->save();

        return redirect('employee/profile');
    }

   //Upload profile picture
    public function uploadProfilePicture($id, Request $request)
    {
        $emp_profile = User::find($id);
        $file = Employee::find($emp_profile->employee->id);
        $request->validate([
            'employeePhoto' => 'required|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        $image = $request->file('employeePhoto');
        $image_name = Auth::user()->first_name.Auth::user()->last_name.' - image.' .$image->getClientOriginalExtension();
        $destination = "profile/";
        $image->move($destination, $image_name);
        $file->employee_picture_path = $image_name;
        $file->save();

        return redirect('/employee/profile');
    }

    public function removeProfilePicture($id)
    {
        $emp_profile = User::find($id);
        $image = Employee::where('id', $emp_profile->employee->id)->update(['employee_picture_path' => null]);
        return redirect('/employee/profile');
    }
    ///////////////end

    public function showChangePasswordForm()
    {
        return view('employee.change-password-employee');
    }

    public function changePasswordEmployee($id, Request $request)
    {
        $validate_form = array(
            'currentPass' => 'bail|required|password|string|min:8',
            'newPassword' => 'bail|required|string|min:8|confirmed',
        );

        $error = Validator::make($request->all(), $validate_form);
        if ($error->fails()) {
            return response()->json(['errors'  => $error->messages()]);
        }

        $data_form = array(
            'password' => Hash::make($request->newPassword),
        );

        User::where('id', $id)->update($data_form);

        return response()->json(['success'  => 'Password changed successfully']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login_employee');
    }
}
