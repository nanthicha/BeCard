
@extends('layouts.admin')

@section('contentAdmin')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ol class="breadcrumb">
<!--   <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li> -->
  <li class="active">Rewards</li>
</ol>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif
<center><a href="{{ route('admin.rewards.new') }}"><button type="button" class="btn btn-success">Create New Reward</button></a></center>
<hr>
<div class="row">
    @foreach ($users as $reward)
      <div class="col-sm-4 col-md-4 col-lg-4 mt-4">
        <div class="card">
            <img class="card-img-top" src="{{ asset('img/rewards').'/'.$reward->image }}">
            <div class="card-block">
                <p class="float-right">Use <span class="fab fa-gg-circle"></span> {{ $reward->bePoint }}</p>
                <h4 class="card-title mt-3">{{ $reward->name }}</h4>
                <div class="card-text">
                    @if ($reward->status == 1)
                    <p>Status : <span class="label label-success">On</span></p>
                    @else
                    <p>Status : <span class="label label-danger">Off</span></p>
                    @endif
                    <p>Amount : <span class="label label-info">{{ $reward->amount }}</span></p>
                    <p>Code : <span class="label label-info">{{ $reward->voucherFormat }}</span></p>
                    <p>Reception : <span class="label label-info">{{ $reward->reception }}</span></p>
                    <p>Created at : <span class="label label-info">{{ \Carbon\Carbon::parse($reward->created_at)->format('d M Y') }}</span></p>
                </div>
            </div>
            <div class="card-footer">
                <small>Until {{ \Carbon\Carbon::parse($reward->updated_at)->format('d M Y') }}</small>
                <a href="{{route('admin.rewards.edit',['code'=>$reward->voucherFormat])}}"><button class="btn btn-primary btn-sm float-right">Edit</button></a>
            </div>
        </div>
      </div>
    @endforeach
</div>




<center>{{ $users->links() }}</center>

@endsection
