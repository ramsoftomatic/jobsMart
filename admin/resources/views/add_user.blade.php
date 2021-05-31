@extends('layouts.form-app')

@section('title')
JobsMartIndia| Add User
@endsection

@section('content-header')
<style>
  .form-control-feedback{
    right: 5%;
  }
  .has-feedback-left{
    padding-right:10%;
  }
  </style>

@endsection


@section('content')
  <!-- /Header -->

  <!-- About -->
  <!-- Contact -->
   <section class="content">
     @if(session('success'))
    <div class="msg alert alert-success">
      <h3><center>{{session('success')}}</center></h3>
    </div>
  @endif

   @if(session('failure'))
    <div class="msg alert alert-danger">
      <h3><center>{{session('failure')}}</center></h3>
    </div>
  @endif

          <div class="row">
        <!-- contact form -->
        <div class="col-md-10 col-md-offset-1 myformdiv">

        <form name="myform" id="myform" action="add_user" class="contact-form" method="post" enctype="multipart/form-data" >
          {{csrf_field()}}
          <div class="col-xs-12">
              <p><h3>Create User</h3></p>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
              <select class="form-control select2" id="user_type" name="user_type" placeholder="Select User Type" required>
                <option value="">Select User Type</option>
                <option value="company">Company User</option>
                <option value="employee">Employee User</option>
              </select>
              <span class="error" aria-hidden="true">{{$errors->first('user_type')}}</span>
            </div>

            <div class="users_div">
              <div class="users">
                <div class="col-xs-12">
                  <p><h4>User Detail</h4></p>
                </div>                
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left name" name="name[]" placeholder="Name">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true">{{$errors->first('name[]')}}</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <input type="text" maxlength="10" class="form-control has-feedback-left phone_no" name="phone_no[]" placeholder="Phone Number">
                  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true">{{$errors->first('phone_no[]')}}</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <input type="text" class="form-control has-feedback-left email" name="email[]" placeholder="email">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true">{{$errors->first('email[]')}}</span>
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback company_user">
                  <select class="form-control has-feedback-left select2 company_id" name="company_id[]" placeholder="Select Company" >
                    <option value="">Select company</option>
                    @foreach($company as $comp)
                    <option value="{{$comp->company_id}}">{{$comp->company_name}}</option>
                    @endforeach
                  </select>                 
                  <span class="error" aria-hidden="true">{{$errors->first('company[]')}}</span>
                </div>
               
                <div class="employee_user">
                <div class="col-xs-12">
                  <p><h4>Employee Detail</h4></p>
                </div>                
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback employee_user">
                <select class="form-control has-feedback-left " name="id_type[]" placeholder="ID Type">
                    <option value="">Select ID Type</option>                   
                    <option value="pan">Pan Number</option>
                    <option value="voter_id">Voter ID</option>
                    <option value="driving_licence">Driving Licence</option>
                    <option value="Adhar_no">Adhar card Number</option>                   
                  </select>                 
                  <span class="error" aria-hidden="true">{{$errors->first('company[]')}}</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback employee_user">                                   
                  <input type="text" class="form-control has-feedback-left id_no" name="id_no[]" placeholder="ID Number">
                  <span class="fa fa-id-card-o form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true">{{$errors->first('id_no[]')}}</span>               
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback employee_user">
                  <input type="text" class="form-control has-feedback-left joining_date datepicker" name="joining_date[]" placeholder="Joining Date">
                  <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true">{{$errors->first('joining_date[]')}}</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group employee_user">
                  <textarea type="text" class="form-control has-feedback-left address" name="address[]" rows="1" placeholder="Address"></textarea>
                  <span class="fa fa-address-card-o form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true">{{$errors->first('address[]')}}</span>
                </div>                
              <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback employee_user">
                <select class="form-control select2 assign_company" name="assign_company[0][]" placeholder="Assign Company"  multiple="multiple">
                  <option value="">Select Company</option> 
                   @foreach($company as $comp)
                    <option value="{{$comp->company_id}}">{{$comp->company_name}}</option>
                    @endforeach                 
                </select>
                <span class="error" aria-hidden="true">{{$errors->first('company[]')}}</span>
              </div>
            </div>            
                
                <br/>
                <div class="col-xs-12">
                  <p><h4>Login Detail</h4></p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <input type="text" name="username[]" class="form-control has-feedback-left username" placeholder="Username">
                  <span class="fa fa-user-o form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true">{{$errors->first('username[]')}}</span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <input type="password" name="password[]" class="form-control has-feedback-left password" placeholder="Password">
                  <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true">{{$errors->first('password[]')}}</span>
                  </div>
              </div>
              <div class="clearfix"></div>
              <div class="ln_solid"></div>
            </div>

            <div class="form-group">
              <div class="col-md-2 col-sm-6 col-xs-6">
              <button type="button" class="form-control btn btn-primary add_more">Add More</button>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-6">
                <!-- <button type="button" class="btn btn-primary">Cancel</button> -->
                <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                <button type="button" id="submitform" class="form-control btn btn-success">Submit</button>
              </div>
             </div>           
            </form> 
          </div>
        </div>      

      <style type="text/css">
      .error
      {
        color : #ca7878;
      }
      .phone_email_input
      {
        margin-bottom: 2px;
      }
    </style>
