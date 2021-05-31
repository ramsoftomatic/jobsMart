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
   Company  Vecancy
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
@if($id=="")
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
    <li><a href="company_contact-{{$id}}">Company contact Detail</a></li>
    <li><a href="company_payment-{{$id}}">Payment Detail</a></li>
    <li><a href="terms_and_conditions-{{$id}}">Terms & Conditions</a></li>
    <li><a href="company_user_detail-{{$id}}">User Detail</a></li>
    <li><a href="company_vecancy_detail-{{$id}}">Company Vecancy</a></li>
  </ul>
  @endif 
 <div class="row">
    <!-- contact form -->
    <div class="col-md-12 myformdiv">
    <!-----tab Vacancy Details--->
        <div class="tab-pane" id="vacancy_detail">
            <form name="vacancyform" id="vacancyform" action="save_vecancy_detail" class="contact-form" method="post">
                 {{csrf_field()}}
          <div class="row">
             
            
            </div>
     
                <div class="row">
                  <div class="col-xs-6">
                    <p>
                      <h4>Company  Vecancy</h4>
                    </p>
                  </div>
                  <div class="col-lg-3 col-md-3">
                  <input type="hidden"  name="count_vecancy" class="company_id form-control" value="{{$count_vecancy}}" readonly>
                  </div>
                <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                  
                    <label>Company ID</label>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <input type="text"  name="company_id" class="company_id form-control" value="{{$id}}" readonly>  
                  </div>
           
                </div>
                <hr>
               <br> 
               @if($count_vecancy==0)
               <div class="col-lg-12">
                         <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">Position</label>
                                <input type="text" name="position" class="form-control has-feedback-left position" placeholder="Position">
                                    <span class="text-danger">{{ $errors->first('Position') }}</span>
                        </div>
                        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">Experience</label>
                                <input type="text" name="experience" class="form-control has-feedback-left experience" placeholder="Experience">
                                    <span class="text-danger">{{ $errors->first('experience') }}</span>
                        </div>
                       
                        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">Salary</label>
                                <input type="number" name="salary"  maxlength="10" class="form-control has-feedback-left Salary" placeholder="Salary">
                                <span class="text-danger">{{ $errors->first('salary') }}</span>
                        </div>               
                        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                                <label for="GST number">Vecancy Status</label>
                                    <select class="form-control has-feedback-left vecancy_status" id="vecancy_status" name="vecancy_status" placeholder="vecancy_status">
                                        <option value="">Select Status</option>                    
                                        <option value="active">Active</option>
                                        <option value="dactive">Dactive</option>                   
                                    </select> 
                                    <span class="text-danger">{{ $errors->first('experience') }}</span>
                        </div>
                        <div class="col-lg-9 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">Location</label>
                            <textarea name="location"  class="form-control has-feedback-left location"></textarea>
                                <span class="text-danger">{{ $errors->first('location') }}</span>
                            </div>
                        </div>

               @else
               @foreach($vecancy_detail as $row)
               <input type="hidden" name="id" value="{{$row->id}}" class="form-control">
               <div class="col-lg-12">
                         <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">Position</label>
                                <input type="text" value="{{$row->position}}" name="position" class="form-control has-feedback-left position" placeholder="Position">
                                    <span class="text-danger">{{ $errors->first('Position') }}</span>
                        </div>
                        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">Experience</label>
                                <input type="text" value="{{$row->experience}}" name="experience" class="form-control has-feedback-left experience" placeholder="Experience">
                                    <span class="text-danger">{{ $errors->first('experience') }}</span>
                        </div>
                       
                        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">Salary</label>
                                <input type="number" value="{{$row->salary}}" name="salary"  maxlength="10" class="form-control has-feedback-left Salary" placeholder="Salary">
                                <span class="text-danger">{{ $errors->first('salary') }}</span>
                        </div>               
                        <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                                <label for="GST number">Vecancy Status</label>
                                    <select class="form-control has-feedback-left vecancy_status" id="vecancy_status" name="vecancy_status" placeholder="vecancy_status">
                                        <option value="">Select Status</option> 
                                         @if($row->vecancy_status=='active') 
                                         <option value="active" selected>Active</option>
                                         @else                  
                                        <option value="active">Active</option>
                                        @endif
                                        @if($row->vecancy_status=='inactive')
                                        <option value="inactive" selected>Inactive</option>
                                        @else
                                        <option value="inactive">Inactive</option>
                                        @endif                   
                                    </select> 
                                    <span class="text-danger">{{ $errors->first('experience') }}</span>
                        </div>
                        <div class="col-lg-9 col-sm-12 col-xs-12 col-md-4 form-group">
                            <label for="GST number">Location</label>
                                <textarea name="location"  class="form-control has-feedback-left location">{{$row->comp_location}}</textarea>
                                <span class="text-danger">{{ $errors->first('location') }}</span>
                            </div>
                        </div>
                @endforeach
               @endif           
                    
                 <div class="col-md-3 col-sm-3 col-xs-12 col col-md-offset-9 col-lg-offset-9 form-group">
                <button type="submit" name="company_save" id="btnsave4"
                  class="btn btn-success form-control col-md-12 ">Save &
                  Next</button>
              </div>     
            </form>
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
        '<div class="login_user row"><div class="col-md-4 col-sm-4 col-xs-12 form-group"><input type="text" name="user_name[]" class="form-control has-feedback-left user_name" placeholder="Name">  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true"></span></div>  <div class="col-md-4 col-sm-4 col-xs-12 form-group">  <input type="email" name="user_email[]" class="form-control has-feedback-left user_email" placeholder="Email">  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true"></span></div><div class="col-md-4 col-sm-4 col-xs-12 form-group">  <input type="text" name="user_phone[]" class="form-control has-feedback-left user_phone" placeholder="Phone No">  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true"></span></div><div class="col-md-4 col-sm-4 col-xs-12 form-group">  <input type="text" name="username[]" class="form-control has-feedback-left username" placeholder="Username" readonly>  <span class="fa fa-user-o form-control-feedback left" aria-hidden="true"></span><span class="error" aria-hidden="true"></span></div>  <div class="col-md-4 col-sm-4 col-xs-12 form-group">  <input type="password" name="password[]" class="form-control has-feedback-right password" placeholder="Password" value="1234">  <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-4 col-xs-4 form-group">  <button type="button" class="btn btn-sm btn-danger pull-left delete_login_user"><i class="fa fa-trash"></i></button></div></div>'
      );
    });

    $(document).on('click', '.delete_login_user', function (e) {
      e.preventDefault();
      $(this).closest('.login_user').remove();
    });
    
    ////////////////////////office detail/////////////////////
   $('#add_office').click(function () {
            var size = parseInt($('#office_detail_array').val());
            
            var content =
              '<div class="row clearfix office_contact_person_row"><div class="col-lg-11"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="office_contact_person_name[]" class="form-control office_contact_person_name" placeholder="Contact Person Name"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="office_contact_person_post[]" class="form-control office_contact_person_post" placeholder="Enter Post"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_email"><div class="office_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="office_contact_person_email['+size+']" class="form-control office_contact_person_email_in phone_email_input" placeholder="Contact Person email"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_office_email">Add</button></div></div></div><div class=" col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_phone"><div class="office_contact_person_phone_div row"><div class="col-md-10 col-xs-10 row"><input type="text" name="office_contact_person_phone['+size+']" class="form-control office_contact_person_phone_in phone_email_input" placeholder="Contact Person Phone"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_office_phone">Add</button></div></div></div><input type="hidden" class="index" value="'+size+'"></div> <div class="col-lg-1"><button type="button" class="btn btn-sm btn-danger delete pull-right"><i class="fa fa-trash"></i></button></div></div>';

            $('.office_address').append(content);
          

            $('#office_detail_array').val(size+1)
          });
 
    $(document).on('click', '.delete', function () {
            var size = parseInt($('#office_detail_array').val());
          
            $(this).closest('.office_contact_person_row').remove();
            $('#office_detail_array').val(size-1);
            var size = parseInt($('#office_detail_array').val());
            var content='';
            for(var i=1;i<size;i++)
            {
             
              content+=
              '<div class="row clearfix office_contact_person_row"><div class="col-lg-11"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="office_contact_person_name[]" class="form-control office_contact_person_name" placeholder="Contact Person Name"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="office_contact_person_post[]" class="form-control office_contact_person_post" placeholder="Enter Post"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_email"><div class="office_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="office_contact_person_email['+i+']" class="form-control office_contact_person_email phone_email_input" placeholder="Contact Person email"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_office_email">Add</button></div></div></div><div class=" col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_phone"><div class="office_contact_person_phone_div row"><div class="col-md-10 col-xs-10 row"><input type="text" name="office_contact_person_phone['+i+']" class="form-control office_contact_person_phone_in phone_email_input" placeholder="Contact Person Phone"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_office_phone">Add</button></div></div></div><input type="hidden" class="index" value="'+i+'"></div> <div class="col-lg-1"><button type="button" class="btn btn-sm btn-danger delete pull-right"><i class="fa fa-trash"></i></button></div></div>';
               
            
            }
            $('.office_address').empty();
            $('.office_address').append(content);

    });
    
      
    $(document).on('click', '.delete', function () {

      var size = parseInt($('#size_array').val());
      $(this).closest('.branch_contact_person_row').remove();
      $('#size_array').val(size - 1)

    });

    $(document).on('click', '.add_office_email', function (e) {
      e.preventDefault();
      var index = parseInt($(this).closest('.office_contact_person_row').find('.index').val());
      $(this).closest('div.office_contact_person_row').find('.office_contact_person_email').append(
        '<div class="office_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="office_contact_person_email['+index+'][]" class="form-control office_contact_person_email1 phone_email_input" placeholder="Contact Person email"></div><div class="col-md-1 col-sm-1 col-xs-1"><button type=" button" class="btn btn-sm btn-warning minus_email"><i class="fa fa-trash"></i></button></div></div>'
      );
    });

    $(document).on('click', '.minus_email', function (e) {
            e.preventDefault();
            $(this).closest('.office_contact_person_email_div').remove();
    });

    $(document).on('click', '.add_office_phone', function (e) {
      e.preventDefault();
      var index = parseInt($(this).closest('.office_contact_person_row').find('.index').val());
      $(this).closest('div.office_contact_person_row').find('.office_contact_person_phone').append(
        '<div class="office_contact_person_phone_div row"><div class="col-xs-10 col-md-10 row"><input type="number" name="office_contact_person_phone['+index+'][]" class="form-control phone_phone_input" placeholder="Contact Person phone"></div><div class="col-md-1 col-sm-1 col-xs-1"><button type=" button" class="btn btn-sm btn-warning minus_phone"><i class="fa fa-trash"></i></button></div></div>'
      );
    });

    $(document).on('click', '.minus_phone', function (e) {
      e.preventDefault();
      $(this).closest('.office_contact_person_phone_div').remove();
      
    });
