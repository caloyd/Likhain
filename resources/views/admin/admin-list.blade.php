@extends('admin.layout.layout')

@section('title', 'ADMIN - Admin List')

@section('content_header')
    <h1 class="text-dark">ADMIN LIST</h1>
    <hr>
@endsection

@section('content')
@include('admin.include.modal.admin-list-modal')
<div class="col-md-12 mb-3">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createAdminModal"><i class="fas fa-plus mr-2"></i>ADMIN</button>
    {{-- <button type="button" class="btn btn-danger" id="btnMultipleDeleteAdmin"><i class="fas fa-minus mr-2"></i>ADMIN</button> --}}
</div>
<div class="col-md-12 custom-table">
        <table id="adminList" class="table table-bordered table-hover">
            <thead class="bg-royal text-white">
                <tr>
                    {{-- <th class="text-center">  
                        <input type="checkbox" name="" id="selectAll" class="align-middle">
                    </th> --}}
                    <th class="align-middle">Admin Name</th>
                    <th class="align-middle">Admin Email</th>
                    <th class="align-middle">Contact Number</th>
                    <th class="align-middle">Start Date</th>
                    <th class="align-middle">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admin as $admins)
                <tr>
                    {{-- <td class="text-center">         
                        <input type="checkbox" name="" class="checkbox align-middle">
                    </td> --}}
                    <td class="align-middle">{{$admins->first_name}} {{$admins->last_name}}</td>
                    <td class="align-middle">{{$admins->email}}</td>
                    <td class="align-middle">{{$admins->contact_number}}</td>
                    <td class="align-middle">{{$admins->created_at}}</td>
                    <td>
                        <div class="buttons">
                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#viewAdminModal"
                            data-fname="{{$admins->first_name}}"
                            data-lname="{{$admins->last_name}}"
                            data-email="{{$admins->email}}"
                            data-contact="{{$admins->contact_number}}">
                                <i class="fas fa-eye"></i>
                            </button>
                            {{-- <button type="submit" class="btn btn-success" id="btnPromoteAdmin">
                                <i class="fas fa-crown"></i> 
                            </button>                       --}}
                            <form class="d-inline" action="{{ route('admin.delete.admin', $admins->id) }}" method="POST" id="deleteAdminForm{{$admins->id}}">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger btnDeleteAdmin" data-id="{{$admins->id}}" data-name="{{$admins->first_name}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_dashboard.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="{{asset('js/admin/admin_list.js')}}"></script>
@endsection