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
                            <h1>Lista wszystkich opinii</h1>
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
                                            <th>Treść</th>
                                            <th>Autor</th>
                                            <th>Status</th>
                                            <th>Data dodania</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $testimonials = DB::table('testimonials')->get();
                                        @endphp
                                        @foreach($testimonials as $testimonial)
                                            <tr>
                                                <td>{{ $testimonial->id }}</td>
                                                <td>{{ $testimonial->testimonial }}</td>
                                                <td>
                                                    @php
                                                        $user = DB::table('users')->where('id', $testimonial->user_id)->first();
                                                        echo $user->name.' '.$user->surname;
                                                    @endphp
                                                </td>
                                                @if($testimonial->aproved == true)
                                                    <td><span class="badge badge-success badge-style-light">ZWERYFIKOWANO</span></td>
                                                @else 
                                                    <td><span class="badge badge-warning badge-style-light">TRWA WERYFIKACJA</span></td>
                                                @endif
                                                <td>{{ $testimonial->created_at }}</td>
                                                <td>
                                                    <form action="{{ url('/testimonial-aproved') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $testimonial->user_id }}">
                                                        <input type="hidden" name="id" value="{{ $testimonial->id }}">

                                                        <button class="btn btn-outline-success" type="submit"><i class="material-icons mx-0">published_with_changes</i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST">
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