//////////////////////////////////////End Office Detail////////////////////
$('#add_branch').click(function () {
            var size = parseInt($('#branch_size_array').val());
            
            var content =
              '<div class="row clearfix branch_contact_person_row"><div class="col-lg-11"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="branch_contact_person_name[]" class="form-control branch_contact_person_name" placeholder="Contact Person Name"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="branch_contact_person_post[]" class="form-control branch_contact_person_post" placeholder="Enter Post"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_email"><div class="branch_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="branch_contact_person_email['+size+']" class="form-control branch_contact_person_email_in phone_email_input" placeholder="Contact Person email"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_branch_email">Add</button></div></div></div><div class=" col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_phone"><div class="branch_contact_person_phone_div row"><div class="col-md-10 col-xs-10 row"><input type="text" name="branch_contact_person_phone['+size+']" class="form-control branch_contact_person_phone_in phone_email_input" placeholder="Contact Person Phone"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_branch_phone">Add</button></div></div></div><input type="hidden" class="index" value="'+size+'"></div> <div class="col-lg-1"><button type="button" class="btn btn-sm btn-danger delete pull-right"><i class="fa fa-trash"></i></button></div></div>';

            $('.branch_address').append(content);
          

            $('#branch_size_array').val(size+1)
          });
 
    
    
      
    $(document).on('click', '.delete', function () {

      var size = parseInt($('#branch_size_array').val());
      $(this).closest('.branch_contact_person_row').remove();
      $('#branch_size_array').val(size - 1)
      var size = parseInt($('#branch_size_array').val());
            var content='';
            for(var i=1;i<size;i++)
            {
             
              content+=
              '<div class="row clearfix branch_contact_person_row"><div class="col-lg-11"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="branch_contact_person_name[]" class="form-control branch_contact_person_name" placeholder="Contact Person Name"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="branch_contact_person_post[]" class="form-control branch_contact_person_post" placeholder="Enter Post"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_email"><div class="branch_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="branch_contact_person_email[]" class="form-control branch_contact_person_email_in phone_email_input" placeholder="Contact Person email"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_branch_email">Add</button></div></div></div><div class=" col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_phone"><div class="branch_contact_person_phone_div row"><div class="col-md-10 col-xs-10 row"><input type="text" name="branch_contact_person_phone['+i+']" class="form-control branch_contact_person_phone_in phone_email_input" placeholder="Contact Person Phone"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_branch_phone">Add</button></div></div></div><input type="hidden" class="index" value="'+i+'"></div> <div class="col-lg-1"><button type="button" class="btn btn-sm btn-danger delete pull-right"><i class="fa fa-trash"></i></button></div></div>';
               
            
            }
            $('.branch_address').empty();
            $('.branch_address').append(content);
    });

    $(document).on('click', '.add_branch_email', function (e) {
          e.preventDefault();
          var index = parseInt($(this).closest('.branch_contact_person_row').find('.index').val());
          $(this).closest('div.branch_contact_person_row').find('.branch_contact_person_email').append(
            '<div class="branch_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="branch_contact_person_email['+index+'][]" class="form-control branch_contact_person_email1 phone_email_input" placeholder="Contact Person email"></div><div class="col-md-1 col-sm-1 col-xs-1"><button type=" button" class="btn btn-sm btn-warning minus_email"><i class="fa fa-trash"></i></button></div></div>'
          );
    });

    $(document).on('click', '.minus_email', function (e) {
            e.preventDefault();
            $(this).closest('.branch_contact_person_email_div').remove();
    });

    $(document).on('click', '.add_branch_phone', function (e) {
              e.preventDefault();
              var index = parseInt($(this).closest('.branch_contact_person_row').find('.index').val());
              $(this).closest('div.branch_contact_person_row').find('.branch_contact_person_phone').append(
                '<div class="branch_contact_person_phone_div row"><div class="col-xs-10 col-md-10 row"><input type="number" name="branch_contact_person_phone['+index+'][]" class="form-control branch_contact_person_phone1 phone_phone_input" placeholder="Contact Person phone"></div><div class="col-md-1 col-sm-1 col-xs-1"><button type=" button" class="btn btn-sm btn-warning minus_phone"><i class="fa fa-trash"></i></button></div></div>'
              );
    });

    $(document).on('click', '.minus_phone', function (e) {
            e.preventDefault();
            $(this).closest('.branch_contact_person_phone_div').remove();
    });
    $(document).on('keyup', '.user_email', function () {
      $(this).closest('.login_user').find('.username').val($(this).val());
    });
