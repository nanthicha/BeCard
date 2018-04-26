@extends('shops.layout')
@section('content')
<div class="container" >

  <!-- Nav tabs -->
  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('shop.show') }}">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active"   href="{{ route('shop.branch') }}">Branchs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.cashier') }}">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.membercard') }}">Member Card</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link"   href="{{ route('shop.setting') }}">Setting</a>
    </li>
  </ul>


  <!-- Tab panes -->
  
  <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">

                <div class="panel-body">
                <center><h1>Show Branchs</h1></center>
                <hr>
                <input type="hidden" id="count" value="{{ $count }}">
                <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary" style="margin-left:4.5%" id="add">Add Branch</button>
                <br><br>
                    
                        
                    
                           
                            @foreach($branches as $index => $branch)
                              
                            <div class="col-md-6 ">
                            <div class="card " style="padding:15px;display:block;margin-bottom:20px;">
                            
                            <div class="card-body">
                                <h5 class="card-title">Branch Name: {{ $branch->name }} </h5>
                                <hr>
                                <input type="hidden" id="{{$index}}-latlng" value="{{$branch->latlng}}">
                                <p class="card-text"><span ><span class="glyphicon glyphicon-earphone"></span> Phone: </span>&nbsp;  <span id="{{$index.'-ph'}}">{{$branch->phone}}</span>  </p>
                                <p class="card-text"><span class="glyphicon glyphicon-map-marker"></span> Location: &nbsp;<a href="#" onclick="return sh({{$index}});"> <span id="{{$index.'-address'}}"></span> &nbsp;<span class="glyphicon glyphicon-triangle-bottom"></span></a></p>
                                
                                <div class="map" id="{{$index}}-map"></div>
                                <input type="hidden" id="{{$index}}-sh" value="0">
                                <a href="#" class="btn btn-info pull-right"><span class="glyphicon glyphicon-cog"></span> Edit</a>
                            
                            </div>
                            </div>
                            </div>
                              @endforeach
                             
                            
                        
                    
                <br>
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
      <center><h3 class="modal-title" id="lineModalLabel">Add Branch</h3></center>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
      <form method="POST" action="/shop/branch" >
          {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleInputEmail1">Branch name</label>
                <input type="input" class="form-control" name="name" placeholder="Enter name" required>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="input" class="form-control" name="phone" placeholder="Enter phone" required>
              </div>
              <div class="form-group">
                <label >Shop Address</label><br>
                <input type="text" id="searchMap">
                <div id="mapCanvas"></div>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
              <input type="hidden" id="lat" value="13.7563" name="lat">
              <input type="hidden" id="lng" value="100.5018" name="lng">
      </form>
              

		</div>

		</div>
	</div>
  </div>
</div>
@endsection

@section('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR2fPnPAqOeegpN6ml_SNSMSc7wN613k&libraries=places"></script>
<script>
   

    function initMap() {
      var map = new google.maps.Map(document.getElementById('mapCanvas'), {
          center: {lat: 13.7563, lng: 100.5018},
          zoom: 15
        });
      var marker = new google.maps.Marker( {
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


      init();
      initMap();
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
<style type="text/css">
#mapCanvas {
  width: 567px;
  height: 300px;
}
#searchMap{
  width:567px;
}
.map{
  width: 440px;
  height: 300px;
}
.pac-container {
  background-color: #FFF;
  z-index: 20;
  position: fixed;
  display: inline-block;
  float: left;
}
.modal {
  z-index: 20;  
}
.modal-backdrop{
    z-index: 10;        
}​

.nav-tabs .nav-item.show .nav-link,.nav-tabs .nav-link.active{
    color:#495057;
    background-color:#fff;
    border-color:#dee2e6 #dee2e6 #fff
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

.card{
    width: 470px;
    /* box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.2), 0 6px 30px 0 rgba(0, 0, 0, 0.19); */
    margin: 0 auto;
    
}
.card-deck{
    display: flex;
    position: relative;
    margin: auto;
 
}
</style>

@endsection