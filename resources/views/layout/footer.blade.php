<!doctype html>
<style>
    html, body {
        background-color: #fff;
        color: black;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }
    footer{
      color:black;
      font-family: serif;
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
        color: black;
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

    .border-top { border-top: 1px solid #e5e5e5; }
    .border-bottom { border-bottom: 1px solid #e5e5e5; }

    .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);

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
<hr>
<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
      <small class="d-block mb-3 text-muted">&copy; copy rigth</small>
    </div>
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="home">Home</a></li>
        <li><a class="text-muted" href="#">Features</a></li>
        <li><a class="text-muted" href="#">Setting</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Create</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="login">Login</a></li>
        <li><a class="text-muted" href="register">Register</a></li>
        <li><a class="text-muted" href="shop/register">Register Entrepreneur</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Shop</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="shop/show">Shop</a></li>
        <li><a class="text-muted" href="shop/create">Create shop</a></li>
        <li><a class="text-muted" href="shop/create">Setting shop</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Team</a></li>
      </ul>
    </div>
  </div>
</footer>
