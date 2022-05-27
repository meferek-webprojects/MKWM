@section('sidebar')
    <div class="app-sidebar">
        <div class="logo" id="logo">
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
                <li>
                    <a href="{{ url('/dboard') }}"><i class="material-icons-two-tone">dashboard</i>Strona główna</a>
                </li>
                <li>
                    <a href="{{ url('/account') }}"><i class="material-icons-two-tone">account_circle</i>Twój profil</a>
                </li>
                <li>
                    <a href="{{ route('testimonial.create') }}"><i class="material-icons-two-tone">rate_review</i>Dodaj opinię</a>
                </li>
                <li>
                    <a href="{{ url('/faq') }}"><i class="material-icons-two-tone">quiz</i>FAQ</a>
                </li>
                <li class="sidebar-title">
                    @if(Auth::user()->hasRole(10)) WSZYSTKIE SESJE @else TWOJE SESJE @endif
                </li>
                <li>
                    @php
                        use Carbon\Carbon;
                        use Illuminate\Support\Facades\DB;

                        if(Auth::user()->hasRole(10))
                            $userSessions = DB::table('sessions')->where('kind', 'photo')->orWhere('kind', 'both');
                        else
                            $userSessions = DB::table('sessions')->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->whereIn('kind', ['photo', 'both']);

                        if($userSessions->count() > 0){
                            $lastYear = date('Y', strtotime($userSessions->orderBy('date', 'desc')->first()->date));
                            $firstYear = date('Y', strtotime($userSessions->orderBy('date', 'asc')->first()->date));
                        }
                    @endphp

                    @if(Auth::user()->hasRole(10))

                        @if($userSessions->count() > 0)
                            @for ($i = $lastYear; $i >= $lastYear; $i--)
                                <a href=""><i class="material-icons-two-tone">photo</i>{{ $i }}<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                                <ul class="sub-menu" style="display: none;">
                                    @php
                                        $allUsers = DB::table('users')->get();
                                    @endphp
                                    @foreach ($allUsers as $aU)
                                    
                                        @php
                                            $sessionprofession = DB::table('sessions')->where('users_id', 'like', '%"'.$aU->id.'"%')->whereYear('date', $i)->get();
                                        @endphp
                                        @if($sessionprofession->count() > 0)
                                            <li>
                                                <a href="#">{{ $aU->name.' '.$aU->surname }}<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                                                <ul class="sub-menu" style="display: none;">
                                                    @foreach ($sessionprofession as $sp)
                                                        <li>
                                                            <a href="{{ route('session.show', $sp->id) }}">{{ $sp->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif

                                    @endforeach
                                </ul>
                            @endfor
                        @else
                            <a href="#">BRAK DOSTĘPNYCH SESJI</a>
                        @endif

                    @else

                        @if($userSessions->count() > 0)
                            @for ($i = $lastYear; $i >= $lastYear; $i--)
                                <a href=""><i class="material-icons-two-tone">photo</i>{{ $i }}<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                                <ul class="sub-menu" style="display: none;">
                                    @for ($m = 1; $m <= 12; $m++)
                                        @php
                                            $sm = DB::table('sessions')->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->whereYear('date', $i)->whereMonth('date', $m)->whereIn('kind', ['photo','both'])->get();
                                            $months = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];
                                        @endphp
                                        @if($sm->count() > 0)
                                            <li>
                                                <a href="#">{{ $months[$m-1] }}<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                                                <ul class="sub-menu" style="display: none;">
                                                    @foreach($sm as $s)
                                                        <li>
                                                            <a href="{{ route('session.show', $s->id) }}">{{ $s->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endfor
                                </ul>
                            @endfor
                        @else
                            <a href="#">BRAK DOSTĘPNYCH SESJI</a>
                        @endif

                    @endif
                </li>

                <li class="sidebar-title">
                    TWOJE FILMY
                </li>
                <li>
                    @php
                        $userSessions = DB::table('sessions')->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->where('kind', 'video');
                        if($userSessions->count() > 0){
                            $lastYear = date('Y', strtotime($userSessions->orderBy('date', 'desc')->first()->date));
                            $firstYear = date('Y', strtotime($userSessions->orderBy('date', 'asc')->first()->date));
                        }
                    @endphp

                    @if($userSessions->count() > 0)
                        @for ($i = $lastYear; $i >= $lastYear; $i--)
                            <a href=""><i class="material-icons-two-tone">movie</i>{{ $i }}<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                            <ul class="sub-menu" style="display: none;">
                                @for ($m = 1; $m <= 12; $m++)
                                    @php
                                        $sm = DB::table('sessions')->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->whereYear('date', $i)->whereMonth('date', $m)->where('kind', 'video')->get();
                                        $months = ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'];
                                    @endphp
                                    @if($sm->count() > 0)
                                        <li>
                                            <a href="#">{{ $months[$m-1] }}<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                                            <ul class="sub-menu" style="display: none;">
                                                @foreach($sm as $s)
                                                    <li>
                                                        <a href="{{ route('session.show', $s->id) }}">{{ $s->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endfor
                            </ul>
                        @endfor
                    @else 
                        <a href="#">BRAK DOSTĘPNYCH FILMÓW</a>
                    @endif
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
                <li>
                    @php
                        $testimonials = DB::table('testimonials')->where('aproved', false)->get();
                    @endphp
                    <a href="{{ route('testimonial.index') }}"><i class="material-icons-two-tone">reviews</i>Referencje @if($testimonials->count() > 0)<span class="badge rounded-pill badge-info float-end mt-1">{{ $testimonials->count() }}</span>@endif</a>
                </li>
                <li>
                    <a href="{{ route('news.index') }}"><i class="material-icons-two-tone">info</i>Informacje</a>
                </li>
                @endif
            </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 846px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 706px;"></div></div></div>
    </div>
@endsection