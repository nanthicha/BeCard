<?php
$vouchers = DB::table('vouchers')->where('shop_id',$shop->id)->get();
$count_vouchers = $vouchers->count();
?>
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
    <li class="nav-item active">
      <a class="nav-link "   href="{{ route('shop.reward') }}">Reward</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link"   href="{{ route('shop.setting') }}">Setting</a>
    </li>
  </ul>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
      <center><h1>Reward of {{$shop->name}}</h1></center>
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
      @if ($count_vouchers == 0)
        <center>
          <small>Your shop not have any reward , Please create new reward.</small>
          <p></p>
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">Create new reward</button>
        </center>
      @else
        <div class="row">
            @foreach ($vouchers as $reward)
              <div class="col-sm-4 col-md-4 col-lg-4 mt-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('img/rewards').'/'.$reward->image }}">
                    <div class="card-block">
                        <figure class="profile">
                            <img src="{{ asset('img/shops/logo').'/'.$shop->logo}}" class="img-responsive">
                        </figure>
                        <h4 class="card-title mt-3">{{ $reward->name }}</h4>
                        <div class="meta">
                            <a>Product by {{$shop->name}}</a>
                        </div>
                        <div class="card-text">
                            {{ $reward->description }}
                            <hr>
                            <p>Amount : <span class="label label-info">{{$reward->amount}}</span></p>
                            <p>Use Point : <span class="label label-info">{{$reward->bePoint}}</span></p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>Until {{ \Carbon\Carbon::parse($reward->updated_at)->format('d M Y') }}</small>
                        <button class="btn btn-success float-right btn-sm">View</button>
                    </div>
                </div>
              </div>
            @endforeach
        </div>
      @endif
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection

@section('css')
<style>

</style>
@endsection