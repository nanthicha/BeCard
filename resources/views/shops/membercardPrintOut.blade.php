<?php 

$link = asset('join')."/".$card->keycard;
$qr = "http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=F5F5F5&amp;data=".$link;

 ?>
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
				      	<label for="">URL to Register</label>
				      	<input type="text" class="form-control" value="{{$link}}"><p></p>
<div class="parent">
  <img class="image1" src="{{asset('img/join.png')}}" />
  <img class="image2" src="{{$qr}}" />
  <img class="image3 img-circle" width="10%" src="{{asset('img/shops/logo/'.$shop->logo)}}" />
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
.parent {
  position: relative;
  top: 0;
  left: 0;
}
.image1 {
  position: relative;
  top: 0;
  left: 0;
}
.image2 {
  position: absolute;
  top: 275px;
  left: 175px;
}
.image3 {
  position: absolute;
  top: 30px;
  left: 250px;
}

</style>

@endsection
@section('js')
@endsection