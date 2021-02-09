@extends('employer.layout.layout')

@section('title','Company Verification')

@section('content_header')
    <h1>COMPANY VERIFICATION</h1>
    <hr>
@endsection

@section('content')
    <div class="col-md-12"> 
    
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#btnUploadReqs"> <i class="fas fa-plus mr-2"></i>UPLOAD</button>
    
        <table class="table table-bordered table-hover table-striped mt-3" id="requirementsTbl">
            <thead class="bg-info">
                <tr>
                    <th class="align-middle">Requirements Name</th>
                    <th class="align-middle">Date Submitted</th>
                    <th class="align-middle">Status</th>
                    <th class="align-middle">Remarks</th>
                    <th class="align-middle">File</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($requirement as $requirements)
                <tr>
                    <td class="align-middle">{{$requirements->file_name}}</td>
                    <td class="align-middle">{{\Carbon\Carbon::parse($requirements->updated_at)->format('F d, Y')}}</td>
                    @if($requirements->status === "Approved")
                    <td class="align-middle text-success">{{$requirements->status}}</td>
                    @elseif($requirements->status === "Reject")
                    <td class="align-middle text-danger">{{$requirements->status}}</td>
                    @else
                    <td class="align-middle">{{$requirements->status}}</td>
                    @endif
                    <td class="align-middle">{{$requirements->remarks}}</td>
                    <td class="align-middle">
                        {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#btnUploadReqs{{$requirements->doc_id}}"><i class="fas fa-file-upload"></i></button> --}}
                        <a href="{{ asset($requirements->file_path) }}" data-toggle="lightbox" target="_blank" class="">
                            <embed src="{{ asset($requirements->file_path)}}" width="150" height="150"/>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    <div class="modal" tabindex="-1" role="dialog" id="btnUploadReqs">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">UPLOAD FILE</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="uploadForm" action="/add-doc" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <select class="form-control" name="documentId">
                                @foreach($doc as $docs)
                                <option value="{{$docs->id}}">{{$docs->file_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                        <input type="file" name="companyDocument" accept=".pdf, .jpg, .png" class="form-control @error ('companyDocument') is-invalid @enderror" required>
                        @error('companyDocument')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="status" value="Uploaded">
                    <input type="hidden" name="companyId" value="{{$comp}}">
                    <button type="button" class="btn btn-success" id="btnConfirmReq">UPLOAD</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">CANCEL</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/employer_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/landing_page.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/employer/company_verification.js')}}"></script>
@endsection