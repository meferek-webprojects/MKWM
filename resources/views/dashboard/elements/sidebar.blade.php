@section('sidebar')
    <div class="app-sidebar">
        <div class="logo">
            <a href="{{ url('/') }}" class="logo-icon"><span class="logo-text">MKWM</span></a>
            <div class="sidebar-user-switcher user-activity-online">
                <a href="#">
                    
                    @if(Auth::user()->avatar == NULL)
                        <div class="avatar avatar-xs" id="avatar-index">
                            <div class="avatar-title">{{ Auth::user()->initials }}</div>
                        </div>
                    @else
                        <img src="{{ url('images/img/logo.png') }}">
                    @endif
                    
                    <span class="user-info-text">{{ Auth::user()->name; }}<br><span class="user-state-info">Super człowiek</span></span>
                    
                </a>
            </div>
        </div>
        <div class="app-menu ps ps--active-y">
            <ul class="accordion-menu">
                <li class="sidebar-title">
                    GŁÓWNE
                </li>
                <li class="active-page">
                    <a href="{{ url('/dboard') }}" class="active"><i class="material-icons-two-tone">dashboard</i>Strona główna</a>
                </li>
                <li>
                    <a href="{{ url('/account') }}"><i class="material-icons-two-tone">account_circle</i>Twój profil</a>
                </li>
                <li class="sidebar-title">
                    TWOJE SESJE
                </li>
                <li>
                    <a href=""><i class="material-icons-two-tone">photo</i>ROK<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li>
                            <a href="#">MIESIĄC<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                            <ul class="sub-menu" style="display: none;">
                                <li>
                                    <a href="sign-in.html">NAZWA</a>
                                </li>
                                <li>
                                    <a href="sign-up.html">NAZWA 2</a>
                                </li>
                                <li>
                                    <a href="#">NAZWA 3</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-title">
                    TWOJE FILMY
                </li>
                <li>
                    <a href=""><i class="material-icons-two-tone">movie</i>ROK<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li>
                            <a href="#">MIESIĄC<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                            <ul class="sub-menu" style="display: none;">
                                <li>
                                    <a href="sign-in.html">NAZWA</a>
                                </li>
                                <li>
                                    <a href="sign-up.html">NAZWA 2</a>
                                </li>
                                <li>
                                    <a href="#">NAZWA 3</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->hasRole(10))
                <li class="sidebar-title">
                    ADMINISTRATORSKIE
                </li>
                <li>
                    <a href="#"><i class="material-icons-two-tone">people</i>Użytkownicy<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li>
                            <a href="{{ route('user.index') }}">Wszyscy użytkownicy</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href=""><i class="material-icons-two-tone">folder</i>Sesje<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li>
                            <a href="{{ route('session.index') }}">Wszystkie sesje</a>
                        </li>
                        <li>
                            <a href="/session-add">Dodaj sesje</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href=""><i class="material-icons-two-tone">pin_drop</i>Miejsca<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li>
                            <a href="/place-list">Wszystkie miejsca</a>
                        </li>
                        <li>
                            <a href="/place-add">Dodaj miejsce</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="material-icons-two-tone">work</i>Portfolio<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li>
                            <a href="/portfolio-photo">Fotograficzne</a>
                        </li>
                        <li>
                            <a href="/portfolio-video">Filmowe</a>
                        </li>
                        <li>
                            <a href="/portfolio-design">Design</a>
                        </li>
                        <li>
                            <a href="/portfolio-web">Web</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 846px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 706px;"></div></div></div>
    </div>
@endsection