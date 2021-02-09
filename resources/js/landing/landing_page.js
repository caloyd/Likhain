$(window).scroll(function(){
    if($(document).scrollTop() > 0) {
        $('.navbar').addClass('shrink');
    }else{
        $('.navbar').removeClass('shrink');

    }
})

$(document).ready(function() {
    $("searchJob").submit(function() {
        if($("#what").val() == ""){
            $("#what").remove()
        }
        if($("#where").val() == ""){
            $("#where").remove()
        }
    })
})

$(document).ready(function(){
    $("#navToggle").click(function(){
        $("#navigate").toggleClass("bg-light");
    })
  });

$(document).ready(function(){
    $('.show-pass').on('click', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        if ($('#applicantInputPassword').attr('type') === 'password') {
            $('#applicantInputPassword').attr('type', 'text');
        } else {
            $('#applicantInputPassword').attr('type', 'password');
        }
    });
});