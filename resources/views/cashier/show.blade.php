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
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.reward') }}">Reward</a>
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
                <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-success" style="margin-left:10%"><span class="glyphicon glyphicon-plus"></span> &nbspAdd Cashier</button>
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
                                <th>Password</th>
                                <th>Added</th>
                                <th>Action</th>
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
                                <td>{{$cashier->password}}</td>
                                <td>{{ Carbon::parse($cashier->created_at)->diffForHumans() }}</td>
                                <td><button data-toggle="modal" data-target="#delete" class="btn btn-danger" onclick="deleteC({{$cashier->id}})"><span class="glyphicon glyphicon-trash"></span> &nbspDelete</button></td>
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
        <form method="POST" action="/shop/cashier/delete"  id="formD">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
				
        <input id="deleteId" name="id" type="hidden">
        </form>
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
    function deleteC(id){
      $("#deleteId").val(id);
    }


</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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