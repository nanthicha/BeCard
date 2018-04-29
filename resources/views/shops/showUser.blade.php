<?php 
$membercards = DB::table('membercards')->where('shop_id',$shop->id)->get(); 
$qrLink = "http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=ffffff&amp;data=".Auth::user()->private_key;
?>
@extends('shops.layout')

@section('content')

<div id="tabcontent" style="display:block;">
<input id="inPhone" type="hidden" value="{{ $shop->phone }}">
  <!-- Tab panes -->

              <input type="hidden" value="{{ $shop->latlng }}" id="latlng">
              <input type="hidden" value="{{ $shop->time }}" id="time">
                    @if($shop->imgCover == 'defaultCover.png')
                    <img src="{{ asset('img/shops/cover/defaultCoverUser.png') }}" class="img-responsive" style="width:100%">
                    @else
                    <img src="{{ asset('img/shops/cover/'.$shop->imgCover) }}" class="img-responsive" style="width:100%">
                    @endif
                    <img src="{{ asset('img/shops/logo/'.$shop->logo) }}" class="img-thumbnail center-block" style="width:350px;height:auto;top:-150px;position:relative;">
                    
                    <div style="margin-top:-135px;">
                    <center>
                    <p class="card-text"><h1><b>{{$shop->name}}</b></h1></p>
                   
                    <p class="card-text">Description: &nbsp;{{$shop->description}}</p>
                    <p class="card-text"><span class="label label-success"><span class="glyphicon glyphicon-earphone"></span> Phone</span>&nbsp;<span id="phone"></span> &nbsp&nbsp &nbsp&nbsp <span class="label label-primary"><span class="glyphicon glyphicon-envelope" ></span> Email</span> &nbsp;{{$shop->email}}</p>
                    
                    </center>
                    </div>
                    <hr>

                    <div style="width:85%;margin:0 auto;">
                    <div class="col-md-9">
                    <div class="card" style="padding:7px;">
                        <div class="card-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    @if(count($promotions) > 0)
                    <ol class="carousel-indicators">
                    @foreach( $promotions as $index => $promotion)
                      @if($index == 0)
                      <li data-target="#myCarousel" data-slide-to="{{$index}}" class="active"></li>
                      @else
                      <li data-target="#myCarousel" data-slide-to="{{$index}}" ></li>
                      @endif
                    @endforeach
                    </ol>
                    @else
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      </ol>
                    @endif

                      <!-- Wrapper for slides -->
                     
                      <div class="carousel-inner">
                      @if(count($promotions) > 0)
                      @foreach( $promotions as $index => $promotion)
                      @if($index == 0)
                      <div class="item active">
                          <img src="{{asset('img/promotions/'.$promotion->image)}}" >
                        </div>
                      @else
                      <div class="item">
                          <img src="{{asset('img/promotions/'.$promotion->image)}}" >
                        </div>
                      @endif
                    @endforeach
                      @else
                      <div class="item active">
                          <img src="{{asset('img/promotions/defaultPromo.png')}}" >
                        </div>
                      @endif
                       
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                    </div>
                    </div>
                    </div>
                  

                    
                    
                    <div class="col-md-3 pull-right">
                      <div class="card" style="padding:15px;">
                        <div class="card-body">
                          <h5 class="card-title">About</h5>
                          <hr>
                          <p class="card-text"><span class="glyphicon glyphicon-equalizer"></span> &nbsp;{{$shop->type}}</p>
                          <p class="card-text"><span class="glyphicon glyphicon-time"></span> <span class="label label-success" id="tell">Open</span> &nbsp;<span id="open"></span> - <span id="close"></span></p>
                          <p class="card-text"><span class="glyphicon glyphicon-map-marker"></span> &nbsp;<a   href="javascript:void(0)" data-toggle="modal" data-target="#squarespaceModal"><span id="ll"></span> &nbsp;<span class="glyphicon glyphicon-triangle-bottom"></span></a></p>
                        </div>
                      </div>
                    </div>
                    </div>
                    
                    
           
                     
                  {{-- Reward --}}
                 <div style="clear:both"></div>
                 
                 <br>
                 <div  style="width:80%;margin:0 auto;">
                 <hr>
                  <h3>Reward</h3>
                  <br>
                  <hr>
                  </div>
                  
                  <div  style="width:80%;margin:0 auto;">
                  <br>
                 <h3> Show Branches</h3>
                <hr>
                <input type="hidden" id="count" value="{{ $count }}">
                <!-- <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary" style="margin-left:4.5%" id="add">Add Branch</button> -->
                <br><br>
                    
                        
                    
                           @if($count == 0)
                               <center><p>No Branchs<p></center>
                          @elseif(count($branches) == 1)
                          <div  style="margin:0 auto;width:55%">
                              @foreach($branches as $index => $branch)
                              
                                <div class="card " style="padding:15px;display:block;margin-bottom:20px;">
                                
                                <div class="card-body">
                                    <h5 class="card-title">Branch Name: {{ $branch->name }} </h5>
                                    <hr>
                                    <input type="hidden" id="{{$index}}-latlng" value="{{$branch->latlng}}">
                                    <p class="card-text"><span ><span class="glyphicon glyphicon-earphone"></span> Phone: </span>&nbsp;  <span id="{{$index.'-ph'}}">{{$branch->phone}}</span>  </p>
                                    <p class="card-text"><span class="glyphicon glyphicon-map-marker"></span> Location: &nbsp;<a  href="javascript:void(0)" onclick="return sh({{$index}});"> <span id="{{$index.'-address'}}"></span> &nbsp;<span class="glyphicon glyphicon-triangle-bottom"></span></a></p>
                                    
                                    <div class="map" id="{{$index}}-map" style="width:605px;"></div>
                                    <input type="hidden" id="{{$index}}-sh" value="0">
                                
                                
                                </div>
                                </div>
                                </div>
                                @endforeach
                          </div>
                           
                           @else
                            @foreach($branches as $index => $branch)
                              
                            <div class="col-md-6 ">
                            <div class="card " style="padding:15px;display:block;margin-bottom:20px;">
                            
                            <div class="card-body">
                                <h5 class="card-title">Branch Name: {{ $branch->name }} </h5>
                                <hr>
                                <input type="hidden" id="{{$index}}-latlng" value="{{$branch->latlng}}">
                                <p class="card-text"><span ><span class="glyphicon glyphicon-earphone"></span> Phone: </span>&nbsp;  <span id="{{$index.'-ph'}}">{{$branch->phone}}</span>  </p>
                                <p class="card-text"><span class="glyphicon glyphicon-map-marker"></span> Location: &nbsp;<a  href="javascript:void(0)" onclick="return sh({{$index}});"> <span id="{{$index.'-address'}}"></span> &nbsp;<span class="glyphicon glyphicon-triangle-bottom"></span></a></p>
                                
                                <div class="map" id="{{$index}}-map"></div>
                                <input type="hidden" id="{{$index}}-sh" value="0">
                            
                            
                            </div>
                            </div>
                            </div>
                        @endforeach
                        @endif
                      </div>

                 
                 <div style="clear:both"></div>
                 <br>
                 <div style="width:80%;margin:0 auto;">
                 <hr>
                 
                  <h3>Member Card Collection</h3>
                  <br>
                  <div style="width:80%;margin:0 auto;">
                	@foreach ($membercards as $index => $card)
                 
                  <div class="col-md-6 " style="margin-top:20px;">
                      <div id="{{$index}}" class="container_card"  >
                        <div class="card_home card{{$index}}">
                          <div class="front" style="background: url({{asset('img/cards'.'/'.$card->imageBG)}} )top center;background-size: cover; z-index: 1">
                          </div>
                    
                        </div>
                      </div>
                  </div>
                	@endforeach
                  
                  </div>
                  
                  </div>
                  <div style="clear:both"></div>
                  <br><br><br>

      </div>


           




