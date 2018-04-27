@extends('layouts.app')


@section('css')
<style>
.register-account{

        background-color: transparent;

        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center top;
        background-clip: border-box;
        background-origin: padding-box;
        background-size: auto auto;
        background-size: cover;
        padding: 200px 0 150px;
        padding-top: 200px;
        padding-right: 0px;
        padding-bottom: 150px;
        padding-left: 0px;
        width: auto;

}

/*Login Form CSS*/
.login-form input{
  width: 100%;
  border: 1px solid #dddddd;
  padding: 0.7em;
  margin: 0.6em 0;
  border-radius: 0;
  margin-bottom: 15px;
}
.login-form{
  margin-bottom: 30px;
}
.signform {
  background-color: #FFF;
  padding-bottom: 40px;
  padding-top: 35px;
  margin: 0 auto;
  margin-top: auto;
}
.bts {
  padding: 2em;
  margin: 0.6em 0;
  margin-top:
}
.bts-a:hover{
  color: #79b42b;
  text-decoration: none;
  background: white;
}
.bts span {
  text-align: center;
  font-size: .9em;
  font-family: 'Arimo', sans-serif;
  font-weight: 700;
  font-style: normal;
}
.social{
  transition: background 200ms ease-in-out 0s;
  -webkit-transition: background 200ms ease-in-out 0s;
  -moz-transition: background 200ms ease-in-out 0s;
  -o-transition: background 200ms ease-in-out 0s;
  -ms-transition: background 200ms ease-in-out 0s;

  margin-top: 12px;
  -webkit-border-top-left-radius:1px;
  -moz-border-radius-topleft:1px;
  border-top-left-radius:1px;
  -webkit-border-top-right-radius:1px;
  -moz-border-radius-topright:1px;
  border-top-right-radius:1px;
  -webkit-border-bottom-right-radius:1px;
  -moz-border-radius-bottomright:1px;
  border-bottom-right-radius:1px;
  -webkit-border-bottom-left-radius:1px;
  -moz-border-radius-bottomleft:1px;
  border-bottom-left-radius:1px;
  text-indent:0;
  display:block;
  color:#ffffff;
  height:50px;
  line-height:50px;
  width: 100%;
  text-decoration:none;
  text-align:center;
}

.fblogin {
  background-color:#3b5898;
}
.fblogin:hover {
  background-color:#5177c2;
}
.fblogin:active {
  position:relative;
  top:1px;
}
.gplogin {
  background-color:#dd4c39;
}
.gplogin:hover {
  background-color:#f06e60;
}
.gplogin:active {
  position:relative;
  top:1px;
}
.twlogin {
  background-color:#00abee;
}
.twlogin:hover {
  background-color:#4cbde6;
}
.twlogin:active {
  position:relative;
  top:1px;
}
.login-form input:focus, .login-form input:active {
  border-bottom: 2px solid #79B42B;
  outline: none;
}
.subbt:hover {
  background-color: #79b42b;
}
.subbt {

  text-shadow: 0 1px 0 rgba(122, 122, 122, 0.85);
  transition: background 500ms ease-in-out 0s;
  -webkit-transition: background 500ms ease-in-out 0s;
  -moz-transition: background 500ms ease-in-out 0s;
  -o-transition: background 500ms ease-in-out 0s;
  -ms-transition: background 500ms ease-in-out 0s;
  background-color: #79b42b;
  border: none;
  color: #FFF;
  padding: 10px 15px 10px 15px;
  margin-top: 10px;
  cursor: pointer;
  font-size: .9em;
  border-radius: 3px;
  width: 218px;
  font-family: 'Arimo', sans-serif;
  font-weight: 700;
  font-style: normal;

}
.right a {
  position: relative;
  color: #b6b6b6;
  text-decoration: none;
  font-family: 'Arimo', sans-serif;
  font-weight: 400;
  font-style: normal;
  font-size: .9em;
  float: right;
  margin-top:5px;
}
.headit {
  position: relative;
  top: -10px;
}
.headit h4{
  color: #474646;
}
.bts a:hover{
  text-decoration: none;
  color: white;
}
.bts a:active{
  color: white;
  text-decoration: none;
}
.bts a:focus{
  text-decoration: none;
  color: white;
}
.headit a {
text-decoration: none;
}

.fa.fa-check-square {
padding-right: 19px;
}
form#login-form:before {
  content: 'or';
  color: #79b42b;
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  margin: auto;
  height: 0.5em;
  width: 0.5em;
  left: 1.5em;

  z-index: 900;
}
form#login-form:after {
  content: '';
  position: absolute;
  background: rgba(128, 128, 128, 0.3);
  top: 0;
  right: 0;
  left: 0;
  bottom: 15px;
  margin: auto;
  height: 3.25em;
  width: 0.1em;
  left: 2.15em;

  -moz-box-shadow: 0 8.8em 0 0 rgba(128, 128, 128, 0.3);
  -webkit-box-shadow: 0 8.8em 0 0 rgba(128, 128, 128, 0.3);
  box-shadow: 0 8.8em 0 0 rgba(128, 128, 128, 0.3);
}
/*Media Query */
@media screen  and (min-width: 1400px) {
.signform { width: 680px; left: 25%; }
}


