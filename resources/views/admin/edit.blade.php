
@extends('layouts.admin')

@section('contentAdmin')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ol class="breadcrumb">
  <li><a href="{{ URL::route('admin.users')}}">Users</a></li>
  <li class="active">{{ $userEdit->name }}</li>
</ol>
<div class="row">
    <div class="col-lg-4">
        <center><img src="{{ asset('img/users').'/'.$userEdit->image }}" alt="" width="300px" class="img-responsive"></center>
    </div>
    <div class="col-lg-8">
    @if ($message = Session::get('successProfile'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
	@endif
	{!! Form::open(array('route' => 'adminupdate.profile')) !!}
	  <table class="table table-hover">
	    <tbody>

	      <tr>
	        <td><b>Username</b></td>
	        <td>{{$userEdit->username}}</td>
	      </tr>
	      <tr>
	        <td><b>BePoint</b></td>
	        <td style="color:#5395CC;"><span class="fab fa-gg-circle"></span> {{$userEdit->bePoint}} BePoint</td>
	      </tr>
	      <tr>
	        <td><b>E-mail</b></td>
	        <td>{{$userEdit->email}} {!! Form::hidden('email', $userEdit->email , ['class'=>'form-control','readonly']) !!}</td>
	      </tr>
	      <tr>
	        <td><b>Name</b></td>
	        <td>{{$userEdit->name}}</td>
	      </tr>
	      <tr>
	        <td><b>Role</b></td>
	        @if ($userEdit->role != "Admin")
	        <td>{!! Form::select('role', ['User'=>'User', 'Cashier'=>'Cashier', 'Entrepreneur'=>'Entrepreneur', 'Admin'=>'Admin'], $userEdit->role , ['class' => 'form-control']) !!}</td>
	        @else
	        <td>{{$userEdit->role}}</td>
	        @endif
	      </tr>
	      <tr>
	        <td><b>Sex</b></td>
	        <td>{{$userEdit->sex}}</td>
	      </tr>
	        <td><b>Date of birth</b></td>
	        <td>{{ \Carbon\Carbon::parse($userEdit->dob)->format('d M Y') }}</td>
	      </tr>
	      <tr>
	      	<td></td>
	      	<td><small>Profile created at {{ \Carbon\Carbon::parse($userEdit->created_at)->format('d M Y H:i:s')}}</small></td>
	      </tr>
	      <tr>
	      	<td></td>
	      	<td><small>Profile last updated at {{ \Carbon\Carbon::parse($userEdit->updated_at)->format('d M Y H:i:s')}}</small></td>
	      </tr>
	      <tr>
	      	<td></td>
	      	<td><button type="submit" class="btn btn-primary">Save</button></td>
	      </tr>
	    </tbody>
	  </table>
	{!! Form::close() !!}
    </div>
</div>

@endsection
