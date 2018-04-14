
@extends('layouts.admin')

@section('contentAdmin')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ol class="breadcrumb">
  <li><a href="{{ route('admin.rewards') }}">Rewards</a></li>
  <li class="active">New Reward</li>
</ol>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open(array('route' => 'admin.rewardsnew.post','files'=>true)) !!}
	<div class="form-group">
	    <label>Name of Reward</label>
	    {!! Form::text('name','' , ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>Description</label>
	    {!! Form::textarea('desc','' , ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>Upload Image</label>
	    {!! Form::file('image', array('class' => 'form-control')) !!}
	</div>
	<div class="form-group">
	    <label>Aount <small>(Max)</small></label>
	    {!! Form::number('amount','' , ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>BePoint <small>(How much BePoint to rewarding one piece ?)</small></label>
	    {!! Form::number('bepoint','' , ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>Reception</label>
	    {!! Form::select('reception', [
	    '0' => 'Thailand Post + Pick up at the company',
	    '1' => 'Thailand Post only',
	    '2' => 'Pick up at the company only'],
	    '0',['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>Voucher Format <small>(Ex. 'ABC' that text will prefix of voucher)</small></label>
	    {!! Form::text('format','' , ['class'=>'form-control','placeholder' => 'ABC']) !!}
	</div>
	<div class="form-group">
	    <label>End Date</small></label>
		{!! Form::date('end', '' , ['class' => 'form-control', 'required' => true]) !!}	</div>
	<p></p>
	<button type="submit" class="btn btn-primary">Create</button>
{!! Form::close() !!}

@endsection
