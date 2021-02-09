@extends('admin.layout.layout')

@section('title', 'ADMIN - Employer List')

@section('content_header')
    <h1 class="text-dark">EMPLOYER LIST</h1>
    <hr>
@endsection

@section('content')
    <div class="col-md-12">
        <table class="table table-bordered table-hover" id="employerTbl">
            <thead class="tex-white bg-royal">
                <tr>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Company Size</th>
                    <th>Industry</th>
                    <th>Verification Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Feemo Global Solutions</td>
                    <td>Makati City</td>
                    <td>60-100</td>
                    <td>Information Technology</td>
                    <td class="text-success">Verified</td>
                </tr>
                <tr>
                    <td>Trend Micro Philippines</td>
                    <td>Pasig City</td>
                    <td>100-1000</td>
                    <td>Information Service</td>
                    <td class="text-success">Verified</td>
                </tr>
                <tr>
                    <td>Indra Philippines, Inc.</td>
                    <td>Pasig City</td>
                    <td>100-1000</td>
                    <td>Information Service</td>
                    <td class="text-success">Verified</td>
                </tr>
                <tr>
                    <td>TelUs</td>
                    <td>Makati City</td>
                    <td>100-1000</td>
                    <td>BPO</td>
                    <td class="text-success">Verified</td>
                </tr>
                <tr>
                    <td>Convergys</td>
                    <td>Makati City</td>
                    <td>100-1000</td>
                    <td>BPO</td>
                    <td class="text-success">Verified</td>
                </tr>
                <tr>
                    <td>Accenture</td>
                    <td>Mandaluyong City</td>
                    <td>1000-10000</td>
                    <td>BPO</td>
                    <td class="text-warning">Not verified</td>
                </tr>
                <tr>
                    <td>Trans Global</td>
                    <td>Makati City</td>
                    <td>1000-10000</td>
                    <td>Transmarine Agency</td>
                    <td class="text-warning">Not verified</td>
                </tr>
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
    <script>
        $(document).ready(function(){
            $('#employer-sidebar').addClass('menu-open');
            $('#employer').addClass('active');
            $('#employer-list').addClass('active');

            $('#employerTbl').DataTable();
        });
    </script>
@endsection