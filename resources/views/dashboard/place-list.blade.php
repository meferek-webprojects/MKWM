@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
    <link href="{{ url('dashboard/plugins/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Lista wszystkich sesji</h1>
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
                                            <th>ID</th>
                                            <th>Nazwa</th>
                                            <th>Link</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($places as $place)
                                            <tr>
                                                <td>{{ $place->id }}</td>
                                                <td>{{ $place->name }}</td>
                                                <td>{{ substr($place->link, 0, 30)."..." }}</td>
                                                <td>
                                                    <form action="{{ route('place.edit', $place->id) }}" method="POST">
                                                        @method('GET')
                                                        @csrf
                                                        <button class="btn btn-outline-warning" type="submit"><i class="material-icons mx-0">edit</i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('place.destroy', $place->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
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
    <script src="{{ url('dashboard/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('dashboard/js/pages/datatables.js') }}"></script>
@endsection