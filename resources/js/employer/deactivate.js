// $(document).ready(function(){
//     $('#btnDeactivate').click(function(){
//         Swal.fire({
//             title: 'Are you sure?',
//             text: "You are about to deactivate your account",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#28a745',
//             }).then((result) => {
//             if (result.value) {
//                 Swal.fire(
//                 'DEACTIVATED',
//                 'Press ok to fully deactivate',
//                 'success'
//                 ).then((isOkay) => {
//                     $('#formDeactivate').submit();
//                 })
//             }
//         })
//     });
    

    $('#accnt-sidebar').addClass('menu-open');
    $('#accnt-sett').addClass('active');
    $('#deactivate').addClass('active');