</section>

    <!-- /Container -->
    @endsection
    
    @section('jquery')

<script type="text/javascript">
$(document).ready(function(){
var myvar=0;

$('.datepicker').datepicker({
    format: 'dd/mm/yy'
  }); 
  
$("#user_type").select2({
   placeholder: "Select User",
   allowClear: true,
  });
  
  $(".company_id").select2({
       placeholder: "Select Company",
       allowClear: true,
  });   

 
  $(".assign_company").select2({
    placeholder: "Assign Company",
    allowClear: true,
    multiple: true
  });
     
$('.company_user,.employee_user').hide();

$('#user_type').change(function(){
  if($(this).val()=='employee')
   {
    $('.employee_user').show();
    $('.company_user').hide();
  }
  else if($(this).val()=='company')
  {
    $('.company_user').show();
    $('.employee_user').hide();
  }
  else
  {
    $('.company_user,.employee_user').hide();
  }
}); 
$('.add_more').click(function(e){
       e.preventDefault();
       myvar=myvar+1;
       $('.users_div').append('<div class="users"><div class="col-xs-12"><p><h4>User Detail</h4></p></div><div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><input type="text" class="form-control has-feedback-left name" name="name[]" placeholder="Name"><span class="fa fa-user form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true">{{$errors->first("name[]")}}</span></div><div class="col-md-6 col-sm-6 col-xs-12 form-group"><input type="text" class="form-control has-feedback-left phone_no" name="phone_no[]" placeholder="Phone Number"><span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true">{{$errors->first("phone_no")}}</span></div><div class="col-md-6 col-sm-6 col-xs-12 form-group"><input type="text" class="form-control has-feedback-left email" name="email[]" placeholder="email"><span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true">{{$errors->first("email[]")}}</span></div><div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback company_user"><select class="form-control select2 company_id" name="company_id[]" placeholder="" ><option value="">Select Company</option>@foreach($company as $comp)<option value="{{$comp->company_id}}">{{$comp->company_name}}</option>@endforeach</select><span class="error" aria-hidden="true">{{$errors->first("company[]")}}</span></div><div class="employee_user"><div class="col-xs-12"><p><h4>Employee Detail</h4></p></div><div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback employee_user"><select class="form-control has-feedback-left " name="id_type[]" placeholder="ID Type"><option value="">Select ID Type</option><option value="pan">Pan Number</option><option value="voter_id">Voter ID</option><option value="driving_licence">Driving Licence</option><option value="adhar_no">Adhar card Number</option></select><span class="error" aria-hidden="true">{{$errors->first("company[]")}}</span></div><div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback employee_user"><input type="text" class="form-control has-feedback-left id_no" name="id_no[]" placeholder="ID number"><span class="fa fa-id-card-o form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true">{{$errors->first("id[]")}}</span></div><div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback employee_user"><input type="text" class="form-control has-feedback-left joining_date" name="joining_date[]" placeholder="Joining Date"><span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true">{{$errors->first("joining_date[]")}}</span></div><div class="col-md-6 col-sm-6 col-xs-12 form-group employee_user"><textarea type="text" class="form-control has-feedback-left address" name="address" rows="1" placeholder="Address"></textarea><span class="fa fa-address-card-o form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true">{{$errors->first("address[]")}}</span></div><div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback employee_user"><select class="form-control select2 assign_company"  name="assign_company['+myvar+'][]" placeholder="Select Company"  multiple><option value="">Select Company</option>@foreach($company as $comp)<option value="{{$comp->company_id}}">{{$comp->company_name}}</option>@endforeach</select><span class="error" aria-hidden="true">{{$errors->first("assign_company[][]")}}</span> </div> </div><div class="col-xs-12"><p><h4>Login Detail</h4></p></div><div class="col-md-6 col-sm-6 col-xs-12 form-group"><input type="text" name="username[]" class="form-control has-feedback-left" placeholder="Username"><span class="fa fa-user-o form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true">{{$errors->first("username[]")}}</span></div><div class="col-md-6 col-sm-6 col-xs-12 form-group"><input type="password" name="password[]" class="form-control has-feedback-left" placeholder="Password"><span class="fa fa-key form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true">{{$errors->first("password[]")}}</span></div><div class="form-group"><div class="col-md-12 col-sm-12 col-xs-12 pull-right"><button type="button" class="btn btn-xs btn-danger pull-right delete"><i class="fa fa-trash"></i> </button></div></div><div class="clearfix"></div><div class="ln_solid"></div></div>');
        
         if($('#user_type').val()=='employee')
         {
           $('.employee_user').show();
           $('.company_user').hide();

           $(".assign_company").select2({
            placeholder: "Assign Company",
            allowClear: true,
            multiple: true
          });
     
         }
         else if($('#user_type').val()=='company')
         {
           $('.company_user').show();
           $('.employee_user').hide();

           $(".company_id").select2({
              placeholder: "Select Company",
              allowClear: true,
          }); 
        }
         else
         {
           $('.company_user,.employee_user').hide();
         }
     });

     $(document).on('click','.delete',function(e){
      e.preventDefault();
      $(this).closest('.users').remove();
    });

     $('#submitform').click(function(e){
      e.preventDefault();
      var myreturn = 'true';

      $('.password').each(function(){
        if($(this).val()=='')
        {
          $(this).closest('div').find('span.error').html('This field is required');
          $(this).focus();
          myreturn = 'false';
        }
        else
        {
          $(this).closest('div').find('span.error').html('');
        }
      });
      $('.username').each(function(){
        if($(this).val()=='')
        {
          $(this).closest('div').find('span.error').html('This field is required');
          $(this).focus();
          myreturn = 'false';
        }
        else
        {
          $(this).closest('div').find('span.error').html('');
        }
      });
      $('.email').each(function(){
        if($(this).val()=='')
        {
          $(this).closest('div').find('span.error').html('This field is required');
          $(this).focus();
          myreturn = 'false';
        }
        else
        {
          var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
          if(!emailReg.test($(this).val()))
          {
            $(this).closest('div').find('span.error').html('Invalid email');
            $(this).focus();
            myreturn = 'false';
          }
          else
          $(this).closest('div').find('span.error').html('');
        }
      });
      $('.phone_no').each(function(){
        if($(this).val()=='')
        {
          $(this).closest('div').find('span.error').html('This field is required');
          $(this).focus();
          myreturn = 'false';
        }
        else
        {
          var numericReg = /^[0-9]{10}$/;
          if(!numericReg.test($(this).val()))
          {
            $(this).closest('div').find('span.error').html('Invalid mobile number');
            $(this).focus();
            myreturn = 'false';
          }
          else
          $(this).closest('div').find('span.error').html('');
        }
      });

      if($('#user_type').val()=='')
      {
        $('#user_type').closest('div').find('span.error').html('This field is required');
        $('#user_type').focus();
        myreturn = 'false';
      }
      else if($('#user_type').val()=='client')
      {
        $('#user_type').closest('div').find('span.error').html('');
        $('.company').each(function(){
          if($(this).val()=='')
          {
            $(this).closest('div').find('span.error').html('This field is required');
            $(this).focus();
            myreturn = 'false';
          }
          else
          {
            $(this).closest('div').find('span.error').html('');
          }
        });
      }
      else if($('#user_type').val()=='employee')
      {
        $('#user_type').closest('div').find('span.error').html('');
        $('.address').each(function(){
          if($(this).val()=='')
          {
            $(this).closest('div').find('span.error').html('This field is required');
            $(this).focus();
            myreturn = 'false';
          }
          else
          {
            $(this).closest('div').find('span.error').html('');
          }
        });        
        // $('.joining_date').each(function(){
        //   if($(this).val()=='')
        //   {
        //     $(this).closest('div').find('span.error').html('This field is required');
        //     $(this).focus();
        //     myreturn = 'false';
        //   }
          // else
          // {
          //  // var datereg =/^(\d{4})[-\/](\d{2})[-\/](\d{2})$/;
          //   var datereg =/^(\d{2})[-\/](\d{2})[-\/](\d{4})$/;
          // if(!datereg.test($(this).val()))
          // {
          //   $(this).closest('div').find('span.error').html('Invalid Date');
          //   /*$(this).focus();*/
          //   myreturn = 'false';
          // }
        //   else{
        //     $(this).closest('div').find('span.error').html('');
        //   }
         
        // });
        $('.id_no').each(function(){
          if($(this).val()=='')
          {
            $(this).closest('div').find('span.error').html('This field is required');
            $(this).focus();
            myreturn = 'false';
          }
          else
          {
            $(this).closest('div').find('span.error').html('');
          }
        });
      }
      $('.name').each(function(){
        if($(this).val()=='')
        {
          $(this).closest('div').find('span.error').html('This field is required');
          $(this).focus();
          myreturn = 'false';
        }
        else
        {
          $(this).closest('div').find('span.error').html('');
        }
      });   
      
      if(myreturn=='true')
      {
        $('#myform').submit();
      }
    });





});
 
</script>
  <!-- /Contact -->
<style type="text/css">
  #bulk{
    margin-top: 50px;
  }
  #bulk,#single
  {
    border: 1ps solid gray;
    border-radius: 5px;
  }
</style>
@endsection
