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
  hr {
     margin-top:0px !important;
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

<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="content">
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
    <li><a href="update_company-{{$id}}">Add Company</a></li>
    <li class="active"><a href="company_contact-{{$id}}" >Company contact Detail</a></li>
    <li><a href="company_payment-{{$id}}">Payment Detail</a></li>
    <li><a href="terms_and_conditions-{{$id}}">Terms & Conditions</a></li>
    <li><a href="company_user_detail-{{$id}}">User Detail</a></li>
    <li><a href="company_vecancy_detail-{{$id}}">User Detail</a></li>
  
  </ul>
  @endif
    <div class="row"><!----div row1----->
        <div class="col-md-12 myformdiv">
        <form name="contactform" id="contactform" action="update_contact" class="contact-form" method="post">
            {{csrf_field()}}
          <div class="row">
             
            
            </div>
     
                <div class="row">
                  <div class="col-xs-6">
                    <p>
                      <h4>Office Address</h4>
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
                <div class="row">
                    <div class="col-xs-6">
                        <input type="checkbox" id="same_address" name="same_address" >Address is Same as Previouse
                      </div>
                      
              
                
                </div><br>
  @foreach($company_detail as $row)   
  <div class="col-md-3 col-sm-3 col-xs-10 form-group">
      <input type="hidden" name="office_count" class="form-control" value="{{$office_count}}">
      <input type="hidden" name="branch_count" class="form-control" value="{{$branch_count}}">
  </div>
      @if($office_count==0)
      <input type="hidden" value="0" name="ofc_contact_id[]">
  <div class="row clearfix office_contact_person_row">
    <div class="col-lg-11">
        <div class="col-md-3 col-sm-3 col-xs-10 form-group">
            <input type="text" name="office_contact_person_name[]" class="form-control has-feedback-left office_contact_person_name" placeholder="Contact Person Name">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-10 form-group">
            <input type="text" name="office_contact_person_post[]" class="form-control has-feedback-left office_contact_person_post" placeholder="Enter Post">
          </div>
          <div class="col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_email">
              <div class="office_contact_person_email_div row">
                    <div class="col-xs-10 col-md-10 row">
                        <input type="email" name="office_contact_person_email[0][]" class="form-control has-feedback-left phone_email_input office_contact_person_email_in" placeholder="Enter email">
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-12 form-group">
                      <button type="button" class="btn btn-sm btn-sm btn-primary add_office_email" id="add_office_email">Add</button>
                    </div>
              </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_phone">
              <div class="office_contact_person_phone_div row">
                    <div class="col-xs-10 col-md-10 row">
                          <input type="text" name="office_contact_person_phone[0][]" maxlength="10" class="form-control has-feedback-left phone_email_input office_contact_person_phone_in" placeholder="Contact Person Phone">
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-12 form-group">
                          <button type="button" class="btn btn-sm btn-sm btn-primary add_office_phone">Add</button>
                    </div>
              </div>
          </div>
    </div>
    <input type="hidden" class="index" value="0">
</div>
<div class="office_address">
</div>
      <div class="col-md-12 col-sm-12 col-xs-12 form-group">
          <button type="button" id="add_office" class="btn btn-sm btn-sm btn-primary">Add More</button>
      <input type="hidden" id="office_detail_array" value="1">
      </div>
@else

<?php $office_detail_array=0; $ofc_index=0; ?>
@foreach($contact_person_office as $cpo)
<input type="hidden" value="{{$cpo->id}}" name="ofc_contact_id[]">
<div class="row clearfix office_contact_person_row">
  <div class="col-lg-11">
      <div class="col-md-3 col-sm-3 col-xs-10 form-group">
      <input type="text" name="office_contact_person_name[]" value="{{$cpo->person_name}}" class="form-control has-feedback-left office_contact_person_name" placeholder="Contact Person Name">
      </div>
      <div class="col-md-3 col-sm-3 col-xs-10 form-group">
          <input type="text" name="office_contact_person_post[]" value="{{$cpo->person_post}}" class="form-control has-feedback-left office_contact_person_post" placeholder="Enter Post">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_email">
          <?php $cpo_person_email=json_decode($cpo->person_email); 
          $cpo_person_phone=json_decode($cpo->person_phone);
          ?>
          @for($i=0;$i<sizeof($cpo_person_email);$i++)
          <div class="office_contact_person_email_div row">
                  <div class="col-xs-10 col-md-10 row">
                  <input type="email" value="{{$cpo_person_email[$i]}}" name="office_contact_person_email[{{$ofc_index}}][]" class="form-control has-feedback-left phone_email_input office_contact_person_email_in" placeholder="Enter email">
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-12 form-group">
                    <button type="button" class="btn btn-sm btn-sm btn-primary add_office_email" id="add_office_email">Add</button>
                  </div>
            </div>
            @endfor
        </div>
        <div class="col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_phone">
          @for($j=0;$j<sizeof($cpo_person_phone);$j++)
          <div class="office_contact_person_phone_div row">
                  <div class="col-xs-10 col-md-10 row">
                  <input type="text" value="{{$cpo_person_phone[$j]}}" name="office_contact_person_phone[{{$ofc_index}}][]" maxlength="10" class="form-control has-feedback-left phone_email_input office_contact_person_phone_in" placeholder="Contact Person Phone">
                  </div>
                  <div class="col-md-1 col-sm-1 col-xs-12 form-group">
                        <button type="button" class="btn btn-sm btn-sm btn-primary add_office_phone">Add</button>
                  </div>
                </div> 
            @endfor
          </div>
        </div>
  <input type="hidden" class="index" value="{{$ofc_index}}">
</div>
<?php $office_detail_array++;$ofc_index++; ?>
 @endforeach

      <div class="office_address">
      </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                <button type="button" id="add_office" class="btn btn-sm btn-sm btn-primary">Add More</button>
            <input type="hidden" id="office_detail_array" value="{{$office_detail_array}}">
            </div>
      @endif
      <div class="col-lg-6 form-group"> 
        <label for="office_address1">Office Address 1</label>              
          <textarea name="office_address1" rows="1" class="form-control has-feedback-left office_address1">{{$row->office_address1}}</textarea>
          <span class="text-danger">{{ $errors->first('office_address1') }}</span>
    </div>
    <div class="col-lg-6 form-group"> 
        <label for="office_address1">Office Address 2</label>              
          <textarea name="office_address2" rows="1" class="form-control has-feedback-left office_address2">{{$row->office_address2}}</textarea>
          <span class="text-danger">{{ $errors->first('office_address2') }}</span>
    </div>
    <div class="col-lg-3">             
        <select name="office_state" class="form-control select2" placeholder="Select State" id="office_state">
          <option value="">Select State</option>
          @foreach($states as $state)
          @if($state->state_id==$row->office_state)
          <option value="{{$state->state_id}}" selected>{{$state->name}}</option>
          @else
          <option value="{{$state->state_id}}">{{$state->name}}</option>
          @endif
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('office_state') }}</span>
      </div>
      <div class="col-lg-1"> 
          <label for="office_address1">City</label>  
       </div>  
       <div class="col-lg-3">     
          <select name="office_city" class="form-control select2"  id="office_city">
           <option value="">Select State First</option>
          @foreach($cities as $city)
          @if($city->city_id==$row->office_city)
          <option value="{{$city->city_id}}" selected>{{$city->city_name}}</option>
          @else
          <option value="{{$city->city_id}}">{{$city->city_name}}</option>
          @endif
          @endforeach
       </select>
       <span class="text-danger">{{ $errors->first('office_state') }}</span>
      </div>  
      <div class="col-lg-1"> 
          <label for="office_address1">Pincode</label>  
       </div>  
       <div class="col-lg-3">    
          <input type="text" name="office_pincode" id="office_pincode" class="form-control has-feedback-left office_pincode" value="{{$row->office_pincode}}"  placeholder="Pincode" maxlength="6">
          <span class="text-danger">{{ $errors->first('office_pincode') }}</span>
      </div>      
