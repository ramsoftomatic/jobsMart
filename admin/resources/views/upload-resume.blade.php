@extends('layouts.form-app')

@section('title')
JobsMartIndia| Upload Resume File
@endsection

@section('content-header')
<section class="content-header">
      <h1>
        Upload Resume File
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Upload Resume File</li>
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
   		<h4>{!! session('failure') !!}</h4>
    </div> 
  @endif



      <!-- Small boxes (Stat box) -->

      <!-- <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div> -->
        <!-- /.box-header -->
        <!-- <div class="box-body"> -->
          <div class="row">
				<!-- contact form -->
				<div class="col-md-8 col-md-offset-2 myformdiv">
				
				<form name="myform" id="myform" action="upload-resume/upload" class="contact-form" method="post" enctype="multipart/form-data" >
					{{csrf_field()}}
					{{ $errors->first('mobile') }}
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
						<input type="file" name="resumefile[]" id="resumefile[]" class="form-control" placeholder="Upload Resume File" title="Upload Resume File" multiple>
						<p class="help-block">Upload Resume File Here</p>
            <div id="imagePreview"></div>
						<span class="text-danger">{{ $errors->first('csvfile') }}</span>
            <span class="text-danger">{{ $errors->first('value') }}</span>
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

    $(".gender").select2({
     placeholder: "Select Gender",
     allowClear: true
    });
    $(".high_edu_course_type").select2({
     placeholder: "Select Highest Education Course Type",
     allowClear: true
    });
    $(".skill").select2({
     placeholder: "Select Skills (Any 5 required)",
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



    var uploadFile; 
    uploadFile = 'resumefile';

    uploadFile = $('#'+uploadFile);
    // uploadFile.after("<div id='imagePreview'></div>");
    $('#imagePreview').hide();
    uploadFile.on('click', function() {
      $('#imagePreview').hide();
    });

    uploadFile.on('change', function() {
      var files, reader;
      files = !!this.files ? this.files : [];
      if ( !files.length || !window.FileReader ) {
        return; // no file selected, or no FileReader support
      }

      if ( /^image/.test(files[0].type)) {
        reader = new FileReader();
        reader.readAsDataURL(files[0]); 
        reader.onloadend = function() {
          $('#imagePreview').css('background-image', 'url(' + this.result + ')');
          $('#imagePreview').show();
        }
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
