<?

$count_vouchers = $vouchers->count();

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Vouchers</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					@if ($count_vouchers == 0)
					<center><small>No vouchers.</small></center>
					@else
<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Code</th>
			<th>Rewared at</th>
			<th>Item</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
    @foreach ($vouchers as $index => $voucher)
    <?php $voucherdetail = DB::table('vouchers')->where('id',$voucher->voucher_id)->get(); ?>
		<tr>
			<td>{{$index+1}}</td>
			<td><a href="{{route('user.voucher.id',['id'=>$voucher->voucher_code])}}">{{$voucher->voucher_code}}</a></td>
			<td>{{$voucher->created_at}}</td>
			<td>{{$voucherdetail[0]->name}}</td>
			@if ($voucher->status == 0)
			<td>Not use</td>
			@else
			<td>Used</td>
			@endif
		</tr>
    @endforeach
	</tbody>
</table>
					<center>{{ $vouchers->links() }}</center>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
