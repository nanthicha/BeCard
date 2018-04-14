
@extends('layouts.admin')

@section('contentAdmin')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ol class="breadcrumb">
	<li class="active">BePoints Logs</li>
</ol>
<table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th>Date</th>
        <th>Username</th>
        <th>Details</th>
        <th>BePoint</th>
        <th>Ending Balance</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($bepointlog as $log)
	@if ($log->type == 0)
	<tr class="success">
	@else
	<tr class="danger">
	@endif
    	<td>{{ \Carbon\Carbon::parse($log->added_on)->format('D d M Y H:i:s') }}</td>
    	<td><a href="{{ URL::route('admin.userslogs.name',['name'=>$log->username])}}">{{ $log->username }}</a></td>
    	<td>{{ $log->msg }}</td>
    	<td>{{ $log->bepoint }}</td>
    	<td>{{ $log->balance }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<center>{{ $bepointlog->links() }}</center>

@endsection
