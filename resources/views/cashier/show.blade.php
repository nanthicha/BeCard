<?php
use Carbon\Carbon;
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
      <a class="nav-link active"   href="{{ route('shop.cashier') }}">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.membercard') }}">Member Card</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link"   href="{{ route('shop.setting') }}">Setting</a>
    </li>
  </ul>


  <!-- Tab panes -->
  
  <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                <center><h1>Show Cashiers</h1></center>
                <hr>
                @if( ($package == 'sliver' and  $count < 15) or $package == 'gold')
                <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary" style="margin-left:10%">Add Cashier</button>
                @endif
                <br><br>
                <div class="row">
                <div style="width:80%;margin: 0 auto;">
                @foreach ($branches as $index => $branch)
                   
                  <h3>Branch: {{$branch->name}}</h3>
                  <hr>
                  @if( array_key_exists($branch->id,$countCashiers))
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Added</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($cashiers as $index => $cashier)
                          @if($branch->id == $cashier->branch_id)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td><img src="{{asset('img/users/'.$imgCashiers[$cashier->username])}}" width="30px" height="30px;" style="border-radius: 50%;"></td>
                                <td>{{ $cashier->username }}</td>
                                <td>{{ $cashier->name }}</td>
                                <td>{{$cashier->email}}</td>

                                <td>{{ Carbon::parse($cashier->created_at)->diffForHumans() }}</td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    @else
                      <center><p>No Cashier, Please add Cashier.<p></center>
                    @endif
                    <br>
                    @endforeach
    </div>
</div>

            </div>
        </div>
    </div>
</div>



<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<br>
      <center><h3 class="modal-title" id="lineModalLabel">Add Cashier</h3></center>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
      <form method="POST" action="/shop/cashier" >
          {{ csrf_field() }}
            <div class="form-group">
            <label for="exampleInputEmail1">Branch name</label>
            
              <select name="branch" class="form-control" required>
              @foreach ($branches as $index => $branch)
              @if( array_key_exists($branch->id,$countCashiers))
                @if( ($package == "sliver" and $countCashiers[$branch->id] < 5 ) or $package == 'gold')
                  <option value="{{$branch->id}}">{{$branch->name}}</option>
                @endif
              @else
                  <option value="{{$branch->id}}">{{$branch->name}}</option>
              @endif
              @endforeach
              </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Cashier username</label>
                <input type="input" class="form-control" name="username" placeholder="Enter username" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Cashier name</label>
                <input type="input" class="form-control" name="name" placeholder="Enter name" required>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Cashier email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Cashier phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter phone" required>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
      </form>
              

		</div>

		</div>
	</div>
  </div>
</div>
@endsection

@section('js')
<script>



    $(document).ready(function() {
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          event.stopPropagation();
          return false;
        }
      });

      
    });

</script>
@endsection

@section('css')
<style type="text/css">
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
.nav-tabs .nav-item.show .nav-link,.nav-tabs .nav-link.active{
    color:#495057;
    background-color:#fff;
    border-color:#dee2e6 #dee2e6 #fff
}

</style>

@endsection