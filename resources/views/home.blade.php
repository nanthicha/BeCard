<?php
$qrLink = "http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=ffffff&amp;data=".Auth::user()->private_key;
?>
@extends('layouts.app')

@section('css')
<style>
.floating{
    -webkit-animation-name: Floatingx;
    -webkit-animation-duration: 3s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: ease-in-out;
    -moz-animation-name: Floating;
    -moz-animation-duration: 3s;
    -moz-animation-iteration-count: infinite;
    -moz-animation-timing-function: ease-in-out;
    margin-left: 30px;
    margin-top: 5px;
    position: relative;
    left: -250px;
    top: 150px;

}

@-webkit-keyframes Floatingx{
    from {-webkit-transform:translate(0, 0px);}
    65% {-webkit-transform:translate(0, 10px);}
    to {-webkit-transform: translate(0, -0px);}
}
@-moz-keyframes Floating{
    from {-moz-transform:translate(0, 0px);}
    65% {-moz-transform:translate(0, 10px);}
    to {-moz-transform: translate(0, -0px);}
}
.btn-shadow {
    -webkit-box-shadow: 0 2px 6px 0 rgba(51,105,231,0.4);
    box-shadow: 0 2px 6px 0 rgba(51,105,231,0.4);
    width:200px;
}
.btn-static-secondary {
    border: none;
    color: #fff;
    background-image: linear-gradient(80deg, #00aeff, #3369e7);
}
.btn {
    border: 1px solid transparent;
    padding: 0 20px;
    display: inline-block;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 400;
    height: 40px;
    line-height: 40px;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Your Member Cards</div>
                <div class="panel-body">
                            @if ($message = Session::get('message'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
<div class="floating btn btn-static-secondary btn-shadow" id="helperSwape">
Click to swape <span class="fas fa-angle-double-right"></span>
</div>
@foreach ($membercard as $index => $card)
    <?php $shop = DB::table('shops')->where('id',$card->shop_id)->first(); ?>
    <div class="row">
        <div class="col-lg-5">
            <div id="{{$index}}" class="container_card" onClick="reply_click(this)">
              <div class="card_home card{{$index}}">
                <div class="front" style="background: url({{asset('img/cards'.'/'.$card->imageBG)}} )top center;background-size: cover; z-index: 1">
                </div>
                <div class="back" style="background: url(img/cards/memberCover.png),linear-gradient(45deg, {{$card->colorHex1}} 50%, {{$card->colorHex2}} 100%) top center;background-size: cover; z-index: 1">
                    <img src="{{$qrLink}}" height="150" width="150">
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-7">
            <h4><b>{{ $card->name }}</b></h4>
            <img src="{{asset('img/shops/logo/'.$shop->logo)}}" class="img-circle pull-right img-responsive ifMobileSoSmall" style="position: relative;right:10px;top: -40px;">
            <p>{{ $card->description }}</p>
            <p>Condition : <label class="label label-info">{{ $card->bahtperpoint }} Baht / 1 Point</label></p>
            <p></p>
            <br>
        </div>
    </div>
    <hr>
@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script type="text/javascript">
function reply_click(elem)
{
    var id = $(elem).attr("id");
    var el = '.card'+id;
    $(el).toggleClass('flipped');
}
</script>
@endsection