<!--------office Detail End------------------>
<!--------Branch Detail Start------------------>
<div class="col-xs-12">
  <p>
    <h4>Branch Address</h4>
  </p>
  <hr>
</div>
@if($branch_count==0)
<input type="hidden" value="0" name="brn_contact_id[]">
<div class="row clearfix branch_contact_person_row">
  <div class="col-lg-11">
    <div class="col-md-3 col-sm-3 col-xs-10 form-group">
    <input type="text" name="branch_contact_person_name[]" class="form-control has-feedback-left branch_contact_person_name1"  placeholder="Contact Person Name">
    </div>
    <div class="col-md-3 col-sm-3 col-xs-10 form-group">
      <input type="text" name="branch_contact_person_post[]" class="form-control has-feedback-left branch_contact_person_name1" placeholder="Enter post">
    </div>
    <div class="col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_email">
      <div class="branch_contact_person_email_div row">
        <div class="col-xs-10 col-md-10 row">
          <input type="email" name="branch_contact_person_email[0][]" class="form-control has-feedback-left phone_email_input branch_contact_person_email1" placeholder="Contact Person email">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-12 form-group">
          <button type="button" class="btn btn-sm btn-sm btn-primary add_branch_email">Add</button>
        </div>
  </div>                     
</div>
<div class="col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_phone">
  <div class="branch_contact_person_phone_div row">
    <div class="col-xs-10 col-md-10 row">
      <input type="text" name="branch_contact_person_phone[0][]" maxlength="10" class="form-control has-feedback-left phone_email_input branch_contact_person_phone1" placeholder="Contact Person Phone">
    </div>
    <div class="col-md-1 col-sm-1 col-xs-12 form-group">
      <button type="button" class="btn btn-sm btn-sm btn-primary add_branch_phone">Add</button>
    </div>
