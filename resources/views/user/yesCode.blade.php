
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center>
                    	<p class="fas fa-thumbs-up" style="font-size: 10em;color: #52A8ED;"></p>
                    	<p style="font-size: 1.5em;color: #52A8ED;">Successfully.</p>
                    	<p><a href="{{route('home')}}">Back to Home</a></p>
                	</center>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
