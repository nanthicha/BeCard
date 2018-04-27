
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<div class="panel-heading">
            		History
            	</div>
                <div class="panel-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th style="text-align: center;">#</th>
										<th>Redeemed at</th>
										<th>Price</th>
										<th>Referance</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($history as $indexKey => $his)
									<tr>
										<td style="text-align: center;">{{$indexKey+1}}</td>
										<td>{{ \Carbon\Carbon::parse($his->created_at)->format('F j, Y, g:i a') }}</td>
										<td>{{$his->price}} Baht</td>
										<td>{{$his->referance}}</td>
									</tr>
									@endforeach

								</tbody>
							</table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
