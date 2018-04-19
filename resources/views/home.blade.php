@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="row">
    <div class="col-lg-5">
        <div id="1" class="container_card" onClick="reply_click(this)">
          <div class="card_home card1">
            <div class="front" style="background: url(img/cards/test.png)top center;background-size: cover; z-index: 1">
            </div>
            <div class="back" style="background: url(img/cards/test.png)top center;background-size: cover; z-index: 1">
                <img src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=ffffff&amp;data=google" height="200" width="200">
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-7">
        <h3>Poseidon Member VIP Club</h3>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-5">
        <div id="2" class="container_card" onClick="reply_click(this)">
          <div class="card_home card2">
            <div class="front" style="background: url(img/cards/card2.png)top center;background-size: cover; z-index: 1">
                Click to flip
            </div>
            <div class="back">
                <img src="http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=ffffff&amp;data=google" height="200" width="200">
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-7">
        <h3>Starbucks Reserve Member Card</h3>
    </div>
</div>
<hr>


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