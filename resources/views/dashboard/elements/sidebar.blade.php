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
                <li>
                    <a href="{{ url('/dboard') }}"><i class="material-icons-two-tone">dashboard</i>Strona główna</a>
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

                        $userSessions = DB::table('sessions')->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->where('kind', 'photo')->orWhere('kind', 'both');
                        if($userSessions->count() > 0){
                            $lastYear = date('Y', strtotime($userSessions->orderBy('date', 'desc')->first()->date));
                            $firstYear = date('Y', strtotime($userSessions->orderBy('date', 'asc')->first()->date));
                        }
                    @endphp

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
                    <a href="{{ route('testimonial.index') }}"><i class="material-icons-two-tone">reviews</i>Referencje</a>
                </li>
                @endif
            </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 846px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 706px;"></div></div></div>
    </div>
@endsection