<?

$getUser = DB::table('users')->where('name', $name)->first();
$getUsername = $getUser->username;
$getEmail = $getUser->email;
$private = $getUser->private_key;
$link = asset('register')."/".$private;
$qr = "http://api.qrserver.com/v1/create-qr-code/?color=000000&amp;bgcolor=F5F5F5&amp;data=".$link;
$invite = DB::table('affiliates')->where('username',$getUsername)->get();
$count = $invite->count();
$bePoint = DB::table('users')->where('username',$getUsername)->first()->bePoint;
$percent = $count*20;

?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Affiliate</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Once you’ve been approved for the BeCard Affiliate Program, you’ll be given a unique affiliate link or QR Code that you can share on your friends or your family for they to register to BeCard. And you will earn 50 BePoint (Limit to 5 invitie, 250 BePoint) , and your invitie will earn 100 BePoint on started.</p>
                    <div class="row" style="margin: 20px;">
                    	<div class="col-lg-4 well">
                    		<img src="{{ $qr }}" alt="qr code" width="100%" class="img-responsive" />
                    		<p></p>
                    		<p>Invite Link : </p>
						    <div class="input-group">
						      <input type="text" class="form-control" value="{{ $link }}">
						      <span class="input-group-btn">
						        <button class="btn btn-default" type="button" onclick="copyToClipboard('#p2')" ><span class="fas fa-copy"></span></button>
						      </span>
						    </div>
                    	</div>
                    	<div class="col-lg-8 ">
                    		<h4>Your Affiliate</h4>
<div class="row">
	<div class="col-lg-9">
		<div class="progress">
		  <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
		  aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$percent}}%">
		    {{$count}} of 5 Invitie
		  </div>
		</div>
	</div>
	<div class="col-lg-3">
		<p style="color:#5395CC;text-align: center;font-size: 1.2em;"><span class="fab fa-gg-circle"></span> + 250 BePoint</p>
	</div>
</div>
<p></p>
@if ($count == 0)
<center><small>You have not invited anyone yet.</small></center>
@else
<table class="table table-hover">
	<thead>
		<tr>
			<th style="text-align: center;">No</th>
			<th>Invited</th>
			<th>Registed at</th>
			<th>BePoint</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($invite as $indexKey => $in)
		<tr>
			<td style="text-align: center;">{{$indexKey+1}}</td>
			<td>{{ $in->assigned_to }}</td>
			<td>{{ \Carbon\Carbon::parse($in->added_on)->format('F j, Y, g:i a') }}</td>
			<td style="color:#5395CC;text-align: center;"><span class="fab fa-gg-circle"></span> + 50 BePoint</td>
		</tr>
		@endforeach

	</tbody>
</table>
@endif
                    	</div>
                    </div>
                    <small id="p2" style="display: none;">{{ $link }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}

</script>
@endsection