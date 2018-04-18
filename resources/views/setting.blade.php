<?

$getUser = DB::table('users')->where('name', $name)->first();
$getUsername = $getUser->username;
$getEmail = $getUser->email;
$getImage = $getUser->image;
$getDate = $getUser->created_at;
$getSex = $getUser->sex;
$getDob = $getUser->dob;
$getYear = date('Y', strtotime($getDob));
$getMoun = date('m', strtotime($getDob));
$getDay = date('d', strtotime($getDob));
$private = $getUser->private_key;
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Profile Setting</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
	                    <div class="col-lg-4">
					        @if ($message = Session::get('success'))
					        <div class="alert alert-success alert-block">
					            <button type="button" class="close" data-dismiss="alert">×</button>
					                <strong>{{ $message }}</strong>
					        </div>
					        <center><img src="img/users/{{ Session::get('image') }}" alt="" width="300px" class="img-responsive"></center>
					        @else
					        <center><img src="img/users/{{ $getImage }}" alt="" width="300px" class="img-responsive"></center>
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
					        <p></p>
					        {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
					        <div class="row">
					        	<div class="col-lg-8">
					        		{!! Form::file('image', array('class' => 'form-control')) !!}
					        		{!! Form::hidden('username', $name) !!}
					        		{!! Form::hidden('type', '0') !!}
					        	</div>
					        	<div class="col-lg-4">
					        		<button type="submit" class="btn btn-success">Upload</button>
					        	</div>
					        </div>
					        {!! Form::close() !!}
	                    </div>
	                    <div class="col-lg-8">
				        @if ($message = Session::get('successProfile'))
				        <div class="alert alert-success alert-block">
				            <button type="button" class="close" data-dismiss="alert">×</button>
				                <strong>{{ $message }}</strong>
				        </div>
						@endif
						{!! Form::open(array('route' => 'update.profile')) !!}
						  <table class="table table-hover">
						    <tbody>

						      <tr>
						        <td><b>Username</b></td>
						        <td>{!! Form::text('username', $getUsername , ['class'=>'form-control','readonly']) !!}</td>
						      </tr>
						      <tr>
						        <td><b>E-mail</b></td>
						        <td>{!! Form::email('email', $getEmail , ['class'=>'form-control','readonly']) !!}</td>
						      </tr>
						      <tr>
						        <td><b>Name</b></td>
						        <td>{!! Form::text('name', $name , ['class'=>'form-control']) !!}</td>
						      </tr>
						      <tr>
						        <td><b>Sex</b></td>
						        <td>{!! Form::select('sex', ['Female' => 'Female', 'Male' => 'Male', 'N/A' => 'N/A'], $getSex , ['class' => 'form-control']) !!}</td>
						      </tr>
						        <td><b>Date of birth</b></td>
						        @if ($getDob == NULL)
						        <td>{!! Form::date('dob', $getDob , ['class' => 'form-control', 'required' => true]) !!}</td>
						        @else
						        <td>{!! Form::date('dob', \Carbon\Carbon::create($getYear, $getMoun, $getDay), ['class' => 'form-control', 'required' => true]) !!}</td>
						        @endif
						      </tr>
						      <tr>
						      	<td></td>
						      	<td><small>Profile created at {{ \Carbon\Carbon::parse($getDate)->format('d M Y')}}</small></td>
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
                    <p></p>
                    <small>* You can't change username or email because the both are method to login. When you want to change this , please contact administrator.</small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
