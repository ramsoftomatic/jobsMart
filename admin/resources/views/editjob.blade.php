@extends('layouts.form-app')

@section('title')
JobsMartIndia| Edit Job
@endsection

@section('content-header')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="content-header">
      <h1>
        Edit Job
        <!-- <small>Control panel</small> -->
      </h1>
      <h5><a href="job-list"><i class="fa fa-arrow-left"></i>Go Back</a></h5>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Job</li>
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
      <h4>{{session('success')}}</h4>
    </div> 
  @endif

   @if(session('failure'))
    <div class="msg alert alert-danger">
      <h4>{{session('failure')}}</h4>
    </div> 
  @endif

          <div class="row">
				<!-- contact form -->
				<div class="col-md-12 myformdiv">
				
				<form name="myform" id="myform" action="edit-job/submit" class="contact-form" method="post" enctype="multipart/form-data" >
					{{csrf_field()}}
           @foreach($records as $rec)
           <div class="col-md-6">
          <input autocomplete="none" type="hidden" name="id" value="{{$rec->id}}">
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
              <label for="">Industry</label>     
          </div>
          <div class="col-lg-8 col-sm-12 col-xs-12 col-md-8 form-group">
						<input autocomplete="none" type="text" name="industry" class="form-control" placeholder="Industry" value="{{$rec->industry }}">
						<span class="text-danger">{{ $errors->first('industry') }}</span>
					</div>
        </div>
        <div class="col-md-6">
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
              <label for="">Job Title</label>     
          </div>
          <div class="col-lg-8 col-sm-12 col-xs-12 col-md-8 form-group">
						<input autocomplete="none" type="text" name="job_title" class="form-control" placeholder="Job Title" value="{{$rec->job_title }}">
						<span class="text-danger">{{ $errors->first('job_title') }}</span>
					</div>
        </div>

        <div class="col-md-12">
					<div class="col-lg-2 col-sm-12 col-xs-12 col-md-2 form-group">
              <label for="">Job Description</label>     
          </div>
          <div class="col-lg-10 col-sm-12 col-xs-12 col-md-10 form-group">  
						<textarea name="job_description" rows="6" class="form-control content1" placeholder="Job Description">{{$rec->job_description }}</textarea>
						<span class="text-danger">{{ $errors->first('job_description') }}</span>
					</div>

        </div>

        <div class="col-md-6">
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
              <label for="">State</label>     
          </div>
          <div class="col-lg-8 col-sm-12 col-xs-12 col-md-8 form-group">
            <select name="job_location_state" id="job_location_state" class="form-control select2" placeholder="Select State" id="job_location_state">
              <option value="">Select State</option>
              @foreach($states as $state)
              <option value="{{$state->state_id}}" <?php if($state->state_id==$rec->job_location_state){echo "selected";} ?> >{{$state->name}}</option>  
              @endforeach
            </select>
						<span class="text-danger">{{ $errors->first('job_location_state') }}</span>
					</div>
        </div>

        <div class="col-md-6">
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
              <label for="">City</label>     
          </div>
          <div class="col-lg-8 col-sm-12 col-xs-12 col-md-8 form-group">
            <!-- <select name="job_location_city" id="job_location_city" class="form-control select2" placeholder="Select City" id="job_location_city">
              <option value="">Select City</option>
              @foreach($cities as $city)
              <option value="{{$city->city_id}}" <?php if($city->city_id==$rec->job_location_city){echo "selected";} ?> >{{$city->city_name}}</option>  
              @endforeach
            </select> -->
              <input type="text" name="job_location_city" autocomplete="none" class="form-control" placeholder="City" value="{{$rec->job_location_city}}">
            <span class="text-danger">{{ $errors->first('job_location_city') }}</span>
          </div>
        </div>

        <div class="col-md-12">
					<div class="col-lg-2 col-sm-12 col-xs-12 col-md-2 form-group">
              <label for="">Qualification</label>     
          </div>
          <div class="col-lg-10 col-sm-12 col-xs-12 col-md-10 form-group">  
						<textarea type="text" name="requirement" rows="1" class="form-control" placeholder="Requirement" value="{{$rec->requirement }}">{{$rec->requirement }}</textarea>
						<span class="text-danger">{{ $errors->first('requirement') }}</span>
					</div>
        </div>

          <div class="col-md-12">
					<div class="col-lg-2 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="">Salary</label>     
          </div>
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">  
						<input autocomplete="none" type="text" name="salary_from" class="form-control" placeholder="Salary from" value="{{$rec->salary_from }}">
						<span class="text-danger">{{ $errors->first('salary_from') }}</span>
					</div>
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">  
            <input autocomplete="none" type="text" name="salary_to" class="form-control" placeholder="Salary to" value="{{$rec->salary_to }}">
            <span class="text-danger">{{ $errors->first('salary_to') }}</span>
          </div>
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-2 form-group">  
            <!-- <input autocomplete="none" type="number" name="salary_type" class="form-control" placeholder="Salary Type" value="{{$rec->salary_type }}"> -->
            <select name="salary_type" id="salary_type" class="form-control" placeholder="Salary Type">
              <option value="PM" <?php if('PM'==$rec->salary_type) echo "selected"; ?> >PM</option>
              <option value="PA" <?php if('PA'==$rec->salary_type) echo "selected"; ?> >PA</option>
            </select>
            <span class="text-danger">{{ $errors->first('salary_type') }}</span>
          </div>
        </div>

          <div class="col-md-12">
            <div class="col-lg-2 col-sm-6 col-xs-6 col-md-2 form-group">
              <label for="experience">Experience</label>
            </div>
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">  
            <input autocomplete="none" type="number" name="experience_from" class="form-control" placeholder="from" value="{{ $rec->experience_from}}">
            <span class="text-danger">{{ $errors->first('experience_from') }}</span>
          </div>
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">  
            <input autocomplete="none" type="number" name="experience_to" class="form-control" placeholder="to" value="{{ $rec->experience_to}}">
            <span class="text-danger">{{ $errors->first('experience_to') }}</span>
          </div>
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-2 form-group">  
            <!-- <input autocomplete="none" type="number" name="salary" class="form-control" placeholder="PM" value="{{ old('salary') }}"> -->
            <select name="experience_type" id="experience_type" class="form-control" placeholder="Experience Type">
              <option value="Months"<?php if("Months"==$rec->experience_type) echo "selected"; ?>>Months</option>
              <option value="Years" <?php if("Years"==$rec->experience_type) echo "selected"; ?> >Years</option>
            </select>
            <span class="text-danger">{{ $errors->first('experience_type') }}</span>
          </div>
          </div>

          <div class="col-md-6">
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
              <label for="">Status</label>     
          </div>
          <div class="col-lg-8 col-sm-12 col-xs-12 col-md-8 form-group">
						<select class="form-control status select2" name="status" style="width: 100%;">							
							<option></option>
							<option value="active"  <?php if('active'==$rec->status) echo "selected"; ?>>Active</option>
              				<option value="inactive" <?php if('inactive'==$rec->status) echo "selected"; ?>>Inactive</option>               			
            			</select>
            			<span class="text-danger">{{ $errors->first('status') }}</span>
					</div>
        </div>

        <div class="col-md-6">
					<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
              <label for="">Vacancy</label>     
          </div>
          <div class="col-lg-8 col-sm-12 col-xs-12 col-md-8 form-group">  
						<input autocomplete="none" type="number" name="vacancy" class="form-control" placeholder="Vacancy" value="{{$rec->vacancy }}">
						<span class="text-danger">{{ $errors->first('vacancy') }}</span>
					</div>
        </div>

        <div class="col-md-6">
    			<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                <label for="">Active Date</label>   
          </div>
          <div class="col-lg-8 col-sm-12 col-xs-12 col-md-8 form-group">
         			<div class="input-group date">
            			<div class="input-group-addon">
             				<i class="fa fa-calendar"></i>
            			</div>
            			<input autocomplete="none" type="text" name="job_active_date" class="form-control pull-right" id="datepicker2" placeholder="Job Active Date" value="{{date('Y-m-d',strtotime($rec->job_active_date)) }}">                  			
         			</div>
              	<span class="text-danger">{{ $errors->first('job_active_date') }}</span>
    			</div>
        </div>

        <div class="col-md-6">
    			<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">
                <label for="">Expiry Date</label>   
          </div>
          <div class="col-lg-8 col-sm-12 col-xs-12 col-md-8 form-group">
         			<div class="input-group date">
            			<div class="input-group-addon">
             				<i class="fa fa-calendar"></i>
            			</div>
            			<input autocomplete="none" type="text" name="job_expiry_date" class="form-control pull-right" id="datepicker3" placeholder="Job Expiry Date" value="{{date('Y-m-d',strtotime($rec->job_expiry_date)) }}">		
         			</div>
              	<span class="text-danger">{{ $errors->first('job_expiry_date') }}</span>
    			</div>
        </div>

  			<div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 col col-md-offset-4 col-lg-offset-4 form-group">
        		<button type="submit" class="btn btn-primary form-control col-md-4">Update</button>
      	</div>
                @endforeach
				</form>
				</div>
				<!-- /contact form -->

			</div>
			<!-- /Row -->

</section>
<script src="rich/jquery.richtext.js"></script>
<link rel="stylesheet" href="rich/richtext.min.css">
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
    /*$(".skill").select2({
     placeholder: "Select Skills (Any 5 required)",
   });*/



    $('.date').datepicker({
       format: 'yyyy-mm-dd',
       autoclose : true
     });


     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#job_location_state').change(function(e)
    {
      var state_id = $(this).val();
            $.ajax({
            type:'POST',
            url:'getcity',
            datatype: 'json',
            data:{state_id:state_id},
            success:function(data){
              // alert(data.city);
              $('#job_location_city').html(data.city);
            }
            
            });
    });

  })
</script>

<script>
        $(document).ready(function() {
       $('.content1').richText();      
        });
        </script>
	<!-- /Contact -->
<style type="text/css">

  .richText .richText-editor{
  height:200px ! important;  
}
.richText
{
border: 1px solid lightgray;
}
</style>

@endsection