@media screen  and (max-width: 1400px) and (min-width: 1230px) {
.signform { width: 50%; left: 25%; }
}

@media screen  and (max-width: 1230px) and (min-width: 1000px) {
.signform { width: 60%; left: 15%; }
}

@media screen  and (max-width: 1000px) and (min-width: 900px) {
.signform { width: 70%; left: 10%; }
}

@media screen  and (max-width: 900px) and (min-width: 750px) {
.signform { width: 80%; left: 8%; }
}

@media screen  and (max-width: 750px) and (min-width: 640px) {
.signform { width: 90%;
  left: 1%;
  }
}

@media screen  and (min-width: 640px) {
  .left {
  width: 47%;
  display: inline-table;
  margin-left: 20px;
  float: right;
  }
  .right {
  width: 40%;
  display: inline-table;
  margin-left: 50px;
  }
}

@media screen  and (max-width: 640px) {
  .left {
    width: 100%;
    display: inline-table;
    margin-bottom: 25px;
  }
  .right {
    width: 85%;
    display: inline-table;
    margin-left: 20px;
  }
  .signform {
    width: 50%;
    min-width:255px;
  }
  form#login-form:before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;

}
  form#login-form:after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    height:0em;
    width: 0em;
    left: 0em;
    top: 0em;

  }
}
@media screen  and (max-width: 1500px) and (min-width: 650px) {
form#login-form::before {
    content: 'or';
    color: #79b42b;
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
    height: 0.5em;
    width: 0.5em;
    left: 1.5em;
    top: 4.2em;
    z-index: 900;
  }
  form#login-form::after {
    content: '';
    position: absolute;
    background: rgba(128, 128, 128, 0.3);
    top: 0;
    right: 0;
    left: 0;
    bottom: 15px;
    margin: auto;
    height: 3.25em;
    width: 0.1em;
    left: 2.15em;
    top: -2.8em;
    -moz-box-shadow: 0 8.8em 0 0 rgba(128, 128, 128, 0.3);
    -webkit-box-shadow: 0 8.8em 0 0 rgba(128, 128, 128, 0.3);
    box-shadow: 0 8.8em 0 0 rgba(128, 128, 128, 0.3);
}
}
@media screen  and (max-width: 640px) and (min-width: 460px) {
.signform {
  left: 25%;
   }
}
@media screen  and (max-width: 460px) and (min-width: 400px) {
  .signform {
   left: 20%;
  }
}
@media screen  and (max-width: 400px) and (min-width: 320px) {
  .signform {
   left: 10%;
  }
}
@media screen  and (max-width: 320px) {
  .signform {
   left: 1%;
    }
}
.bts i{
    margin: 15px 15px 15px 20px;
    float: left;
    width: 5%;
    font-size: 20px;
    margin-left: 20px;
}

</style>
@endsection

@section('content')
<section class="register-account" style="margin-top:-100px;">
      <div class="signform">
        <div class="left"><a href="#" style="float:right;margin-right:35px;font-size: 0.9em;" class="bts-a">Don't have an account? Sign up!</a>
          <div class="bts">
            <a href="#" class="fblogin social"><i class="fa fa-facebook"></i><span>Sign in with Facebook</span></a>
             <a href="#" class="twlogin social"><i class="fa fa-twitter"></i><span>Sign in with Twitter</span></a>
            <a href="#" class="gplogin social"><i class="fa fa-google-plus"></i><span>Sign in with Google</span></a>
          </div>
        </div>
        <div class="right">
            <div class="headit">
              <h4>Login To Your Account</h4>
            </div>
            <div class="form">
              <form class="login-form" id="login-form"  method="POST" action="{{ route('login') }}" >
                {{ csrf_field() }}
                <input id="identity" type="identity" class="form-control" name="identity" value="{{ old('identity') }}" required autofocus>

                @if ($errors->has('identity'))
                    <span class="help-block">
                        <strong>{{ $errors->first('identity') }}</strong>
                    </span>
                @endif
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                  <input class="subbt" type="submit" value="Sign In" style="border:none;"/>
              </form>

              <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}><span style="color:#b6b6b6;font-size: 0.9em;"> Remember Me</span><a href="{{ route('password.request') }}">Forgot your password?</a>

            </div>
        </div>
      </div>
</section>
@endsection


<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email or Username</label>

                            <div class="col-md-6">
                                <input id="identity" type="identity" class="form-control" name="identity" value="{{ old('identity') }}" required autofocus>

                                @if ($errors->has('identity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
