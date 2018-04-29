<?

$count_bepoint = $bepointlog->count();
$count_vouchers = $users->count();
$bp = Auth::user()->bePoint;
$now = date("Y-m-d H:i:s");


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
                    <span class="fab fa-gg-circle"></span> BePoint : <b >{{ $bp }}</b></p>
                    <small>* You can get reward with BePoint , but you can't exchange BePoint to cash.</small></center>
                    <hr>
					@if ($count_vouchers == 0)
					<center><small>No reward.</small></center>
					@else
					<div class="row">
					    @foreach ($users as $reward)
					      <div class="col-sm-4 col-md-4 col-lg-4 mt-4">
					        <div class="card">
					            <img class="card-img-top" src="{{ asset('img/rewards').'/'.$reward->image }}">
					            <div class="card-block">
					                <figure class="profile">
					                    <img src="{{ asset('img/shops/logo').'/'.$reward->logo}}" class="img-responsive">
					                </figure>
					                <h4 class="card-title mt-3">{{ $reward->name }}</h4>
					                <div class="meta">
					                    <a>Product by {{$reward->shopname}}</a>
					                </div>
					                <div class="card-text">
					                    {{ $reward->description }}
					                </div>
					            </div>
					            <div class="card-footer">
					                <small>Until {{ \Carbon\Carbon::parse($reward->updated_at)->format('d M Y') }}</small>
					                @if ($bp < $reward->bePoint || $reward->updated_at < $now || $reward->amount < 1)
					                <button class="btn btn-secondary float-right btn-sm disabled"><span class="fab fa-gg-circle"></span> {{ $reward->bePoint }}</button>
					                @else
					                <a href="{{route('shop.reward.iwant',['code'=>$reward->voucherFormat])}}"><button class="btn btn-primary float-right btn-sm"><span class="fab fa-gg-circle"></span> {{ $reward->bePoint }}</button></a>
					                @endif
					            </div>
					        </div>
					      </div>
					    @endforeach
					</div>
					<center>{{ $users->links() }}</center>
					@endif
					<p></p>
					<div class="page-header">
					  <h2>BePoint transactions</h2>
					</div>
					@if ($count_bepoint == 0)
					<center><small>No transactions.</small></center>
					@else
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Amount</th>
									<th>Details</th>
									<th>Ending Balance</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($bepointlog as $index => $be)
								@if ($be->type == 0)
								<tr class="success">
								@else
								<tr class="danger">
								@endif
									<td>{{ $index+1 }}</td>
									<td>{{ \Carbon\Carbon::parse($be->added_on)->format('F j, Y, g:i a') }}</td>
									<td><span class="fab fa-gg-circle"></span> {{ $be->bepoint }}</td>
									<td>{{ $be->msg }}</td>
									<td><span class="fab fa-gg-circle"></span> {{ $be->balance  }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
