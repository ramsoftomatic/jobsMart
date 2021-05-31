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
    Register Company   
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
  
 <div class="row">
 @if($user_detail=="")
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
    <li><a href="update_company-{{$id}}">Add Company</a></li>
    <li><a href="company_contact-{{$id}}" >Company contact Detail</a></li>
    <li><a href="company_payment-{{$id}}">Payment Detail</a></li>
    <li><a href="terms_and_conditions-{{$id}}">Terms & Conditions</a></li>
    <li  class="active"><a href="company_user_detail-{{$id}}">User Detail</a></li>
    <li><a href="company_vecancy_detail-{{$id}}">Company Vecancy</a></li>
    
  </ul>
  @endif
    <!-- contact form -->
    <div class="col-md-12 myformdiv">
        <form name="userform" id="userform" class="contact-form" method="post" action="save_user_detail">
          {{csrf_field()}}
        <div class="row">
             
            
            </div>
     
                <div class="row">
                  <div class="col-xs-6">
                    <p>
                      <h4>  User Details</h4>
                    </p>
                  </div>
                  <div class="col-lg-3 col-md-3"><div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">  
          <input type="hidden" value="{{$user_count}}" name="user_count" class="from-control">
          </div></div>
                <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                  
                    <label>Company ID</label>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <input type="text"  name="company_id" class="company_id form-control" value="{{$id}}" readonly>  
                  </div>
           
                </div>
                <hr>
                 <br>  
                 
                    @if($user_count==0)
                    <input type="hidden" value="0" name="id[]">
                      <div class="login_user row">
                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">User</label>
                            <input type="text" name="user_name[]" class="form-control has-feedback-left user_name" placeholder="Name">
                            <span class="text-danger">{{ $errors->first('location') }}</span>
                        </div>
                      
                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                                <label for="GST number">User Phone No.</label>
                                <input type="text" name="user_phone[]" maxlength="10" class="form-control has-feedback-left user_phone"  placeholder="Phone No">
                                <span class="text-danger">{{ $errors->first('user_email') }}</span>
                        </div>  
                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                                <label for="GST number">Username</label>
                                <input type="text" name="username[]" class="form-control has-feedback-left username" placeholder="Username">
                                <span class="text-danger">{{ $errors->first('user_email') }}</span>
                        </div>  
                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                                <label for="GST number">Password</label>
                                <input type="password" name="password[]" class="form-control has-feedback-right password" placeholder="Password" >
                                <span class="text-danger">{{ $errors->first('user_email') }}</span>
                        </div>
                 
                 
                </div>
                  
                   @else
                   @foreach($user_detail as $row)
                   <input type="hidden" value="{{$row->id}}" name="id[]">
                    <div class="login_user row">
                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">User</label>
                            <input type="text" name="user_name[]" value="{{$row->name}}" class="form-control has-feedback-left user_name" placeholder="Name">
                            <span class="text-danger">{{ $errors->first('location') }}</span>
                        </div>
                      
                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                                <label for="GST number">User Phone No.</label>
                                <input type="text" name="user_phone[]" value="{{$row->phone_no}}" maxlength="10" class="form-control has-feedback-left user_phone"  placeholder="Phone No">
                                <span class="text-danger">{{ $errors->first('user_email') }}</span>
                        </div>  
                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                                <label for="GST number">Username</label>
                                <input type="text" name="username[]" value="{{$row->email}}" class="form-control has-feedback-left username" placeholder="Username">
                                <span class="text-danger">{{ $errors->first('user_email') }}</span>
                        </div>  
                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                                <label for="GST number">Change Password</label>
                                <input type="password" name="password[]" class="form-control has-feedback-right password" placeholder="Password" >
                                <span class="text-danger">{{ $errors->first('user_email') }}</span>
                        </div>
                 
                 
                </div>
             @endforeach
              @endif  
              <div class="login_user_div">
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                <button type="button" id="add_login_user" class="btn btn-sm btn-info pull-left"
                  placeholder="Password">Add
                  More</button>
              </div>        
              <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 col col-md-offset-8 col-lg-offset-8 form-group">
                <button type="submit" id="submitform" class="btn btn-primary form-control col-md-4">Submit</button>
              </div>
              <!-- /contact form -->
              </form>
          </div>

      </div>
    </div>
  </div>
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
$('#add_login_user').click(function (e) {
      e.preventDefault();
      $('.login_user_div').append(
        '<div class="login_user row"><input type="hidden" value="0" name="id[]"><div class="col-md-4 col-sm-4 col-xs-12 form-group"><input type="text" name="user_name[]" class="form-control has-feedback-left user_name" placeholder="Name"><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true"></span></div><div class="col-md-4 col-sm-4 col-xs-12 form-group">  <input type="text" name="user_phone[]" class="form-control has-feedback-left user_phone" placeholder="Phone No">  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true"></span></div><div class="col-md-4 col-sm-4 col-xs-12 form-group">  <input type="text" name="username[]" class="form-control has-feedback-left username" placeholder="Username">  <span class="fa fa-user-o form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true"></span></div>  <div class="col-md-4 col-sm-4 col-xs-12 form-group">  <input type="password" name="password[]" class="form-control has-feedback-right password" placeholder="Password" value="1234">  <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-4 col-xs-4 form-group">  <button type="button" class="btn btn-sm btn-danger pull-left delete_login_user"><i class="fa fa-trash"></i></button></div></div>'
      );
    });

$(document).on('click', '.delete_login_user', function (e) {
    e.preventDefault();
    $(this).closest('.login_user').remove();
});
  
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

<!-- <script type="text/javascript">
   $.ajax({
              type: 'POST',
              url: 'save_contact_detail',
              data: {
                user_name :user_name ,
                user_phone :user_phone ,
                username:username,
                password:password,
                
              },
              success: function (data) {

                // var response= JSON.parse(data);
                console.log(data);
             
              
              },
          
              error:function(data) {
                console.log(data);
              }
          });
</script> -->
@endsection