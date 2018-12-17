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
            <div class="col-md-12">
                <h2 class="text-center">{{$wilayah->nama_wilayah}} - {{$tipe->nama_tipe}}</h2>
            </div>
            <div class="col-md-12">
                <div id="maps"></div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection
@section('styles')

    <style>
        #maps{
            height: 500px;
        }
    </style>    
    
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo getenv('GMAPS_API_KEY')?>"></script>
<script type="text/javascript">
    function initMap(dest, data){
        let infowindow = new google.maps.InfoWindow();
        let lokasi = {lat:parseFloat(data[0].lat), lng:parseFloat(data[0].lng)};
        
        let map = new google.maps.Map(document.getElementById(dest),{
            zoom:12,
            center:lokasi,
            draggrableCursor:'default',
            draggingCursor:'pointer',
            mapTypeId:google.maps.MapTypeId.ROADMAP
        });

        let koordinatFromDatabase = [];
        let deskripsi = '';
        for (let pos = 0; pos < data.length; pos++) {
            koordinatFromDatabase.push([]);

            markerReligi = new google.maps.Marker({
                position  : new google.maps.LatLng(parseFloat(data[pos].lat),parseFloat(data[pos].lng)),
                map       : map,
            });

            (function (markerReligi, pos) {  
                google.maps.event.addListener(markerReligi, 'click', function (e) {
                    deskripsi = '<table><tr><td>'+data[pos].alamat+'</td></tr></table>';
                    infowindow.setContent(deskripsi);
                    infowindow.open(map, markerReligi);
                    map.setZoom(14);
                    map.setCenter(markerReligi.getPosition());
                });
                google.maps.event.addListener(infowindow,'closeclick',function(e){
                    map.setZoom(12);
                })
            })(markerReligi, pos);

        }
    }

    window.onload = function (param) {
        let lokasiFromDatabase = {!!json_encode($religi)!!};
        initMap('maps',lokasiFromDatabase);
    }
</script>
    
@endsection