</div>
</div>
</div>
<input type="hidden" class="index" value="0">
</div>

@else
<?php $branch_detail_array=0; $brn_index=0; ?>
@foreach($contact_person_branch as $cpb)
<input type="hidden" value="{{$cpb->id}}" name="brn_contact_id[]">
   <div class="row clearfix branch_contact_person_row">
      <div class="col-lg-11">
        <div class="col-md-3 col-sm-3 col-xs-10 form-group">
        <input type="text" value="{{$cpb->person_name}}" name="branch_contact_person_name[]" class="form-control has-feedback-left branch_contact_person_name1"  placeholder="Contact Person Name">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-10 form-group">
          <input type="text" value="{{$cpb->person_post}}" name="branch_contact_person_post[]" class="form-control has-feedback-left branch_contact_person_name1" placeholder="Enter post">
        </div>
        <div class="col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_email">
          <?php $cpb_person_email=json_decode($cpb->person_email); 
          $cpb_person_phone=json_decode($cpb->person_phone);
          ?> 
          @for($i=0;$i<sizeof($cpb_person_email);$i++)
          <div class="branch_contact_person_email_div row">
              <div class="col-xs-10 col-md-10 row">
                <input type="email" value="{{$cpb_person_email[$i]}}" name="branch_contact_person_email[{{$brn_index}}][]" class="form-control has-feedback-left phone_email_input branch_contact_person_email1" placeholder="Contact Person email">
              </div>
              <div class="col-md-1 col-sm-1 col-xs-12 form-group">
                <button type="button" class="btn btn-sm btn-sm btn-primary add_branch_email">Add</button>
              </div>
          </div> 
          @endfor                    
    </div>
    <div class="col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_phone">
    
      @for($j=0;$j<sizeof($cpb_person_phone);$j++)
      <div class="branch_contact_person_phone_div row">
        <div class="col-xs-10 col-md-10 row">
          <input type="text" value="{{$cpb_person_phone[$j]}}" name="branch_contact_person_phone[{{$brn_index}}][]" maxlength="10" class="form-control has-feedback-left phone_email_input branch_contact_person_phone1" placeholder="Contact Person Phone">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-12 form-group">
          <button type="button" class="btn btn-sm btn-sm btn-primary add_branch_phone">Add</button>
        </div>
    </div>
    @endfor
  </div>
