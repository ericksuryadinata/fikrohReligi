@extends('website.layout') 
@section('title','Wisata Religi') 
@section('content')
<div class="container">
    @include('website.layout.header')
    @include('website.layout.navbar')
    <!-- Page Features -->
    <div class="container mt-5">
        <a href="{{$_SERVER['HTTP_REFERER']}}" class="btn btn-success mb-2">Kembali</a>
        <div class="row">
            @foreach ($tipe as $item)
                @if (((count($tipe) - 1) == $loop->index) && (count($tipe) % 2 == 1))
                <div class="col-md-3">
                    &nbsp;
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="i-color">
                                        <i class="fa {{$fa[$loop->index]}} fa-4x"></i>
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <h3 class="mb-2">
                                        {{$item->nama_tipe}}
                                    </h3>
                                    <a href="{{route('home.result',['wilayah_id' => $wilayah_id,'tipe_id'=>$item->id])}}" class="btn btn-primary">GO!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    &nbsp;
                </div>
                @else
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="i-color">
                                        <i class="fa {{$fa[$loop->index]}} fa-4x"></i>
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <h3 class="mb-2">
                                        {{$item->nama_tipe}}
                                    </h3>
                                    <a href="{{route('home.result',['wilayah_id' => $wilayah_id,'tipe_id'=>$item->id])}}" class="btn btn-primary">GO!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif 
            @endforeach
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection