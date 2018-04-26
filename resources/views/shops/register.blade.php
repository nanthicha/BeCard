<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="ItfC94DvBVXTzvO2szIZ2aFJUb8feKULNzwxIPIq">
    <!-- Styles -->
    <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/header.css">


<style type="text/css">
     #mapCanvas {
        width: 450px;
        height: 300px;
      }
      #searchMap{
          width:450px;
      }
      .time , #timepicker1 , #timepicker2{
    display: inline-block;
}
</style>

</head>
<body>
    <div class="nav">
      <div class="nav__inner">
        <div class="nav__logo">
          <a href="/home" class="brand__symbol u__inline-block">
            <img src="/img/becardLogo.png" alt="">
          </a>
        </div>
        <div class="nav__links">


        </div>
        <div class="nav__auth">
                            <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav__link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        cavikii <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="subMenuProfile">
                           <center>
                            <img src="http://127.0.0.1:8000/img/users/default.png" class="img-responsive img-circle"><br>
                            <b>cavikii</b>
                            <a href="http://127.0.0.1:8000/reward"><p style="color:#5395CC;">
                            <span class="fab fa-gg-circle"></span> BePoint : <b >0</b></p></a>
                        </center>
                        </li>

                                                <hr>
                        <li><a href="/admin/dashboard">Admin Dashboard</a></li>
                        <li><a href="http://127.0.0.1:8000/shop">Shop</a></li>

                        <hr>
                        <li><a href="/home">Dashboard</a></li>
                        <li><a href="http://127.0.0.1:8000/reward">Reward</a></li>
                        <hr>
                        <li><a href="http://127.0.0.1:8000/affiliate">Affiliate</a></li>
                        <li><a href="/setting">Profile Setting</a></li>
                        <li>
                            <a href="http://127.0.0.1:8000/logout"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" style="display: none;">
                                <input type="hidden" name="_token" value="ItfC94DvBVXTzvO2szIZ2aFJUb8feKULNzwxIPIq">
                            </form>
                        </li>

                    </ul>
                </li>
                    </div>
      </div>
    </div>
    <div id="app">
        <div class="spaceHeader"></div>
        <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create BeCard Entrepreneur</div>
                    <div class="panel-body">

<!--  -->
                        <form class="form-horizontal" method="POST" action="http://127.0.0.1:8000/shop/create" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-lg-8">
                                <!-- <form class="form-horizontal" method="POST" action="/shop" > -->
                                    <input type="hidden" name="_token" value="ItfC94DvBVXTzvO2szIZ2aFJUb8feKULNzwxIPIq">
                                    <table class="table table-hover">
                                    <tbody>
                                    <tr><center><h3>Create new Entrepreneur</h3></center></tr>
                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Entrepreneur Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Enter name"required>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Telephone</label>
                                        <div class="col-md-6">
                                            <input id="telephone" type="phone" class="form-control" name="talephane" placeholder="Enter telephone"required>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                          <label class="col-md-4 control-label">E-Mail Address</label>
                                          <div class="col-md-6">
                                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter E-Mail Address"required>

                                              @if ($errors->has('email'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('email') }}</strong>
                                                  </span>
                                              @endif
                                          </div>
                                      </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Business Type</label>
                                        <div class="col-md-6" >
                                        <select name="type" class="form-control" required>
                                        <option value="beauty">Beauty</option>
                                        <option value="clothes">Clothes</option>
                                        <option value="drink">Drink</option>
                                        <option value="food">Food</option>
                                        <option value="jewellery">Jewellery</option>
                                        <option value="service">Service</option>
                                        </select>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Business Name</label>
                                        <div class="col-md-6">
                                            <input id="businessname" type="text" class="form-control" name="businessname" placeholder="Enter Business name"required>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button id="myInput" type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    </td></tr>

                                    </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
<script>

    $('#timepicker1').timepicker({
        uiLibrary: 'bootstrap'
    });
    $('#timepicker2').timepicker({
        uiLibrary: 'bootstrap'
    });

    // $(document).keypress(function(e) {
    // if(e.keyCode === 32 && e.target.nodeName=='BODY') {
    //     event.preventDefault(); //prevent default if it is body
    // }
// });

</script>



</body>
</html>
