
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

New

@endsection
