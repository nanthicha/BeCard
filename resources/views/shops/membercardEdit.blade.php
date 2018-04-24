@extends('shops.layout')
@section('content')
<div class="container" >

  <!-- Nav tabs -->
  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="/shop/show">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="/shop/branch">Branchs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="/shop/cashier/">Cashiers</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="/shop/membercard/">Member Card</a>
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
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="/shop/membercard">Member Cards</a></li>
				    <li class="breadcrumb-item active" aria-current="page">{{$card->name}}</li>
				  </ol>
				</nav>
				      <div>
						{!! Form::open(array('route' => 'shop.membercard.update','files'=>true)) !!}
							<label>Name</label>
							{!! Form::text('name', $card->name , ['class'=>'form-control','placeholder'=>'Name of Card']) !!}
							{!! Form::hidden('keycard', $card->keycard) !!}
							<p></p>
							<label>Description</label>
							{!! Form::textarea('desc', $card->description , ['class'=>'form-control','placeholder'=>'Description of Card']) !!}
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
									{!! Form::text('color1', $card->colorHex1 , ['class'=>'form-control','placeholder'=>'#CCF3FF']) !!}
								</div>
								<div class="col-md-6 col-lg-6">
									{!! Form::text('color2', $card->colorHex2 , ['class'=>'form-control','placeholder'=>'#b5008a']) !!}
								</div>
							</div>
							<br>
							@endif
							<small>Preview Front of Member Card</small>
							<img id="blah" src="{{ asset('img/cards/'.$card->imageBG) }}" class="img-responsive sampleImge" width="400px" height="250px" style="border-radius: 10px;" />
							<br>
							<small>Preview Back of Member Card</small>
							<div id="sampleColor">
								<center><img src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=ffffff&amp;data=example" style="position:relative; top:50px;" height="150" width="150"></center>
							</div>
							<p></p>
							<label>Baht / Point </label>
							{!! Form::text('bahtperpoint', $card->bahtperpoint , ['class'=>'form-control','placeholder'=>'100']) !!}
							<small>Example : 100 Baht.- / 1 Bepoint</small>
							<p></p>
							<button type="submit" class="btn btn-success">Save</button>
						{!! Form::close() !!}
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
$( document ).ready(function() {
	var color1 = $('[name=color1]').val();
	var color2 = $('[name=color2]').val();
	$("#sampleColor").css('background', 'linear-gradient(45deg, ' + color1 + ' 50%, ' + color2 + ' 100%)');
});
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