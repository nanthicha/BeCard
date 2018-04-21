@extends('layouts.app')


@section('css')
<link href="{{ asset('css/shop.css') }}" rel="stylesheet">

<style>

.card{
    width: 500px;
    height : 650px;
    margin: 20px;
    box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.2), 0 6px 30px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
    padding-top: 5px;

    
}
.promo{
    display: inline-block;
    width: 120px;
    height : 50px;
    margin: 20px;
    text-align: center;
    padding-top: 5px;
    border-radius: 5px;
}
.card-deck{
    display: flex;
    position: relative;
    animation: mymove 2.9s ;
 
}
#btn2{
    /* background-image: linear-gradient(45deg, #00AEFF 50%, #3369E6 100%); */
    /* background-image: linear-gradient(45deg, #f1f1f1 50%, #bebdbd 100%); */
    background-image: -webkit-gradient(linear, left top, left bottom, from(#EEF3FF), to(#FFF));
}
#btn1{
    /* background-image: linear-gradient(45deg, #32bafa 50%, #5383f1 100%); */
    background-image: -webkit-gradient(linear, left top, left bottom, from(#EEF3FF), to(#FFF));
}
#btn{
    background-image: -webkit-gradient(linear, left top, left bottom, from(#EEF3FF), to(#FFF));
}
#shop{
    font-weight: 700;
    font-size:15px;
}


@keyframes mymove {
    from {top: 555px;}
    to {top: 0px;}
}
ul{
    list-style-type: none;
}
th, td {
    border-bottom: 1px solid #ddd;
    text-align:center;
}


</style>

@endsection


@section('content')
<div class="container">
<br>
<br>
<h1 class="text-xxl pos-rel">Start building today with BeCard Shop</h1>
<center><h3 class="color-portage pos-rel">The Best Company in The World.</h3></center>
<hr>
<br><br>
    <div class="card-deck">
    <div class="card"  id="div1">
        <div class="card-body" id="div1">
        <h5 class="card-title"><p class="plan-title color-bunting text-demi">BECARD SHOP</p></h5>
        <div class="spacer24"></div>
        <p class="text-muted plan-description">Because everyone should be able to build great shop.</p>
        <div class="spacer40"></div>
        <div class="plan-price text-muted"> <span class="starting block text-bold">Forever</span> <span class="text-xl color-bunting">Fee</span> 
            <div class="spacer16"></div> 
            <img src="{{asset('img/shopLogo.png')}}" class="pos-rel z-2" width="60" height="60"> 
        </div>
        <div class="plan-list text-center"> 
        <ul class="p-small z-1 pos-rel"> 
            <li class="pos-rel large"> <p class="m-b-none">Must create:</p> 
           <p> <span id="shop">Shop by</span> <img src="{{asset('img/becardLogo.png')}}" class="pos-rel z-2" width="20" height="20"> <span style="font-weight: 700;font-size:20px;">BeCard</span></p>
            
            <li class="pos-rel"></li> <li class="pos-rel white">Manages &amp; building shop</li> <li class="pos-rel">Add &amp; manage branches</li> 
            <li class="pos-rel white">View summary information of shop</li> </ul> 
            <br>
            <a href="#h1" rel="noopener" class="btn-plan-cta btn elevation1 color-bunting text-bold" data-no-turbolink="true" id="btn">Detailed features</a> 
        </div>
       
        <p class="card-text"><small class="text-muted">By BeCard</small></p>
        </div>
    </div>


    <div class="card" style="background-image: linear-gradient(45deg, #00AEFF 50%, #3369E6 100%);" id="div2">
        <div class="card-body">
            <div class="plan-ribbon text-left p-l-small"> <span class="color-white text-sm pos-rel text-demi" >FOR SMALL BUSINESS</span> </div>
            <hr>
            <div class="spacer40"></div>
            <p class="plan-title color-white text-demi" style="font-size:17px;">SLIVER</p>
            <div class="spacer24"></div>
            <p class="color-white plan-description">For Small Business and Startup Business.</p>
            <br>
            <div class="plan-price text-muted color-white pos-rel"> 
                <span class="starting block text-bold">Starting at</span> 
                <span class="amount text-white"> <sup style="font-size:15px;">฿</sup> <span class="text-xl">999</span> <span>/ month</span> </span> 
            </div>
            <br>
            <div class="plan-list text-center" style="color:white;"> 
            <ul class="p-small z-1 pos-rel"> 
                <li class="pos-rel"></li> 
                <li>Limited branch</li>
                <li>Foundation support</li>
                <li>Limited Casher</li>
                <li>Default member card</li>
                <li>Default currency</li>
                <li>View summary information</li>
                <br>
                <br>
                <a href="/shop/create/1" rel="noopener" class="btn-plan-cta btn elevation1 color-bunting text-bold" data-no-turbolink="true"  id="btn1">Start Sliver Package</a> 
                <p class="card-text"><small class="text-muted"  style="color:#f3f3f3;">By BeCard</small></p>
            </div>
        
            
        </div>
    </div>


    <div class="card"  style="background-image: linear-gradient(45deg, #FF4F81 50%, #FE6C5F 100%);" id="div3">
   
        <div class="card-body">
        <div class="plan-ribbon text-left p-l-small"> <i class="glyphicon glyphicon-star color-white"></i> <span class="color-white text-sm pos-rel text-demi">BEST VALUE</span> </div>
            <hr>
            <div class="spacer40"></div>
            <p class="plan-title color-white text-demi" style="font-size:17px;">GOLD</p>
            <div class="spacer24"></div>
            <p class="color-white plan-description">Unlock advanced features.</p>
            <br>
            <div class="plan-price text-muted color-white pos-rel"> 
                <span class="starting block text-bold">Starting at</span> 
                <span class="amount text-white"> <sup style="font-size:15px;">฿</sup> <span class="text-xl">2999</span> <span>/ month</span> </span> 
            </div>
            <br>
            
            <div class="plan-list text-center" style="color:white;"> 
            <ul class="p-small z-1 pos-rel"> 
                <li class="pos-rel"></li> 
                <li>Advanced Support</li>
                <li>Create unlimited branch</li>
                <li>Create own currency</li>
                <li>Design own member card</li>
                <li>Create unlimited casher </li>
                <li>View summary information</li>
                <br>
                <br>
                <a href="/shop/create/2" rel="noopener" class="btn-plan-cta btn elevation1 color-bunting text-bold" data-no-turbolink="true" id="btn2">Start Gold Package</a> 
                <p class="card-text" ><small class="text-muted" style="color:#f3f3f3;">By BeCard</small></p>
            </div>
        

        </div>
    </div>

    </div>
    {{--  Detial Feature --}}
    
    <br><br><br>
    <h1 anchor="features" id="h1">Detailed features</h1>
    <hr>
    <ul style="text-align: center;margin-right:17%;">
        <li><div  class="promo" style="background-image: linear-gradient(45deg, #FF4F81 50%, #FE6C5F 100%);float:right;">
            <center><p style="font-size:20px;text-align: center;width:120px;color:white;padding-top:5%;">GOLD</p></center>
        </div></li>
        <li><div class="promo" style="background-image: linear-gradient(45deg, #00AEFF 50%, #3369E6 100%);float:right;margin-right:10.5%;">
            <center><p style="font-size:20px;text-align: center;width:120px;color:white;padding-top:5%;">SLIVER</p></center>
        </div></li>

        </ul>
    
    <div class="alg-comparisoncontainer m-l-r-auto hidden-xs elevation2" id="compare-plans">
    <br>
    <br>
    <br>
    <hr>
    
    <h2  class="alg-column--info" style="margin-left:10%;">Features</h2>
    <div style="width:80%">
    
        <table class="table" style="margin-left:12%;">
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Currency</td>
            <td>Default</td>
            <td>Own Currency</td>
            </tr>

            <tr>
            <th scope="row">2</th>
            <td>Branch</td>
            <td>5</td>
            <td>Unlimited</td>
            </tr>

            <tr>
            <th scope="row">3</th>
            <td>Support</td>
            <td><span><svg width="16" height="12" viewBox="0 0 16 12" xmlns="http://www.w3.org/2000/svg"><title>enterprise</title><path d="M5.716 11.54c.293 0 .585-.114.805-.338l9.146-9.233c.445-.45.445-1.182 0-1.632-.446-.45-1.17-.45-1.617 0L5.713 8.753l-3.763-3.8c-.445-.45-1.17-.45-1.616 0-.445.45-.445 1.183 0 1.633l4.573 4.616c.224.224.516.337.81.337z" fill="#2DDE98" fill-rule="evenodd"></path></svg></span></td>
            <td><span><svg width="16" height="12" viewBox="0 0 16 12" xmlns="http://www.w3.org/2000/svg"><title>enterprise</title><path d="M5.716 11.54c.293 0 .585-.114.805-.338l9.146-9.233c.445-.45.445-1.182 0-1.632-.446-.45-1.17-.45-1.617 0L5.713 8.753l-3.763-3.8c-.445-.45-1.17-.45-1.616 0-.445.45-.445 1.183 0 1.633l4.573 4.616c.224.224.516.337.81.337z" fill="#2DDE98" fill-rule="evenodd"></path></svg></span></td>
            </tr>

            <tr>
            <th scope="row">4</th>
            <td>Casher</td>
            <td>10</td>
            <td>Unlimited</td>
            </tr>

            <tr>
            <th scope="row" >5</th>
            <td style="width:40%;"> Member Card</td>
            <td>Default</td>
            <td>Own Design</td>
            </tr>
        </tbody>
        </table>
    </div>
    <br>
    </div>
    
    <br>
    <br>

</div>




@endsection


@section('js')
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1500, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
@endsection