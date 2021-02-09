<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Company;
use App\CompanyDocument;
use App\User;
use App\CompanySubmitDoc;

class CompanyDocumentController extends Controller
{
    public function addDocument(Request $request)
    {
        $rule = array(
            'companyDocument' => "required|mimetypes:image/jpg,image/jpeg,image/png,application/pdf|max:10000",
        );
        $this->validate($request, $rule);

        $document = new CompanySubmitDoc;
        $document->company_id = $request->companyId;
        $document->company_documents_id = $request->documentId;
        $document->status = $request->status;

        $file = $request->file('companyDocument');
        $originalName = $file->getClientOriginalName();
        $file_path = $originalName;
        $destination = "docs/";
        $file->move($destination, $file_path);
        $document->file_path = $destination.$file_path;

        $document->save();
        return redirect('employer/company-verification');
    }

    public function viewDocument()
    {
        $logged_id = Auth::user()->id;
        $comp = User::find($logged_id)->employer->company_id;

        // $company = DB::table('companies')
        // ->join('employers', 'companies.id', '=', 'employers.company_id')
        // ->join('company_documents', 'company_documents.company_id', '=', 'companies.id')
        // ->select('company_documents.file_name', 'company_documents.status', 'company_documents.remarks', 'company_documents.updated_at', 'company_documents.company_id', 'company_documents.id AS doc_id')
        // ->where('employers.id',$emp)
        // ->get();

        $requirement = DB::table('company_documents')
        ->leftJoin('company_submit_docs', 'company_submit_docs.company_documents_id', '=', 'company_documents.id')
        ->select('company_documents.file_name', 'company_submit_docs.updated_at', 'company_submit_docs.status', 'company_submit_docs.remarks', 'company_documents.id AS doc_id', 'company_submit_docs.file_path')
        ->where('company_submit_docs.company_id', $comp)
        ->get();

        $doc = CompanyDocument::all();
        
        return view('employer.company-verification', compact('requirement', 'comp', 'doc'));
    }
}