<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<br>
      <center><h3 class="modal-title" id="lineModalLabel">Map</h3></center>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
            <div id="map"></div>
              

		</div>

		</div>
	</div>
  </div>
  
</div>

@endsection


@section('js')
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR2fPnPAqOeegpN6ml_SNSMSc7wN613k">
    </script>
    <script>
      function initMap() {
        var input = document.getElementById('latlng').value;
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        var infowindow = new google.maps.InfoWindow;
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])},
          zoom: 15
        });
        var marker = new google.maps.Marker({
                position: latlng,
                map: map
              });
        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              $('#ll').text(results[0].formatted_address);
              // console.log(results[0]);
              marker.set('labelContent', results[0].formatted_address);
              // var bounds  = new google.maps.LatLngBounds();
              // loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
              // bounds.extend(loc);
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
              // // map.fitBounds(bounds);      
              // map.panToBounds(bounds);     
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }
      
      var phone = document.getElementById('inPhone').value;
      if(phone.length > 4){
      var result = phone.slice(0,3) + '-' + phone.slice(3,6) + '-' + phone.slice(6);
      $('#phone').text(result);
      }else{
        $('#phone').text(phone);
      }
        
      var time = document.getElementById('time').value.split(',');
      $('#open').text(time[0]);
      $('#close').text(time[1]);
      
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      
      var open = time[0].split(':');
      var close = time[1].split(':');
    

      if( (m < open[1]) || (m>close[1])){
        if( (h == parseInt(open[0]) && m < parseInt(open[1]) ) || ( h == parseInt(close[0]) && m > parseInt(close[1]) ) || h<open[0] || h>close[0] ){
          $('#tell').text('Close');
          $('#tell').attr('class','label label-danger');
        
        
        }

        
      }



      function createMap(id,latlng){
        var input = latlng;
        var latlngStr = input.split(',', 2);
        // console.log(latlngStr);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        var infowindow = new google.maps.InfoWindow;
        var map = new google.maps.Map(document.getElementById(id+'-map'), {
          center: {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])},
          zoom: 15
        });
        var marker = new google.maps.Marker({
                position: latlng,
                map: map
              });
        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              // console.log(id);
            $('#'+id+'-address').text(results[0].formatted_address);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
    }

    


    function init(){
      var count = document.getElementById('count').value;
      for (var i = 0; i < count; i++) {

        createMap(i,document.getElementById(i+"-latlng").value)
        $("#"+i+"-map").hide();
        var phone = document.getElementById(i+'-ph').textContent;
        console.log(phone);
        var result = phone.slice(0,3) + '-' + phone.slice(3,6) + '-' + phone.slice(6);
        $('#'+i+'-ph').text(result);
      }
      // console.log("hello");
    }

    $(document).ready(function() {
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          event.stopPropagation();
          return false;
        }
      });

      initMap();
      init();
      
      var package = "{{ $package }}";
      console.log(package);
      if(document.getElementById('count').value == 5  && package == "sliver"){
        // console.log('hello');
        document.getElementById('add').style.display = 'none';
      }
    });
    
    function sh(id){
      console.log(id);
      if(document.getElementById(id+'-sh').value == "0"){
        $("#"+id+"-map").show(500);
        $('#'+id+'-sh').val(1);
      }else{
        $("#"+id+"-map").hide(500);
        $('#'+id+'-sh').val(0);
      }

    }
      


          
       
    </script>

@endsection

@section('css')
<style>
#map {
  width: 567px;
  height: 480px;
}
.map{
  width: 515px;
  height: 400px;
}
.modal-dialog {
  min-height: calc(100vh - 60px);
  display: flex;
  flex-direction: column;
  justify-content: center;
  overflow: auto;
  @media(max-width: 768px) {
    min-height: calc(100vh - 20px);
  }
}

.carousel-inner > .item {
  height: 400px;
}

.carousel-inner > .item > img {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  max-height: 500px;
  width: auto;
}

.carousel-control.left,
.carousel-control.right {
  background-image: none;
}

.nav-tabs .nav-item.show .nav-link,.nav-tabs .nav-link.active{
    color:#495057;
    background-color:#fff;
    border-color:#dee2e6 #dee2e6 #fff
}




</style>
@endsection