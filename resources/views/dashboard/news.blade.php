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
                    <h1>Informacje dla użytkowników</h1>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Dodaj elementy do informacji</h5>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('news.store') }}" method="POST">
                                    @method("POST")
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Tytuł informacji" required>
                                                <label for="title">Tytuł informacji</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <select id="type" class="js-states form-control" name="type" tabindex="-1" style="display: none; width: 100%" required>
                                                <option disabled selected>--- Rodzaj informacji ---</option>
                                                <option value="Nowość">Nowość</option>
                                                <option value="Uwaga">Uwaga</option>
                                                <option value="Informacja">Informacja</option>
                                                <option value="Błąd">Błąd</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="description" name="description" placeholder="Informacja" required maxlength="100">
                                                <label for="description">Informacja</label>
                                            </div>
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
                                            <th>Tytuł</th>
                                            <th>Informacja</th>
                                            <th>Typ</th>
                                            <th>Data stworzenia</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($news as $new)
                                            <tr>
                                               
                                                <td>{{ $new->type }}</td>
                                                <td>{{ $new->description }}</td>
                                                <td>{{ $new->type }}</td>
                                                <td>{{ $new->created_at }}</td>
                                                <td>
                                                    <form action="{{ route('news.edit', $new->id) }}" method="POST">
                                                        @csrf
                                                        @method('GET')

                                                        <button class="btn btn-outline-info" type="submit"><i class="material-icons mx-0">edit</i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('news.destroy', $new->id) }}" method="POST">
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