@extends('layouts.form-app')

@section('title')
JobsMartIndia| Edit Job
@endsection

@section('content-header')
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
				
				<form name="myform" id="myform" action="edit-job/submit" class="contact-form" method="post" enctype="multipart/form-data" >
					{{csrf_field()}}
					
           @foreach($records as $rec)
          <input type="hidden" name="id" value="{{$rec->id}}">
					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
              <label for="">Company Name</label>     
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<input type="text" name="company_name" class="form-control" placeholder="Company Name" value="{{$rec->company_name }}">
						<span class="text-danger">{{ $errors->first('company_name') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
              <label for="">Position</label>     
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<input type="text" name="position" class="form-control" placeholder="Position" value="{{$rec->position }}">
						<span class="text-danger">{{ $errors->first('position') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
              <label for="">Job Description</label>     
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">  
						<textarea name="job_description" rows="1" class="form-control" placeholder="Job Description">{{$rec->job_description }}</textarea>
						<span class="text-danger">{{ $errors->first('job_description') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
              <label for="">Job Location</label>     
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<textarea name="job_location" class="form-control" rows="1" placeholder="Job Location" >{{$rec->job_location }}</textarea>
						<span class="text-danger">{{ $errors->first('job_location') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
              <label for="">Requirement</label>     
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">  
						<input type="text" name="requirement" class="form-control" placeholder="Requirement" value="{{$rec->requirement }}">
						<span class="text-danger">{{ $errors->first('requirement') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
              <label for="">Salary</label>     
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">  
						<input type="number" name="salary" class="form-control" placeholder="Salary" value="{{$rec->salary }}">
						<span class="text-danger">{{ $errors->first('salary') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
              <label for="">Status</label>     
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<select class="form-control status select2" name="status" style="width: 100%;">							
							<option></option>
							<option value="active"  <?php if('active'==$rec->status) echo "selected"; ?>>Active</option>
              				<option value="inactive" <?php if('inactive'==$rec->status) echo "selected"; ?>>Inactive</option>               			
            			</select>
            			<span class="text-danger">{{ $errors->first('active') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
              <label for="">Vacency</label>     
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">  
						<input type="number" name="vacency" class="form-control" placeholder="Vacency" value="{{$rec->vacency }}">
						<span class="text-danger">{{ $errors->first('vacency') }}</span>
					</div>

    			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
                <label for="">Position Active Date</label>   
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
         			<div class="input-group date">
            			<div class="input-group-addon">
             				<i class="fa fa-calendar"></i>
            			</div>
            			<input type="text" name="position_active_date" class="form-control pull-right" id="datepicker2" placeholder="Position Active Date" value="{{$rec->position_active_date }}">                  			
         			</div>
              	<span class="text-danger">{{ $errors->first('position_active_date') }}</span>
    			</div>

    			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
                <label for="">Position Expiry Date</label>   
          </div>
          <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
         			<div class="input-group date">
            			<div class="input-group-addon">
             				<i class="fa fa-calendar"></i>
            			</div>
            			<input type="text" name="position_expiry_date" class="form-control pull-right" id="datepicker3" placeholder="Position Expiry Date" value="{{$rec->position_expiry_date }}">		
         			</div>
              	<span class="text-danger">{{ $errors->first('position_expiry_date') }}</span>
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


  })
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
