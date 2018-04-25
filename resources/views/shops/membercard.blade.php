<?php
$membercard = DB::table('membercards')->where('username',Auth::user()->username)->get();
$count_membercard = $membercard->count();

?>

@extends('shops.layout')
@section('content')
<div class="container" >

  <!-- Nav tabs -->
  <!-- Nav tabs -->
  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('shop.show') }}">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="{{ route('shop.branch') }}">Branchs</a>
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
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                <center><h2>Member Card of {{$shop->name}}</h2></center>
                <hr>
				@if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <strong>Whoops!</strong> There were some problems with your input.
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
                @if ($count_membercard == 0)
                <center>
                	<small>Your shop not have any member card , Please create new member card.</small>
                	<p></p>
                	<button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">Create new member card</button>
                </center>
                @else
	                <span class="badge badge-info">You have {{$count_membercard}} member card.</span>
	                <p></p>
	                <?php $membercards = DB::table('membercards')->where('username',Auth::user()->username)->get(); ?>
                	@foreach ($membercards as $card)
					<div class="row">
					    <div class="col-lg-5">
					        <div id="1" class="container_card">
					          <div class="card_home card1">
					            <div class="front" style="background: url({{asset('img/cards'.'/'.$card->imageBG)}} )top center;background-size: cover; z-index: 1">
					            </div>
					          </div>
					        </div>
					    </div>
					    <div class="col-lg-7">
					        <h4><b>{{ $card->name }}</b></h4>
					        <p>{{ $card->description }}</p>
					        <p>Condition : <label class="label label-info">{{ $card->bahtperpoint }} Baht / 1 Point</label></p>
					        <p>Created at : <label class="label label-info">{{ $card->created_at }}</label></p>
					        <p></p>
					        <br>
					        <a href="/shop/membercard/{{ $card->keycard }}/view"><button class="btn btn-sm btn-primary">View member</button></a>
							<a href="/shop/membercard/{{ $card->keycard }}/print"><button class="btn btn-sm btn-success">Print Register QR</button></a>
					        <a href="/shop/membercard/{{ $card->keycard }}/edit"><button class="btn btn-sm btn-warning">Edit</button></a>
					    </div>
					</div>
					<hr>
                	@endforeach
                	@if ($shop->package == "gold")
                		<p></p>
                		<hr>
                	    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">Create new member card</button>

                	@endif
                @endif
                </div>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <center><img src="{{asset('img/shops/logo/'.'/'.$shop->logo)}}" width="50px" class="img-circle img-responsive">
				        	<br>
				        <h4 class="modal-title" id="exampleModalLabel">Create new member card</h4></center>
				      </div>
				      <div class="modal-body">
						{!! Form::open(array('route' => 'shop.membercard.create','files'=>true)) !!}
							<label>Name</label>
							{!! Form::text('name', '' , ['class'=>'form-control','placeholder'=>'Name of Card']) !!}
							<p></p>
							<label>Description</label>
							{!! Form::textarea('desc', '' , ['class'=>'form-control','placeholder'=>'Description of Card']) !!}
							<p></p>
							<label>Shop name</label>
							{!! Form::text('shop', $shop->name , ['class'=>'form-control','readonly'=>'readonly']) !!}
							{!! Form::hidden('shop_id', $shop->id) !!}
							{!! Form::hidden('shop_package', $shop->package) !!}
							<p></p>
							@if ($shop->package == "gold")
							<label>Image <small>(Front of mamber card)</small></label>
							{!! Form::file('imageBG', array('class' => 'form-control')) !!}
							{!! Form::hidden('type', 'membercard') !!}
							<small>Recommanded size : 800 px * 500 px</small>
							<p></p>
							<label>Color palatte <small>(Back of member card)</small></label>
							<div class="row">
								<div class="col-md-6 col-lg-6">
									{!! Form::text('color1', '' , ['class'=>'form-control','placeholder'=>'#CCF3FF']) !!}
								</div>
								<div class="col-md-6 col-lg-6">
									{!! Form::text('color2', '' , ['class'=>'form-control','placeholder'=>'#b5008a']) !!}
								</div>
							</div>
							<br>
							@endif
							<small>Preview Front of Member Card</small>
							<img id="blah" src="{{ asset('img/cards/defaultCard.png') }}" class="img-responsive sampleImge" width="400px" height="250px" style="border-radius: 10px;" />
							<br>
							<small>Preview Back of Member Card</small>
							<div id="sampleColor">
								<center><img src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=ffffff&amp;data=example" style="position:relative; top:50px;" height="150" width="150"></center>
							</div>
							<p></p>
							<label>Baht / Point </label>
							{!! Form::text('bahtperpoint', '' , ['class'=>'form-control','placeholder'=>'100']) !!}
							<small>Example : 100 Baht.- / 1 Bepoint</small>
							<p></p>
							<button type="submit" class="btn btn-success">Create</button>
						{!! Form::close() !!}
				      </div>
				    </div>
				  </div>
				</div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
<style type="text/css">
#sampleColor{
	height: 250px;
	width: 400px;
	background: linear-gradient(45deg, #008df2 50%, #5eb9fb 100%);
	border-radius: 10px;
}
.sampleImge img{
	border-radius: 10px;
	height: 250px;
}
</style>

@endsection
@section('js')
<script type="text/javascript">
$("[name=color1]").keyup(function(){
	var color1 = $('[name=color1]').val();
	var color2 = $('[name=color2]').val();
	console.log(color1+" "+color2);
    $("#sampleColor").css('background', 'linear-gradient(45deg, ' + color1 + ' 50%, ' + color2 + ' 100%)');
});
$("[name=color2]").keyup(function(){
	var color1 = $('[name=color1]').val();
	var color2 = $('[name=color2]').val();
	console.log(color1+" "+color2);
    $("#sampleColor").css('background', 'linear-gradient(45deg, ' + color1 + ' 50%, ' + color2 + ' 100%)');
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
            $('#blah').css('border-radius','10px');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("[name=imageBG]").change(function(){
    readURL(this);
});
</script>
@endsection