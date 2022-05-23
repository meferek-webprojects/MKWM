@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
    <link href="{{ url('dashboard/plugins/highlight/styles/github-gist.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ url('dashboard/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="page-description">
                    <h1>Portfolio filmograficzne</h1>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Dodaj elementy do portfolio</h5>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('portfolio.store') }}" method="POST">
                                    @method("POST")
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <select id="type" class="js-states form-control" name="type" tabindex="-1" style="display: none; width: 100%" required>
                                                <option disabled selected>--- Rodzaj portfolio ---</option>
                                                <option value="event">Filmografia eventowa</option>
                                                <option value="plener">Filmografia plenerowa</option>
                                                <option value="studio">Filmografia studyjna</option>
                                                <option value="product">Filmografia produktowa</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col my-2">
                                            <label for="link" class="form-label">Link do filmu</label>
                                            <input class="form-control" type="text" name="link"/>
                                        </div>
                                    </div>

                                    <input type="hidden" name="kind" value="video">

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
    <script>
        $('select').select2();
        $(".flatpickr1").flatpickr();
        $(".js-example-basic-multiple-limit").select2({
        });
    </script>
@endsection