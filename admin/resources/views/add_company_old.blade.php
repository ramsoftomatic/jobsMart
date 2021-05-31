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
    <!-- <small>Control panel</small> -->
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Register Company</li>
  </ol> -->
</section>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="content">
  @if(session('success'))
  <div class="msg alert alert-success">
    <h4>{{session('success')}}</h4>
  </div>
  @endif

  @if(session('failure'))
  <div class="msg alert alert-danger">
    <h3>
      <center>{{session('failure')}}</center>
    </h3>
  </div>
  @endif
  <div class="row">
    <!-- contact form -->
    <div class="col-md-12 myformdiv">
      <div class="col-md-12">
        <!-- Custom Tabs (Pulled to the right) -->
        <ul class="nav nav-tabs pull-left">
          <li class="active"><a href="#company_detail" data-toggle="tab" disabled="true">Company Detail</a></li>
          <li><a href="#contact_detail" data-toggle="tab" disabled="true">Contact Detail</a></li>
          <li><a href="#user_detail" data-toggle="tab" disable="true">User Details</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="company_detail">
            <form name="companyform" id="companyform" action="add_company" class="contact-form" method="post"
              enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="col-xs-12">
                <p>
                  <h4>Company Detail</h4>
                </p>
              </div>
              <div class="col-xs-12">
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="company_name" id="company_name" class="form-control has-feedback-left company_name"
                    placeholder="Company Name">
                  <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                 
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="mobile" id="mobile" maxlength="10" class="form-control has-feedback-left contact_no"
                    placeholder="Contact Number">
                  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('mobile') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="company_email" id="company_email" class="form-control has-feedback-left company_email"
                    placeholder="Company Email">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="website_url" class="form-control has-feedback-left website_url"
                    placeholder="Website URL">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('website') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="gst" class="fa fa-tag form-control has-feedback-left gst_no"
                    placeholder="GST Number">
                  <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('gst') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="charges" class="form-control has-feedback-left charges"
                    placeholder="Service Charges">
                  <span class="fa fa-inr form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('charges') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="employee_no" class="form-control has-feedback-left empoyee_no"
                    placeholder="No. Employee">
                  <span class="fa fa-users form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('employee_no') }}</span>
                </div>             
                <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback employee_user">
                  <select class="form-control has-feedback-left establish_year" id="establish_year" name="establish_year" placeholder="establish_year">
                    <option value="">Select Establish Year</option>
                    @for($year=1900; $year <= 2020; $year++)
                    <option value="<?=$year;?>"><?=$year;?></option>
                    @endfor
                  </select>                 
                  <span class="error" aria-hidden="true">{{$errors->first('establish_year')}}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="turnover" class="form-control has-feedback-left turnover"
                    placeholder="Turnover">
                  <span class="fa fa-inr form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('turnover') }}</span>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 form-group has-feedback employee_user">
                  <select class="form-control has-feedback-left placement" id="placement" name="placement_policy"
                    placeholder="Placement Policy">
                    <option value="">Select Placement Policy</option>
                    @foreach ($placement_policy as $policy)
                    <option value="{{$policy->placement_id}}">{{$policy->name}}</option>
                    @endforeach
                  </select>
                  <span class="error" aria-hidden="true">{{$errors->first('placement')}}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="branches" class="form-control has-feedback-left branches"
                    placeholder="Branches (If Any)">
                  <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('branches') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="industry" class="form-control has-feedback-left industry"
                    placeholder="Enter Industry">
                  <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('indusrty') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <textarea name="special_remark" class="form-control has-feedback-left special_remark"
                    placeholder="Special Remark"></textarea>
                  <span class="fa fa-comments-o form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('special_remark') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                  <textarea name="products_of_co" class="form-control has-feedback-left product"
                    placeholder="Products of Co."></textarea>
                  <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('products_of_co') }}</span>
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
                  <input type="file" name="firm" id="firm" class="form-control has-feedback-left firm"
                    placeholder="Upload Company firm" title="Upload Form Of Firm">
                  <p class="help-block">Upload Form Of Firm Here </p>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('firm') }}</span>                  
                </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
                  <input type="file" name="logo" id="logo" class="form-control has-feedback-left logo"
                    placeholder="Upload Company Logo" title="Upload logo">
                  <p class="help-block">Upload Company Logo Here </p>
                  <span class="text-danger">{{ $errors->first('logo') }}</span>
                  <span class="error" aria-hidden="true"></span>
                </div>
                <div class="col-lg-8 col-sm-12 col-xs-12 col-md-6 form-group">
                  <textarea name="payment_term" class="form-control has-feedback-left paymenterm" rows="2"
                    placeholder="Payment terms"></textarea>
                  <span class="form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('paymenterm') }}</span>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-6">
                  <input type="file" name="payment_termlink" id="pay_term" class="form-control has-feedback-left pay_term"
                    placeholder="Upload Payment Terms" title="Upload Payment Term">
                  <p class="help-block">Upload Payment Term Here(If Any) </p>
                  <span class="text-danger">{{ $errors->first('pay_term') }}</span>
                  <span class="error" aria-hidden="true"></span>
                </div>
         


      
              <div class="col-md-3 col-sm-3 col-xs-12 col col-md-offset-9 col-lg-offset-9 form-group">
                <button type="submit" name="company_save" id="btnsave"
                  class="btn btn-primary form-control col-md-12 ">Save &
                  Next</button>
              </div>
          </div>
          </form>
        </div>

          <!-- /.tab-pane -->
          <div class="tab-pane" id="contact_detail">
            <form name="contactform" id="contactform" action="update_company" class="contact-form" method="post">
              <input type="hidden" id="company_id1" name="company_id" value="">
              <div class="col-xs-12">
                <p>
                  <h4>Address</h4>
                </p>
              </div>

              <div class="col-lg-12">
                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-6 form-group">
                  <input type="text" name="bulding" class="form-control has-feedback-left bulding"
                    placeholder="Bulding">
                  <span class="fa fa-address-card-o form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('bulding') }}</span>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-6 form-group">
                  <input type="text" name="landmark" class="form-control has-feedback-left landmark"
                    placeholder="Landmark">
                  <span class="fa fa-address-card-o form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('landmark') }}</span>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="location" class="form-control has-feedback-left location"
                    placeholder="Location">
                  <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('Location') }}</span>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="number" name="pincode" class="form-control has-feedback-left pincode"
                    placeholder="Pincode">
                  <span class="fa fa-address-card-o form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('pincode') }}</span>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback employee_user">
                  <select class="form-control has-feedback-left state" id="state" name="state" placeholder="State">
                    <option value="">Select State</option>
                    @foreach($states as $stat)
                    <option value="{{$stat->state_id}}">{{$stat->name}}</option>
                    @endforeach
                  </select>
                  <span class="error" aria-hidden="true">{{$errors->first('state')}}</span>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback employee_user">
                  <select class="form-control has-feedback-left city" id="city" name="city" placeholder="Select City">
                    <option value="">Select city</option>
                  </select>
                  <span class="error" aria-hidden="true">{{$errors->first('city')}}</span>
                </div>
              </div>

              <div class="col-xs-12">
                <p>
                  <h4>Owner Detail</h4>
                </p>
              </div>

              <div class="col-lg-12">
                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="owner_name" class="form-control has-feedback-left owner_name"
                    placeholder="Owner Name">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('owner_name') }}</span>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="text" name="owner_email" class="form-control has-feedback-left owner_email"
                    placeholder="Email">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>

                <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                  <input type="number" name="owner_phone"  maxlength="10" class="form-control has-feedback-left owner_phone"
                    placeholder="Mobile Number">
                  <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                  <span class="error" aria-hidden="true"></span>
                  <span class="text-danger">{{ $errors->first('owner_phone') }}</span>
                </div>
              </div>

              <div class="col-xs-12">
                <p>
                  <h4>Contact Person Detail</h4>
                </p>
              </div>

              <div class="contact_person">
                <div class="row clearfix contact_person_row">
                  <div class="col-lg-11">
                    <div class="col-md-4 col-sm-4 col-xs-10 form-group">
                      <input type="text" name="contact_person_name[]"
                        class="form-control has-feedback-left contact_person_name1" placeholder="Contact Person Name">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      <span class="text-danger">{{ $errors->first('contact_person_name[]') }}</span>
                      <span class="error" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-10 form-group contact_person_email">
                      <div class="contact_person_email_div row">
                        <div class="col-xs-10 col-md-11 row">
                          <input type="email" name="contact_person_email[]"
                            class="form-control has-feedback-left phone_email_input contact_person_email1"
                            placeholder="Contact Person email">
                          <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                          <span class="text-danger">{{$errors->first('contact_person_email[][]')}}</span>
                          <span class="error" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-10 form-group contact_person_phone">
                      <div class="contact_person_phone_div row">
                        <div class="col-xs-10 col-md-11 row">
                          <input type="text" name="contact_person_phone[]" maxlength="10"
                            class="form-control has-feedback-left phone_email_input contact_person_phone1"
                            placeholder="Contact Person Phone">
                          <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                          <span class="text-danger">{{$errors->first('contact_person_phone[][]')}}</span>
                          <span class="error" aria-hidden="true"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" class="index" value="0">
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 form-group">
                <button type="button" id="add" class="btn btn-sm btn-sm btn-primary">Add More</button>
                <input type="hidden" id="size_array" value="1">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 col col-md-offset-9 col-lg-offset-9 form-group">
                <button type="submit" id="btnsave1" name="contact_save"
                  class="btn btn-primary form-control col-md-4 ">Save & Next</button>
              </div>
            </form>
          </div>

          <!-- /.tab-pane -->
          <div class="tab-pane" id="user_detail">
            <form name="userform" id="userform" class="contact-form" method="post" action="create_user">
            {{csrf_field()}}
              <input type="hidden" id="company_id2" name="company_id" value="">
              <div class="ln_solid"></div>
              <div class="col-xs-12">
                <p>
                  <h4>User Detail</h4>
                </p>
              </div>

              <div class="login_user_div">
                <div class="login_user row">
                  <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="text" name="user_name[]" class="form-control has-feedback-left user_name"
                      placeholder="Name">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    <span class="text-danger">{{$errors->first('user_name[]')}}</span>
                    <span class="error" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="email" name="user_email[]" class="form-control has-feedback-left user_email"
                      placeholder="Email">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                    <span class="text-danger">{{$errors->first('user_email[]')}}</span>
                    <span class="error" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="text" name="user_phone[]" maxlength="10" class="form-control has-feedback-left user_phone"
                      placeholder="Phone No">
                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    <span class="text-danger">{{$errors->first('user_phone[]')}}</span>
                    <span class="error" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="text" name="username[]" class="form-control has-feedback-left username"
                      placeholder="Username" readonly>
                    <span class="fa fa-user-o form-control-feedback left" aria-hidden="true"></span>
                    <span class="text-danger">{{$errors->first('username[]')}}</span>
                    <span class="error" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                    <input type="password" name="password[]" class="form-control has-feedback-right password"
                      placeholder="Password" value="1234">
                    <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                    <span class="text-danger">{{$errors->first('password[]')}}</span>
                    <span class="error" aria-hidden="true"></span>
                  </div>
                </div>
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
          <!-- /Row -->
        </div>
        <!-- /.tab-pane -->

  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- END CUSTOM TABS -->



  <!-- </div> -->
  <!-- Row -->
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
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.datepicker').datepicker({
      format: 'YYYY-MM-DD'
    });
    $('.select2').select2();
    $(':input').keypress(function() {
    $(this).next(':input').focus();});

   


    // $("#state").select2({
    //   placeholder: "Select State   ",
    //   allowClear: true,
    // });
    // $("#city").select2({
    //   placeholder: "Select City",
    //   allowClear: true,
    // });

    // $(".gender").select2({
    //   placeholder: "Select Gender",
    //   allowClear: true
    // });
    // $(".high_edu_course_type").select2({
    //   placeholder: "Select Highest Education Course Type",
    //   allowClear: true
    // });

    $('.date').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    //Date picker
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    $('#state').change(function () {   
      if ($(this).val() != '') {
        //alert('hi');
        $.ajax({
          type: 'POST',
          url: 'get_city',
          data: {
            _token: "{{ csrf_token() }}",
            id: $(this).val()
          },
          success: function (data) {
            $('#city').html(data);
          }
        });
      }
    });

    ///////////////////////////Geetanjali///////////////////////////////////
    /////////////save and next Button/////////////////////////////////
    // $('#btnsave').click(function () {
    //   $('.nav-tabs > .active').next('li').find('a').trigger('click');
    // });
    // $('#btnsave1').click(function () {
    //   $('.nav-tabs > .active').next('li').find('a').trigger('click');
    // });
    function validateCompanyForm()
    {
      var isvalid=true;
      if ($('.company_name').val() == ''){
        $('.company_name').closest('div').find('span.error').html('This field is required');
        $('.company_name').focus();
        isvalid = false;
      }else {
            var numericReg =/^[a-zA-Z\s]+$/;
            if (!numericReg.test($('.company_name').val())){
              $('.company_name').closest('div').find('span.error').html('Invalid company name');
              $('.company_name').focus();
              isvalid = false;
            }else {
        $('.company_name').closest('div').find('span.error').html('');
         }
      }

      if ($('.contact_no').val() == '') {
        $('.contact_no').closest('div').find('span.error').html('This field is required');
        $('.contact_no').focus();
        isvalid = false;
      }else {
            var numericReg = /^[0-9]{10}$/;
            if (!numericReg.test($('.contact_no').val())) {
              $('.contact_no').closest('div').find('span.error').html('Invalid mobile number');
              $('.contact_no').focus();
              isvalid = false;
            }
       else {
        $('.contact_no').closest('div').find('span.error').html('');
      }
      }

      if($('.company_email').val() == ''){
          $('.company_email').closest('div').find('span.error').html('This field is required');
          $('.company_email').focus();
          isvalid = false;
      }else {
            var numericReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!numericReg.test($('.company_email').val())) {
              $('.company_email').closest('div').find('span.error').html('Invalid Email Id');
              $('.company_email').focus();
              isvalid = false;
            }else{
        $('.company_email').closest('div').find('span.error').html('');
        }
      }

      if ($('.website_url').val() == '') {
        $('.website_url').closest('div').find('span.error').html('This field is required');
        $('.website_url').focus();
        isvalid = false;
      }else {
            var numericReg =/^((ftp|http|https):\/\/)?(www.)?(?!.*(ftp|http|https|www.))[a-zA-Z0-9_-]+(\.[a-zA-Z]+)+((\/)[\w#]+)*(\/\w+\?[a-zA-Z0-9_]+=\w+(&[a-zA-Z0-9_]+=\w+)*)?$/gm;
            if (!numericReg.test($('.website_url').val())) {
              $('.website_url').closest('div').find('span.error').html('Invalid website url');
              $('.website_url').focus();
              isvalid = false;
            }
       else {
        $('.website_url').closest('div').find('span.error').html('');
      }
      }

      if ($('.gst_no').val() == '') {
        $('.gst_no').closest('div').find('span.error').html('This field is required');
        $('.gst_no').focus();
        isvalid = false;
      }else {
            var numericReg =/^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/;
            if (!numericReg.test($('.gst_no').val())) {
              $('.gst_no').closest('div').find('span.error').html('Format-11AAAAA1111Z1A1');
              $('.gst_no').focus();
              isvalid = false;
            }
       else {
        $('.gst_no').closest('div').find('span.error').html('');
      }
      }

      if ($('.charges').val() == '') {
        $('.charges').closest('div').find('span.error').html('This field is required');
        $('.charges').focus();
        isvalid = false;
      }else {
            var numericReg =/^[0-9]+$/;
            if (!numericReg.test($('.charges').val())) {
              $('.charges').closest('div').find('span.error').html('Enter Only Numbers');
              $('.charges').focus();
              isvalid = false;
            }
       else {
        $('.charges').closest('div').find('span.error').html('');
      }
      }

      if ($('.empoyee_no').val() == '') {
        $('.empoyee_no').closest('div').find('span.error').html('This field is required');
        $('.empoyee_no').focus();
        isvalid = false;
      }else {
            var numericReg =/^[0-9]+$/;
            if (!numericReg.test($('.empoyee_no').val())) {
              $('.empoyee_no').closest('div').find('span.error').html('Enter Only Numbers');
              $('.empoyee_no').focus();
              isvalid = false;
            }
       else {
        $('.empoyee_no').closest('div').find('span.error').html('');
      }
      }

      if ($('.establish_year').val() == '') {
        $('.establish_year').closest('div').find('span.error').html('This field is required');
        $('.establish_year').focus();
        isvalid = false;
      }
       else {
        $('.establish_year').closest('div').find('span.error').html('');
      }

      if ($('.turnover').val() == '') {
        $('.turnover').closest('div').find('span.error').html('This field is required');
        $('.turnover').focus();
        isvalid = false;
      }else {
            var numericReg =/^[0-9]+$/;
            if (!numericReg.test($('.turnover').val())) {
              $('.turnover').closest('div').find('span.error').html('Enter Only Numbers');
              $('.turnover').focus();
              isvalid = false;
            }
       else {
        $('.turnover').closest('div').find('span.error').html('');
      }
      }

      if ($('.placement').val() == '') {
        $('.placement').closest('div').find('span.error').html('This field is required');
        $('.placement').focus();
        isvalid = false;
      }
       else {
        $('.placement').closest('div').find('span.error').html('');
      }

      if ($('.branches').val() == '') {
        $('.branches').closest('div').find('span.error').html('This field is required');
        $('.branches').focus();
        isvalid = false;
      }else {
            var numericReg =/^[a-zA-Z\\s\\,]+$/;
            if (!numericReg.test($('.branches').val())) {
              $('.branches').closest('div').find('span.error').html('Enter Branches');
              $('.branches').focus();
              isvalid = false;
            }
       else {
        $('.branches').closest('div').find('span.error').html('');
      }
      }
      if ($('.industry').val() == '') {
        $('.industry').closest('div').find('span.error').html('This field is required');
        $('.industry').focus();
        isvalid = false;
      }else {
            var numericReg =/^[a-zA-Z\\s\\,]+$/;
            if (!numericReg.test($('.industry').val())) {
              $('.industry').closest('div').find('span.error').html('Enter Industry');
              $('.industry').focus();
              isvalid = false;
            }
       else {
        $('.industry').closest('div').find('span.error').html('');
      }
      }           

      // if ($('.firm').val() == '') {
      //   $('.firm').closest('div').find('span.error').html('This field is required');
      //   $('.firm').focus();
      //   isvalid = false;
      // }
      //  else {
      //   $('.firm').closest('div').find('span.error').html('');      
      // }
      
      return isvalid;
    }
    

    $("form#companyform").submit(function (e) {
      e.preventDefault();      
        
      var isvalidate = validateCompanyForm();

      if(isvalidate)
      {
        var formdata = new FormData(this);     
       // alert(formdata);
        $.ajax({
          type: 'POST',
          url: 'create_company',
          data: formdata,
          contentType: false,
          cache: false,
          processData: false,
          success: function (id) {
            console.log(id);
              //alert(id);
            if (id != null) {
              $('#company_id1').val(id);
              $('#company_id2').val(id);
              $('.nav-tabs > .active').next('li').find('a').trigger('click');
            } else {
              alert("try again letter");
            }
          },
        //   complete: function(){
        //   alert('complete');
        // },
        // error:function(err){
        //  alert(err);
        // },
        // beforeSend:function(){
        //    alert('beforesend')
        // }
        });
      }      
    });

    function validateContactForm()
    {
      var isvalid=true;
      if ($('.bulding').val() == '') {
        $('.bulding').closest('div').find('span.error').html('This field is required');
        $('.bulding').focus();
        isvalid = false;
      }else {
            var numericReg =/^[a-zA-Z0-9\s,'-]*$/;
            if (!numericReg.test($('.bulding').val())) {
              $('.bulding').closest('div').find('span.error').html('Enter Bulding Address');
              $('.bulding').focus();
              isvalid = false;
            }
       else {
        $('.bulding').closest('div').find('span.error').html('');
      }
      }
      if ($('.landmark').val() == '') {
        $('.landmark').closest('div').find('span.error').html('This field is required');
        $('.landmark').focus();
        isvalid = false;
      }else {
            var numericReg =/^[a-zA-Z0-9\s,'-]*$/;
            if (!numericReg.test($('.landmark').val())) {
              $('.landmark').closest('div').find('span.error').html('Enter Landmark');
              $('.landmark').focus();
              isvalid = false;
            }
       else {
        $('.landmark').closest('div').find('span.error').html('');
      }
      }
      if ($('.location').val() == '') {
        $('.location').closest('div').find('span.error').html('This field is required');
        $('.location').focus();
        isvalid = false;
      }else {
            var numericReg =/^[a-zA-Z0-9\s,'-]*$/;
            if (!numericReg.test($('.landmark').val())) {
              $('.location').closest('div').find('span.error').html('Enter Location');
              $('.location').focus();
              isvalid = false;
            }
       else {
        $('.location').closest('div').find('span.error').html('');
      }
      }
      if ($('.pincode').val() == '') {
        $('.pincode').closest('div').find('span.error').html('This field is required');
        $('.pincode').focus();
        isvalid = false;
      }else {
            var numericReg =/^[1-9][0-9]{5}$/;
            if (!numericReg.test($('.pincode').val())) {
              $('.pincode').closest('div').find('span.error').html('Invalid Pincode');
              $('.pincode').focus();
              isvalid = false;
            }
            
       else {
        $('.pincode').closest('div').find('span.error').html('');
      }
      }
      if ($('.state').val() == '') {
        $('.state').closest('div').find('span.error').html('This field is required');
        $('.state').focus();
        isvalid = false;
      }
       else {
        $('.state').closest('div').find('span.error').html('');
      }
      if ($('.city').val() == '') {
        $('.city').closest('div').find('span.error').html('This field is required');
        $('.city').focus();
        isvalid = false;
      }
       else {
        $('.city').closest('div').find('span.error').html('');
      }

      if ($('.owner_name').val() == '') {
        $('.owner_name').closest('div').find('span.error').html('This field is required');
        $('.owner_name').focus();
        isvalid = false;
      }else {
            var numericReg =/^[a-zA-Z\s]+$/;
            if (!numericReg.test($('.owner_name').val())) {
              $('.owner_name').closest('div').find('span.error').html('Invalid Owner name');
              $('.owner_name').focus();
              isvalid = false;
            }else {
        $('.owner_name').closest('div').find('span.error').html('');
      }
      }
      if($('.owner_email').val() == ''){
          $('.owner_email').closest('div').find('span.error').html('This field is required');
          $('.owner_email').focus();
          isvalid = false;
      }else {
            var numericReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!numericReg.test($('.owner_email').val())) {
              $('.owner_email').closest('div').find('span.error').html('Invalid Email Id');
              $('.owner_email').focus();
              isvalid = false;
            }else{
        $('.owner_email').closest('div').find('span.error').html('');
      }
      }

      if ($('.owner_phone').val() == '') {
        $('.owner_phone').closest('div').find('span.error').html('This field is required');
        $('.owner_phone').focus();
        isvalid = false;
      }else {
            var numericReg = /^[0-9]{10}$/;
            if (!numericReg.test($('.owner_phone').val())) {
              $('.owner_phone').closest('div').find('span.error').html('Invalid mobile number');
              $('.owner_phone').focus();
              isvalid = false;
            }
       else {
        $('.owner_phone').closest('div').find('span.error').html('');
      }
      }
      if ($('.contact_person_name1').val() == '') {
        $('.contact_person_name1').closest('div').find('span.error').html('This field is required');
        $('.contact_person_name1').focus();
        isvalid = false;
      }else {
            var numericReg =/^[a-zA-Z\s]+$/;
            if (!numericReg.test($('.contact_person_name1').val())) {
              $('.contact_person_name1').closest('div').find('span.error').html('Invalid Owner name');
              $('.contact_person_name1').focus();
              isvalid = false;
            }else {
        $('.contact_person_name1').closest('div').find('span.error').html('');
      }
      }
      if($('.contact_person_email1').val() == ''){
          $('.contact_person_email1').closest('div').find('span.error').html('This field is required');
          $('.contact_person_email1').focus();
          isvalid = false;
      }else {
            var numericReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!numericReg.test($('.contact_person_email1').val())) {
              $('.contact_person_email1').closest('div').find('span.error').html('Invalid Email Id');
              $('.contact_person_email1').focus();
              isvalid = false;
            }else{
        $('.contact_person_email1').closest('div').find('span.error').html('');
      }
      }

      if ($('.contact_person_phone1').val() == '') {
        $('.contact_person_phone1').closest('div').find('span.error').html('This field is required');
        $('.contact_person_phone1').focus();
        isvalid = false;
      }else {
            var numericReg = /^[0-9]{10}$/;
            if (!numericReg.test($('.contact_person_phone1').val())) {
              $('.contact_person_phone1').closest('div').find('span.error').html('Invalid mobile number');
              $('.contact_person_phone1').focus();
              isvalid = false;
            }
       else {
        $('.contact_person_phone1').closest('div').find('span.error').html('');
      }
      }
      return isvalid;
    }

    $("form#contactform").submit(function (e) {
      e.preventDefault();

      var isvalidate = validateContactForm();

      var formdata = new FormData(this);  
     // alert(formdata);   
      $.ajax({
        type: 'POST',
        url: 'update_company',
        data: formdata,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          console.log(data);
          //alert(data);
           if (data == 'success') {           
             $('.nav-tabs > .active').next('li').find('a').trigger('click');
           } else {
             alert("try again letter");
           }
        },
        // complete: function(){
        //   alert('complete');
        // },
        // error:function(err){
        //  alert(err);
        // },
        // beforeSend:function(){
        //    alert('beforesend')
        // }
      })
    });


    function validateUserForm(){
      var isvalid=true;
      if ($('.user_name').val() == '') {
        $('.user_name').closest('div').find('span.error').html('This field is required');
        $('.user_name').focus();
        isvalid = false;
      }else {
            var numericReg =/^[a-zA-Z\s]+$/;
            if (!numericReg.test($('.user_name').val())) {
              $('.user_name').closest('div').find('span.error').html('Invalid Owner name');
              $('.user_name').focus();
              isvalid = false;
            }else {
        $('.user_name').closest('div').find('span.error').html('');
      }
      }
      if($('.user_email').val() == ''){
          $('.user_email').closest('div').find('span.error').html('This field is required');
          $('.user_email').focus();
          isvalid = false;
      }else {
            var numericReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!numericReg.test($('.user_email').val())) {
              $('.user_email').closest('div').find('span.error').html('Invalid Email Id');
              $('.user_email').focus();
              isvalid = false;
            }else{
        $('.user_email').closest('div').find('span.error').html('');
      }
      }

      if ($('.user_phone').val() == '') {
        $('.user_phone').closest('div').find('span.error').html('This field is required');
        $('.user_phone').focus();
        isvalid = false;
      }else {
            var numericReg = /^[0-9]{10}$/;
            if (!numericReg.test($('.user_phone').val())) {
              $('.user_phone').closest('div').find('span.error').html('Invalid mobile number');
              $('.user_phone').focus();
              isvalid = false;
            }
       else {
        $('.user_phone').closest('div').find('span.error').html('');
      }
      }
      if ($('.username').val() == '') {
        $('.username').closest('div').find('span.error').html('This field is required');
        $('.username').focus();
        isvalid = false;
      }
       else {
        $('.username').closest('div').find('span.error').html('');
      }
      
    

      if ($('.password').val() == '') {
        $('.password').closest('div').find('span.error').html('This field is required');
        $('.password').focus();
        isvalid = false;
       }
   
       else {
        $('.password').closest('div').find('span.error').html('');
      }
      

      return isvalid;
    
    }
   
  //   $("form#userform").submit(function (e) {
  //    
  //    var isvalidate = validateUserForm();    
  //    if(isvalidate == true)
  //    {
  //      $(this).submit();
  //      alert('1');
  //    }
  //  });
  // $("form#userform").submit(function(e){   
  // });
  $("#submitform").click(function(e){
    e.preventDefault();   
    var isvalidate = validateUserForm();
   // alert(isvalidate);
    if(isvalidate == true){
    $("form#userform").submit();
   // alert("Submitted");
    }
  }); 
    



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

    $('#add').click(function () {
      var size = parseInt($('#size_array').val());
      var content =
        '<div class="row clearfix contact_person_row"><div class="col-lg-11"><div class="col-md-4 col-sm-4 col-xs-10 form-group"><input type="text" name="contact_person_name[' +
        size +
        ']" class="form-control contact_person_name1" placeholder="Contact Person Name"><span class="error" aria-hidden="true"></span></div><div class="col-md-4 col-sm-4 col-xs-10 form-group contact_person_email"><div class="contact_person_email_div row"><div class="col-xs-11 col-md-11 row"><input type="email" name="contact_person_email[' +
        size +
        ']" class="form-control contact_person_email1 phone_email_input" placeholder="Contact Person email"><span class="error" aria-hidden="true"></span></div></div></div><div class="col-md-4 col-sm-4 col-xs-10 form-group contact_person_phone"><div class="contact_person_phone_div row"><div class="col-md-11 col-xs-10 row"><input type="text" name="contact_person_phone[' +
        size +
        ']" class="form-control contact_person_phone1 phone_email_input" placeholder="Contact Person Phone"><span class="error" aria-hidden="true"></span></div></div></div><input type="hidden" class="index" value="' +
        size +
        '"></div> <div class="col-lg-1"><button type="button" class="btn btn-sm btn-danger delete pull-right"><i class="fa fa-trash"></i></button></div></div>';

      $('.contact_person').append(content);
      $('#size_array').val(size + 1)
    });
    $(document).on('click', '.delete', function () {

      var size = parseInt($('#size_array').val());
      $(this).closest('.contact_person_row').remove();
      $('#size_array').val(size - 1)
    });

    $(document).on('click', '.add_mobile', function (e) {
      e.preventDefault();
      var index = parseInt($(this).closest('.contact_person_row').find('.index').val());
      $(this).closest('div.contact_person_row').find('.contact_person_phone').append(
        '<div class="contact_person_phone_div row"><div class="col-md-11 col-xs-10 row"><input type="text" name="contact_person_phone[' +
        index +
        '][]" class="form-control contact_person_phone1 phone_email_input" placeholder="Contact Person Phone"></div><div class="col-md-1 col-sm-1 col-xs-1"><button type=" button" class="btn btn-sm btn-warning minus_mobile"><i class="fa fa-trash"></i></button></div></div>'
      );
    });

    $(document).on('click', '.add_email', function (e) {
      e.preventDefault();
      var index = parseInt($(this).closest('.contact_person_row').find('.index').val());
      $(this).closest('div.contact_person_row').find('.contact_person_email').append(
        '<div class="contact_person_email_div row"><div class="col-xs-10 col-md-11 row"><input type="email" name="contact_person_email[' +
        index +
        '][]" class="form-control contact_person_email1 phone_email_input" placeholder="Contact Person email"></div><div class="col-md-1 col-sm-1 col-xs-1"><button type=" button" class="btn btn-sm btn-warning minus_email"><i class="fa fa-trash"></i></button></div></div>'
      );
    });

    $(document).on('click', '.minus_email', function (e) {
      e.preventDefault();
      $(this).closest('.contact_person_email_div').remove();
    });

    $(document).on('click', '.minus_mobile', function (e) {
      e.preventDefault();
      $(this).closest('.contact_person_phone_div').remove();
    });
    $(document).on('keyup', '.user_email', function () {
      $(this).closest('.login_user').find('.username').val($(this).val());
    });

   

  });
</script>
<style type="text/css">
  #bulk {
    margin-top: 50px;
  }

  #bulk,
  #single {
    border: 1ps solid gray;
    border-radius: 5px;
  }
</style>
@endsection