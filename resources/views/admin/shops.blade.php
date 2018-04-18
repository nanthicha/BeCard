
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
  <li class="active">Shops</li>
</ol>
{!! $table->render() !!}
@endsection
