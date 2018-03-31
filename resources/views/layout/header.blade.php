<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/header.css">
	<div class="nav">
	  <div class="nav__inner">
	    <div class="nav__logo">
	      <a href="/" class="brand__symbol u__inline-block">
	      	<img src="/img/becardLogo.png" alt="">
	      </a>
	    </div>
	    <div class="nav__links">
	      <a class="nav__link active" href="/in-app-messaging">
	        Overview
	      </a>
	      <a class="nav__link " href="/in-app-messaging/desktop-web">
	        Menu 1
	      </a>
	      <a class="nav__link " href="/in-app-messaging/desktop-web">
	        Menu 2
	      </a>
	      <a class="nav__link " href="/in-app-messaging/desktop-web">
	        Menu 3
	      </a>
	    </div>

	    <div class="nav__auth">
	      <a class="nav__link" href="/signin">Login</a>
		    <a class="nav__link" href="/signup"><button type="submit" class="btn btn__primary">Get Started</button></a>
	    </div>
	  </div>
	</div>
  </head>
</html>
