<?

$getUser = DB::table('users')->where('name', $name)->first();
$getUsername = $getUser->username;
$vouchers = DB::table('vouchers')->where('status','>',0)->get();
$count_vouchers = $vouchers->count();


?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Reward</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <center>
                 	<p style="color:#5395CC;font-size: 3em;">
                    <span class="fab fa-gg-circle"></span> BePoint : <b >{{ Auth::user()->bePoint }}</b></p>
                    <small>* You cant get reward with BePoint , but you can't exchange BePoint to cash.</small></center>
                    <hr>
					@if ($count_vouchers == 0)
					<center><small>No reward.</small></center>
					@else
					<table class="table table-hover">
						<thead>
							<tr>
								<th style="text-align: center;">No</th>
								<th>Invited</th>
								<th>Registed at</th>
								<th>BePoint</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($vouchers as $indexKey => $voucher)
							<tr>
								<td style="text-align: center;">{{$indexKey+1}}</td>
								<td>{{ $voucher->name }}</td>
								<td>{{ $voucher->name }}</td>
								<td style="color:#5395CC;text-align: center;"><span class="fab fa-gg-circle"></span> + 50 BePoint</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif
<div class="row">
	<div class="col-sm-6 col-md-6 col-lg-6 mt-4">
		<div class="card">
		    <img class="card-img-top" src="http://success-at-work.com/wp-content/uploads/2015/04/free-stock-photos.gif">
		    <div class="card-block">
		        <figure class="profile">
		            <img src="http://127.0.0.1:8000/img/becardLogo.png" class="img-responsive">
		        </figure>
		        <h4 class="card-title mt-3">Tawshif Ahsan Khan</h4>
		        <div class="meta">
		            <a>Friends</a>
		        </div>
		        <div class="card-text">
		            Tawshif is a web designer living in Bangladesh.
		        </div>
		    </div>
		    <div class="card-footer">
		        <small>Last updated 3 mins ago</small>
		        <button class="btn btn-info float-right btn-sm"><span class="fab fa-gg-circle"></span> 50</button>
		    </div>
		</div>
	</div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
