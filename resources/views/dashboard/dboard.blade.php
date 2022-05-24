@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Witaj, {{ Auth::user()->name; }} na naszej stronie!</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-success">
                                        <i class="material-icons-outlined">photo</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Twoich sesji</span>
                                        <span class="widget-stats-amount">{{ DB::table('sessions')->where('users_id', 'like', '%"'.Auth::user()->id.'"%')->count() }}</span>
                                        <span class="widget-stats-info">Wykonaliśmy sporo dobrej roboty.</span>
                                    </div>
                                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                        <i class="material-icons">mood</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">person</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Użytkownicy MKWM</span>
                                        <span class="widget-stats-amount">{{ DB::table('users')->count() }}</span>
                                        <span class="widget-stats-info">Każdego dnia jest nas coraz więcej!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-danger">
                                        <i class="material-icons-outlined">file_download</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Pobrania</span>
                                        <span class="widget-stats-amount">{{ DB::table('sessions')->sum('downloads') }}</span>
                                        <span class="widget-stats-info">Łącznie pobranych sesji.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card text-center">
                            <div class="card-header">
                                INFORMACJA
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">Special title treatment</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            </div>
                            <div class="card-footer text-muted">
                              2 days ago
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <a href="#" style="cursor: pointer;">
                            <div class="card bg-dark text-white preview-box-big">
                                <img src="{{ url('images/img/studio.jpg') }}" class="card-img" alt="...">
                                <div class="card-img-overlay">
                                <h5 class="card-title text-white">Tytuł jakiejś sesji</h5>
                                <p class="card-text m-t-md">Do każdej sesji wsm zawsze jest opis więc tutaj on będzie</p>
                                <p class="card-text">2 lata temu.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                Cytat
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>Zawsze, gdy tworzysz wokół siebie piękno, odnawiasz swoją duszę. </p>
                                    <footer class="blockquote-footer mt-1"><cite title="Alice Walker">Alice Walker</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('added-js')
@endsection