</div>
<?php $branch_detail_array++;$brn_index++; ?>
<input type="hidden" class="index" value="{{$brn_index}}">
</div>
@endforeach
<div class="branch_address">
</div>
    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
      <button type="button" id="add_branch" class="btn btn-sm btn-sm btn-primary">Add More</button>
    <input type="hidden" id="branch_size_array" value="{{$branch_detail_array}}">
    </div>
  @endif
    <div class="col-lg-6 form-group"> 
        <label for="branch_address1">branch Address 1</label>              
          <textarea name="branch_address1" rows="1" class="form-control has-feedback-left branch_address1">{{$row->branch_address1}}</textarea>
          <span class="text-danger">{{ $errors->first('branch_address1') }}</span>
    </div>
    <div class="col-lg-6 form-group"> 
        <label for="branch_address1">branch Address 2</label>              
          <textarea name="branch_address2" rows="1" class="form-control has-feedback-left branch_address2">{{$row->branch_address2}}</textarea>
          <span class="text-danger">{{ $errors->first('branch_address2') }}</span>
    </div>
      <div class="col-lg-1"> 
          <label for="branch_address1">State</label>  
       </div>  
       <div class="col-lg-3">             
        <select name="branch_state" class="form-control select2" placeholder="Select State" id="branch_state">
          <option>Select State</option>
          @foreach($states as $state)
              @if($state->state_id==$row->branch_state)
              <option value="{{$state->state_id}}" selected>{{$state->name}}</option>
              @else
              <option value="{{$state->state_id}}">{{$state->name}}</option>
              @endif
          @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('branch_state') }}</span>
      </div>
      <div class="col-lg-1"> 
          <label for="branch_address1">City</label>  
       </div>  
       <div class="col-lg-3">
       
          <select name="branch_city" class="form-control select2"  id="branch_city">
            <option>Select City</option>
            @foreach($cities as $city)
            @if($city->city_id==$row->branch_city)
            <option value="{{$city->city_id}}" selected>{{$city->city_name}}</option>
            @else
            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
            @endif
            @endforeach
       </select>
       <span class="text-danger">{{ $errors->first('branch_state') }}</span>
      </div>  
      <div class="col-lg-1"> 
          <label for="branch_address1">Pincode</label>  
       </div>  
       <div class="col-lg-3">    
          <input type="text" name="branch_pincode" id="branch_pincode" value="{{$row->branch_pincode}}" class="form-control has-feedback-left branch_pincode" value="{{old('branch_pincode')}}"  placeholder="Pincode" maxlength="6">
          <span class="text-danger">{{ $errors->first('branch_pincode') }}</span>
      </div>
      @endforeach
      <div class="col-md-3 col-sm-3 col-xs-12 col col-md-offset-9 col-lg-offset-9 form-group" style="padding-top:10px">
              <button type="submit" name="company_save" id="btnsave1"
                class="btn btn-success form-control col-md-12 ">Save &
                Next</button>
            </div>  
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
              '<input type="hidden" value="0" name="ofc_contact_id[]"><div class="row clearfix office_contact_person_row"><div class="col-lg-11"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="office_contact_person_name[]" class="form-control office_contact_person_name" placeholder="Contact Person Name"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="office_contact_person_post[]" class="form-control office_contact_person_post" placeholder="Enter Post"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_email"><div class="office_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="office_contact_person_email['+size+'][]" class="form-control office_contact_person_email_in phone_email_input" placeholder="Contact Person email"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_office_email">Add</button></div></div></div><div class=" col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_phone"><div class="office_contact_person_phone_div row"><div class="col-md-10 col-xs-10 row"><input type="text" name="office_contact_person_phone['+size+'][]" class="form-control office_contact_person_phone_in phone_email_input" placeholder="Contact Person Phone"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_office_phone">Add</button></div></div></div><input type="hidden" class="index" value="'+size+'"></div> <div class="col-lg-1"><button type="button" class="btn btn-sm btn-danger delete pull-right"><i class="fa fa-trash"></i></button></div></div>';

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
              '<div class="row clearfix office_contact_person_row"><div class="col-lg-11"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="office_contact_person_name[]" class="form-control office_contact_person_name" placeholder="Contact Person Name"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="office_contact_person_post[]" class="form-control office_contact_person_post" placeholder="Enter Post"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_email"><div class="office_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="office_contact_person_email['+i+']" class="form-control office_contact_person_email phone_email_input" placeholder="Contact Person email"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_office_email">Add</button></div></div></div><div class=" col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group office_contact_person_phone"><div class="office_contact_person_phone_div row"><div class="col-md-10 col-xs-10 row"><input type="text" name="office_contact_person_phone['+i+'][]" class="form-control office_contact_person_phone_in phone_email_input" placeholder="Contact Person Phone"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_office_phone">Add</button></div></div></div><input type="hidden" class="index" value="'+i+'"></div> <div class="col-lg-1"><button type="button" class="btn btn-sm btn-danger delete pull-right"><i class="fa fa-trash"></i></button></div></div>';
               
            
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
        '<div class="office_contact_person_phone_div row"><div class="col-xs-10 col-md-10 row"><input type="text" name="office_contact_person_phone['+index+'][]" class="form-control phone_phone_input" placeholder="Contact Person phone"></div><div class="col-md-1 col-sm-1 col-xs-1"><button type=" button" class="btn btn-sm btn-warning minus_phone"><i class="fa fa-trash"></i></button></div></div>'
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
              '<input type="text" value="0" name="brn_contact_id[]"><div class="row clearfix branch_contact_person_row"><div class="col-lg-11"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="branch_contact_person_name[]" class="form-control branch_contact_person_name" placeholder="Contact Person Name"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="branch_contact_person_post[]" class="form-control branch_contact_person_post" placeholder="Enter Post"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_email"><div class="branch_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="branch_contact_person_email['+size+'][]" class="form-control branch_contact_person_email_in phone_email_input" placeholder="Contact Person email"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_branch_email">Add</button></div></div></div><div class=" col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_phone"><div class="branch_contact_person_phone_div row"><div class="col-md-10 col-xs-10 row"><input type="text" name="branch_contact_person_phone['+size+'][]" class="form-control branch_contact_person_phone_in phone_email_input" placeholder="Contact Person Phone"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_branch_phone">Add</button></div></div></div><input type="hidden" class="index" value="'+size+'"></div> <div class="col-lg-1"><button type="button" class="btn btn-sm btn-danger branch_delete pull-right"><i class="fa fa-trash"></i></button></div></div>';

            $('.branch_address').append(content);
          

            $('#branch_size_array').val(size+1)
          });
 
    
    
      
    $(document).on('click', '.branch_delete', function () {

      var size = parseInt($('#branch_size_array').val());
    
      $(this).closest('.branch_contact_person_row').remove();
      $('#branch_size_array').val(size - 1)
      var size = parseInt($('#branch_size_array').val());
            var content='';
            for(var i=1;i<size;i++)
            {
             
              content+=
              '<div class="row clearfix branch_contact_person_row"><div class="col-lg-11"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="branch_contact_person_name[]" class="form-control branch_contact_person_name" placeholder="Contact Person Name"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group"><input type="text" name="branch_contact_person_post[]" class="form-control branch_contact_person_post" placeholder="Enter Post"><span class="error" aria-hidden="true"></span></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_email"><div class="branch_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="branch_contact_person_email['+i+'][]" class="form-control branch_contact_person_email_in phone_email_input" placeholder="Contact Person email"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_branch_email">Add</button></div></div></div><div class=" col-lg-3 col-md-3 col-sm-3 col-xs-10 form-group branch_contact_person_phone"><div class="branch_contact_person_phone_div row"><div class="col-md-10 col-xs-10 row"><input type="text" name="branch_contact_person_phone['+i+'][]" class="form-control branch_contact_person_phone_in phone_email_input" placeholder="Contact Person Phone"><span class="error" aria-hidden="true"></span></div><div class="col-md-1 col-sm-1 col-xs-12 form-group"><button type="button" class="btn btn-sm btn-sm btn-primary add_branch_phone">Add</button></div></div></div><input type="hidden" class="index" value="'+i+'"></div> <div class="col-lg-1"><button type="button" class="btn btn-sm btn-danger branch_delete pull-right"><i class="fa fa-trash"></i></button></div></div>';
               
            
            }
            $('.branch_address').empty();
            $('.branch_address').append(content);
    });

    $(document).on('click', '.add_branch_email', function (e) {
          e.preventDefault();
          var index = parseInt($(this).closest('.branch_contact_person_row').find('.index').val());
          $(this).closest('div.branch_contact_person_row').find('.branch_contact_person_email').append(
            '<div class="branch_contact_person_email_div row"><div class="col-xs-10 col-md-10 row"><input type="email" name="branch_contact_person_email['+index+'][]" class="form-control branch_contact_person_email1 phone_email_input" placeholder="Contact Person email"></div><div class="col-md-1 col-sm-1 col-xs-1"><button type=" button" class="btn btn-sm btn-warning minus_branch_email"><i class="fa fa-trash"></i></button></div></div>'
          );
    });

    $(document).on('click', '.minus_branch_email', function (e) {
            e.preventDefault();
            $(this).closest('.branch_contact_person_email_div').remove();
    });

    $(document).on('click', '.add_branch_phone', function (e) {
              e.preventDefault();
              var index = parseInt($(this).closest('.branch_contact_person_row').find('.index').val());
              $(this).closest('div.branch_contact_person_row').find('.branch_contact_person_phone').append(
                '<div class="branch_contact_person_phone_div row"><div class="col-xs-10 col-md-10 row"><input type="text" name="branch_contact_person_phone['+index+'][]" class="form-control branch_contact_person_phone1 phone_phone_input" placeholder="Contact Person phone"></div><div class="col-md-1 col-sm-1 col-xs-1"><button type=" button" class="btn btn-sm btn-warning minus_branch_phone"><i class="fa fa-trash"></i></button></div></div>'
              );
    });

    $(document).on('click', '.minus_branch_phone', function (e) {
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
      $("#office_state").change(function () {
    var state=$(this).val()
        $.ajax({
              type: 'POST',
              url: 'get_city',
              data: {
                id :state ,
               
              },
              success: function (data) {
                $("#office_city").select2({
                placeholder: "Select City",
                allowClear: true
                });
               $('#office_city').html(data);
              
              },
          
              error:function(data) {
                console.log(data);
              }
          });
       
          });
          $("#branch_state").change(function () {
    var state=$(this).val()
        $.ajax({
              type: 'POST',
              url: 'get_city',
              data: {
                id :state ,
               
              },
              success: function (data) {
                $("#branch_city").select2({
                placeholder: "Select City",
                allowClear: true
                });
               $('#branch_city').html(data);
              
              },
          
              error:function(data) {
                console.log(data);
              }
          });
       
          });
    $("#same_address").change(function() {
    
          if(this.checked) {
            var company_id=$('.company_id').val();
       
            $.ajax({
              type: 'POST',
              url: 'get_prev_addr',
              data: {
                company_id :company_id ,
               
              },
              success: function (data) {

              var res=JSON.parse(data)
              console.log(data);
              $('.office_address1').val(res.office_address1);
              $('.office_address2').val(res.office_address2);
              $('#office_state').val(res.office_state);
              $('#office_city').html(res.office_city);
              $('#office_pincode').val(res.office_pincode);
              },
          
              error:function(data) {
                console.log(data);
              }
          });
          }
          else{
         
          }
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