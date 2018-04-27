<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .bnk {background-image: url("http://127.0.0.1:8000/img/cards/T3CsAELFaS_1524660429.png");
            }


            .starbuck {background-image: url("http://127.0.0.1:8000/img/cards/6_1524574747.png");
            }
            .kfc {background-image: url("http://127.0.0.1:8000/img/cards/8_1524662081.png");
            }


            .rcorners {
              border-radius: 15px 50px 30px;
              background: #73AD21;
              }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            html {
              font-size: 14px;
            }
            @media (min-width: 768px) {
              html {
                font-size: 16px;
              }
            }

            .container {
              max-width: 960px;
            }

            .pricing-header {
              max-width: 700px;
            }

            .card-deck .card {
              min-width: 220px;
            }

            .border-top { border-top: 1px solid #e5e5e5; }
            .border-bottom { border-bottom: 1px solid #e5e5e5; }

            .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

            .container {
              max-width: 960px;
            }

            /*
             * Custom translucent site header
             */

            .site-header {
              background-color: rgba(0, 0, 0, .85);
              -webkit-backdrop-filter: saturate(180%) blur(20px);
              backdrop-filter: saturate(180%) blur(20px);
            }
            .site-header a {
              color: #999;
              transition: ease-in-out color .15s;
            }
            .site-header a:hover {
              color: #fff;
              text-decoration: none;
            }

            /*
             * Dummy devices (replace them with your own or something else entirely!)
             */

            .product-device {
              position: absolute;
              right: 10%;
              bottom: -30%;
              width: 300px;
              height: 540px;
              background-color: #333;
              border-radius: 21px;
              background-image: url("http://127.0.0.1:8000/img/cards/6_1524574747.png");
              -webkit-transform: rotate(30deg);
              transform: rotate(30deg);
            }

            .product-device::before {
              position: absolute;
              top: 10%;
              right: 10px;
              bottom: 10%;
              left: 10px;
              content: "";
              background-color: rgba(255, 255, 255, .1);
              border-radius: 5px;
            }

            .product-device-2 {
              top: -25%;
              right: auto;
              bottom: 0;
              left: 5%;
              background-image: url("http://127.0.0.1:8000/img/cards/T3CsAELFaS_1524660429.png");
              background-color: #e5e5e5;

                       }


            /*
             * Extra utilities
             */

            .border-top { border-top: 1px solid #e5e5e5; }
            .border-bottom { border-bottom: 1px solid #e5e5e5; }

            .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
            /*  background-image: url("http://127.0.0.1:8000/img/cards/T3CsAELFaS_1524660429.png");
*/
             }

            .flex-equal > * {
              -ms-flex: 1;
              -webkit-box-flex: 1;
              flex: 1;
            }
            @media (min-width: 768px) {
              .flex-md-equal > * {
                -ms-flex: 1;
                -webkit-box-flex: 1;
                flex: 1;
              }
            }

            .overflow-hidden {
              overflow: hidden;
            }
        </style>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
          <div class="nav__logo">
          <a href="/home" class="brand__symbol u__inline-block">
            <img src="/img/becardLogo.png" width='40px' height='40px'>
          </a>
        </div>

          <nav class="my-2 my-md-0 mr-md-3">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="#">Features</a>
                        <a href="#" href="#">Pricing</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
          </nav>
        </div>
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" style="background-image: url('http://www.softwareoffshore.com.au/wp-content/themes/Proma/images/bgs/04.jpg');">
          <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Punny headline</h1>
            <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p>
            <a class="btn btn-outline-secondary" href="#">Coming soon</a>
          </div>
          <div class="product-device d-none d-md-block"></div>
          <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
          <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white rcorners overflow-hidden ">
            <div class="my-3 py-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>

            </div>
            <div class="bg-light box-shadow mx-auto bnk" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
          <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center rcorners overflow-hidden">
            <div class="my-3 p-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-light box-shadow mx-auto starbuck" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
          <div class="bg-danger mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center rcorners overflow-hidden">
            <div class="my-3 p-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-light box-shadow mx-auto " style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
          <div class="bg-primary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white rcorners overflow-hidden">
            <div class="my-3 py-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-light box-shadow mx-auto kfc" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
          <div class="bg-warning mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center rcorners overflow-hidden">
            <div class="my-3 p-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-white box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
          <div class="bg-secondary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center rcorners overflow-hidden">
            <div class="my-3 py-3">
              <h2 class="display-5">Another headline</h2>
              <p class="lead">And an even wittier subheading.</p>
            </div>
            <div class="bg-white box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
          </div>
        </div>

        <div class="flex-center position-ref full-height">
            <div class="content" >
                <div class="title m-b-md">
                    Laravel
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        <div class="flex-center position-ref full-height">
          <div class="container">
            <div class="card-deck mb-3 text-center font-weight-bold">
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-bold">1111</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">111 <small class="text-muted">111</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>111</li>
                    <li>1111</li>
                    <li>1111</li>
                    <li>1111</li>
                  </ul>
                  <button type="button" class="btn btn-lg btn-block btn-primary font-weight-bold">1111</button>
                </div>
              </div>
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-bold">2222</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">222 <small class="text-muted">222</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>2222</li>
                    <li>22222</li>
                    <li>222</li>
                    <li>2222</li>
                  </ul>
                  <button type="button" class="btn btn-lg btn-block btn-primary font-weight-bold">Get started</button>
                </div>
              </div>
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-bold">3333</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">3333 <small class="text-muted">333</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>333</li>
                    <li>3333</li>
                    <li>3333</li>
                    <li>3333</li>
                  </ul>
                  <button type="button" class="btn btn-lg btn-block btn-primary font-weight-bold">3333</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>


        <footer class="container py-5">
          <div class="row">
            <div class="col-12 col-md">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
              <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
            </div>
            <div class="col-6 col-md">
              <h5>Features</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Cool stuff</a></li>
                <li><a class="text-muted" href="#">Random feature</a></li>
                <li><a class="text-muted" href="#">Team feature</a></li>
                <li><a class="text-muted" href="#">Stuff for developers</a></li>
                <li><a class="text-muted" href="#">Another one</a></li>
                <li><a class="text-muted" href="#">Last time</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>Resources</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Resource</a></li>
                <li><a class="text-muted" href="#">Resource name</a></li>
                <li><a class="text-muted" href="#">Another resource</a></li>
                <li><a class="text-muted" href="#">Final resource</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>Resources</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Business</a></li>
                <li><a class="text-muted" href="#">Education</a></li>
                <li><a class="text-muted" href="#">Government</a></li>
                <li><a class="text-muted" href="#">Gaming</a></li>
              </ul>
            </div>
            <div class="col-6 col-md">
              <h5>About</h5>
              <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Team</a></li>
                <li><a class="text-muted" href="#">Locations</a></li>
                <li><a class="text-muted" href="#">Privacy</a></li>
                <li><a class="text-muted" href="#">Terms</a></li>
              </ul>
            </div>
          </div>
        </footer>

    </body>
</html>
