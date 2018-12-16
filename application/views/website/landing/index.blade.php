@extends('website.layout') 
@section('title','Wisata Religi') 
@section('content')
<div class="container">
    @include('website.layout.header')
    @include('website.layout.navbar')
    @include('website.layout.jumbotron')
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <div class="row">
                        <div class="col-md-2">
                            <span>
                                <i class="fa fa-map-marker-alt fa-4x"></i>
                            </span>
                        </div>
                        <div class="col-md-10">
                            <h3 class="mb-2">
                                Cari Tempat Ibadah
                            </h3>
                            <a class="btn btn-primary" href="{{route('home.wilayah')}}">Cari !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <div class="row">
                        <div class="col-md-2">
                            <span>
                                <i class="fa fa-edit fa-4x"></i>
                            </span>
                        </div>
                        <div class="col-md-10">
                            <h3 class="mb-2">
                                Input Tempat Ibadah
                            </h3>
                            <a class="btn btn-primary" href="#">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection