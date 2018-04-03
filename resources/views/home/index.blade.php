@extends('layout.header')
@extends('layout.master')

@push('style')
<style>
.my-class {
   font-size: 1.6em;
}
</style>
@endpush

@section('content')
	<p></p><br><p></p>
    <div class="jumbotron">
        <div class="lead">Hi {{$title}} and you name is {{ Auth::user()->name }}</div>
    </div>

@endsection
