<?php

$link = $link = asset('/shop/usevoucher')."/".$voucher->voucher_code;
$qr = "http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=FFFFFF&amp;data=".$link;

 ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <img src="{{ $qr }}" alt="qr code" width="100%" class="img-responsive" />
                        </div>
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <h3>Voucher Code : {{$voucher->voucher_code}}</h3>
                            <hr>
                            @if ($voucher->status == 0)
                            <p>Status : <span class="label label-danger">Not use</span></p>
                            @else
                            <p>Status : <span class="label label-success">Used</span></p>
                            @endif
                            <p>Reward : <span class="label label-info">{{$vouchers->name}}</span> x1</p>
                            <p>Pickup at : <span class="label label-info">{{$shop->name}}</span></p>
                            <small>Contact Tel :{{$shop->phone}} | Email : {{$shop->email}}</small>
                            <p></p>
                            <p></p>
                            <small>Show this QR code to cashier for get the {{$vouchers->name}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
