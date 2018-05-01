@extends('shops.layout')
@section('content')
<div class="container" >

  <!-- Nav tabs -->
  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="/shop/show">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="/shop/branch">Branches</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="/shop/cashier/">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/shop/membercard/">Member Card</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link"   href="#">Setting</a>
    </li>
  </ul>


  <!-- Tab panes -->
  <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
				      <div>
			{!! Form::open(array('route' => 'shop.reward.update','files'=>true)) !!}
              <label>Status</label>
              {!! Form::select('status', [0 => 'Off', 1 => 'On'], $reward->status, ['class'=>'form-control']) !!}
              <p></p>
              <label>Name</label>
              {!! Form::text('name', $reward->name , ['class'=>'form-control','placeholder'=>'Name of Reward']) !!}
              <p></p>
              <label>Description</label>
              {!! Form::textarea('description', $reward->description , ['class'=>'form-control','placeholder'=>'Description of Reward']) !!}
              <p></p>
              {!! Form::hidden('voucherFormat', $reward->voucherFormat) !!}
              <label>Amount</label>
              {!! Form::number('amount',$reward->amount , ['class'=>'form-control']) !!}
              <p></p>
              <label>Use Point</label>
              {!! Form::number('bePoint', $reward->bePoint , ['class'=>'form-control']) !!}
              <p></p>
              <label>VoucherFormat (Prefix)</label>
              {!! Form::text('voucherFormat', $reward->voucherFormat , ['class'=>'form-control','readonly'=>'readonly']) !!}
              <p></p>
              <button type="submit" class="btn btn-success">Create</button>
            {!! Form::close() !!}
				      </div>
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
	border-radius: 10px;
}
.sampleImge img{
	border-radius: 10px;
	height: 250px;
}
</style>

@endsection