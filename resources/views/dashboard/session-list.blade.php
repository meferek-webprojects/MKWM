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
                                            <th>Model/ka</th>
                                            <th>Data sesji</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sessions as $session)
                                            @php
                                                $users_id = json_decode($session->users_id)
                                            @endphp
                                            <tr>
                                                <td>{{ $session->id }}</td>
                                                <td>{{ $session->name }}</td>
                                                <td>
                                                    @php
                                                        foreach($users_id as $key=>$user_id){
                                                            echo ($key == 0 ? '' : ', ').DB::table('users')->find($user_id)->name;
                                                        }
                                                    @endphp
                                                </td>
                                                <td>{{ $session->date }}</td>
                                                <td>
                                                    <form action="{{ route('session.show', $session->id) }}" method="POST">
                                                        @csrf
                                                        @method('GET')
                                                        
                                                        <button class="btn btn-outline-primary" type="submit"><i class="material-icons mx-0">visibility</i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('session.edit', $session->id) }}" method="POST">
                                                        @csrf
                                                        @method('GET')
                                                        <button class="btn btn-outline-info" type="submit"><i class="material-icons mx-0">edit</i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('session.destroy', $session->id) }}" method="POST">
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
    <script src="{{ url('dashboard/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('dashboard/js/pages/datatables.js') }}"></script>
@endsection