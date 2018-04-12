
@extends('layouts.admin')

@section('contentAdmin')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ol class="breadcrumb">
	@if (isset($name))
	<li><a href="{{ URL::route('admin.userslogs')}}">User Logs</a></li>
	<li class="active">{{ $name }}</li>
	@else
	<li class="active">User Logs</li>
	@endif
</ol>
<table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th>Time</th>
        <th>Actioner</th>
        <th>Message</th>
        <th>Assigned to</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($logs as $log)

    <tr>
    	<td>{{ \Carbon\Carbon::parse($log->added_on)->format('D d M Y H:i:s') }}</td>
    	<td><a href="{{ URL::route('admin.userslogs.name',['name'=>$log->username])}}">{{ $log->username }}</a></td>
    	<td>{{ $log->msg }}</td>
    	<td><a href="{{ URL::route('admin.userslogs.name',['name'=>$log->assigned_to])}}">{{ $log->assigned_to }}</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
<center>{{ $logs->links() }}</center>

@endsection
