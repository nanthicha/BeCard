@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                    
                <div class="panel-body">
                    <br>
                    <center><h2>Reset Password for New Cashier</h2></center>
                    <div style="width:80%;margin:0 auto;">
                    
                    <hr>
                    <br>
                    </div>
                    
                    <form class="form-horizontal" method="POST" action="/cashier/resetPassword">
                        {{ csrf_field() }}
                       
                    
                       
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label" >Username</label>

                            <div class="col-md-6">
                            
                                <input  class="form-control" name="username" value="{{$username}}" disabled>

                            </div>
                        </div>
                       

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top:20px;">
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

                        <input type="hidden" name="usr" value="{{$username}}">

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" style="margin-top:20px;">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="margin-top:15px;">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                                
                            </div>
                            <br>
                            <br>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection