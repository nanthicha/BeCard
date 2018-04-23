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
      <a class="nav-link active"   href="/shop/cashier/">Cashiers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"   href="#">Member Card</a>
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
                <center><h1>Show Cashiers</h1></center>
                <hr>
                <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary">Add Cashier</button>
                <br><br>
                     <div class="row">
                        <div class="col-lg-6">
                            <div class="card" style="padding:15px;">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card" style="padding:15px;">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<br>
      <center><h3 class="modal-title" id="lineModalLabel">Add Cashier</h3></center>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
      <form method="POST" action="/shop/cashier" >
          {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Cashier username</label>
                <input type="input" class="form-control" name="username" placeholder="Enter username" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Cashier name</label>
                <input type="input" class="form-control" name="name" placeholder="Enter name" required>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Cashier email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Cashier phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter phone" required>
              </div>
              <button type="submit" class="btn btn-success">Submit</button>
      </form>
              

		</div>

		</div>
	</div>
  </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          event.stopPropagation();
          return false;
        }
      });
    });

</script>
@endsection

@section('css')
<style type="text/css">
.modal-dialog {
  min-height: calc(100vh - 60px);
  display: flex;
  flex-direction: column;
  justify-content: center;
  overflow: auto;
  @media(max-width: 768px) {
    min-height: calc(100vh - 20px);
  }
}
.nav-tabs .nav-item.show .nav-link,.nav-tabs .nav-link.active{
    color:#495057;
    background-color:#fff;
    border-color:#dee2e6 #dee2e6 #fff
}

</style>

@endsection