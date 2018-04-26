@extends('layouts.app')

@section('content')
<body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    Sorry, the page you are looking for could not be found.                </div>
            </div>
        </div>
    

</body>
@endsection

@section('js')
<script>
setTimeout(function() {
    window.location.href = "/"}, 1500);

</script>
@endsection

@section('css')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 80vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
               
            }
</style>
@endsection