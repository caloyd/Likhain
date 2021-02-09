@extends('admin.layout.layout')

@section('title', 'ADMIN - Employer Requirements')

@section('content_header')
    <h1 class="text-dark">EMPLOYER REQUIREMENTS</h1>
    <hr>
@endsection

@section('content')
@include('admin.include.modal.employer-requirements-modal')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="col-md-12 mb-3">
        <button class="btn btn-success" data-toggle="modal" data-target="#addRequirementModal"><i class="fas fa-plus mr-2"></i> REQUIREMENT</button>
        <button type="button" class="btn btn-danger delete_all" data-url="{{ url('multipleDeleteEmployerRequirement')}}"><i class="fas fa-minus mr-2"></i> REQUIREMENT</button>
    </div>
    @if (session('alert'))
        <div class="btn-block text-white alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <div class="col-md-12 ">
        <table class="table table-striped table-hover table-bordered" id="requirementsTbl">
            <thead class="text-white bg-royal">
                <tr>
                    <th class="text-center custom-table">
                        <input type="checkbox" id="selectAll" class="align-middle">
                    </th>
                    <th class="align-middle">Requirements Name</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requirement as $requirements)
                <tr id="tr_{{$requirements->id}}">
                    <td class="text-center">
                        <input type="checkbox" class="checkbox align-middle sub_chk" data-id="{{$requirements->id}}">
                    </td>
                    <td class="align-middle">{{$requirements->file_name}}</td>  
                    <td class="align-middle">
                        <form class="d-inline" action="{{route('admin.delete.requirements',$requirements->id )}}" method="POST" id="deleteRequirementsForm{{$requirements->id}}">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-danger btnRemoveReqs" data-id="{{$requirements->id}}" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
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
    <script src="{{asset('js/admin/employer_requirement.js')}}"></script>
@endsection