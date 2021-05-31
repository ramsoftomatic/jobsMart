@extends('layouts.form-app')

@section('title')
JobsMartIndia| Create Job
@endsection

@section('content-header')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<style>
#select2-state-container
    {
      width:250px;
    }
</style>
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
				<div class="col-md-10 col-md-offset-1 myformdiv">
				
				<form name="myform" id="myform" action="create-job/submit" class="contact-form" method="post" enctype="multipart/form-data" >
					{{csrf_field()}}
					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
                      <select class="form-control status select2" name="company" id="company" style="width: 100%;">             
                          <option>Select Company</option>
                          @foreach($company as $clist)
                          <option value="{{$clist->company_id}}">{{$clist->company_name}}</option>
                          @endforeach                     
                        </select>
                      <span class="text-danger">{{ $errors->first('company') }}</span>
                    </div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<input autocomplete="none" type="text" name="industry" class="form-control" placeholder="Industry" value="{{ old('industry') }}">
						<span class="text-danger">{{ $errors->first('industry') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<input autocomplete="none" type="text" name="job_title" class="form-control" placeholder="Job Title" value="{{ old('job_title') }}">
						<span class="text-danger">{{ $errors->first('job_title') }}</span>
					</div>
					  
        		<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
                    <select class="form-control status select2" name="staff" id="staff" style="width: 100%;">             
                      <option>Select staff</option>
                      @foreach($staff as $staff_list)
                      <option value="{{$staff_list->id}}">{{$staff_list->name}}</option>
                      @endforeach                     
                    </select>
                    <span class="text-danger">{{ $errors->first('staff') }}</span>
                  </div>
                    
     <!--               <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">-->
					<!--		<select name="company_name" class="form-control select2" placeholder="Company Name" id="company_name">-->
     <!--                           <option value="">Select Company</option>-->
     <!--                           <option value=""></option>  -->
     <!--                       </select>-->
					<!--</div>-->
					
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 form-group">  
            <div class="col-md-2"><label for="job_description">Job Description</label></div>
            <div class="col-md-10">
						<textarea name="job_description" rows="1" class="form-control content1" placeholder="Job Description">{{ old('job_description') }}</textarea>
						<span class="text-danger">{{ $errors->first('job_description') }}</span>
          </div>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<select name="job_location_state" class="form-control select2" placeholder="Select State" id="job_location_state">
              <option value="">Select State</option>
              @foreach($states as $state)
              <option value="{{$state->state_id}}">{{$state->name}}</option>  
              @endforeach
            </select>
						<span class="text-danger">{{ $errors->first('job_location_state') }}</span>
					</div>

          <div class="col-lg-5 col-sm-11 col-xs-11 col-md-5 form-group">
             <select name="job_location_city" class="form-control select2" placeholder="Select City" id="job_location_city">
              <option value="">Please Select State First</option>
            </select>
            <!--<input type="text" name="job_location_city" autocomplete="none" class="form-control" placeholder="City" value="{{old('job_location_city')}}">-->
            <span class="text-danger">{{ $errors->first('job_location_city') }}</span>
          </div>
          <div class="col-lg-1 col-sm-1 col-xs-1 col-md-1 form-group">
           
            <button type="button" data-toggle="modal" data-target="#exampleModal"  data-placement="top" title="Add more city" class="form-control btn btn-warning">+</button>
          </div>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 form-group">  
						<!-- <input autocomplete="none" type="text" name="requirement" class="form-control" placeholder="Required Qualification" value="{{ old('requirement') }}">
						<span class="text-danger">{{ $errors->first('requirement') }}</span> -->
            <textarea type="text" name="requirement" rows="1" class="form-control" placeholder="Qualification Required" value="{{ old('requirement') }}">{{ old('requirement') }}</textarea>
            <span class="text-danger">{{ $errors->first('requirement') }}</span>
					</div>

          <div class="col-md-12">
            <div class="col-lg-2 col-sm-6 col-xs-6 col-md-2 form-group">
              <label for="salary_from">Salary</label>
            </div>
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">  
            <input autocomplete="none" type="number" name="salary_from" class="form-control" placeholder="from" value="{{ old('salary_from') }}">
            <span class="text-danger">{{ $errors->first('salary_from') }}</span>
          </div>
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">  
            <input autocomplete="none" type="number" name="salary_to" class="form-control" placeholder="to" value="{{ old('salary_to') }}">
            <span class="text-danger">{{ $errors->first('salary_to') }}</span>
          </div>
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-2 form-group">  
            <!-- <input autocomplete="none" type="number" name="salary" class="form-control" placeholder="PM" value="{{ old('salary') }}"> -->
            <select name="salary_type" id="salary_type" class="form-control" placeholder="Salary Type">
              <option value="PM">PM</option>
              <option value="PA">PA</option>
            </select>
            <span class="text-danger">{{ $errors->first('salary_type') }}</span>
          </div>
          </div>

          <div class="col-md-12">
            <div class="col-lg-2 col-sm-6 col-xs-6 col-md-2 form-group">
              <label for="experience">Experience</label>
            </div>
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">  
            <input autocomplete="none" type="number" name="experience_from" class="form-control" placeholder="from" value="{{ old('experience_from') }}">
            <span class="text-danger">{{ $errors->first('experience_from') }}</span>
          </div>
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 form-group">  
            <input autocomplete="none" type="number" name="experience_to" class="form-control" placeholder="to" value="{{ old('experience_to') }}">
            <span class="text-danger">{{ $errors->first('experience_to') }}</span>
          </div>
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-2 form-group">  
            <!-- <input autocomplete="none" type="number" name="salary" class="form-control" placeholder="PM" value="{{ old('salary') }}"> -->
            <select name="experience_type" id="experience_type" class="form-control" placeholder="Experience Type">
              <option value="Months">Months</option>
              <option value="Years">Years</option>
            </select>
            <span class="text-danger">{{ $errors->first('experience_type') }}</span>
          </div>
          </div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
						<select class="form-control status select2" name="status" style="width: 100%;">							
							<option></option>
							<option value="active"  <?php if('active'==old('status')) echo "selected"; ?>>Active</option>
              				<option value="inactive" <?php if('inactive'==old('status')) echo "selected"; ?> selected>Inactive</option>               			
            			</select>
            			<span class="text-danger">{{ $errors->first('status') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">  
						<input autocomplete="none" type="number" name="vacancy" class="form-control" placeholder="Number Of Vacancy" value="{{ old('vacancy') }}">
						<span class="text-danger">{{ $errors->first('vacancy') }}</span>
					</div>

					<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group" style="display: none;">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input autocomplete="none" type="text" name="create_date" class="form-control pull-right" id="datepicker1" placeholder="Create Date" value="{{ old('create_date') }}">                  			
               			</div>
                    	<span class="text-danger">{{ $errors->first('create_date') }}</span>
          			</div>

          			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input autocomplete="none" type="text" name="job_active_date" class="form-control pull-right" id="datepicker2" placeholder="Job Active Date" value="{{ old('job_active_date') }}">                  			
               			</div>
                    	<span class="text-danger">{{ $errors->first('job_active_date') }}</span>
          			</div>

          			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input autocomplete="none" type="text" name="job_expiry_date" class="form-control pull-right" id="datepicker3" placeholder="Job Expiry Date" value="{{ old('job_expiry_date') }}">		
               			</div>
                    	<span class="text-danger">{{ $errors->first('job_expiry_date') }}</span>
          			</div>

          			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group" style="display: none;">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input autocomplete="none" type="text" name="active_date" class="form-control pull-right" id="datepicker4" placeholder="Active Date" value="{{ old('active_date') }}">                  			
               			</div>
                    	<span class="text-danger">{{ $errors->first('active_date') }}</span>
          			</div>

          			<div class="col-lg-6 col-sm-12 col-xs-12 col-md-6 form-group" style="display: none;">
               			<div class="input-group date">
                  			<div class="input-group-addon">
                   				<i class="fa fa-calendar"></i>
                  			</div>
                  			<input autocomplete="none" type="text" name="inactive_date" class="form-control pull-right" id="datepicker5" placeholder="Inactive Date" value="{{ old('inactive_date') }}">                  			
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
<script src="rich/jquery.richtext.js"></script>
<link rel="stylesheet" href="rich/richtext.min.css">
		<!-- /Container -->
<script>
  $(document).ready(function(){
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Initialize Select2 Elements
    $('.select2').select2();

    $(".status").select2({
     placeholder: "Select Status",
     allowClear: true
    });
    $("#job_location_city").select2({
     placeholder: "Please Select State First",
     allowClear: true
    });
    $("#job_location_state").select2({
     placeholder: "Select State",
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
    
    

  });
</script>

<script>
        $(document).ready(function() {
          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
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
       $('.content1').richText();      
        });
        </script>
	<!-- /Contact -->
<style type="text/css">
	#bulk{
		margin-top: 50px;
	}
	#bulk,#single
	{
		border: 1px solid gray;
		border-radius: 5px;
	}

.richText .richText-editor{
  height:200px ! important;  
}
.richText
{
border: 1px solid lightgray;
}
</style>

@endsection
