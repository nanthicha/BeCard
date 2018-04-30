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
#slideshow {
    position: relative;
    width: 100%;
    height: 250px;
    margin-bottom: 60px;
}

#slideshow > div {
    position: absolute;
    top: 10px;
    left: 10px;
    right: 10px;
    bottom: 10px;

}
#slideshow img{
    width: 100%;
    height: 250px;
    object-fit: cover;
}
a.list-group-item {
    height:auto;
    min-height:220px;
}
a.list-group-item.active small {
    color:#fff;
}
.stars {
    margin:20px auto 1px;    
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
<div id="slideshow">
   <div>
     <a href="/shop/show/kfc"><img src="{{asset('img/promotions/kfc_promo.png')}}"></a>
   </div>
   <div>
     <a href="/reward"><img src="{{asset('img/promotions/str_promo.png')}}"></a>
   </div>
   <div>
     <a href="/shop/show/bnk48"><img src="{{asset('img/promotions/bnk48.png')}}"></a>
   </div>
</div>
<center>
    <b><p>All shop in BeCard</p></b>
    <hr>
</center>
<div class="list-group">
@foreach ($shops as $index => $shop)
          <a href="shop/show/{{$shop->url}}" class="list-group-item">
                <div class="media col-md-3">
                    <figure class="pull-left">
                        <img class="media-object img-responsive"  src="{{asset('img/shops/logo/'.$shop->logo)}}" style="object-fit: cover;height: 200px;width:200px;">
                    </figure>
                </div>
                <div class="col-md-6">
                    <b><h4 class="list-group-item-heading"> {{$shop->name}} </h4></b>
                    <p class="list-group-item-text">{{$shop->description}}
                    </p>
                </div>
                <div class="col-md-3 text-center">
                    <button type="button" class="btn btn-default btn-lg btn-primary"> See Now! </button>
                </div>
          </a>
@endforeach
</div>
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
$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  5000);
</script>

@endsection
