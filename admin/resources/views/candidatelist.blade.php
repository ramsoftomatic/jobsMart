@extends('layouts.form-app')

@section('title')
JobSmartIndia|  Candidate List
@endsection

@section('content-header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="content-header">
      <h1>
         Candidate List
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Job List</li>
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

      <div class="row" id="candidate_table">
 
        <div class="box">
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>first</th>
                  <th>phone</th>
                  <th>data</th>
                  <th>Experience</th>
                  <th>Education</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                  @foreach($candidate as $candidate_list)
                   <tr>
                    <td>{{$i++}}</td>
                    <td>{{$candidate_list->first_name}}  {{$candidate_list->last_name}}</td>
                    <td>{{$candidate_list->phone}}</td>
                    <td>{{$candidate_list->email_id}}</td>
                    <td>{{$candidate_list->work_exp}}</td>
                    <td>{{$candidate_list->education}}</td>
                    <td><button type="button" class="btn bg-orange wave-effect edit-modal" data-toggle="modal" data-target="#updateModal" data-tid="{{$candidate_list->id}}"
                     data-tfirst="{{$candidate_list->first_name}}"
                     data-tlast="{{$candidate_list->last_name}}"
                     data-tphone="{{$candidate_list->phone}}"
                     data-tdob="{{$candidate_list->dob}}"
                     data-temail="{{$candidate_list->email_id}}"
                     data-tcstate="{{$candidate_list->curr_state}}"
                     data-tccity="{{$candidate_list->curr_city}}"
                     data-tcarea="{{$candidate_list->curr_area}}"
                     data-tpstate="{{$candidate_list->pref_state}}"
                     data-tpcity="{{$candidate_list->pref_city}}"
                     data-tparea="{{$candidate_list->pref_area}}"
                     data-tpgender="{{$candidate_list->gender}}"
                     data-texp="{{$candidate_list->work_exp}}"
                     data-tannualsalary="{{$candidate_list->curr_annual_salary}}"
                     data-tcjobtitle="{{$candidate_list->curr_job_title}}"
                     data-tcarea="{{$candidate_list->curr_functional_area}}"
                     data-tcindistry="{{$candidate_list->curr_industry}}"
                     data-tcjobs="{{$candidate_list->years_cjobs}}"
                     data-tceducation="{{$candidate_list->education}}"
                     data-tcresume="{{$candidate_list->resume_file}}"
                      data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="material-icons">view</i></button>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

      </div>
</section>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="mymodelcontent">
                <div class="modal-header bg-pink" style="background-color: #3c8dbc;">
                        <h4 class="modal-title" id="uModalLabel" style="color:#fff;">Candidate Details </h4>
               </div>
         
                <div class="modal-body">   
    <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">

                                    <div class="body">
                                        <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel-group full-body" id="accordion_19" role="tablist"
                                                    aria-multiselectable="true">

                                                   <input type="hidden" id="fid" name="id" class="form-control" placeholder="Bank Name" required />                                                        
                                                    <div class="panel">
                                                        {{ csrf_field() }}
                                                        <div class="panel-heading  panel-col-teal" role="tab"
                                                            id="headingOne_19">
                                                            <h4 class="panel-title">
                                                              
                                                                <a role="button" data-toggle="collapse"
                                                                    href="#collapseOne_19" aria-expanded="true"
                                                                    aria-controls="collapseOne_19">
                                                                    <i class="material-icons"><i class="fa fa-plus"></i> 
                                                                </i>Personal
                                                                    Details
                                                                </a>
                                                            </h4>
                                                        </div>

                                                        <div id="collapseOne_19" class="panel-collapse collapse in"
                                                            role="tabpanel" aria-labelledby="headingOne_19">
                                                            
                                                            <div class="panel-body">
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               First Name:
                                                                                                          
                                                                                <label for="first_name" id="first_name"
                                                                                    class="labels"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Last Name:
                                                                                <label class="labels"
                                                                                    id="last_name"> </label>
                                                                            
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Contact:
                                                                                <label class="labels"
                                                                                    id="phone"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                dob:
                                                                                <label class="labels"
                                                                                    id="dob"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Email:
                                                                                <label class="labels"
                                                                                    id="email_id"> </label>
                                                                                 
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Gender:
                                                                                <label class="labels"
                                                                                    id="gender"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                       
                                  
                                                    <div class="panel">
                                                        <div class="panel-heading panel-col-cyan" role="tab"
                                                            id="headingTwo_19">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                    data-toggle="collapse" href="#collapseTwo_19"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseTwo_19">
                                                                    <i class="material-icons"><i class="fa fa-plus"></i> 
                                                                </i>Current Location
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseTwo_19" class="panel-collapse collapse"
                                                            role="tabpanel" aria-labelledby="headingTwo_19">
                                                            <div class="panel-body">
                                                                
                                                            
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                State:
                                                                                                           
                                                                                <label for="curr_state" id="curr_state"
                                                                                    class="labels"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                City:
                                                                                <label class="labels"
                                                                                    id="curr_city"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Area:
                                                                                <label class="labels"
                                                                                    id="curr_area"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="panel">                             
                                                        <div class="panel-heading  panel-col-teal" role="tab"
                                                            id="headingThree_19">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                    data-toggle="collapse" href="#collapseThree_19"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseThree_19">
                                                                    <i class="material-icons"><i class="fa fa-plus"></i> 
                                                                </i>Preferred Location
                                                                </a>

                                                            </h4>
                                                        </div>
                                                        <div id="collapseThree_19" class="panel-collapse collapse"
                                                            role="tabpanel" aria-labelledby="headingThree_19">
                                                             <div class="panel-body">
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                State:
                                                                                                           
                                                                                <label for="pref_state" id="pref_state"
                                                                                    class="labels"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                City:
                                                                                <label class="labels"
                                                                                    id="pref_city"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Area:
                                                                                <label class="labels"
                                                                                    id="pref_area"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                     <div class="panel">
                                                        <div class="panel-heading panel-col-cyan" role="tab"
                                                            id="headingFour_19">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button"
                                                                    data-toggle="collapse" href="#collapseFour_19"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseFour_19">
                                                                    <i class="material-icons"><i class="fa fa-plus"></i> 
                                                                </i>Current Status
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseFour_19" class="panel-collapse collapse"
                                                            role="tabpanel" aria-labelledby="headingFour_19">
                                                              <div class="panel-body">
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                            Industry:
                                                                                                           
                                                                                <label for="curr_industry" id="curr_industry"
                                                                                    class="labels"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Experience:
                                                                                <label class="labels"
                                                                                    id="work_exp"> </label>
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               Annual Salary:
                                                                                <label class="labels"
                                                                                    id="curr_annual_salary"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Job Title:
                                                                                <label class="labels"
                                                                                    id="Job Title"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               Functional Area:
                                                                                <label class="labels"
                                                                                    id="curr_functional_area"> </label>
                                                                                 
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               Years in  Job:
                                                                                <label class="labels"
                                                                                    id="years_cjobs"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               Education:
                                                                                <label class="labels"
                                                                                    id="education"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                     <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               Resume File:
                                                                                <a href="resume/" id="resume_file" target="_blank"><div   id="resume_file"></div></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                            </div>
                                        </div>
                
                                </div>
                        </div>
                     </div>
                </div>
 
</div></div>
</div></div></div>
 
<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
     $(document).ready(function () {
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

         $(document).on('click', '.delete-modal', function () {
            $('#id').val($(this).data('id'));
            $('#status').val($(this).data('status'));
            $('#deleteModal8').modal('show');
        });

          $(document).on('click', '.edit-modal', function () {
            $('#fid').val($(this).data('tid'));
            $('#first_name').html($(this).data('tfirst'));
            $('#last_name').html($(this).data('tlast'));
            $('#phone').html($(this).data('tphone'));

             $('#dob').html($(this).data('tdob'));
            $('#email_id').html($(this).data('temail'));
            $('#curr_state').html($(this).data('tcstate'));
            $('#curr_city').html($(this).data('tccity'));

            $('#curr_area').html($(this).data('tcarea'));
            $('#pref_state').html($(this).data('tpstate'));
            $('#pref_city').html($(this).data('tpcity'));
            $('#pref_area').html($(this).data('tparea'));

            $('#gender').html($(this).data('tpgender')); 
            $('#work_exp').html($(this).data('texp'));
            $('#curr_annual_salary').html($(this).data('tannualsalary'));
            $('#curr_job_title').html($(this).data('tcjobtitle'));

            $('#curr_functional_area').html($(this).data('tcarea'));
            $('#curr_industry').html($(this).data('tcindistry'));
            $('#years_cjobs').html($(this).data('tcjobs'));
            $('#education').html($(this).data('tceducation'));
            $('#resume_file').html($(this).data('tcresume')).prop('href',$(this).data('tcresume'));


            $('#updateModal').modal('show');
        });

 });
</script>
@endsection
