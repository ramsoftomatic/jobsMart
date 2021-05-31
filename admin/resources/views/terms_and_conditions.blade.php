@extends('layouts.form-app')

@section('title')
JobsMartIndia| Register Company
@endsection

@section('content-header')
<style>
 
 .head_p
 {
   font-size:16px;
   font-family:Cambria;
 }
</style>
<section class="content-header">
  <h1>
   Payment Details
  </h1>
</section>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="content">
@if($success=='success')
<div class="msg alert alert-success">
   <h4>{{$msg}}</h4>
</div> 
@endif

@if($success=='failure')
<div class="msg alert alert-danger">
   <h4>{{$msg}}</h4>
</div> 
@endif
@if($company_detail=="")
<ul class="nav nav-pills nav-justified">
<li class="active"><a href="#">Add Company</a></li>
    <li><a href="#">Company contact Detail</a></li>
    <li><a href="#">Payment Detail</a></li>
    <li><a href="#">Terms & Conditions</a></li>
    <li><a href="#">User Detail</a></li>
    <li><a href="#">Company Vecancy</a></li>
  </ul>
  @else
  <ul class="nav nav-pills nav-justified">
    <li class="active"><a href="#">Add Company</a></li>
    <li><a href="company_contact-{{$company_id}}">Company contact Detail</a></li>
    <li><a href="company_payment-{{$company_id}}">Payment Detail</a></li>
    <li><a href="terms_and_conditions-{{$id}}">Terms & Conditions</a></li>
    <li><a href="company_user_detail-{{$company_id}}">User Detail</a></li>
    <li><a href="company_vecancy_detail-{{$company_id}}">Company Vecancy</a></li>
  </ul>
  @endif
  @foreach($company_detail as $row)
 <div class="row body_row">
    <!-- contact form -->
    <div class="col-md-12 myformdiv">
      <form name="paymentform" id="paymentform" action="save_payment_detail" enctype="multipart/form-data" class="contact-form" method="post">
        {{csrf_field()}}
        <div class="row">
             
            
            </div>
     
                <div class="row">
                  <div class="col-xs-6">
                    <p>
                      <h4>   Payment Details</h4>
                    </p>
                  </div>
                  <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                  
                    <label>Company ID</label>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <input type="text"  name="company_id" class="company_id form-control" value="{{$id}}" readonly>  
                  </div>
           
                </div>
                <hr>
                 <br>            
                 <div class="row">
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <P><h3><b>JOBS MART INDIA</b></h3></P>
                    <P class="head_p">Head Office</P>
                    <P class="head_p">L-1/106, Rose Land Rhythm, </P>
                    <P class="head_p">Pimple Saudagar,  </P>
                    <P class="head_p">Pune, Maharashtra </P>
                    <P class="head_p"><a href="www.jobsmartindia.com" target="_blank">www.jobsmartindia.com</a></P>
                 </div>
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col col-md-offset-6 col-lg-offset-6 form-group">
                        <img src="../images/logo.png" class="img-responsive">
                        <div class="row">
                          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">Date </div>
                          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" name="date">
                          </div>
                      </div>
                        
                </div>     
                 </div><br>
                 <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    To,
                    </div>
                 </div>
                 <div class="row">
                  <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                      <label class="head_p">Address </label>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                      <textarea class="form-control" name="address"></textarea>
                  </div>
                 </div>
              <div class="col-md-3 col-sm-3 col-xs-12 col col-md-offset-9 col-lg-offset-9 form-group">
                <button type="submit" name="company_save" id="btnsave3"
                  class="btn btn-primary form-control col-md-12 ">Save &
                  Next</button>
              </div>     
            </form>
          </div>

    </div>
  </div>
  @endforeach
  <style type="text/css">
    .error {
      color: #ca7878;
    }
    .phone_email_input {
      margin-bottom: 2px;
    }
  </style>
</section>
@endsection
@section('jquery')
<script>
$('.datepicker').datepicker({
    	format: 'yyyy-mm-dd',
      	autoclose: true,
        zIndexOffset:	9999
    });
</script>
<style type="text/css">
  #bulk {
    margin-top: 50px;
  }
  .form-control{
    margin-top: 2px;
  }

  #bulk,
  #single {
    border: 1ps solid gray;
    border-radius: 5px;
  }
</style>

<script type="text/javascript">
  $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

});
 
</script>
@endsection