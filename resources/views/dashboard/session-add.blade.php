@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
    <link href="{{ url('dashboard/plugins/highlight/styles/github-gist.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ url('dashboard/plugins/dropzone/min/dropzone.min.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="page-description">
                    <h1>Dodaj nową sesję</h1>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Dane sesji</h5>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('session.store') }}" method="POST" enctype="multipart/form-data">
                                    @method("POST")
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nazwa sesji" required>
                                                <label for="name">Nazwa sesji</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-2">
                                        <div class="col-md-6 my-2">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="material-icons">edit_calendar</i></span>
                                                <input class="form-control flatpickr1" name="date" type="text" placeholder="Data sesji"  aria-label="Username" aria-describedby="basic-addon1" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <select id="place" class="js-states form-control" name="place" tabindex="-1" style="display: none; width: 100%" required>
                                                <option value="" disabled selected>--- Miejsce sesji ---</option>
                                                @foreach($places as $place)
                                                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 my-2">
                                            <select id="type" class="js-states form-control" name="type" tabindex="-1" style="display: none; width: 100%" required>
                                                <option value="" disabled selected>--- Typ sesji ---</option>
                                                <option value="public">Sesja publiczna</option>
                                                <option value="private">Sesja prywatna</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <select id="kind" class="js-states form-control" name="kind" tabindex="-1" style="display: none; width: 100%" required>
                                                <option value="" disabled selected>--- Rodzaj sesji ---</option>
                                                <option value="photo">Sesja fotograficzna</option>
                                                <option value="video">Sesja filmowa</option>
                                                <option value="both">Sesja fotograficzno-filmowa</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col my-2 mt-3">
                                            <label for="users" class="form-label">Wybierz modeli</label>
                                            <select id="users" class="js-example-basic-multiple-limit js-states form-control" name="users[]" multiple="multiple" tabindex="-1" style="display: none; width: 100%" required>
                                                @php
                                                    $users = DB::table('users')->get(); 
                                                @endphp
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name.' '.$user->surname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col my-2 mt-3">
                                            <label for="id" class="form-label">Link do filmu</label>
                                            <input type="text" name="link" id="link" class="form-control" placeholder="Link">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col my-2 mt-3">
                                            <label for="desc" class="form-label">Opis sesji</label>
                                            <textarea id="desc" class="form-control" name="description" placeholder="Opis sesji" required>Kolejna niesamowita sesja z niesamowitymi ludźmi! 💙📸 Do zobaczenia!</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col my-2">
                                            <label for="desc" class="form-label">Pliki</label>
                                            <input class="form-control" type="file" name="files[]" multiple/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col mt-4">
                                            <button class="btn btn-primary" type="submit">Dodaj</button>
                                            <button class="btn btn-warning" type="reset">Resetuj</button>
                                        </div>
                                    </div>
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('added-js')
    <script src="{{ url('dashboard/plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ url('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ url('dashboard/plugins/flatpickr/flatpickr.js') }}"></script>
    {{-- <script src="{{ url('dashboard/plugins/dropzone/min/dropzone.min.js') }}"></script> --}}
    <script>
        $('select').select2();
        $(".flatpickr1").flatpickr();
        $(".js-example-basic-multiple-limit").select2({
        });
    </script>
@endsection