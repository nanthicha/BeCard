@extends('layouts.app')

@section('js')
<script>
$(".nav .nav-link").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).addClass("active");
});
</script>
@yield('js_agian')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/headShop.css') }}">
@endsection