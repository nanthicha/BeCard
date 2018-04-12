
@extends('layouts.admin')

@section('contentAdmin')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ol class="breadcrumb">
<!--   <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li> -->
  <li class="active">Affiliates</li>
</ol>
<table class="table table-hover table-responsive">
    <thead>
      <tr>
      	<th style="text-align: center;">No</th>
        <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'username']) }}">Invitor <span class="fas fa-caret-down"></span></a></th>
        <th>Invitie</th>
        <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'added_on']) }}">Registed at <span class="fas fa-caret-down"></span></a></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $key => $user)

    <tr>
    	<td style="text-align: center;">{{ $key+1 }}</td>
    	<td>{{ $user->username }}</td>
    	<td>{{ $user->assigned_to }}</td>
    	<td>{{ \Carbon\Carbon::parse($user->added_on)->format('D d M Y H:i:s') }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<center>{{ $users->appends(['sort' => request()->sort])->links() }}</center>

@endsection
