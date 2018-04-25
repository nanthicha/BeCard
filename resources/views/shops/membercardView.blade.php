
@extends('shops.layout')
@section('content')
<div class="container" >

  <!-- Nav tabs -->
  <ul class="nav nav-tabs"  style="width:100%;z-index: 0;position:relative;">
    <li class="nav-item">
      <a class="nav-link" href="/shop/show">Shop</a>
    </li>
    <li class="nav-item">
      <a class="nav-link "   href="/shop/branch">Branchs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="/shop/cashier/">Cashiers</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="/shop/membercard/">Member Card</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link"   href="#">Setting</a>
    </li>
  </ul>


  <!-- Tab panes -->
  <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="/shop/membercard">Member Cards</a></li>
				    <li class="breadcrumb-item active" aria-current="page">{{$card->name}}</li>
				  </ol>
				</nav>
				<hr>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Username</th>
								<th>Point</th>
								<th>Registered at</th>
							</tr>
						</thead>
						@foreach($memberOfCard as $index => $member)
							<tr>
								<td>{{$index+1}}</td>
								<td>{{$member->username}}</td>
								<td>{{$member->point}}</td>
								<td>{{ \Carbon\Carbon::parse($member->created_at)->format('d M Y H:i:s')}}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
<style type="text/css">
#sampleColor{
	height: 250px;
	width: 400px;
	border-radius: 10px;
}
.sampleImge img{
	border-radius: 10px;
	height: 250px;
}
.parent {
  position: relative;
  top: 0;
  left: 0;
}
.image1 {
  position: relative;
  top: 0;
  left: 0;
}
.image2 {
  position: absolute;
  top: 275px;
  left: 175px;
}
.image3 {
  position: absolute;
  top: 30px;
  left: 250px;
}

</style>

@endsection
@section('js')
@endsection