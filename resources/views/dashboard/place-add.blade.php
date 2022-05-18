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
                    @if(isset($place))
                        <h1>Edytuj miejsce</h1>
                    @else
                        <h1>Dodaj nowe miejsce</h1>
                    @endif
                </div>

                <div class="row">
                    <div class="col">
                        <div class="alert alert-custom alert-indicator-left indicator-info" role="alert">
                            <div class="alert-content">
                                <span class="alert-title">UWAGA!</span>
                                <span class="alert-text">Dodając link do miejsca wklej cały link z Google Maps wraz z całym iframe!</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Dane miejsca</h5>
                            </div>
                            <div class="card-body">

                                @if(isset($place))
                                <form action="{{ route('place.update', $place->id) }}" method="POST">
                                @method("PUT")
                                @csrf
                                @else
                                <form action="{{ route('place.store') }}" method="POST">
                                @method("POST")
                                @csrf
                                @endif
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nazwa sesji" required @if(isset($place)) value="{{ $place->name }}" @endif>
                                                <label for="name">Nazwa miejsca</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="link" name="link" placeholder="Link do miejsca" required @if(isset($place)) value="{{ $place->link }}" @endif>
                                                <label for="link">Link do miejsca</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col mt-2">
                                            @if(isset($place))
                                            <button class="btn btn-primary" type="submit">Edytuj</button>
                                            @else
                                            <button class="btn btn-primary" type="submit">Dodaj</button>
                                            @endif
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