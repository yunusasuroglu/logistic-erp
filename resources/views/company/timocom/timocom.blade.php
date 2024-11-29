@extends('layouts.layout')
@section('title', 'TimoCom')
@section('content')
<link rel="stylesheet" href="{{asset('/')}}/assets/libs/gridjs/theme/mermaid.min.css">
<style>
    #responsiveDataTable_wrapper .row{
        margin-bottom: 20px;
    }
</style>
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">TIMOCOM</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white-50">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">TIMOCOM</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            TIMOCOM
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection