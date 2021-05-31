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
 #select2-state-container
    {
      width:250px;
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
 
    @if(session('success'))
    <div class="msg alert alert-success">
   		<h4>{{session('msg')}}</h4>
    </div> 
  @endif

   @if(session('failure'))
    <div class="msg alert alert-danger">
   		<h4>{{session('msg')}}</h4>
    </div> 
  @endif
 <div class="row">
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
    <li><a href="terms_and_conditions-{{$company_id}}">Terms & Conditions</a></li>
    <li><a href="company_user_detail-{{$company_id}}">User Detail</a></li>
    <li><a href="company_vecancy_detail-{{$company_id}}">Company Vecancy</a></li>
    
  </ul>
  @endif

    <!-- contact form -->
    <div class="col-md-12 myformdiv">

        <div class="col-xs-12">
        
            <p>
              <h4>Company Detail</h4>
              <hr>
            </p>
           
          </div>

         
        <form name="companyform" id="companyform" action="{{$action}}" class="contact-form" method="post"
              enctype="multipart/form-data">
              {{csrf_field()}}
            @if($company_detail=="")
               <div class="col-xs-12">
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Company Name</label>
                  <input type="text" name="company_name" id="company_name" class="form-control has-feedback-left company_name" value="{{old('company_name')}}" placeholder="Company Name">
                           <span class="text-danger">{{ $errors->first('company_name') }}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Company Contact No</label>
                      <input type="text" name="company_contact_no" id="company_contact_no" class="form-control has-feedback-left contact_no" value="{{old('company_contact_no')}}" placeholder="Contact Number">
                           <span class="text-danger">{{ $errors->first('company_contact_no') }}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Company Email</label>
                      <input type="text" name="company_email" id="company_email" class="form-control has-feedback-left company_email"  value="{{old('company_email')}}" placeholder="Company Email">
                      <span class="text-danger">{{ $errors->first('company_email') }}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Company Website</label>
                      <input type="text" name="company_web" id="company_web" class="form-control has-feedback-left website_url" value="{{old('company_web')}}" placeholder="Website URL">
                      <span class="text-danger">{{ $errors->first('company_web') }}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Industry</label>
                      <input type="text" name="industry" id="industry" class="form-control has-feedback-left industry" value="{{old('industry')}}" placeholder="Enter Industry">
                      <span class="text-danger">{{ $errors->first('industry') }}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Company Type</label>
                      <input type="text" name="company_type" id="company_type" class="form-control has-feedback-left company_type" value="{{old('company_type')}}" placeholder="Company Type">
                      <span class="text-danger">{{ $errors->first('company_type') }}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">No of Employee</label>
                      <input type="text" name="employee_no" id="employee_no" class="form-control has-feedback-left employee_no" value="{{old('employee_no')}}" placeholder="No. Employee">
                      <span class="text-danger">{{ $errors->first('employee_no') }}</span>
                  </div>         
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Turnover</label>
                      <input type="text" name="turnover" class="form-control has-feedback-left turnover" value="{{old('turnover')}}" placeholder="Turnover" id="turnover">
                      <span class="text-danger">{{ $errors->first('turnover') }}</span>
                  </div>  
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Establish Year</label>
                      <select class="form-control has-feedback-left establish_year" id="establish_year"  name="establish_year" placeholder="establish_year">
                          <option value="">Select Establish Year</option>
                          @for($year=1900; $year <= 2020; $year++)
                          <option value="<?=$year;?>"><?=$year;?></option>
                          @endfor
                        </select>                 
                        <span class="error" aria-hidden="true">{{$errors->first('establish_year')}}</span>
                  </div>   
                  <div class="col-lg-9 col-sm-12 col-xs-12 col-md-8 form-group">
                    
                      <label for="GST number">Products Of Company</label>
                      <textarea name="products_of_co" id="products_of_co" class="form-control has-feedback-left product" rows="1"  placeholder="Products of Co.">{{old('products_of_co')}}</textarea>
                       <span class="text-danger">{{ $errors->first('products_of_co') }}</span>
                  </div>           
                  <div class="col-lg-6 form-group">  
                       <label for="GST number">Address Line 1</label>             
                       <textarea  name="company_address1" rows="1" id="company_address1" class="form-control has-feedback-left company_address1">{{old('company_address1')}}</textarea>
                       <span class="text-danger">{{ $errors->first('company_address1') }}</span>
                    </div>
                    <div class="col-lg-6 form-group">  
                        <label for="GST number">Address Line 2(optional)</label>             
                        <textarea  name="company_address2" rows="1" id="company_address2" class="form-control has-feedback-left company_address2" >{{old('company_address2')}}</textarea>
                        <span class="text-danger">{{ $errors->first('company_address2') }}</span>
                     </div>
                   
                    <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                        <label for="company_state">State</label>
                        <select name="company_state" class="form-control select2" placeholder="Select State" id="company_state">
                            <option value="">Select State</option>
                            @foreach($states as $state)
                            <option value="{{$state->state_id}}">{{$state->name}}</option>  
                            @endforeach
                          </select>
                        <span class="text-danger">{{ $errors->first('company_state') }}</span>
                    </div>
                    <div class="col-lg-3 col-sm-11 col-xs-11 col-md-3 form-group">
                        <label for="City">City</label>
                        <select name="company_city" class="form-control select2"  id="company_city">
                            <option value="">Select State First</option>
                         </select>
                        <span class="text-danger">{{ $errors->first('company_city') }}</span>
                    </div>
                    <div class="col-lg-1 col-sm-1 col-xs-1 col-md-1 form-group">
                      <label for="City"></label>
                      <button type="button" data-toggle="modal" data-target="#exampleModal"  data-placement="top" title="Add more city" class="form-control btn btn-warning">+</button>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                        <label for="company_pincode">company_Pincode</label>
                        <input type="text" name="company_pincode" id="company_pincode" class="form-control has-feedback-left company_pincode" value="{{old('company_pincode')}}"  placeholder="Pincode" maxlength="6">
                        <span class="text-danger">{{ $errors->first('company_pincode') }}</span>
                    </div>         
                 
              </div><br>
                <div class="col-xs-12">
                <p>
                  <h4>Owner Detail</h4>
                  <hr>
                </p>
              </div>

              <div class="col-lg-12">
                  <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                   <label for="GST number">Owner Name</label>
                  <input type="text" name="owner_name" id="owner_name" class="form-control has-feedback-left owner_name" value="{{old('owner_name')}}" placeholder="Owner Name">
                   <span class="text-danger">{{ $errors->first('owner_name') }}</span>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Owner Email</label>
                  <input type="text" name="owner_email" id="owner_email" class="form-control has-feedback-left owner_email"  value="{{old('owner_email')}}" placeholder="Email">
                  <span class="text-danger">{{ $errors->first('owner_email') }}</span>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Owner Phone</label>
                  <input type="text" name="owner_phone"  maxlength="10" class="form-control has-feedback-left owner_phone" value="{{old('owner_phone')}}" placeholder="Mobile Number" id="owner_phone">
                 <span class="text-danger">{{ $errors->first('owner_phone') }}</span>
                </div>
              </div>          
             
                 <div class="col-md-3 col-sm-3 col-xs-12 col col-md-offset-9 col-lg-offset-9 form-group">
                <button type="submit" name="company_save" id="btnsave1"
                  class="btn btn-success form-control col-md-12 ">Save &
                  Next</button>
              </div>  
              @else
              @foreach($company_detail as $row)
              <input type="hidden" name="company_id" id="company_id" value="{{$row->company_id}}" class="form-control has-feedback-left company_id"  placeholder="Company Name">
              <div class="col-xs-12">
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Company Name</label>
                <input type="text" value="{{$row->company_name}}" name="company_name" id="company_name" class="form-control has-feedback-left company_name" value="{{old('company_name')}}" placeholder="Company Name">
                         <span class="text-danger">{{ $errors->first('company_name') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Company Contact No</label>
                    <input type="text" value="{{$row->company_contact_no}}" name="company_contact_no" id="company_contact_no" class="form-control has-feedback-left contact_no" value="{{old('company_contact_no')}}" placeholder="Contact Number">
                         <span class="text-danger">{{ $errors->first('company_contact_no') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Company Email</label>
                    <input type="text" value="{{$row->company_email}}" name="company_email" id="company_email" class="form-control has-feedback-left company_email"  value="{{old('company_email')}}" placeholder="Company Email">
                    <span class="text-danger">{{ $errors->first('company_email') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Company Website</label>
                    <input type="text" value="{{$row->company_web}}" name="company_web" id="company_web" class="form-control has-feedback-left website_url" value="{{old('company_web')}}" placeholder="Website URL">
                    <span class="text-danger">{{ $errors->first('company_web') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Industry</label>
                    <input type="text" name="industry" value="{{$row->industry}}" id="industry" class="form-control has-feedback-left industry" value="{{old('industry')}}" placeholder="Enter Industry">
                    <span class="text-danger">{{ $errors->first('industry') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Company Type</label>
                    <input type="text" name="company_type" value="{{$row->company_type}}" id="company_type" class="form-control has-feedback-left company_type" value="{{old('company_type')}}" placeholder="Company Type">
                    <span class="text-danger">{{ $errors->first('company_type') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">No of Employee</label>
                    <input type="text" name="employee_no" value="{{$row->employee_no}}" id="employee_no" class="form-control has-feedback-left employee_no" value="{{old('employee_no')}}" placeholder="No. Employee">
                    <span class="text-danger">{{ $errors->first('employee_no') }}</span>
                </div>         
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Turnover</label>
                    <input type="text" value="{{$row->turnover}}"  name="turnover" class="form-control has-feedback-left turnover" value="{{old('turnover')}}" placeholder="Turnover" id="turnover">
                    <span class="text-danger">{{ $errors->first('turnover') }}</span>
                </div>  
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                    <label for="GST number">Establish Year</label>
                    <select class="form-control has-feedback-left establish_year" id="establish_year"  name="establish_year" placeholder="establish_year">
                        <option value="">Select Establish Year</option>
                        @for($year=1900; $year <= 2020; $year++)
                          @if($row->establish_year==$year)
                          <option value="<?=$year;?>" selected><?=$year;?></option>
                          @else
                        <option value="<?=$year;?>"><?=$year;?></option>
                        @endif
                        @endfor
                      </select>                 
                      <span class="error" aria-hidden="true">{{$errors->first('establish_year')}}</span>
                </div>   
                <div class="col-lg-9 col-sm-12 col-xs-12 col-md-8 form-group">
                  <label for="GST number">Products Of Company</label>
                    <textarea name="products_of_co" id="products_of_co" class="form-control  product" rows="1"  placeholder="Products of Co."> {{$row->products_of_co}}</textarea>
                     <span class="text-danger">{{ $errors->first('products_of_co') }}</span>
                </div>  
                      
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 form-group">  
                     <label for="GST number">Address Line 1</label>             
                     <textarea  name="company_address1" rows="1" id="company_address1" class="form-control  company_address1">{{$row->company_address1}}</textarea>
                     <span class="text-danger">{{ $errors->first('company_address1') }}</span>
                  </div>
                  <div class="col-lg-6 col-md-6  col-sm-6 col-xs-6 form-group">  
                      <label for="GST number">Address Line 2(optional)</label>             
                      <textarea  name="company_address2" rows="1" id="company_address2" class="form-control  company_address2" >{{$row->company_address2}}</textarea>
                      <span class="text-danger">{{ $errors->first('company_address2') }}</span>
                   </div>
                   
                 
                  <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="company_state">State</label>
                      <select name="company_state" class="form-control select2" placeholder="Select State" id="company_state">
                          <option value="">Select State</option>
                          @foreach($states as $state)
                          @if($state->state_id==$row->company_state)
                          <option value="{{$state->state_id}}" selected>{{$state->name}}</option>
                          @else
                          <option value="{{$state->state_id}}">{{$state->name}}</option>
                          @endif
                          @endforeach
                        </select>
                      <span class="text-danger">{{ $errors->first('company_state') }}</span>
                  </div>
                  <div class="col-lg-3 col-sm-11 col-xs-11 col-md-3 form-group">
                      <label for="City">City</label>
                      <select name="company_city" class="form-control select2"  id="company_city">
                          <option value="">Select State First</option>
                          @foreach($cities as $city)
                          @if($city->city_id==$row->company_city)
                          <option value="{{$city->city_id}}" selected>{{$city->city_name}}</option>
                          @else
                          <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                          @endif
                          @endforeach
                       </select>
                      <span class="text-danger">{{ $errors->first('company_city') }}</span>
                  </div>
                  <div class="col-lg-1 col-sm-1 col-xs-1 col-md-1 form-group">
                    <label for="City"></label>
                    <button type="button" data-toggle="modal" data-target="#exampleModal"  data-placement="top" title="Add more city" class="form-control btn btn-warning">+</button>
                  </div>
                  <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="company_pincode">company_Pincode</label>
                  <input type="text" value="{{$row->company_pincode}}" name="company_pincode" id="company_pincode" class="form-control has-feedback-left company_pincode" value="{{old('company_pincode')}}"  placeholder="Pincode" maxlength="6">
                      <span class="text-danger">{{ $errors->first('company_pincode') }}</span>
                  </div>         
               
            </div><br>
              <div class="col-xs-12">
              <p>
                <h4>Owner Detail</h4>
                <hr>
              </p>
            </div>

            <div class="col-lg-12">
                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                 <label for="GST number">Owner Name</label>
                <input type="text" name="owner_name" value="{{$row->owner_name}}" id="owner_name" class="form-control has-feedback-left owner_name" value="{{old('owner_name')}}" placeholder="Owner Name">
                 <span class="text-danger">{{ $errors->first('owner_name') }}</span>
              </div>

              <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                  <label for="GST number">Owner Email</label>
                <input type="text" name="owner_email"  value="{{$row->owner_email}}" id="owner_email" class="form-control has-feedback-left owner_email"  value="{{old('owner_email')}}" placeholder="Email">
                <span class="text-danger">{{ $errors->first('owner_email') }}</span>
              </div>

              <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                  <label for="GST number">Owner Phone</label>
                <input type="text" name="owner_phone" value="{{$row->owner_phone}}"  maxlength="10" class="form-control has-feedback-left owner_phone" value="{{old('owner_phone')}}" placeholder="Mobile Number" id="owner_phone">
               <span class="text-danger">{{ $errors->first('owner_phone') }}</span>
              </div>
            </div>          
           
               <div class="col-md-3 col-sm-3 col-xs-12 col col-md-offset-9 col-lg-offset-9 form-group">
              <button type="submit" name="company_save" id="btnsave1"
                class="btn btn-success form-control col-md-12 ">Save &
                Next</button>
            </div>  
              @endforeach
              @endif
            </form>
          </div>    

      

      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Add More city</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
              <label for="State">State</label>
              <select name="state" class="form-control select2" placeholder="Select State" id="state">
                <option value="">Select State</option>
                @foreach($states as $state)
                <option value="{{$state->state_id}}">{{$state->name}}</option>  
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label for="State">City</label>
                <input type="text" name="city" id="city" class="form-control city">
              </div>
           
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary  save_city">Save changes</button>
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
$('.select2').select2();

$("#company_state").select2({
 placeholder: "Select StatusState",
 allowClear: true
});
$("#state").select2({
 placeholder: "Select State here",
 
 allowClear: true
});
$(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
$("#company_state").change(function () {

       
       
        var state=$(this).val()
        $.ajax({
              type: 'POST',
              url: 'get_city',
              data: {
                id :state ,
               
              },
              success: function (data) {
                $("#company_city").select2({
                placeholder: "Select City",
                allowClear: true
                });
               $('#company_city').html(data);
              
              },
          
              error:function(data) {
                console.log(data);
              }
          });
        
          });
          $(".save_city").click(function () {
           
            var state=$('#state').val();
            var city=$('#city').val();
           if(state=='')
           {
             alert('please select state first');
           }
          else if(city=='')
           {
             alert('please insert city name');
           }
           else
           {
              $.ajax({
                    type: 'POST',
                    url: 'add_city',
                    data: {
                      state :state,
                      city :city,
                    },
                    success: function (data) {
                      console.log(data);
                      $('#company_state').val('').trigger("change");
                      $('#state').val('').trigger("change");
                      $('#city').val('');
                      $('#exampleModal').modal('hide');
                   
                    },
                    error:function(data) {
                      console.log(data);
                    }
                });
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