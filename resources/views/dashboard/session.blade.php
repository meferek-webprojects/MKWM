@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
    <link href="{{ url('dashboard/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <style>
        .flatpickr-calendar {
            position: static;
            top: 0;
            left: 0;
        }

        .flatpickr-months {
            display: none!important;
        }
    </style>
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Wszystkie informacje dot. sesji zdjęciowej</h1>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h1>{{ $session->name }}</h1>
                            </div>
                        </div> 

                        <div class="card">
                            <div class="card-body">
                                Pliki
                                <button class="btn btn-outline-primary w-100 mt-4">Pobierz wszystkie zdjęcia jako .zip</button>
                            </div>
                        </div> 
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                FAVKA (ulubione zdjęcie)
                            </div>
                        </div> 
                        <div class="card">
                            <div class="card-body">
                                <div class="flatpickr-calendar animate open arrowTop arrowLeft" tabindex="-1" style="top: 448.344px; left: 388.844px; right: auto;"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
                                <span class="flatpickr-weekday">
                                    Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
                                </span>
                                </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day " aria-label="May 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="May 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="May 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="May 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="May 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="May 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="May 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="May 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="May 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="May 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="May 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="May 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="May 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="May 14, 2022" tabindex="-1">14</span><span class="flatpickr-day " aria-label="May 15, 2022" tabindex="-1">15</span><span class="flatpickr-day " aria-label="May 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="May 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="May 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="May 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="May 20, 2022" tabindex="-1">20</span><span class="flatpickr-day " aria-label="May 21, 2022" tabindex="-1">21</span><span class="flatpickr-day " aria-label="May 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="May 23, 2022" tabindex="-1">23</span><span class="flatpickr-day today" aria-label="May 24, 2022" aria-current="date" tabindex="-1">24</span><span class="flatpickr-day " aria-label="May 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="May 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="May 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="May 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="May 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="May 30, 2022" tabindex="-1">30</span><span class="flatpickr-day " aria-label="May 31, 2022" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay" aria-label="June 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="June 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="June 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="June 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="June 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="June 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="June 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="June 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="June 9, 2022" tabindex="-1">9</span><span class="flatpickr-day nextMonthDay" aria-label="June 10, 2022" tabindex="-1">10</span><span class="flatpickr-day nextMonthDay" aria-label="June 11, 2022" tabindex="-1">11</span></div></div></div></div></div>
                            </div>
                        </div> 

                        @php
                            $place = DB::table('places')->where('id', $session->place_id)->first();
                        @endphp
                        <div class="card overflow-hidden">
                            <div class="card-body">
                              <h5 class="card-title">MIEJSCE SESJI</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            <div class="map-frame">
                                @if(Auth::user()->theme == 'dark')
                                    <iframe style="filter: grayscale(90%) invert(90%) contrast(100%);" class="w-100" src="{{ $place->link }}" height="400" allowfullscreen=""></iframe>
                                @else
                                    <iframe class="w-100" src="{{ $place->link }}" height="400" allowfullscreen=""></iframe>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('added-js')
    <script src="{{ url('dashboard/plugins/flatpickr/flatpickr.js') }}"></script>
    <script>
        $('select').select2();
        $(".flatpickr1").flatpickr();
        $(".js-example-basic-multiple-limit").select2({
        });
    </script>
@endsection