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
            @foreach ($wilayah as $item)
            @if (((count($wilayah) - 1) == $loop->index) && (count($wilayah) % 2 == 1))
                <div class="col-md-3">
                    &nbsp;
                </div>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="i-color">
                                        <i class="fa fa-arrows-alt fa-4x"></i>
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <h3 class="mb-2">
                                        {{$item->nama_wilayah}}
                                    </h3>
                                    <a href="{{route('home.tipe',['wilayah_id'=>$item->id])}}" class="btn btn-primary">GO!</a>
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
                                        <i class="fa fa-arrows-alt fa-4x"></i>
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <h3 class="mb-2">
                                        {{$item->nama_wilayah}}
                                    </h3>
                                    <a href="{{route('home.tipe',['wilayah_id'=>$item->id])}}" class="btn btn-primary">GO!</a>
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
@section('scripts')
<script type="text/javascript">
const myElement = document.querySelectorAll(".i-color");
[].forEach.call(myElement,function(div){
    div.style.color = '#' + (function co(lor){ return (lor += [0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f'][Math.floor(Math.random()*16)]) && (lor.length
    == 6) ? lor : co(lor); })('');;
});
</script>
    
@endsection