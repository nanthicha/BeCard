@extends('shops.layout')
@section('content')
<div class="container" >

  <!-- Nav tabs -->
  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="/shop/show">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active"   href="/shop/branch">Branchs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="/shop/cashier/">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="#">Member Card</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link"   href="#">Setting</a>
    </li>
  </ul>


  <!-- Tab panes -->
  
  <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                <center><h1>Show Branchs</h1></center>
                <hr>
                <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary">Add Branch</button>
                <br><br>
                     <div class="row">
                        <div class="col-lg-6">
                            <div class="card" style="padding:15px;">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card" style="padding:15px;">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            </div>
                        </div>
                    </div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbR2fPnPAqOeegpN6ml_SNSMSc7wN613k&libraries=places&callback=initMap"
    async defer></script>
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
    $(document).ready(function() {
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          event.stopPropagation();
          return false;
        }
      });
    });

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
.nav-tabs .nav-item.show .nav-link,.nav-tabs .nav-link.active{
    color:#495057;
    background-color:#fff;
    border-color:#dee2e6 #dee2e6 #fff
}

</style>

@endsection