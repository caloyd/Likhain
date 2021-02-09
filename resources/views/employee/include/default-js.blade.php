<!-- jQuery -->
<script src="{{asset('users/js/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('users/js/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('users/js/bootstrap.bundle.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('users/js/moment.min.js')}}"></script>
<script src="{{asset('users/js/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('users/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('users/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('users/js/adminlte.js')}}"></script>
{{-- SWAL2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
        $(document).ready(function(){
            $('#logout, #logoutNav').click(function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out after clicking \"OK\"",
                    icon: 'info',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Logged out',
                            'You are successfully logged out',
                            'success'
                        ).then((isOkay) => {
                            $('#logoutForm').submit();
                        })
                    }
                })
            });
        });
        </script>