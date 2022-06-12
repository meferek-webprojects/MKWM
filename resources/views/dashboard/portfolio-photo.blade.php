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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable1" class="w-100">
                                    <thead>
                                        <tr>
                                            <th>Podgląd</th>
                                            <th>Typ</th>
                                            <th>Data stworzenia</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($portfolios as $portfolio)
                                            <tr>
                                                <td>
                                                    <div class="preview-box">
                                                        <img src="{{ url('/images/portfolios/'.$portfolio->file) }}" alt="">
                                                    </div>
                                                </td>
                                                <td>{{ $portfolio->type }}</td>
                                                <td>{{ $portfolio->created_at }}</td>
                                                <td>
                                                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="hero" value="change">

                                                        @if($portfolio->hero == false)
                                                            <button class="btn btn-outline-primary" type="submit"><i class="material-icons mx-0">home</i></button>
                                                        @else
                                                            <button class="btn btn-primary" type="submit"><i class="material-icons mx-0">home</i></button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="type_header" value="change">

                                                        @if($portfolio->type_header == false)
                                                            <button class="btn btn-outline-info" type="submit"><i class="material-icons mx-0">fullscreen</i></button>
                                                        @else
                                                            <button class="btn btn-info" type="submit"><i class="material-icons mx-0">fullscreen</i></button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST">
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