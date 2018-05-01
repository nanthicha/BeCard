@extends('shops.layout')

@section('content')
<div class="container" >

  <!-- Nav tabs -->

  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('shop.show') }}">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="{{ route('shop.branch') }}">Branches</a>
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
    <li class="nav-item pull-right active">
      <a class="nav-link"   href="{{ route('shop.setting') }}">Setting</a>
    </li>
  </ul>

      <div class="row" >
        <div class="col-md-12">
            <div class="panel panel-default" >
            <div style="padding:30px;">
            <h1 style="margin-bottom: 20px;"><span class="glyphicon glyphicon-cog"></span> Setting</h1>

            <div class="row" >
            <div class="col-sm-3">
                <ul class="nav nav-pills nav-stacked" style="width:100%;z-index: 0;position:relative;margin-left:-15px;">
                  <li ><a href="{{ Route('shop.setting') }}">&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-home"></span> &nbsp;General</a></li>
                  <li ><a href="{{ Route('shop.setting.timeline') }}">&nbsp&nbsp&nbsp&nbsp<span class="	glyphicon glyphicon-list"></span> &nbspTimeline</a></li>
                  <li class="active"><a href="{{ Route('shop.setting.promotion') }}">&nbsp&nbsp&nbsp&nbsp<span class="	glyphicon glyphicon-tags"></span> &nbspPromotion</a></li>
                </ul>
              </div>



              <div class="card" style="margin-left: -30px;">

                <div class="card-body" style="padding:20px;">
                  <h1>&nbsp&nbsp&nbsp&nbspPromotion</h1>
                  <hr>
                  <img src="{{ asset('img/shops/image/cog2.png') }}" class="img-responsive pull-right" width="150" height="150" style="margin-top:-120px;" >

                  <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPreview</p>

                  <div class="col-md-9">
                    <div class="card" style="padding:7px;">
                        <div class="card-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    @if(count($promotions) > 0)
                    <ol class="carousel-indicators">
                    @foreach( $promotions as $index => $promotion)
                      @if($index == 0)
                      <li data-target="#myCarousel" data-slide-to="{{$index}}" class="active"></li>
                      @else
                      <li data-target="#myCarousel" data-slide-to="{{$index}}" ></li>
                      @endif
                    @endforeach
                    </ol>
                    @else
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      </ol>
                    @endif

                      <!-- Wrapper for slides -->

                      <div class="carousel-inner">
                      @if(count($promotions) > 0)
                      @foreach( $promotions as $index => $promotion)
                      @if($index == 0)
                      <div class="item active">
                          <img src="{{asset('img/promotions/'.$promotion->image)}}" >
                        </div>
                      @else
                      <div class="item">
                          <img src="{{asset('img/promotions/'.$promotion->image)}}" >
                        </div>
                      @endif
                    @endforeach
                      @else
                      <div class="item active">
                          <img src="{{asset('img/promotions/defaultPromo.png')}}" >
                        </div>
                      @endif

                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div style="margin-top:32.5px;">
                    <center><h4><b>Package Promotion</b></h4></center>
                    </div>
                    <hr>
                    <p>Package Sliver: &nbsp&nbsp&nbsp2 Promotion.</p>
                    <p>Package Gold: &nbsp&nbsp&nbsp&nbsp5 Promotion.</p>
                    <hr>
                    <div style="margin-top:-7px;">
                    <center>
                    <h5><u>Notice</u></h5>
                    <p>if you don't have any promotion , Becard Shop will show default picture for you.</p></center>
                    </div>
                    <br>
                    <br>
                    <div>
                    <hr>
                    </div>
                    @if( (count($promotions) < 5 && $shop->package == "gold") || (count($promotions) < 2 && $shop->package == "sliver") )
                    <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-success" style="margin-left:3%"><span class="glyphicon glyphicon-plus"></span> &nbspAdd Promotion</button>
                    <br><br>
                    @endif
                <div class="row">
                <div style="width:80%;margin: 0 auto;">


                  <h3>Promotion</h3>
                  <hr>

                    @if(count($promotions) > 0)

                    <table class="table table-hover">
                        <tbody>
                        @foreach( $promotions as $index => $promotion)
                          <tr>
                          <div class="card" style="padding:7px;">
                              <div style="width:70%;float:left">
                               <img src="{{asset('img/promotions/'.$promotion->image)}}" class="img-responsive" style="height:230px;">
                              </div>

                              <div style="width:29%;float:right;padding:5px;" >
                              <center>

                              <h4 style="margin-top:50px;"><b>Promotion Added</b></h4>
                              <hr style="margin-top:-5px;">

                              <p style="margin-top:-15px;">{{ Carbon\Carbon::parse($promotion->created_at)->diffForHumans() }}</p>
                              <br>
                              <button data-toggle="modal" data-target="#delete" class="btn btn-danger" onclick="deleteC({{$promotion->id}})"><span class="glyphicon glyphicon-trash"></span> &nbspDelete</button>

                              </center>

                              </div>



                          </div>
                          </tr>
                          @endforeach



                        </tbody>
                    </table>
                    @else
                    <center><p>No Promotions<p></center>
                    @endif


                    </div>
                </div>
                </div>
              </div>





              <div class="clearfix visible-lg"></div>
            </div>
          </div>
        </div>
      </div>
      </div>
</div>

<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:800px;">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<br>
      <center><h3 class="modal-title" id="lineModalLabel">Add Promotion</h3></center>
		</div>
		<div class="modal-body">

            <!-- content goes here -->
      <form method="POST" action="{{ route('shop.update.promotion') }}" enctype="multipart/form-data" >
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <img src="{{asset('img/shops/image/84.png')}}" id="blah" style="width:750px;height:400px;" class="img-thumbnail center-block">
            <br>
            <center><input type="file" name="image"  onchange="readURL(this);" class="form-control" style="width:500px;display:inline-block" required>
            <button type="submit" class="btn btn-success">Upload</button></center>
            <center style="color:#ff4d4d">* Please upload a picture smaller than 4 MB.</center>
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
        <form method="POST" action="/shop/promotion/delete"  id="formD">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <input id="deleteId" name="id" type="hidden">
        </form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">s
<style>

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
.carousel-inner > .item {
  height: 280px;
}

.carousel-inner > .item > img {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  max-height: 500px;
  width: auto;
}

.carousel-control.left,
.carousel-control.right {
  background-image: none;
}

.modal-confirm {
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

@section('js')
<script>
function deleteC(id){
      $("#deleteId").val(id);
    }
function readURL(input) {

  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
              $('#blah').attr('src', e.target.result);
                };

      reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
