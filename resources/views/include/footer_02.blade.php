@if ((url()->current() == route('register')) || (url()->current() == route('employer.signup')) || (url()->current() == route('applicant.signup')) || (url()->current() == route('login')) || (url()->current() == url('login_employer')))
    <div class="footer-copyright text-center py-3 bg-footer text-white fixed-bottom">© 2019 Copyright:
        <a href="https://engraphiaph.com" class="footer-content"> Engraphia</a>
    </div>
@else
    <div class="footer-copyright text-center py-3 bg-footer text-white footer-2">© 2019 Copyright:
        <a href="https://engraphiaph.com" class="footer-content"> Engraphia</a>
    </div>
@endif