$(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
$("#btnsave1").click(function () {

          var company_name = $('#company_name').val();
          var company_contact_no  = $('#company_contact_no').val();
          var company_email = $('#company_email').val();
          var company_web = $('#company_web').val();
          var industry = $('#industry').val();
          var company_type = $('#company_type').val();
          var employee_no = $('#employee_no').val();
          var turnover = $('#turnover').val();
          var establish_year = $('#establish_year').val();
          var products_of_co = $('#products_of_co').val();
          var owner_name = $('#owner_name').val();
          var owner_email = $('#owner_email').val();
          var owner_phone = $('#owner_phone').val();
          var owner_address1 = $('#owner_address1').val();
          var owner_address2 = $('#owner_address2').val();
          var owner_address3 = $('#owner_address3').val();
       
          $.ajax({
              type: 'POST',
              url: 'save_company_detail',
              data: {
                      company_name : company_name,
                      company_contact_no  : company_contact_no,
                      company_email : company_email,
                      company_web : company_web,
                      industry : industry,
                      company_type : company_type,
                      employee_no : employee_no,
                      turnover : turnover,
                      establish_year : establish_year,
                      products_of_co : products_of_co,
                      owner_name : owner_name,
                      owner_email : owner_email,
                      owner_phone : owner_phone,
                      owner_address1 : owner_address1,
                      owner_address2 : owner_address2,
                      owner_address3 : owner_address3
              },
              success: function (data) {
              
                var response= JSON.parse(data);
                console.log(response.id);
               $("#contact_li").addClass('active');
               $("#contact_detail").addClass('active');
               $("#company_li").removeClass('active');
               $("#company_detail").removeClass('active');
               $('.company_id').val(response.id);
               if(response.msg=='success')
               {
                  alert("company detail Save successfully")
               }
               else
               {
                
                alert("company detail can't be saved");
               }
              
              },
              error:function(data) {
                console.log(data);
              }
          });
      });
   
    $("#btnsave2").click(function () {
      ////////////////office detail//////////////////////
        var size_ofc_arr=$('#office_detail_array').val();
    
        var office_contact_person_name =$("input[name='office_contact_person_name[]']")
              .map(function(){return $(this).val();}).get();
        var office_contact_person_post =$("input[name='office_contact_person_post[]']")
        .map(function(){return $(this).val();}).get();
        var office_address1=$('.office_address1').val();
        var office_address2=$('.office_address2').val();
        var office_address3=$('.office_address3').val();
        var office_landmark=$('.office_landmark').val();

         var office_contact_person_phone=new Array;
         var office_contact_person_email=new Array;
        for(var i=0;i<size_ofc_arr;i++)
        {
         
          var ofc_contact_person_phone1=$("input[name='office_contact_person_phone["+i+"]']").val();
          var ofc_contact_person_phone=  $("input[name='office_contact_person_phone["+i+"][]']")
            .map(function(){return $(this).val();}).get();
           
           if(ofc_contact_person_phone1!='[]')
           {
            ofc_contact_person_phone.push(ofc_contact_person_phone1);
            office_contact_person_phone[i]= ofc_contact_person_phone;
           }
           else{
            office_contact_person_phone[i]= ofc_contact_person_phone1;
           }

        }
        for(var j=0;j<size_ofc_arr;j++)
        {
         
          var ofc_contact_person_email1=$("input[name='office_contact_person_email["+j+"]']").val();
          var ofc_contact_person_email=  $("input[name='office_contact_person_email["+j+"][]']")
            .map(function(){return $(this).val();}).get();
         
           
           if(ofc_contact_person_email1!='[]')
           {
            ofc_contact_person_email.push(ofc_contact_person_email1);
            office_contact_person_email[j]= ofc_contact_person_email;
           }
           else{
            office_contact_person_email[j]= ofc_contact_person_email1;
           }

        }
        ////////////////office detail end/////////////////////

        //////////////////////Branch Detail/////////////////////
        var size_branch_arr=$('#branch_size_array').val();
    
    var branch_contact_person_name =  $("input[name='branch_contact_person_name[]']")
          .map(function(){return $(this).val();}).get();
    var branch_contact_person_post =  $("input[name='branch_contact_person_post[]']")
    .map(function(){return $(this).val();}).get();
    var branch_address1=$('.branch_address1').val();
    var branch_address2=$('.branch_address2').val();
    var branch_address3=$('.branch_address3').val();
    var branch_landmark=$('.branch_landmark').val();

     var branch_contact_person_phone=new Array;
     var branch_contact_person_email=new Array;
    for(var k=0;k<size_branch_arr;k++)
    {
     
      var bch_contact_person_phone1=$("input[name='branch_contact_person_phone["+k+"]']").val();
      var bch_contact_person_phone=  $("input[name='branch_contact_person_phone["+k+"][]']")
        .map(function(){return $(this).val();}).get();
       
       if(bch_contact_person_phone1!='[]')
       {
        bch_contact_person_phone.push(bch_contact_person_phone1);
        branch_contact_person_phone[k]= bch_contact_person_phone;
       }
       else{
        branch_contact_person_phone[k]= bch_contact_person_phone1;
       }

    }
    for(var l=0;l<size_branch_arr;l++)
    {
     
      var bch_contact_person_email1=$("input[name='branch_contact_person_email["+l+"]']").val();
      var bch_contact_person_email=  $("input[name='branch_contact_person_email["+l+"][]']")
        .map(function(){return $(this).val();}).get();
     
       
       if(bch_contact_person_email1!='[]')
       {
        bch_contact_person_email.push(bch_contact_person_email1);
        branch_contact_person_email[l]= bch_contact_person_email;
       }
       else{
        branch_contact_person_email[l]= bch_contact_person_email1;
       }

    }
        //////////////////////Branch Fetail End//////////////////

        $.ajax({
              type: 'POST',
              url: 'save_contact_detail',
              data: {
                office_contact_person_name :office_contact_person_name ,
                office_contact_person_post :office_contact_person_post ,
                office_address1:office_address1,
                office_address2:office_address2,
                office_address3:office_address3,
                office_landmark:office_landmark,
                office_contact_person_phone:office_contact_person_phone,
                office_contact_person_email:office_contact_person_email,
                branch_contact_person_name :branch_contact_person_name ,
                branch_contact_person_post :branch_contact_person_post ,
                branch_address1:branch_address1,
                branch_address2:branch_address2,
                branch_address3:branch_address3,
                branch_landmark:branch_landmark,
                branch_contact_person_phone:branch_contact_person_phone,
                branch_contact_person_email:branch_contact_person_email
              },
              success: function (data) {

                // var response= JSON.parse(data);
                console.log(data);
              //  $("#payment_li").addClass('active');
              //  $("#payment_detail").addClass('active');
              //  $("#contact_li").removeClass('active');
              //  $("#contact_detail").removeClass('active');
              //  $('.company_id').val(response.id);
              //  if(response.msg=='success')
              //  {
              //     alert("contact detail Save successfully")
              //  }
              //  else
              //  {
                
              //   alert("contact detail can't be saved");
              //  }
              
              },
          
              error:function(data) {
                console.log(data);
              }
          });
       
});
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
@endsection