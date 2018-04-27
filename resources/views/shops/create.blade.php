<?php

//$count_shops = $shops->count();
$count_shops = 0;

?>
@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create BeCard Shop</div>
                    <div class="panel-body">

<!-- @if ($count_shops > 0)
<div class="row">
    <div class="col-lg-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Shop name</th>
                    <th>Type</th>
                    <th>Package</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($shops as $index => $shop)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td><img src="{{asset('img/shops/logo/').'/'.$shop->logo}}" width="30px"></td>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->type }}</td>
                    @if ($shop->package == "gold")
                    <td style="color:#eab909;"><span class="fas fa-trophy"></span> {{$shop->package}}</td>
                    @else
                    <td>{{$shop->package}}</td>
                    @endif

                    @if ($shop->status == "on")
                    <td><span class="fas fa-toggle-on" style="color:#0089f9;font-size: 1.7em;"></span></td>
                    @else
                    <td><span class="fas fa-toggle-on" style="color:#b4d2ea;font-size: 1.7em;"></span></td>
                    @endif
                    <td><button class="btn btn-info">Manage</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif -->
                        <hr>
                        <form class="form-horizontal" method="POST" action="{{ route('shop.create.post') }}" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-lg-4">
                                <center><img src="{{ asset('img/shops/logo/default.jpg') }}" alt="" width="300px" class="img-responsive"></center>
                                <div class="row">
                                <div style="margin-top:15px;margin-left:7%;">
                                    <div class="col-lg-11">
                                        {{ csrf_field() }}
                                        <input type="file" name="image" class="form-control" >
                                        <input type="hidden" name="username" value="{{ Auth::user()->username }}"> 
                                    </div>

                                </div>
                                </div>
                                <!-- </form> -->
                            </div>
                            <div class="col-lg-8">
                                <!-- <form class="form-horizontal" method="POST" action="/shop" > -->
                                    {{ csrf_field() }}
                                    <table class="table table-hover">
                                    <tbody>
                                    <tr><center><h3>Create new shop</h3></center></tr>
                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Shop Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Enter name"required>
                                        </div>
                                    </div>
                                    </td></tr>
                                    <tr><td>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Shop Description</label>
                                        <div class="col-md-6">
                                        <textarea rows="7" cols="45" name="desc" class="form-control" placeholder="Enter text here..."></textarea>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Shop Phone</label>
                                        <div class="col-md-6">
                                            <input  type="text" class="form-control" name="phone" placeholder="Enter Phone"required>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Shop E-mail</label>
                                        <div class="col-md-6">
                                            <input  type="email" class="form-control" name="email" placeholder="Enter E-mail"required>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Shop Url</label>
                                        <div class="col-md-6">
                                            <input  type="text" class="form-control" name="url" placeholder="Enter Url"required>
                                        </div>
                                    </div>
                                    </td></tr>


                                    <tr><td>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Shop Package</label>
                                        <div class="col-md-6" >
                                        @foreach ($packages as $key => $value)
                                            @if( $package == $key )
                                                <input type="radio" name="package" value="{{ $key }}" checked> {{ $value }}<br>
                                            @else
                                                <input type="radio" name="package" value="{{ $key }}"> {{ $value }}<br>
                                            @endif
                                        @endforeach   
                                        </select>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Business Type</label>
                                        <div class="col-md-6" >
                                        <select name="type" class="form-control" required>
                                        <option value="beauty">Beauty</option>
                                        <option value="clothes">Clothes</option>
                                        <option value="drink">Drink</option>
                                        <option value="food">Food</option>
                                        <option value="jewellery">Jewellery</option>
                                        <option value="service">Service</option>
                                        </select>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Business Hours</label>
                                        <div class="col-md-6">
                                            <div id="time">
                                                <div class="col-md-5">
                                                    <input id="timepicker1" width="100%"  name="timeOpen" required> 
                                                </div>
                                                <div class="col-md-1">
                                                <span><b>-</b></span>
                                                </div>
                                                <div class="col-md-5">
                                                <input id="timepicker2" width="100%"  name="timeClose" required >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <!-- google map -->
                                    <tr><td>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Shop Address</label>
                                        <input type="text" id="searchMap">
                                        <div id="mapCanvas"></div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button id="myInput" type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    </td></tr>

                                    </tbody>
                                    </table>
                                    <input type="hidden" id="lat" value="13.7563" name="lat">
                                    <input type="hidden" id="lng" value="100.5018" name="lng">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR2fPnPAqOeegpN6ml_SNSMSc7wN613k&libraries=places&callback=initMap"
    async defer></script>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script>
    var map,geocoder,marker;

    function initMap() {
        map = new google.maps.Map(document.getElementById('mapCanvas'), {
          center: {lat: 13.7563, lng: 100.5018},
          zoom: 15
        });
        marker = new google.maps.Marker( {
          position: {lat: 13.7563, lng: 100.5018},
          map: map,
          draggable: true
        });

         var searchBox = new google.maps.places.SearchBox(document.getElementById('searchMap'));
         google.maps.event.addListener(searchBox, 'places_changed' , function(){
          var places = searchBox.getPlaces();
          var bounds = new google.maps.LatLngBounds();
          var i,place;

          for (i=0; place=places[i];i++){
              bounds.extend(place.geometry.location);
              marker.setPosition(place.geometry.location);
          }

          map.fitBounds(bounds);
          map.setZoom(15);
      });
      google.maps.event.addListener(marker, 'position_changed', function(){
          var lat = marker.getPosition().lat();
          var lng = marker.getPosition().lng();

          $('#lat').val(lat);
          $('#lng').val(lng);
      });


        
      }

    $('#timepicker1').timepicker({
        uiLibrary: 'bootstrap'
    });
    $('#timepicker2').timepicker({
        uiLibrary: 'bootstrap'
    });

        $(document).ready(function() {
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          event.stopPropagation();
          return false;
        }
      });
        });

    // $(document).keypress(function(e) {
    // if(e.keyCode === 32 && e.target.nodeName=='BODY') {
    //     event.preventDefault(); //prevent default if it is body
    // }
// });

</script>

@endsection

@section('css')

<style type="text/css">
     #mapCanvas {
        width: 450px;
        height: 300px;
      }
      #searchMap{
          width:450px;
      }
      .time , #timepicker1 , #timepicker2{
    display: inline-block;
}
</style>

@endsection