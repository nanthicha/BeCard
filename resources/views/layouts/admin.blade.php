<?php

if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return 'active';
    }
}

?>
@extends('layouts.app')

@section('content')

<div class="adminContain">
    <div class="row">
		<div class="col-md-2">
		    <div class= "sidebar">
		        <div class="list-group">
				  <a href="{{ URL::route('admin.dashboard') }}" class="list-group-item {!! classActivePath('admin.dashboard') !!}" >Admin Dashboard</a>
				  <a href="{{ URL::route('admin.users') }}" class="list-group-item {!! classActivePath('admin.users') !!}" >Users</a>
				  <a href="{{ URL::route('admin.rewards') }}" class="list-group-item {!! classActivePath('admin.rewards') !!}">Rewards</a>
				  <a href="{{ URL::route('admin.affiliates') }}" class="list-group-item {!! classActivePath('admin.affiliates') !!}">Affiliates</a>
				  <a href="{{ URL::route('admin.bepoints') }}" class="list-group-item {!! classActivePath('admin.bepoints') !!}">BePoint Logs</a>
				  <a href="{{ URL::route('admin.userslogs') }}" class="list-group-item {!! classActivePath('admin.userslogs') !!}">Users Logs</a>
				</div>
	    	</div>
		</div>
		<div class="col-md-10 panel panel-default adminBG">
			<div class="panel-heading"><b>Admin Dashboard</b></div>
                <div class="panel-body">
					@yield('contentAdmin')
				</div>
			</div>
		</div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/becard.js') }}"></script>
@endsection