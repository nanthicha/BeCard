<?php

$getYear = date('Y', strtotime($code->updated_at));
$getMoun = date('m', strtotime($code->updated_at));
$getDay = date('d', strtotime($code->updated_at));

 ?>
@extends('layouts.admin')

@section('contentAdmin')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ol class="breadcrumb">
  <li><a href="{{ route('admin.rewards' )}}">Rewards</a></li>
  <li class="active">Edit {{ $code->name }}</li>
</ol>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif
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
{!! Form::open(array('route' => 'admin.rewards.edit.post','files'=>true)) !!}
	<div class="form-group">
	    <label>Status</label>
	    {!! Form::select('status', [
	    '0' => 'Off',
	    '1' => 'On'],
	    $code->status,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>Name of Reward</label>
	    {!! Form::text('name',$code->name , ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>Description</label>
	    {!! Form::textarea('desc',$code->description , ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>Upload Image</label>
	    {!! Form::file('image', array('class' => 'form-control')) !!}
	</div>
	<div class="form-group">
	    <label>Aount <small>(Available)</small></label>
	    {!! Form::number('amount',$code->amount , ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>BePoint <small>(How much BePoint to rewarding one piece ?)</small></label>
	    {!! Form::number('bepoint',$code->bePoint , ['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>Reception</label>
	    {!! Form::select('reception', [
	    '0' => 'Thailand Post + Pick up at the company',
	    '1' => 'Thailand Post only',
	    '2' => 'Pick up at the company only'],
	    $code->reception,['class'=>'form-control']) !!}
	</div>
	<div class="form-group">
	    <label>Voucher Format <small>(Ex. 'ABC' that text will prefix of voucher)</small></label>
	    {!! Form::text('format',$code->voucherFormat , ['class'=>'form-control','placeholder' => 'ABC','readonly'=>true]) !!}
	</div>
	<div class="form-group">
	    <label>End Date</small></label>
		{!! Form::date('end', \Carbon\Carbon::create($getYear, $getMoun, $getDay) , ['class' => 'form-control', 'required' => true]) !!}	</div>
	<p></p>
	<button type="submit" class="btn btn-primary">Update</button>
{!! Form::close() !!}

@endsection
