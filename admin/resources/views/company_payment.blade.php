@extends('layouts.form-app')

@section('title')
JobsMartIndia| Register Company
@endsection

@section('content-header')
<style>
  .form-control-feedback {
    right: 5%;
  }

  .has-feedback-left {
    padding-right: 10%;
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
 <div class="row">
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
    <div class="col-lg-12">
        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
            <label for="GST number">GST number</label>
                <input type="text" value="{{$row->gst_no}}" name="gst_no" class="fa fa-tag form-control has-feedback-left gst_no" placeholder="GST Number">
                 <span class="text-danger">{{ $errors->first('gst') }}</span>
        </div>
        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                <label for="Service Charges">Service Charges</label>
                    <input type="text" value="{{$row->charges}}" name="charges" class="form-control has-feedback-left charges" placeholder="Service Charges">
                        <span class="text-danger">{{ $errors->first('gst') }}</span>
            </div>
        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
            <label for="Service Charges">Registration</label>
               <input type="text" name="registration" value="{{$row->registration}}" class="form-control has-feedback-left registration" placeholder="Registration">
                    <span class="text-danger">{{ $errors->first('registration') }}</span>
        </div>
        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
            <label for="Service Charges">Replacement</label>
                <input type="text" name="replacement" value="{{$row->replacement}}" class="form-control has-feedback-left Replacement" placeholder="Replacement">
                        <span class="text-danger">{{ $errors->first('replacement') }}</span>
        </div>
        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
            <label for="Service Charges">Payment Terms</label>
                <textarea name="paymenterm" class="form-control has-feedback-left paymenterm" rows="1" placeholder="Payment terms">{{$row->paymenterm}}</textarea>
                    <span class="text-danger">{{ $errors->first('replacement') }}</span>
        </div>
        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                <label for="start_date">Contract Start Date</label>
                    <input type="text" value="{{$row->start_date}}" name="start_date"  class="form-control has-feedback-left start_date datepicker" placeholder="Contract Start Date">
                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="end_date">Contract End Date</label>
                        <input type="text" name="end_date" value="{{$row->end_date}}"  class="form-control has-feedback-left end_date datepicker" placeholder="Contract End Date">
                            <span class="text-danger">{{ $errors->first('end_date') }}</span>
                </div>
               
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                        <label for="end_date">Client Since</label>
                            <input type="text" name="client_since" value="{{$row->client_since}}"   class="form-control has-feedback-left client_since datepicker" placeholder="Start Date">
                                <span class="text-danger">{{ $errors->first('client_since') }}</span>
                    </div>  
                   
                  <div class="col-lg-8 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="end_date">Remark</label>
                           <textarea  name="remark" id="Remark" rows="2" cols="50"  class="form-control remark"
                                            placeholder="">{{$row->remark}}</textarea>
                                        <span class="text-danger">{{ $errors->first('remark') }}</span>
                        
                                    <span class="text-danger">{{ $errors->first('remark') }}</span>
                        </div> 
                          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="end_date">Upload Document</label>
                            <input type="file" name="documents" id="document" class="form-control has-feedback-left documents" placeholder="Upload docs" title="Upload document">
                            @if($row->documents!=NULL ||$row->documents!="")
                               <p class="help-block"><b>Already Uploaded Document: </b><a href="{{$row->documents}}" target="_blank">View</a></p>
                            @endif
                                    <span class="text-danger">{{ $errors->first('document') }}</span>
                        </div>  
              </div>
              </div>
              <!--------terms & conditions---------------->
             <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12">
                <p>
                  <h4>   Terms and Conditions</h4>
                </p>
              </div>
             
              </div>
              <hr>
              <!------------------End of terms and conditions------------------------>
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
 // $("#btnsave3").click(function () {
 //  $.ajax({
 //              type: 'POST',
 //              url: 'save_payment_detail',
 //              data: {
 //                gst_no :gst_no ,
 //                charges :charges ,
 //                registration:registration,
 //                replacement:replacement,
 //                paymenterm:paymenterm,
 //                start_date:start_date,
 //                end_date:end_date,
 //                client_slice :client_slice ,
 //                remark:remark,
 //                documents:documents,
 //              },
 //              success: function (data) {

 //                // var response= JSON.parse(data);
 //                console.log(data);
             
              
 //              },
          
 //              error:function(data) {
 //                console.log(data);
 //              }
 //          });
});
 
</script>
@endsection