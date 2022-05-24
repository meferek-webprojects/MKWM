@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
    <link href="{{ url('dashboard/plugins/highlight/styles/github-gist.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="page-description">
                    <h1>Edytuj sesję</h1>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Dane sesji</h5>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('session.update', $session->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input value="{{ $session->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nazwa sesji" required>
                                                <label for="name">Nazwa sesji</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-2">
                                        <div class="col-md-6 my-2">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="material-icons">edit_calendar</i></span>
                                                <input value="{{ $session->date }}"class="form-control flatpickr1" name="date" type="text" placeholder="Data sesji"  aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <select id="place" class="js-states form-control" name="place" tabindex="-1" style="display: none; width: 100%" required>
                                                <option disabled selected>--- Miejsce sesji ---</option>
                                                @php
                                                    $places = DB::table('places')->get();
                                                @endphp
                                                @foreach($places as $place)
                                                    <option @if($place->id == $session->place_id) selected @endif value="{{ $place->id }}">{{ $place->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 my-2">
                                            <select id="type" class="js-states form-control" name="type" tabindex="-1" style="display: none; width: 100%" required>
                                                <option disabled selected>--- Typ sesji ---</option>
                                                <option @if($session->type == "public") selected @endif value="public">Sesja publiczna</option>
                                                <option @if($session->type == "private") selected @endif value="private">Sesja prywatna</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <select id="kind" class="js-states form-control" name="kind" tabindex="-1" style="display: none; width: 100%" required>
                                                <option disabled selected>--- Rodzaj sesji ---</option>
                                                <option @if($session->kind == "photo") selected @endif value="photo">Sesja fotograficzna</option>
                                                <option @if($session->kind == "video") selected @endif value="video">Sesja filmowa</option>
                                                <option @if($session->kind == "both") selected @endif value="both">Sesja fotograficzno-filmowa</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col my-2 mt-3">
                                            <label for="users" class="form-label">Wybierz modeli</label>
                                            <select id="users" class="js-example-basic-multiple-limit js-states form-control" name="users[]" multiple="multiple" tabindex="-1" style="display: none; width: 100%" required>
                                                @php
                                                    $users = DB::table('users')->get(); 
                                                    $sessionUsers = json_decode($session->users_id)
                                                @endphp
                                                @foreach($users as $user)
                                                    <option
                                                    @foreach ($sessionUsers as $sU)
                                                        @if($user->id == $sU) selected @endif  
                                                    @endforeach
                                                    value="{{ $user->id }}">{{ $user->name.' '.$user->surname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col my-2 mt-3">
                                            <label for="id" class="form-label">Link do filmu</label>
                                            <input value="{{ $session->link }}" type="text" name="link" id="link" class="form-control" placeholder="Link">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col my-2 mt-3">
                                            <label for="desc" class="form-label">Opis sesji</label>
                                            <textarea id="desc" class="form-control" name="description" placeholder="Opis sesji" required>{{ $session->description }}</textarea>
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
                                            <button class="btn btn-primary" type="submit">Edytuj</button>
                                            <a href="{{ url('/session/'.$session->id) }}"><button class="btn btn-info" type="button">Zobacz</button></a>
                                            <button class="btn btn-warning" type="reset">Resetuj</button>
                                        </div>
                                    </div>
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable1" class="w-100">
                                    <thead>
                                        <tr>
                                            <th>Podgląd</th>
                                            <th>Data stworzenia</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $photos = DB::table('session_files')->where('session_id', $session->id)->get();
                                        @endphp
                                        @foreach($photos as $photo)
                                            <tr>
                                                <td>
                                                    <div class="preview-box">
                                                        <img src="{{ url('/images/photoshoots/'.$session->id.'/'.$photo->file) }}" alt="">
                                                    </div>
                                                </td>
                                                <td>{{ $photo->created_at }}</td>
                                                <td>
                                                    <form action="{{ route('sessionfiles.update', $photo->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        @if($photo->favourite == '1')
                                                            <button class="btn btn-warning" type="submit"><i class="material-icons mx-0">star</i></button>
                                                        @else
                                                            <button class="btn btn-outline-warning" type="submit"><i class="material-icons mx-0">star</i></button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('sessionfiles.destroy', $photo->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn btn-outline-danger" type="submit"><i class="material-icons mx-0">delete</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <script src="{{ url('dashboard/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('dashboard/js/pages/datatables.js') }}"></script>
    <script>
        $('select').select2();
        $(".flatpickr1").flatpickr();
        $(".js-example-basic-multiple-limit").select2({
        });
    </script>
@endsection