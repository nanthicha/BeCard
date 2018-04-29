@extends('shops.layout')
@section('content')
<div class="container" >

  <!-- Nav tabs -->
  <!-- Nav tabs -->
  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('shop.show') }}">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="{{ route('shop.branch') }}">Branchs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="{{ route('shop.cashier') }}">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="{{ route('shop.membercard') }}">Member Card</a>
    </li>
	<li class="nav-item active">
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
<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Code</th>
			<th>Username</th>
			<th>Rewared at</th>
			<th>Item</th>
			<th>Status</th>
			<th>Cashier</th>
			<th>Picked up at</th>
		</tr>
	</thead>
	<tbody>
    @foreach ($vouchers as $index => $voucher)
    <?php $voucherdetail = DB::table('vouchers')->where('id',$voucher->voucher_id)->get(); ?>
		<tr>
			<td>{{$index+1}}</td>
			<td>{{$voucher->voucher_code}}</td>
			<td>{{$voucher->username}}</td>
			<td>{{$voucher->created_at}}</td>
			<td>{{$voucherdetail[0]->name}}</td>
			@if ($voucher->status == 0)
			<td>Not use</td>
			@else
			<td>Used</td>
			@endif
			<td>{{$voucher->cashier}}</td>
			<td>{{$voucher->updated_at}}</td>
		</tr>
    @endforeach
	</tbody>
</table>
				  </div>
				</div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
<style type="text/css">
#sampleColor{
	height: 250px;
	width: 400px;
	background: linear-gradient(45deg, #008df2 50%, #5eb9fb 100%);
	border-radius: 10px;
}
.sampleImge img{
	border-radius: 10px;
	height: 250px;
}
</style>

@endsection
@section('js')
<script type="text/javascript">
$("[name=color1]").keyup(function(){
	var color1 = $('[name=color1]').val();
	var color2 = $('[name=color2]').val();
	console.log(color1+" "+color2);
    $("#sampleColor").css('background', 'linear-gradient(45deg, ' + color1 + ' 50%, ' + color2 + ' 100%)');
});
$("[name=color2]").keyup(function(){
	var color1 = $('[name=color1]').val();
	var color2 = $('[name=color2]').val();
	console.log(color1+" "+color2);
    $("#sampleColor").css('background', 'linear-gradient(45deg, ' + color1 + ' 50%, ' + color2 + ' 100%)');
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
            $('#blah').css('border-radius','10px');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("[name=imageBG]").change(function(){
    readURL(this);
});
</script>
@endsection