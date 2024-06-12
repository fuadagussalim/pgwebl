@extends('layouts.template')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
<style>
  html,
  body,
  {
  height: 100%;
  width: 100%;
  }

  #map {
    height: calc(100vh - 56px);
    width: 100%;
    margin: 0;
  }
</style>
@endsection


@section('content')
<div id="map"></div>
@endsection

@section('script')

<script>
  // Map
  var map = L.map('map').setView([-6.360558923242346, 106.82740596049541], 5);

  //Basemap
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);



  /* GeoJSON Point */
  var point = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
      var popupContent = "Nama: " + feature.properties.name + "<br>" +
						"Deskripsi: " + feature.properties.description + "<br>" +
            "Foto: <img src='{{ asset('storage/images') }}/" + feature.properties.image + "' class='img-thumbnail' alt=''>" +
            "<br>" + 
            "<div class='d-flex flex-row mt-3'>"
            // +
            // "<a href='{{ url('edit-point') }}/" + feature.properties.id + "' class='btn btn-sm btn-warning me-2'><i class='fa-solid fa-edit'></i></a>"+
            
            // "<form action='{{ url('delete-point') }}/" + feature.properties.id + "' method='POST'>" +
            // '{{ csrf_field() }}' +
            // '{{ method_field('DELETE') }}' +
            // "<button type='submit' class='btn btn-danger ' onclick='confirm(`Yakin Menghapus Data Ini?`)'><i class='fa-solid fa-trash'></i></button>" +
            // "</form>"+
            // "</div>"
             
            
             ;
        
      layer.on({
        click: function (e) {
          point.bindPopup(popupContent);
        },
        mouseover: function (e) {
          point.bindTooltip(feature.properties.name);
        },
      });
    },
  });
  $.getJSON("{{ route('api.points') }}", function(data) {
    point.addData(data);
    map.addLayer(point);
  });
  /* GeoJSON Polygons */
  var polygons = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
      var popupContent = "Nama: " + feature.properties.name + "<br>" +
        "Deskripsi: " + feature.properties.description + "<br>" +
        "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>"+"<br />"
        // +
        // "<div class='d-flex flex-row mt-3'>"+
        //     "<a href='{{ url('edit-polygon') }}/" + feature.properties.id + "' class='btn btn-sm btn-warning me-2'><i class='fa-solid fa-edit'></i></a>"+
        //   + 
        //  "<form action='{{ url('delete-polygon') }}/" + feature.properties.id + "' method='POST'>" +
        //     '{{ csrf_field() }}' +
        //     '{{ method_field('DELETE') }}' +
        //     "<button type='submit' class='btn btn-danger' onclick='confirm(`Yakin Menghapus Data Ini?`)'><i class='fa-solid fa-trash'></i></button>" +
        //     "</form>"+
            "</div>"
            ;
      ;;
      layer.on({
        click: function (e) {
          polygon.bindPopup(popupContent);
        },
        mouseover: function (e) {
          polygon.bindTooltip(feature.properties.name);
        },
      });
    },
  });
  $.getJSON("{{ route('api.polygons') }}", function (data) {
    point.addData(data);
    map.addLayer(polygon);
  });
  /* GeoJSON Polylines */
  /* GeoJSON Polyline */
  var polyline = L.geoJson(null, {
    onEachFeature: function (feature, layer) {
      var popupContent = "Nama: " + feature.properties.name + "<br>" +
        "Deskripsi: " + feature.properties.description + "<br>" +
        "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image + "'class='img-thumbnail' alt='...'>" + "<br>"
        // + "<div class='d-flex flex-row mt-3'>"+
        //     "<a href='{{ url('edit-polyline') }}/" + feature.properties.id + "' class='btn btn-sm btn-warning me-2'><i class='fa-solid fa-edit'></i></a>"+
           
        // "<form action='{{ url('delete-polyline') }}/" + feature.properties.id + "' method='POST'>" +
        //     '{{ csrf_field() }}' +
        //     '{{ method_field('DELETE') }}' +
        //     "<button type='submit' class='btn btn-danger' onclick='confirm(`Yakin Menghapus Data Ini?`)'><i class='fa-solid fa-trash'></i></button>" +
        //      "</div>" +
        //     "</form>";
      ;
      layer.on({
        click: function (e) {
          polyline.bindPopup(popupContent);
        },
        mouseover: function (e) {
          polyline.bindTooltip(feature.properties.name);
        },
      });
    },
  });
  $.getJSON("{{ route('api.polylines') }}", function (data) {
polyline.addData(data);
    map.addLayer(polyline);
  });
</script>

@endsection