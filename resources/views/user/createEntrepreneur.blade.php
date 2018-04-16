@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Entrepreneur</div>

                    <div class="panel-body">

                        <div class="row">
	                        <div class="col-lg-4">
                            <center><img src="https://content.icarcdn.com/styles/main_medium/s3/field/car-model/search/2017/ferrari_812_superfast2.jpg?itok=p3YW4yPu" alt="" width="300px" class="img-responsive"></center>
                            </div>
                        
       
                            <div class="col-lg-8">
                                <form class="form-horizontal" method="POST" action="/user/entrepreneur/save">
                                    {{ csrf_field() }}
                                    <table class="table table-hover">
						            <tbody>

                                    <tr><td>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Store Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    </td></tr>
                                    
                                    <tr><td>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Store Description</label>
                                        <div class="col-md-6">
                                            <input id="detail" type="text" class="form-control" name="detail" required>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Business Type</label>
                                        <div class="col-md-6" >
                                        <select name="type" class="form-control" required>
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                        </select>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <tr><td>
                                    <div class="form-group">
                                        <label  class="col-md-4 control-label">Business Hours</label>
                                        <div class="col-md-6">
                                            <div id="time">
                                                <input id="timepicker1" width="40%"  name="timeOpen" required> -
                                                <input id="timepicker2" width="40%"  name="timeClose" required >
                                            </div>
                                        </div>
                                    </div>
                                    </td></tr>

                                    <!-- google map -->                                    

                                    <tr><td>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script>
    $('#timepicker1').timepicker({
        uiLibrary: 'bootstrap'
    });
    $('#timepicker2').timepicker({
        uiLibrary: 'bootstrap'
    });

</script>
@endsection

@section('css')
.time , #timepicker1 , #timepicker2{
    display: inline-block;
}

@endsection