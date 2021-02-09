@extends('admin.layout.layout')

@section('title', 'ADMIN - Employer Requirements')

@section('content_header')
    <h1 class="text-dark">{{$comp->company_name}}</h1>
    <hr>
@endsection

@section('content')

    <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover" id="requirementsTbl">
            <thead class="tex-white bg-royal">
                <tr>
                    <th class="align-middle">Requirements Name</th>
                    <th class="align-middle">File</th>
                    <th class="align-middle">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($document as $documents)
                <tr>
                    <td class="align-middle">{{$documents->file_name}}</td>
                    <td class="align-middle">
                        <a href="{{ asset($documents->file_path) }}" data-toggle="lightbox" target="_blank" class="">
                            <embed src="{{ asset($documents->file_path)}}" width="150" height="150"/>
                        </a>
                    </td>
                    <td class="align-middle">
                        @if($documents->status === "Approved" || $documents->status === "Reject")
                        {{$documents->status}}<br>{{$documents->remarks}}
                        @else
                        <button class="btn btn-success" data-toggle="modal" data-target="#acceptReqModal{{$documents->id}}"><i class="fas fa-check"></i></button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#rejectReqModal{{$documents->id}}"><i class="fas fa-trash"></i></button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach($document as $documents)
    {{-- ACCEPT REQUIREMENTS MODAL --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="acceptReqModal{{$documents->id}}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-royal">
                        <h5 class="modal-title">ACCEPT DOCUMENT - {{$documents->file_name}}</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/approve-document/{{$documents->id}}" id="approveDocumentForm{{$documents->id}}" method="POST">
                                @csrf
                                @method('PATCH')
                        <div class="form-group">
                            <input type="hidden" name="updateStatusApprove" value="Approved">
                            <label for="recipient-name" class="col-form-label">Remarks:</label>
                            <textarea class="form-control resizable-none" name="documentRemarksApprove" id="documentRemarksApprove{{$documents->id}}" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btnAcceptRequirement" data-id="{{$documents->id}}">ACCEPT</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end ACCEPT REQUIREMENTS MODAL --}}
    
        {{-- REJECT REQUIREMENTS MODAL --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="rejectReqModal{{$documents->id}}">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-royal">
                        <h5 class="modal-title">REJECT DOCUMENT - {{$documents->file_name}}</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="/reject-document/{{$documents->id}}" id="rejectDocumentForm{{$documents->id}}" method="POST" class="rejectDocumentForm">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="updateStatusReject" value="Reject">
                            <label for="recipient-name" class="col-form-label">Remarks:</label>
                            <textarea class="form-control resizable-none" name="documentRemarksReject" id="documentRemarksReject{{$documents->id}}" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btnRejectRequirement" data-id="{{$documents->id}}">REJECT</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        {{-- end REJECT REQUIREMENTS MODAL --}}
        @endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin_dashboard.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/admin/view_employer_verification.js')}}"></script>
@endsection