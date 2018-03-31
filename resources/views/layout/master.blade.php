<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    @stack('style')
  </head>
  <body>
    <div class="container">
        @yield('content')
    </div>

    <script src="/js/app.js" charset="utf-8"></script>
    @stack('script')
  </body>
</html>
