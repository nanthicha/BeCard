
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard > Users</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'id']) }}">ID <span class="fas fa-caret-down"></span></a></th>
                            <th>Image</th>
                            <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'username']) }}">UserName <span class="fas fa-caret-down"></span></a></th>
                            <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'name']) }}">Name <span class="fas fa-caret-down"></span></a></th>
                            <th><a href="{{ Request::fullUrlWithQuery(['sort' => 'email']) }}">E-mail <span class="fas fa-caret-down"></span></a></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)

                        <tr>
                        	<td>{{ $user->id }}</td>
                            <td><img src="{{ asset('img/users').'/'.$user->image }}" class="img-responsive" width="20px"></td>
                        	<td>{{ $user->username }}</td>
                        	<td>{{ $user->name }}</td>
                        	<td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <center>{{ $users->appends(['sort' => request()->sort])->links() }}</center>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
