@extends('layouts.form-app')

@section('title')
JobsMartIndia| View Detailed Resume
@endsection

@section('content-header')
<section class="content-header">
      <h1>
        View Detailed Resume
        <!-- <small>Control panel</small> -->
      </h1>
      <h5><a href="view-resume"><i class="fa fa-arrow-left"></i>Go Back</a></h5>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Detailed Resume</li>
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
      <div class="col-md-12 myformdiv">
        <form name="myform" id="myform" action="view-resume/update" class="contact-form" method="post" enctype="multipart/form-data" >
          {{csrf_field()}}
          @foreach($resume as $res)
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 form-group">
          <button type="button" name="edit" id="edit" class="btn btn-success pull-right">EDIT RESUME</button>
          </div>
          <input type="hidden" name="resume_id" value="{{$res->resume_id}}">
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="name">Name</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$res->name}}" disabled="">
            <span class="text-danger">{{ $errors->first('name') }}</span>
          </div>          
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="email">Email</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{$res->email}}" disabled="">
            <span class="text-danger">{{ $errors->first('email') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="dob">Date Of Birth</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
                    <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="dob" class="form-control pull-right" id="datepicker" placeholder="Date Of Birth" value="{{$res->dob}}" disabled="">
                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                    </div>
                  </div>
                   <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
                     <label for="mobile">Mobile</label>
                   </div>
                   <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">  
            <input type="number" name="mobile" class="form-control" placeholder="Mobile Number" value="{{$res->mobile}}" disabled="">
            <span class="text-danger">{{ $errors->first('mobile') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="cur_loc">Current Location</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="cur_loc" class="form-control" placeholder="Current Location" value="{{$res->cur_loc}}" disabled="">
            <span class="text-danger">{{ $errors->first('cur_loc') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="pref_loc">Preferred Location</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="pref_loc" class="form-control" placeholder="Preferred Location" value="{{$res->pref_loc}}" disabled="">
            <span class="text-danger">{{ $errors->first('pref_loc') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="gender">Gender</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <select class="form-control gender select2" name="gender" style="width: 100%;" disabled="">             
              <option></option>
              <option value="female" <?php if($res->gender=='female')echo 'selected'; ?> >Female</option>
                        <option value="male" <?php if($res->gender=='male')echo 'selected'; ?> >Male</option>                    
                    </select>
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="skills">Skills</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <textarea name="skills" class="form-control" rows="1" placeholder="Skills (any 5)" disabled="">{{$res->skills}}</textarea>
            <span class="text-danger">{{ $errors->first('skills') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="total_exp">Total Years of Experience</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="number" name="total_exp" class="form-control" placeholder="Total Years Of Experience" value="{{$res->total_exp}}" disabled="">
            <span class="text-danger">{{ $errors->first('total_exp') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="cur_salary">Current Salary</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="number" name="cur_salary" class="form-control" placeholder="Current Salary" value="{{$res->cur_salary}}" disabled="">
            <span class="text-danger">{{ $errors->first('cur_salary') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="cur_desig">Current Job Title</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="cur_desig" class="form-control" placeholder="Current Job Title" value="{{$res->cur_desig}}" disabled="">
            <span class="text-danger">{{ $errors->first('cur_desig') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="cur_area">Current Functional Area</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="cur_area" class="form-control" placeholder="Current Functional Area" value="{{$res->cur_area}}" disabled="">
            <span class="text-danger">{{ $errors->first('cur_area') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="cur_industry">Current Industry</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="cur_industry" class="form-control" placeholder="Current Industry" value="{{$res->cur_industry}}" disabled="">
            <span class="text-danger">{{ $errors->first('cur_industry') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="cur_company">Current Company</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="cur_company" class="form-control" placeholder="Current Company" value="{{$res->cur_company}}" disabled="">
            <span class="text-danger">{{ $errors->first('cur_company') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="cur_company_exp">Years In Current Job</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="number" name="cur_company_exp" class="form-control" placeholder="Years In Current Job" value="{{$res->cur_company_exp}}" disabled="">
            <span class="text-danger">{{ $errors->first('cur_company_exp') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="notice_period">Notice Period(in no of weeks)</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="number" name="notice_period" class="form-control" placeholder="Notice Periiod(In no of weeks)" value="{{$res->notice_period}}" disabled="">
            <span class="text-danger">{{ $errors->first('notice_period') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="high_edu_level">Highest Education Level</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="high_edu_level" class="form-control" placeholder="Highest Education Level" value="{{$res->high_edu_level}}" disabled="">
            <span class="text-danger">{{ $errors->first('high_edu_level') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="high_edu_stream">Highest Education Stream</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="high_edu_stream" class="form-control" placeholder="Highest Education Stream" value="{{$res->high_edu_stream}}" disabled="">
            <span class="text-danger">{{ $errors->first('high_edu_stream') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="high_edu_institute">Highest Education Institute</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="text" name="high_edu_institute" class="form-control" placeholder="Highest Education Institute" value="{{$res->high_edu_institute}}" disabled="">
            <span class="text-danger">{{ $errors->first('high_edu_institute') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="passing_year">Year Of Passing (YYYY format)</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <input type="number" name="passing_year" class="form-control" placeholder="Year Of Passing (YYYY Format)" value="{{$res->passing_year}}" disabled="">
            <span class="text-danger">{{ $errors->first('passing_year') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="high_edu_course_type">Select Highest Education Course Type</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <select class="form-control high_edu_course_type select2" name="high_edu_course_type" style="width: 100%;" disabled="">
              <option></option>
              <option value="full" <?php if($res->high_edu_course_type=='Full' || $res->high_edu_course_type=='full') echo "selected"; ?> >Full Time</option>
                        <option value="Half" <?php if($res->high_edu_course_type=='Half' || $res->high_edu_course_type=='half') echo "selected"; ?> >Half Time</option>                     
                    </select>
                    <span class="text-danger">{{ $errors->first('high_edu_course_type') }}</span>
          </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
             <label for="note">Note</label>
           </div>
           <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <textarea name="note" class="form-control" rows="1" placeholder="Note" disabled="">{{$res->note}}</textarea>
            <span class="text-danger">{{ $errors->first('note') }}</span>

          </div>
          <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6 form-group">
            <label for="resume">Resume</label>
          </div>
          <div class="col-lg-3 col-sm-12 col-xs-12 col-md-6">
            <input type="file" name="resume" id="resume" class="form-control" placeholder="Upload Resume" title="Upload Resume" disabled="">
            <p class="help-block">FILE : <a href="public/{{$res->resume}}" target="_blank">{{$res->resume}}</a></p>
            <span class="text-danger">{{ $errors->first('resume') }}</span>
          </div>

          @endforeach
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-2 col col-md-offset-5 col-lg-offset-5 form-group">
                    <!-- <button type="button" name="edit" id="edit" class="btn btn-success form-control col-md-4">EDIT</button> -->
                    <button type="submit" name="submit" id="submit" class="btn btn-info form-control col-md-4">UPDATE</button>
                  </div>
        </form>
        </div>
			</div>
</section>
<script>
  $(document).ready(function(){
      $('#submit').hide();
      $('#edit').show();

      $('#edit').click(function(){
        $('input').prop( "disabled", false );
        $('select').prop( "disabled", false );
        $('textarea').prop( "disabled", false );
        $('#submit').show();
        $(this).hide();
      });
  });

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    $(".gender").select2({
     placeholder: "Select Gender",
     allowClear: false
    });
    $(".high_edu_course_type").select2({
     placeholder: "Select Highest Education Course Type",
     allowClear: false
    });
    $(".skill").select2({
     placeholder: "Select Skills (Any 5 required)",
   });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    $('.date').datepicker({
       format: 'yyyy-mm-dd',
       autoclose : true
     });

    //Date picker
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
        autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
@endsection