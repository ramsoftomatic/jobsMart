@extends('layouts.form-app')

@section('title')
JobsMartIndia| Create Job
@endsection

@section('content-header')
<section class="content-header">
      <h1>
        Create Job
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Create Job</li>
      </ol>
</section>
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
				
				<form name="myform" id="myform" action="create-job/submit" class="contact-form" method="post" enctype="multipart/form-data" >
					{{csrf_field()}}
					
					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<input type="text" name="company_name" class="form-control" placeholder="Company Name" value="{{ old('company_name') }}">
						<span class="text-danger">{{ $errors->first('company_name') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<input type="text" name="position" class="form-control" placeholder="Position" value="{{ old('position') }}">
						<span class="text-danger">{{ $errors->first('position') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">  
						<textarea name="job_description" rows="1" class="form-control" placeholder="Job Description">{{ old('job_description') }}</textarea>
						<span class="text-danger">{{ $errors->first('job_description') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<textarea name="job_location" class="form-control" rows="1" placeholder="Job Location" >{{ old('job_location') }}</textarea>
						<span class="text-danger">{{ $errors->first('job_location') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">  
						<input type="text" name="requirement" class="form-control" placeholder="Required Qualification" value="{{ old('requirement') }}">
						<span class="text-danger">{{ $errors->first('requirement') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">  
						<input type="number" name="salary" class="form-control" placeholder="Salary" value="{{ old('salary') }}">
						<span class="text-danger">{{ $errors->first('salary') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<select class="form-control status select2" name="status" style="width: 100%;">							
							<option></option>
							<option value="active"  <?php if('active'==old('status')) echo "selected"; ?>>Active</option>
              				<option value="inactive" <?php if('inactive'==old('status')) echo "selected"; ?> selected>Inactive</option>               			
            			</select>
            			<span class="text-danger">{{ $errors->first('active') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">  
						<input type="number" name="vacency" class="form-control" placeholder="Vacency" value="{{ old('vacency') }}">
						<span class="text-danger">{{ $errors->first('vacency') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group" style="display: none;">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input type="text" name="create_date" class="form-control pull-right" id="datepicker1" placeholder="Create Date" value="{{ old('create_date') }}">                  			
               			</div>
                    	<span class="text-danger">{{ $errors->first('create_date') }}</span>
          			</div>

          			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input type="text" name="position_active_date" class="form-control pull-right" id="datepicker2" placeholder="Position Active Date" value="{{ old('position_active_date') }}">                  			
               			</div>
                    	<span class="text-danger">{{ $errors->first('position_active_date') }}</span>
          			</div>

          			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input type="text" name="position_expiry_date" class="form-control pull-right" id="datepicker3" placeholder="Position Expiry Date" value="{{ old('position_expiry_date') }}">		
               			</div>
                    	<span class="text-danger">{{ $errors->first('position_expiry_date') }}</span>
          			</div>

          			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group" style="display: none;">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input type="text" name="active_date" class="form-control pull-right" id="datepicker4" placeholder="Active Date" value="{{ old('active_date') }}">                  			
               			</div>
                    	<span class="text-danger">{{ $errors->first('active_date') }}</span>
          			</div>

          			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group" style="display: none;">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input type="text" name="inactive_date" class="form-control pull-right" id="datepicker5" placeholder="Inactive Date" value="{{ old('inactive_date') }}">                  			
               			</div>
                    	<span class="text-danger">{{ $errors->first('inactive_date') }}</span>
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

		<!-- /Container -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    $(".status").select2({
     placeholder: "Select Status",
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
