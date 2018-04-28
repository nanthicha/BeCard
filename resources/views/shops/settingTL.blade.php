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
                  <li class="active"><a href="{{ Route('shop.setting.timeline') }}">&nbsp&nbsp&nbsp&nbsp<span class="	glyphicon glyphicon-list"></span> &nbspTimeline</a></li>
                  <li ><a href="{{ Route('shop.setting.promotion') }}">&nbsp&nbsp&nbsp&nbsp<span class="	glyphicon glyphicon-tags"></span> &nbspPromotion</a></li>
                </ul>
              </div>

             

              <div class="card" style="margin-left: -30px;">
                
                <div class="card-body" style="padding:20px;">
                  <h1>&nbsp&nbsp&nbsp&nbspTimeline</h1>
                  <hr>
                  <img src="{{ asset('img/shops/image/cog2.png') }}" class="img-responsive pull-right" width="150" height="150" style="margin-top:-120px;" >
                  <br>
                 
                   
                  <form class="form-horizontal" method="POST" action="{{ route('shop.update.timeline') }} " enctype="multipart/form-data" >
                        <div class="form-group">
                              <label >&nbsp&nbsp&nbsp&nbsp&nbsp&nbspShop Cover Image</label>
                              
                              {{ csrf_field() }}
                    {{ method_field('PUT') }}
                              <img src="{{ asset('img/shops/cover/'.$shop->imgCover) }}" id="cover" class="img-responsive" style="padding: 0 15px;height:140px;" >
                                <br>
                                <br>
                                <input type="file" name="image" onchange="readURL(this,'cover');" class="form-control" style="width:300px;display:inline-block;margin-left:35%;" required>
                                <button type="submit" class="btn btn-success">Upload</button>
                                <input type="hidden" name="type" value="cover">
       
                                </form>
                           
                        </div>
                        <hr>
                      
                        <form class="form-horizontal" method="POST" action="{{ route('shop.update.timeline') }} " enctype="multipart/form-data" >
                        <div class="form-group">
                              <label class="col-md-4 control-label">Shop Logo</label>
                              
                              {{ csrf_field() }}
                               {{ method_field('PUT') }}
                                <img src="{{ asset('img/shops/logo/'.$shop->logo) }}" id="logo" alt="" width="300px"  class="img-thumbnail " style="margin-left:10px;">
                                <br>
                                <br>
                                <input type="file" onchange="readURL(this,'logo');" name="image" class="form-control" style="width:300px;display:inline-block;margin-left:35%;" required>
                                <button type="submit" class="btn btn-success">Upload</button>
                                <input type="hidden" name="type" value="logo">
       
                             
                           
                        </div>
                        </form>
                        



                
                    


                        
                      
          
                  
                </div>
              </div>



             

              <div class="clearfix visible-lg"></div>
            </div>
          </div>
        </div>
      </div>
      </div>
</div>

@endsection

@section('js')
<script>
function readURL(input,id) {

  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
              $('#'+id).attr('src', e.target.result);
                };

      reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection