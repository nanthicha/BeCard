@extends('shops.layout')

@section('content')
<div class="container" >

  <!-- Nav tabs -->

  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('shop.show') }}">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="{{ route('shop.branch') }}">Branchs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="{{ route('shop.cashier') }}">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.membercard') }}">Member Card</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.reward') }}">Reward</a>
    </li>
    <li class="nav-item pull-right active">
      <a class="nav-link"   href="{{ route('shop.setting') }}">Setting</a>
    </li>
  </ul>

      <div class="row" >
        <div class="col-md-12">
            <div class="panel panel-default" >
            <div style="padding:30px;">
            <h1 style="margin-bottom: 20px;"><span class="glyphicon glyphicon-cog"></span> Setting</h1>
            
            <div class="row" >
            <div class="col-sm-3">
                <ul class="nav nav-pills nav-stacked" style="width:100%;z-index: 0;position:relative;margin-left:-15px;">
                  <li class="active"><a href="#">&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-home"></span> &nbsp;General</a></li>
                  <li><a href="#">&nbsp&nbsp&nbsp&nbsp<span class="	glyphicon glyphicon-list"></span> &nbspTimeline</a></li>
                </ul>
              </div>

             

              <div class="card" style="margin-left: -30px;">
                
                <div class="card-body" style="padding:20px;">
                  <h1>&nbsp&nbsp&nbsp&nbspGeneral</h1>
                  <img src="{{ asset('img/shops/image/cog2.png') }}" class="img-responsive pull-right" width="150" height="150" style="margin-top:-90px;" >
                  
                  <div style="float:right;margin-top: -47px;display:inline-block;margin-right:15px;">
                  <!-- <span style="font-size:25px;"><sup >Public Shop: &nbsp&nbsp</sup></span> -->
                      <span style="font-size:25px;"><sup >Off&nbsp</sup></span>
                 
                  <label class="switch" >
                          <input type="checkbox" id="status" value="{{$shop->status}}" onclick="changeVal()" form="form" name="status" checked>
                          <span  class="slider round"></span>
                  </label>
                  <span style="font-size:25px;"><sup >&nbspOn</sup></span>
                  </div>
  
                  <hr>
                  
                  <br>
                  <form class="form-horizontal" method="POST" action="{{ route('shop.update.general') }} " id="form" >
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <table class="table">
                      <tbody>

                        <tr>
                        <div class="form-group">
                              <label class="col-md-3 control-label">Shop Name</label>
                                  <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter name" value="{{$shop->name}}" required>
                                  </div>
                        </div>
                        
                        </tr>

                        <tr >
                        <div class="form-group" style="margin-top:20px;">
                              <label  class="col-md-3 control-label">Shop Description</label>
                              <div class="col-md-6">
                                <textarea rows="7" cols="45" name="desc" class="form-control" placeholder="Enter text here...">{{ $shop->description }}</textarea>
                              </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop Phone</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="phone" placeholder="Enter Phone" value="{{ $shop->phone }}" required>
                            </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop E-mail</label>
                            <div class="col-md-6">
                              <input  type="email" class="form-control" name="email" placeholder="Enter E-mail" value="{{ $shop->email }}" required>
                            </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop Url</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="url" placeholder="Enter Url" value="{{ $shop->url }}" required>
                            </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop Package</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="url" placeholder="Enter Url" value="{{ $shop->package }}" disabled>
                            </div>
                        </div>
                        </tr>

                        <tr>
                          <div class="form-group" style="margin-top:20px;">
                          <label  class="col-md-3 control-label">Business Type</label>
                            <div class="col-md-6" >
                              <select name="type" class="form-control" required>
                              @foreach($type as $key => $value) 
                              @if($key == $shop->type)
                              <option value="{{ $key }}" selected>{{ $value }}</option>
                              @else
                              <option value="{{ $key }}">{{ $value }}</option>
                              @endif
                              @endforeach
                              </select>
                            </div>
                          </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                          <label  class="col-md-3 control-label">Business Hours</label>
                            <div class="col-md-8">
                            <div id="time">
                                <div class="col-md-5" style="margin-left:-15px;">
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
                          </tr>

                                    <!-- google map -->
                          <tr>
                          <div class="form-group" style="margin-top:30rpx;">
                            <label  class="col-md-3 control-label">Shop Address</label>
                            <div class="col-md-6">
                                <input type="text" id="searchMap">
                              <div id="mapCanvas"></div>
                            </div>
                          </div>
                          </tr>

                          <hr>
                          <tr>
                            <div class="form-group" style="margin-top:20px;">
                            <div class="col-md-8 col-md-offset-3">
                                <button id="myInput" type="submit" class="btn btn-primary" >&nbsp&nbspUpdate&nbsp&nbsp</button>
                            </div>
                            </div>
                          </tr>


                        
                      
                      </tbody>
                    </table>
                    <input type="hidden" id="lat" value="13.7563" name="lat">
                    <input type="hidden" id="lng" value="100.5018" name="lng">
                  </form>
                </div>
              </div>



             

              <div class="clearfix visible-lg"></div>
            </div>
          </div>
        </div>
      </div>
      </div>
</div>
@endsection
@section('jsBefore')
<script>
                    var status = "{{ $shop->status }}";
                    if(status == "off"){
                      document.getElementById("status").checked = false;

                    }
                  </script>
@endsection

@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR2fPnPAqOeegpN6ml_SNSMSc7wN613k&libraries=places&callback=initMap"
    async defer></script>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script>
    var status = "{{ $shop->status }}";
      if(status == "off"){
        document.getElementById("status").checked = false;

      }

    function changeVal(){
      
      if( document.getElementById("status").value == 'on' ){
        document.getElementById("status").value = 'off';
      }else{
        document.getElementById("status").value = 'on';
      }
    }
    var map,geocoder,marker;
    var latlng = "{{ $shop->latlng }}".split(',',2);
    var ltng = {lat: parseFloat(latlng[0]), lng: parseFloat(latlng[1])};
    console.log(latlng);
    function initMap() {
        map = new google.maps.Map(document.getElementById('mapCanvas'), {
          center: {lat: parseFloat(latlng[0]), lng: parseFloat(latlng[1])},
          zoom: 15
        });
        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        marker = new google.maps.Marker( {
          position: {lat: parseFloat(latlng[0]), lng: parseFloat(latlng[1])},
          map: map,
          // icon: "{{ asset('img/shops/image/marker2.png') }}",
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
      
      var geocoder = new google.maps.Geocoder;
        geocoder.geocode({'location': ltng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              console.log(results[0].formatted_address);
            $('#searchMap').val(results[0].formatted_address);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });

        
      }

    $('#timepicker1').timepicker({
        uiLibrary: 'bootstrap'
    });
    $('#timepicker2').timepicker({
        uiLibrary: 'bootstrap'
    });

    var times = "{{ $shop->time }}".split(',', 2);
    $('#timepicker1').val(times[0]);
    $('#timepicker2').val(times[1]);

 

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

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #f36f5a;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #4f96cc;
}

input:focus + .slider {
  box-shadow: 0 0 1px #4f96cc;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>

@endsection