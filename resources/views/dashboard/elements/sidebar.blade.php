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
                <li>
                    <a href="{{ route('testimonial.create') }}"><i class="material-icons-two-tone">rate_review</i>Dodaj opinię</a>
                </li>
                <li class="sidebar-title">
                    TWOJE SESJE
                </li>
                <li>
                    @php
                        use Carbon\Carbon;
                        use Illuminate\Support\Facades\DB;

                        $query = 'users_id->'.Auth::user()->id;

                        $userSessions = DB::table('sessions')->whereJsonContains('users_id', [[Auth::user()->id => [Auth::user()->id => Auth::user()->id]]])->where('type', 'photo')->orWhere('type', 'both')->get();
                        print_r($userSessions);
                        // if($userSessions->count() > 0){
                        //     $lastYear = DB::table('sessions')->where('users_id->'.Auth::user()->id, Auth::user()->id)->where('type', 'photo')->orWhere('type', 'both')->orderBy('date', 'desc')->first()->date->format('Y');
                        //     $firstYear = DB::table('sessions')->where('users_id->'.Auth::user()->id, Auth::user()->id)->where('type', 'photo')->orWhere('type', 'both')->orderBy('date', 'asc')->first()->date->format('Y');
                        // }
                    @endphp
                    {{-- @for ($i = $firstYear; $i < $lastYear; $i++) --}}
                    <a href=""><i class="material-icons-two-tone">photo</i>10<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
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
                    {{-- @endfor --}}
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
                            <a href="{{ route('session.create') }}">Dodaj sesje</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href=""><i class="material-icons-two-tone">pin_drop</i>Miejsca<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu" style="display: none;">
                        <li>
                            <a href="{{ route('place.index') }}">Wszystkie miejsca</a>
                        </li>
                        <li>
                            <a href="{{ route('place.create') }}">Dodaj miejsce</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/portfolio-photo') }}"><i class="material-icons-two-tone">photo_library</i>Fotografia</a>
                </li>
                <li>
                    <a href="{{ url('/portfolio-video') }}"><i class="material-icons-two-tone">camera</i>Filmografia</a>
                </li>
                @endif
            </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 846px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 706px;"></div></div></div>
    </div>
@endsection