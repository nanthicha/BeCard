
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
  <li class="active">Users</li>
</ol>
<table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'id']) }}">ID <span class="fas fa-caret-down"></span></a></th>
        <!-- <th>Image</th> -->
        <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'username']) }}">UserName <span class="fas fa-caret-down"></span></a></th>
        <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'name']) }}">Name <span class="fas fa-caret-down"></span></a></th>
        <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'email']) }}">E-mail <span class="fas fa-caret-down"></span></a></th>
        <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'role']) }}">Role <span class="fas fa-caret-down"></span></a></th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)

    <tr>
    	<td>{{ $user->id }}</td>
        <!-- <td><img src="{{ asset('img/users').'/'.$user->image }}" class="img-responsive" width="20px"></td> -->
    	<td>{{ $user->username }}</td>
    	<td>{{ $user->name }}</td>
    	<td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td><a href="{{ URL::route('admin.user.edit', ['user' => $user->username]) }}"><span class="far fa-edit"></span></a></td>
    </tr>
    @endforeach
    </tbody>
</table>
<center>{{ $users->appends(['sort' => request()->sort])->links() }}</center>

@endsection
