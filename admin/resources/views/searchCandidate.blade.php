<!-- @if (!Session::has('username'))
{{Redirect::to('/') }}
@endif -->

@extends('layouts.form-app')

@section('title')
JobsMartIndia| Search Candidate
@endsection

@section('content-header')
<section class="content-header">
      <h1>
        Search Candidate
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Search Candidate</li>
      </ol>
</section>
@endsection

@section('content')
 <section class="content">
      <div class="box">
      <div class="box-body" style="padding-top: 25px;">
           
      @if(session('failure'))
      <div class="msg alert alert-danger">
        <h3><center>{{session('failure')}}</center></h3>
      </div> 
      @endif

          <form name="myform" id="myform" action="search-candidate/submit" class="contact-form" method="post" enctype="multipart/form-data" >
          {{csrf_field()}}
          
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6 col-sm-6 form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" >
            <span class="text-danger">{{ $errors->first('name') }}</span>
          </div>
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6 col-sm-6 form-group">
            <textarea name="skills" class="form-control" rows="1" placeholder="Skills" ></textarea>
            <span class="text-danger">{{ $errors->first('skills') }}</span>
          </div>
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6 col-sm-6 form-group">
            <input type="number" name="total_exp" class="form-control" placeholder="Total Experience" >
            <span class="text-danger">{{ $errors->first('total_exp') }}</span>
          </div>
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6 col-sm-6 form-group">
            <select class="form-control cur_salary select2" name="cur_salary" style="width: 100%;">             
              <option></option>
              <option value="5000-10000">5000-10000</option>
              <option value="10001-15000">10000-15000</option>
              <option value="15001-20000">15001-20000</option> 
              <option value="20001-25000">20001-25000</option> 
              <option value="25001-30000">25001-30000</option> 
              <option value="30001-35000">30001-35000</option>
              <option value="35001-40000">35001-40000</option>
              <option value="40001-45000">40001-45000</option>
              <option value="45001-50000">45001-50000</option>
              <option value="50001+">50001+</option>                 
            </select>
           <!--  <input type="number" name="cur_salary" class="form-control" placeholder="Current Salary" > -->
            <span class="text-danger">{{ $errors->first('cur_salary') }}</span>
          </div>
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6 col-sm-6 form-group">
            <select class="form-control high_edu_level select2" name="high_edu_level" style="width: 100%;">             
              <option></option>
              <option value="10">10th</option>
              <option value="12">12th</option>
              <option value="deploma">Deploma</option> 
              <option value="graduate">Graduate</option> 
              <option value="postgraduate">Post Graduate</option>                 
            </select>

            <!-- <input type="text" name="high_edu_level" class="form-control" placeholder="Highest Education" > -->
            <span class="text-danger">{{ $errors->first('high_edu_level') }}</span>
          </div>
          <div class="col-lg-2 col-sm-12 col-xs-12 col-md-6 col-sm-6 form-group">
            <button type="submit" class="btn btn-primary form-control col-md-4">Submit</button>
          </div>
        </form>
      </div>

@if(Session::has('data'))
<?php for($i=0;$i<session('count');$i++) { ?>
      <div class="box">
         <div class="box-body">
            
              <h3 class="box-title"><u>Candidate Information @if(session('count')>1){{$i+1}}@endif</u></h3>
           
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="name">Name</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="name" class="form-control" placeholder="Name" value="{{session('data')[$i]->name}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="email">Email</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="email" name="email" class="form-control" placeholder="Email" value="{{session('data')[$i]->email}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="dob">Date Of Birth</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="dob" class="form-control pull-right" id="datepicker" placeholder="Date Of Birth" value="{{session('data')[$i]->dob}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="mobile">Mobile</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">  
              <input type="number" name="mobile" class="form-control" placeholder="Mobile Number" value="{{session('data')[$i]->mobile}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="cur_loc">Current Location</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="cur_loc" class="form-control" placeholder="Current Location" value="{{session('data')[$i]->cur_loc}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="pref_loc">Preferred Location</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="pref_loc" class="form-control" placeholder="Preferred Location" value="{{session('data')[$i]->pref_loc}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="gender">Gender</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="gender" class="form-control" placeholder="Gender" value="{{session('data')[$i]->gender}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="skills">Skills</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <textarea name="skills" class="form-control" rows="1" placeholder="Skills (any 5)" disabled="">{{session('data')[$i]->skills}}</textarea>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="total_exp">Total Experience</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="number" name="total_exp" class="form-control" placeholder="Total Years Of Experience" value="{{session('data')[$i]->total_exp}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="cur_salary_s">Current Salary</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="number" name="cur_salary" class="form-control" placeholder="Current Salary" value="{{session('data')[$i]->cur_salary}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="cur_desig">Current Designation</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="cur_desig" class="form-control" placeholder="Current Job Title" value="{{session('data')[$i]->cur_desig}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="cur_area">Current Area</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="cur_area" class="form-control" placeholder="Current Functional Area" value="{{session('data')[$i]->cur_area}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="cur_industry">Current Industry</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="cur_industry" class="form-control" placeholder="Current Industry" value="{{session('data')[$i]->cur_industry}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="cur_company">Current Company</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="cur_company" class="form-control" placeholder="Current Company" value="{{session('data')[$i]->cur_company}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="cur_company_exp">Years in Current Company</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="number" name="cur_company_exp" class="form-control" placeholder="Years In Current Job" value="{{session('data')[$i]->cur_company_exp}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="notice_period">Notice Period</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="number" name="notice_period" class="form-control" placeholder="Notice Periiod(In no of weeks)" value="{{session('data')[$i]->notice_period}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="high_edu_level">Highest Education Level</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="high_edu_level" class="form-control" placeholder="Highest Education Level" value="{{session('data')[$i]->high_edu_level}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="high_edu_level">Highest Education Stream</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="high_edu_stream" class="form-control" placeholder="Highest Education Stream" value="{{session('data')[$i]->high_edu_stream}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="high_edu_institute">Highest Education Institute</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="high_edu_institute" class="form-control" placeholder="Highest Education Institute" value="{{session('data')[$i]->high_edu_institute}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="passing_year">Year Of Passing</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="number" name="passing_year" class="form-control" placeholder="Year Of Passing (YYYY Format)" value="{{session('data')[$i]->passing_year}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="high_edu_course_type">Highest Education Course Type</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <input type="text" name="high_edu_course_type" class="form-control" placeholder="Highest Education Course Type" value="{{session('data')[$i]->high_edu_course_type}}" disabled="">
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="note">Note</label>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <textarea name="note" class="form-control" rows="1" placeholder="Note" disabled="">{{session('data')[$i]->note}}</textarea>
            </div>
            <div class="col-lg-3 col-sm-12 col-xs-12 col-md-3 form-group">
              <label for="resume">Resume</label>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12 col-md-6">
              <a href="public/{{session('data')[$i]->resume}}" target="_blank" name="resume">{{session('data')[$i]->resume}}</a>
              <!-- <input type="file" name="resume" id="resume" class="form-control" placeholder="Upload Resume" title="Upload Resume" >
              <p class="help-block">Upload Resume Here</p> -->
            </div>
        </div>
      </div>
      <?php } ?>
@endif
    </div>
      <!-- /.row (main row) -->
    </section>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".cur_salary").select2({
          placeholder: "Current Salary",
          allowClear: true
        });
        $(".high_edu_level").select2({
          placeholder: "Highest Education",
          allowClear: true
        });
      });
    </script>
    @endsection
