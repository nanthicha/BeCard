@extends('layout.master')

@push('style')
<style>
.my-class {
   font-size: 1.6em;
}
</style>
@endpush

@section('content')
	<p></p>
    <div class="jumbotron">
        <div class="lead">Hello Blade Layout</div>
    </div>
@endsection
