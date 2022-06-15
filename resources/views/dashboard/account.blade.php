@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
    <link href="{{ url('dashboard/plugins/highlight/styles/github-gist.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Ustawienia</h1>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-3">
                        <div class="card text-center">
                            <div class="card-header">
                                <h5 class="card-title">Zdjęcie profilowe</h5>
                            </div>
                            <div class="card-body my-1">
                                <div class="avatar avatar-xxl account-settings">
                                    @if(Auth::user()->avatar !== NULL)
                                        <img src="{{ url(Auth::user()->avatar) }}" alt="" @if($centered = Auth::user()->centered) image-center="{{ $centered }}" @endif>
                                    @else
                                        <div class="avatar-title">{{ Auth::user()->initials }}</div>
                                    @endif
                                </div>
                                @if(Auth::user()->avatar !== NULL)
                                    <form action="{{ url('/remove-profile-photo') }}" method="POST" class="m-0">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        
                                        <button class="btn btn-outline-danger mt-3"><i class="material-icons p-0 ps-1 m-0">delete</i></button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Podstawowe informacje</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Imię" value="{{ Auth::user()->name }}">
                                                <label for="name">Imię</label>
                                            </div>        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Imię" value="{{ Auth::user()->surname }}">
                                                <label for="surname">Nazwisko</label>
                                            </div>        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Dane kontaktowe</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="{{ Auth::user()->email }}">
                                                <label for="email">E-mail</label>
                                            </div>        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="phone" placeholder="Telefon" name="phone" value="{{ Auth::user()->phone }}">
                                                <label for="phone">Telefon</label>
                                            </div>        
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Zapisz wszystko</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('added-js')
    <script src="{{ url('dashboard/plugins/highlight/highlight.pack.js') }}"></script>
@endsection