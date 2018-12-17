@extends('website.layout') 
@section('title','Wisata Religi') 
@section('content')
<div class="container">
    @include('website.layout.header')
    @include('website.layout.navbar')
    <h2 class="text-center mb-3">Input Data</h2>
    <div class="row mb-2">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    {!!validation_errors()!!}
                    {!!isset($pesan) ? '<div class="alert alert-success" role="alert">'.$pesan.'</div>': ''!!}
                    {!!form_open(route('home.input.save'))!!}
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Tempat" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" placeholder="Alamat Tempat" name="alamat">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Wilayah</label>
                                <select class="form-control" name="wilayah">
                                    @foreach ($wilayah as $item)
                                        <option value="{{$item->id}}">{{$item->nama_wilayah}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tipe</label>
                                <select class="form-control" name="tipe">
                                    @foreach ($tipe as $item)
                                        <option value="{{$item->id}}">{{$item->nama_tipe}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Lat</label>
                            <input type="text" class="form-control" placeholder="Latitude" name="lat" id="lat">
                        </div>
                        <div class="form-group">
                            <label>Lng</label>
                            <input type="text" class="form-control" placeholder="Longitude" name="lng" id="lng">
                        </div>
                        <button type="submit" class="btn btn-primary pull-left">Masukkan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div id="maps"></div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    #maps {
        height: 500px;
    }
</style>
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo getenv('GMAPS_API_KEY')?>"></script>
<script type="text/javascript">
    let markers = [];
    let mapTambah;
    function initMap(dest){
        let lokasiTambah = {lat: -7.271392714896101, lng: 112.73542550138382};
		mapTambah = new google.maps.Map(document.getElementById('maps'), {
			zoom: 12,
			center: lokasiTambah,
			draggableCursor: 'default',
			draggingCursor: 'pointer',
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		google.maps.event.addListener(mapTambah,'click', function(event){
            addMarker(event);
		});
    }

    function addMarker(event) {
        let locationClicked = event.latLng;
        let markerTambah = new google.maps.Marker({
            position : locationClicked,
            map : mapTambah
        });
        if(markers.length >= 1){
            removeMarker(mapTambah)
            markers.push(markerTambah);
        }else{
            markers.push(markerTambah);
        }
        document.getElementById('lat').value = locationClicked.lat().toFixed(4);
        document.getElementById('lng').value = locationClicked.lng().toFixed(4);
        document.getElementById('lat').text = locationClicked.lat().toFixed(4);
        document.getElementById('lng').text = locationClicked.lng().toFixed(4);
    }

    function removeMarker() {
        for (let i = 0; i < markers.length; i++) {
          markers[i].setMap(null);
        }
        markers = [];
    }

    window.onload = function (param) {
        initMap('maps');
    }

</script>
@endsection