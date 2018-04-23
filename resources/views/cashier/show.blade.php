@extends('shops.layout')
@section('content')
<div class="container" >

  <!-- Nav tabs -->
  <ul class="nav nav-tabs"  style="top: 100px;width:79%;z-index: 0;">
    <li class="nav-item">
      <a class="nav-link " href="/shop/show">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="/shop/branch">Branchs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active"   href="/shop/cashier">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="#">Member Card</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link"   href="#">Setting</a>
    </li>
  </ul>
  <br>
  <br>


  <!-- Tab panes -->
  
  <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <img src="{{ asset('img/shops/cover/defaultCover.png') }}" class="img-responsive">
                    <img src="{{ asset('img/shops/logo/stamp_1524068326.png') }}" class="img-thumbnail center-block" style="width:200px;height:auto;top:-60px;position:relative;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection