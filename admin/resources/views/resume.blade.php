@extends('layouts.form-app')

@section('title')
JobsMartIndia| Upload Resume
@endsection

@section('content-header')
<section class="content-header">
      <h1>
        Add Resume
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Resume</li>
      </ol>
</section>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
	 
	</style>
	 <section class="content">
	 	 @if(session('success'))
    <div class="msg alert alert-success">
   		<h4>{{session('success')}}</h4>
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
				
				<form name="myform" id="myform" action="add-resume/submit" class="contact-form" method="post" enctype="multipart/form-data" >
					{{csrf_field()}}
					<div class="row">
						<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
							<label class="col-lg-4 col-sm-12 col-xs-12 col-md-4">Client Name</label>
							<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4">
							<select id="company_id" name="company_id[]" multiple class="form-control" >
								@foreach($company as $row)
									<option value="{{$row->company_id}}">{{$row->company_name}}</option>
								@endforeach
							</select>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
							<label class="col-lg-2 col-sm-12 col-xs-12 col-md-2">Jobs</label>
							<div class="col-lg-8 col-sm-12 col-xs-12 col-md-8">
							<select id="jobs1" name="jobs[]" multiple="multiple" class="form-control select2" >
								<option></option>
							</select>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
						<span class="text-danger">{{ $errors->first('name') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
						<span class="text-danger">{{ $errors->first('email') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input type="text" name="dob" class="form-control pull-right" id="datepicker" placeholder="Date Of Birth" value="{{ old('dob') }}">                  			
               			</div>
                    	<span class="text-danger">{{ $errors->first('dob') }}</span>
          			</div>
          			<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">  
						<input type="number" name="mobile" class="form-control" placeholder="Mobile Number" value="{{ old('mobile') }}">
						<span class="text-danger">{{ $errors->first('mobile') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="cur_loc" class="form-control" placeholder="Current Location" value="{{ old('cur_loc') }}">
						<span class="text-danger">{{ $errors->first('cur_loc') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="pref_loc" class="form-control" placeholder="Preferred Location" value="{{ old('pref_loc') }}">
						<span class="text-danger">{{ $errors->first('pref_loc') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<select class="form-control gender select2" name="gender" style="width: 100%;">							
							<option></option>
							<option value="female"  <?php if('female'==old('gender')) echo "selected"; ?>>Female</option>
              				<option value="male" <?php if('male'==old('gender')) echo "selected"; ?>>Male</option>               			
            			</select>
            			<span class="text-danger">{{ $errors->first('gender') }}</span>
					</div>
          			<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
            			<textarea name="skills" class="form-control" rows="1" placeholder="Skills (any 5)" >{{ old('skills') }}</textarea>
            			<span class="text-danger">{{ $errors->first('skills') }}</span>
          			</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="number" name="total_exp" class="form-control" placeholder="Total Years Of Experience" value="{{ old('total_exp') }}">
						<span class="text-danger">{{ $errors->first('total_exp') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="number" name="cur_salary" class="form-control" placeholder="Current Salary" value="{{ old('cur_salary') }}">
						<span class="text-danger">{{ $errors->first('cur_salary') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="cur_desig" class="form-control" placeholder="Current Job Title" value="{{ old('cur_desig') }}">
						<span class="text-danger">{{ $errors->first('cur_desig') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="cur_area" class="form-control" placeholder="Current Functional Area" value="{{ old('cur_area') }}">
						<span class="text-danger">{{ $errors->first('cur_area') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="cur_industry" class="form-control" placeholder="Current Industry" value="{{ old('cur_industry') }}">
						<span class="text-danger">{{ $errors->first('cur_industry') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="cur_company" class="form-control" placeholder="Current Company" value="{{ old('cur_company') }}">
						<span class="text-danger">{{ $errors->first('cur_company') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="number" name="cur_company_exp" class="form-control" placeholder="Years In Current Job" value="{{ old('cur_company_exp') }}">
						<span class="text-danger">{{ $errors->first('cur_company_exp') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="number" name="notice_period" class="form-control" placeholder="Notice Periiod(In no of weeks)" value="{{ old('notice_period') }}">
						<span class="text-danger">{{ $errors->first('notice_period') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="high_edu_level" class="form-control" placeholder="Highest Education Level" value="{{ old('high_edu_level') }}">
						<span class="text-danger">{{ $errors->first('high_edu_level') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="high_edu_stream" class="form-control" placeholder="Highest Education Stream" value="{{ old('high_edu_stream') }}">
						<span class="text-danger">{{ $errors->first('high_edu_stream') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="text" name="high_edu_institute" class="form-control" placeholder="Highest Education Institute" value="{{ old('high_edu_institute') }}">
						<span class="text-danger">{{ $errors->first('high_edu_institute') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<input type="number" name="passing_year" class="form-control" placeholder="Year Of Passing (YYYY Format)" value="{{ old('passing_year') }}">
						<span class="text-danger">{{ $errors->first('passing_year') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
						<select class="form-control high_edu_course_type select2" name="high_edu_course_type" style="width: 100%;">
							<option></option>
							<option value="full" <?php if('full'==old('high_edu_course_type')) echo "selected"; ?>>Full Time</option>
              <option value="Half" <?php if('Half'==old('high_edu_course_type')) echo "selected"; ?>>Half Time</option>
            </select>
            <span class="text-danger">{{ $errors->first('high_edu_course_type') }}</span>
					</div>
					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<textarea name="note" class="form-control" rows="1" placeholder="Note" >{{ old('note') }}</textarea>
						<span class="text-danger">{{ $errors->first('note') }}</span>

					</div>
					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
						<input type="file" name="resume" id="resume" class="form-control" placeholder="Upload Resume" title="Upload Resume" value="{{ old('resume') }}">
						<p class="help-block">Upload Resume Here <b>(pdf/docx only)</b></p>
						<span class="text-danger">{{ $errors->first('resume') }}</span>
					</div>
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 col col-md-offset-4 col-lg-offset-4 form-group">
                		<button type="submit" class="btn btn-primary form-control col-md-4">Submit</button>
              		</div>
				</form>
				</div>
				<!-- /contact form -->

			</div>
			<!-- /Row -->

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
		<!-- /Container -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    $(".gender").select2({
     placeholder: "Select Gender",
     allowClear: true
    });
    $(".high_edu_course_type").select2({
     placeholder: "Select Highest Education Course Type",
     allowClear: true
    });
   

    $('.date').datepicker({
       format: 'yyyy-mm-dd',
       autoclose : true
     });

    //Date picker
    $('#datepicker').datepicker({
    	format: 'yyyy-mm-dd',
      	autoclose: true
    });

   
  });
  $(document).ready(function(){
	$("#jobs1").select2({
		allowClear: true,
		multiple:true,
		placeholder:"select Job"
		});
	$('#company_id').multiselect({
		nonSelectedText: 'Select client',
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		buttonWidth:'250px'
	});
	
	$('#company_id').change(function(){
		$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
		var val=$(this).val();

		$.ajax({
                    type: 'POST',
                    url: 'get_jobs',
                    data: {
                      val :val,
                    
                    },
                    success: function (data) {
					  console.log(data);
					  $("#jobs1").empty().append(data);
					  $("#jobs1").select2({
						allowClear: true,
						multiple:true,
						placeholder:"select Job"
						});
                   
                    },
                    error:function(data) {
                      console.log(data);
                    }
                });	
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
