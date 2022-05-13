@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container">
                
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Witaj, {{ Auth::user()->name; }} na naszej stronie!</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-primary">
                                        <i class="material-icons-outlined">paid</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Today's Sales</span>
                                        <span class="widget-stats-amount">$38,211</span>
                                        <span class="widget-stats-info">471 Orders Total</span>
                                    </div>
                                    <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                                        <i class="material-icons">keyboard_arrow_down</i> 4%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                        <i class="material-icons-outlined">person</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Active Users</span>
                                        <span class="widget-stats-amount">23,491</span>
                                        <span class="widget-stats-info">790 unique this month</span>
                                    </div>
                                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                        <i class="material-icons">keyboard_arrow_up</i> 12%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card widget widget-stats">
                            <div class="card-body">
                                <div class="widget-stats-container d-flex">
                                    <div class="widget-stats-icon widget-stats-icon-danger">
                                        <i class="material-icons-outlined">file_download</i>
                                    </div>
                                    <div class="widget-stats-content flex-fill">
                                        <span class="widget-stats-title">Downloads</span>
                                        <span class="widget-stats-amount">140,390</span>
                                        <span class="widget-stats-info">87 items downloaded</span>
                                    </div>
                                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                        <i class="material-icons">keyboard_arrow_up</i> 7%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card text-center">
                    <div class="card-header">
                      Featured
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer text-muted">
                      2 days ago
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('added-js')
@endsection