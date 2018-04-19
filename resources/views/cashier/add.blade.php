<?php
header('Content-type: application/json');
?>

@extends('layouts.app')

@section('css')
<style type="text/css">
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
input, label {
    vertical-align:middle
}
.qrcode-text {
    padding-right:1.7em;
    margin-right:0
}
.qrcode-text-btn {
    display:inline-block;
    cursor:pointer
}
.qrcode-text-btn > input[type=file] {
    position:absolute;
    overflow:hidden;
    width:1px;
    height:1px;
    opacity:0
}
.hr-text {
  line-height: 1em;
  position: relative;
  outline: 0;
  border: 0;
  color: black;
  text-align: center;
  height: 1.5em;
  opacity: .5;
}
.hr-text:before {
  content: '';
  background: linear-gradient(to right, transparent, #818078, transparent);
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  height: 1px;
}
.hr-text:after {
  content: attr(data-content);
  position: relative;
  display: inline-block;
  color: black;
  padding: 0 .5em;
  line-height: 1.5em;
  color: #818078;
  background-color: #fcfcfa;
}

</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cashier {{ Auth::user()->username }}</div>
                <div class="panel-body">



<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
    </div>
  </div>

  <form role="form" action="" method="post">
    <div class="row setup-content" id="step-1">
      <div class="col-xs-12">
        <div class="col-md-12">
          <h3> Step 1</h3>
          <hr>
          <div class="form-group">
            <label class="control-label">Phone Number of BeCard</label>
            <input  maxlength="100" type="text" class="form-control" placeholder="Telephone"  />
          </div>
          <hr class="hr-text" data-content="OR">
            <div class="form-group">
                <label class="control-label">QR Code Scanner</label>
                <input type="text"  placeholder="Tracking Code" class="qrcode-text form-control" disabled="" id="qrReader">
                <label class=qrcode-text-btn><span class="glyphicon glyphicon-qrcode" style="font-size: 2.5em; top:-80px;left: 125px;"></span><input type=file accept="image/*" capture=environment onchange="openQRCamera(this);" tabindex=-1></label>

            </div>
            <p>
                <hr>
            </p>
            <h3>Member Check</h3>
          <div class="form-group">
            <input  id="nameBeCard" type="text" class="form-control" placeholder="Name of BeCard" />
            <p></p>
          </div>
          <button class="btn btn-success nextBtn btn-lg pull-right" id="btnStep1" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-2">
      <div class="col-xs-12">
        <div class="col-md-12">
          <h3> Step 2</h3>
          <div class="form-group">
            <label class="control-label">Company Name</label>
            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
          </div>
          <div class="form-group">
            <label class="control-label">Company Address</label>
            <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
          </div>
          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
      </div>
    </div>
    <div class="row setup-content" id="step-3">
      <div class="col-xs-12">
        <div class="col-md-12">
          <h3> Step 3</h3>
          <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </form>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://dmla.github.io/jsqrcode/src/qr_packed.js"></script>
<script type="text/javascript">
$(document).ready(function () {
document.getElementById("btnStep1").disabled = true;
$("#nameBeCard").on('change', function checkEmpty(){
    $('#nameBeCard').blur(function()
    {
        if( !$(this).val() ) {
             document.getElementById("btnStep1").disabled = true;
        }else{
            document.getElementById("btnStep1").disabled = false;
        }
    });
});

  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});

// QR COde
function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      if(res instanceof Error) {
        alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
      } else {
        node.parentNode.previousElementSibling.value = res;
      }
    };
    qrcode.decode(reader.result);
  };
  reader.readAsDataURL(node.files[0]);
}


// Send Data and respon
// $.ajax({
//     url: "main.php",
//     type: "POST",
//     dataType: "json",
//     data: {"action": "loadall", "id": 1},
//     success: function(data){
//         console.log(data);
//     },
//     error: function(error){
//          console.log("Error:");
//          console.log(error);
//     }
// });
</script>
@endsection