@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>{{ $session->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('added-js')
@endsection