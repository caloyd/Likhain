{{-- NAVBAR --}}
<nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navigate">
    <a class="navbar-brand" href="/"> <img src="{{asset('img/landing_page/likhainLogoRevised-01.svg')}}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="navToggle">    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @guest
                {{-- @if ((url()->current() === route('home')))
                    <li class="nav-item">
                        <a class="nav-link login-register" href="" data-toggle="modal" data-target="#loginApplicantModal">{{ __('Login') }}</a>
                    </li>
                @endif --}}
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link login-register" href="" data-toggle="modal" data-target="#loginApplicantModal">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link login-register" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link btn-employer" href="{{ route('employer.signup') }}">Job Post/Employer</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} {{Auth::user()->middle_name}} {{ Auth::user()->last_name }}<span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
{{-- end NAVBAR --}}

