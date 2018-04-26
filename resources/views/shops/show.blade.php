@extends('shops.layout')

@section('content')
<div class="container" >

  <!-- Nav tabs -->
  <!-- Nav tabs -->
  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('shop.show') }}">Shop</a>
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
    <li class="nav-item pull-right">
      <a class="nav-link"   href="{{ route('shop.setting') }}">Setting</a>
    </li>
  </ul>

<input id="inPhone" type="hidden" value="{{ $shop->phone }}">
  <!-- Tab panes -->
  <div class="row" id="tabcontent" style="display:block;">
        <div class="col-md-12">
            <div class="panel panel-default">
              <input type="hidden" value="{{ $shop->latlng }}" id="latlng">
              <input type="hidden" value="{{ $shop->time }}" id="time">
                <div class="panel-body">
                    <img src="{{ asset('img/shops/cover/'.$shop->imgCover) }}" class="img-responsive">
                    <img src="{{ asset('img/shops/logo/'.$shop->logo) }}" class="img-thumbnail center-block" style="width:200px;height:auto;top:-60px;position:relative;">
                    
                    <div style="margin-top:-40px;">
                    <center>
                    <p class="card-text">Description: &nbsp;{{$shop->description}}</p>
                    <p class="card-text"><span class="label label-success"><span class="glyphicon glyphicon-earphone"></span> Phone</span>&nbsp;<span id="phone"></span> &nbsp&nbsp &nbsp&nbsp <span class="label label-primary"><span class="glyphicon glyphicon-envelope" ></span> Email</span> &nbsp;{{$shop->email}}</p>
                    
                    </center>
                    </div>
                    <hr>

                    <div class="col-md-9">
                    <div class="card" style="padding:7px;">
                        <div class="card-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <div class="item active">
                          <img src="{{asset('img/promotions/defaultPromo.png')}}" >
                        </div>

                        <div class="item">
                          <img src="{{asset('img/promotions/defaultPromo.png')}}" >
                        </div>

                        <div class="item">
                          <img src="{{asset('img/promotions/defaultPromo.png')}}" >
                        </div>
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
                          <p class="card-text"><span class="glyphicon glyphicon-map-marker"></span> &nbsp;<a href="#" data-toggle="modal" data-target="#squarespaceModal"><span id="ll"></span> &nbsp;<span class="glyphicon glyphicon-triangle-bottom"></span></a></p>
                        </div>
                      </div>
                    </div>
                    
                    
                    <!-- <div class="col-md-3">
                      <div class="card" style="padding:15px;">
                        <div class="card-body">
                          <div class="card-title">{{}}
                        </div>
                      </div>
                    </div> -->
                     
                </div>
                
                




            </div>



        </div>
    </div>

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
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR2fPnPAqOeegpN6ml_SNSMSc7wN613k&callback=initMap">
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
      

          
       
    </script>

@endsection

@section('css')
<style>
#map {
  width: 567px;
  height: 480px;
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
#tabcontent {
  display: none; 
  animation: fadeEffect 3.5s;
}


@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}
</style>
@endsection