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
      <a class="nav-link "   href="{{ route('shop.cashier') }}">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.membercard') }}">Member Card</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.reward') }}">Reward</a>
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
                @if( $package == 'gold' or ( $package == 'sliver' and $count < 5 ))
                <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-success" style="margin-left:4.5%" id="add"><span class="glyphicon glyphicon-plus"></span> &nbspAdd Branch</button>
                @endif
                <br><br>
                    
                        
                    
                           @if($count == 0)
                               <center><p>No Branchs<p></center>
                           
                           @endif
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
                                <button data-toggle="modal" data-target="#delete" class="btn btn-danger pull-right" onclick="deleteC({{$branch->id}})"><span class="glyphicon glyphicon-trash"></span> &nbspDelete</button>
                                <button data-toggle="modal" data-target="#edit"  class="btn btn-success pull-right" style="margin-right:10px;width:80px;" onclick="edit({{$branch->id}})"><span class="glyphicon glyphicon-cog"></span> &nbspEdit</button>
                            
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

{{------ EDIT ------}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<br>
      <center><h3 class="modal-title" id="lineModalLabel">Edit Branch</h3></center>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
      <form method="POST" action="/shop/branch/update" >
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="form-group">
                <label for="exampleInputEmail1">Branch name</label>
                <input type="input" id="nameE" class="form-control" name="name" placeholder="Enter name" required>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="input" id="phoneE" class="form-control" name="phone" placeholder="Enter phone" required>
              </div>
              <div class="form-group">
                <label >Shop Address</label><br>
                <input type="text" id="searchEdit">
                <div id="mapEdit"></div>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
              <input type="hidden" id="latE" value="13.7563" name="lat">
              <input type="hidden" id="lngE" value="100.5018" name="lng">
              <input type="hidden" id="idBranch" name="id" >
      </form>
              

		</div>

		</div>
	</div>
  </div>
</div>


<!-- Modal delete -->
<div id="delete" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer">
      
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" form="formD">Delete</button>
        <form method="POST" action="/shop/branch/delete"  id="formD">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
				
        <input id="deleteId" name="id" type="hidden">
        </form>
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

    function editMap(latlng){
        var input = latlng;
        var latlngStr = input.split(',', 2);
        // console.log(latlngStr);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
        var infowindow = new google.maps.InfoWindow;
        var map = new google.maps.Map(document.getElementById('mapEdit'), {
          center: {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])},
          zoom: 15
        });
        var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                draggable: true
              });
        var geocoder = new google.maps.Geocoder;
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              // console.log(id);
            $('#searchEdit').val(results[0].formatted_address);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchEdit'));
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
          
          $('#latE').val(lat);
          $('#lngE').val(lng);
      });
    }

    
    function edit(id){
      $.ajax({
            type: "GET",
            url: '/shop/branch/edit',
            data: { id : id},
            success: function( response ) {
                // console.log(response);
              $('#nameE').val(response['name']);
              $('#phoneE').val(response['phone']);
              editMap(response['latlng']);
              $('#idBranch').val(id);
            }
        });
    }

    function deleteC(id){
      $("#deleteId").val(id);
    }


    
    


</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style type="text/css">
#mapCanvas {
  width: 567px;
  height: 300px;
}
#searchMap{
  width:567px;
}
#mapEdit{
  width: 567px;
  height: 300px;
}
#searchEdit{
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
 
}.modal-confirm {		
		color: #636363;
		width: 400px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
        text-align: center;
		font-size: 14px;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -10px;
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -2px;
	}
	.modal-confirm .modal-body {
		color: #999;
	}
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;		
		border-radius: 5px;
		font-size: 13px;
		padding: 10px 15px 25px;
	}
	.modal-confirm .modal-footer a {
		color: #999;
	}		
	.modal-confirm .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid #f15e5e;
	}
	.modal-confirm .icon-box i {
		color: #f15e5e;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		min-width: 120px;
        border: none;
		min-height: 40px;
		border-radius: 3px;
		margin: 0 5px;
		outline: none !important;
    }
	.modal-confirm .btn-info {
        background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>

@endsection