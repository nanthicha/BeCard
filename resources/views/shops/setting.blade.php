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
                  <li class="active"><a href="#">&nbsp&nbsp&nbsp&nbsp<span class="glyphicon glyphicon-home"></span> &nbsp;General</a></li>
                  <li><a href="#">&nbsp&nbsp&nbsp&nbsp<span class="	glyphicon glyphicon-list"></span> &nbspTimeline</a></li>
                </ul>
              </div>

             

              <div class="card" style="margin-left: -30px;height: 800px;">
                
                <div class="card-body" style="padding:20px;">
                  <h1>&nbsp&nbsp&nbsp&nbspGeneral</h1>
                  <hr>
                  <img src="{{ asset('img/shops/image/cog3.png') }}" class="img-responsive pull-right" width="150" height="150" style="margin-top:-120px;" >
                  <br>
                  <form class="form-horizontal" method="POST" action="" >
                    {{ csrf_field() }}
                    <table class="table">
                      <tbody>
                        <tr>
                        <div class="form-group">
                              <label class="col-md-3 control-label">Shop Name</label>
                                  <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter name"required>
                                  </div>
                        </div>
                        
                        </tr>

                        <tr >
                        <div class="form-group" style="margin-top:20px;">
                              <label  class="col-md-3 control-label">Shop Description</label>
                              <div class="col-md-6">
                                <textarea rows="7" cols="45" name="desc" class="form-control" placeholder="Enter text here..."></textarea>
                              </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop Phone</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="phone" placeholder="Enter Phone"required>
                            </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop E-mail</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="email" placeholder="Enter E-mail"required>
                            </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop Url</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="url" placeholder="Enter Url"required>
                            </div>
                        </div>
                        </tr>

                        <tr>
                        <div class="form-group" style="margin-top:20px;">
                            <label class="col-md-3 control-label">Shop Package</label>
                            <div class="col-md-6">
                              <input  type="text" class="form-control" name="url" placeholder="Enter Url" value="gold" disabled>
                            </div>
                        </div>
                        </tr>



                        
                      
                      </tbody>
                    </table>
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

