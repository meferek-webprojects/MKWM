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
            <div class="container">
                
                <div class="page-description">
                    <h1>Dodaj nowe miejsce</h1>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="alert alert-custom alert-indicator-left indicator-warning" role="alert">
                            <div class="alert-content">
                                <span class="alert-title">UWAGA!</span>
                                <span class="alert-text">Każda nowa referencja musi zostać zweryfikowana pod kątem niecenzuralnych słów itp.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                @php
                                    $testimonial = DB::table('testimonials')->where('user_id', Auth::user()->id)->first();
                                @endphp
                                <h5 class="card-title">Napisz krótko referencje dot. współpracy z MKWM 
                                @if(isset($testimonial)) 
                                    @php 
                                        if($testimonial->aproved == 0) 
                                            echo  '<span class="badge badge-warning badge-style-light">TRWA WERYFIKACJA</span>';
                                        else
                                            echo '<span class="badge badge-success badge-style-light">ZWERYFIKOWANO</span>';
                                    @endphp
                                @endif
                                </h5>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('testimonial.store') }}" method="POST">
                                @method("POST")
                                @csrf

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <textarea name="testimonial" id="testimonial" cols="30" rows="10" class="form-control" placeholder="Miejsce na twoją opinię.">@php if(isset($testimonial)) echo $testimonial->testimonial @endphp</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                    <div class="row">
                                        <div class="col mt-2">
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