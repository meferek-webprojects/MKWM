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
                    <h1>Portfolio fotograficzne</h1>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Dodaj elementy do portfolio</h5>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                                    @method("POST")
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <select id="type" class="js-states form-control" name="type" tabindex="-1" style="display: none; width: 100%" required>
                                                <option disabled selected>--- Rodzaj portfolio ---</option>
                                                <option value="event">Fotografia eventowa</option>
                                                <option value="plener">Fotografia plenerowa</option>
                                                <option value="studio">Fotografia studyjna</option>
                                                <option value="product">Fotografia produktowa</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col my-2">
                                            <label for="desc" class="form-label">Pliki</label>
                                            <input class="form-control" type="file" name="files[]" multiple/>
                                        </div>
                                    </div>

                                    <input type="hidden" name="kind" value="photo">

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