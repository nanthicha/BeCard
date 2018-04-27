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
                              <a href="/shop/promotion/{{$index+1}}"><button class="btn btn-danger" style="width:100px;margin-top:7px;"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete</button></a>

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
      </form>
              

		</div>

		</div>
	</div>
  </div>
</div>
@endsection

@section('css')
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
</style>
@endsection

@section('js')
<script>
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