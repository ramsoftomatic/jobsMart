@extends('layouts.form-app')

@section('title')
JobSmartIndia|  Candidate List
@endsection

@section('content-header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="content-header">
      <h1>
         Company List
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
            <!-- <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>phone</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Web</th>
                  <th>Payment Term</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                  @foreach($comapny_records as $company_data)
                   <tr>
                    <td>{{$i++}}</td>
                    <td>{{$company_data->company_name}}</td>
                    <td>{{$company_data->company_contact_no}}</td>
                    <td>{{$company_data->company_email}}</td>
                    <td>{{$company_data->company_type}}</td>
                    <td>{{$company_data->company_web}}</td>
                    <td>{{$company_data->paymenterm}}</td>
                    <td><button type="button" class="btn bg-orange wave-effect edit-modal" data-toggle="modal" data-target="#updateModal" data-tid="{{$company_data->company_id}}"
                     data-tfirst="{{$company_data->company_name}}"
                     data-tphone="{{$company_data->company_contact_no}}"
                     data-temail="{{$company_data->company_email}}"
                     data-ttype="{{$company_data->company_type}}"
                     data-tweb="{{$company_data->company_web}}"
                     data-teyear="{{$company_data->establish_year}}"
                     data-tturnover="{{$company_data->turnover}}"
                     data-tproducts="{{$company_data->products_of_co}}"
                     data-ttindustry="{{$company_data->industry}}"
                     data-temployee_no="{{$company_data->employee_no}}"
                     data-towner_name="{{$company_data->owner_name}}"
                     data-towner_email="{{$company_data->owner_email}}"
                     data-towner_phone="{{$company_data->owner_phone}}"
                     data-tcaddress1="{{$company_data->company_address1}}"
                     data-tcaddress2="{{$company_data->company_address2}}"
                     data-tcstate="{{$company_data->company_state}}"
                     data-tccity="{{$company_data->company_city}}"
                     data-tcpin="{{$company_data->company_pincode}}"

                     data-toaddress1="{{$company_data->office_address1}}"
                     data-toaddress2="{{$company_data->office_address2}}"
                     data-toff_state="{{$company_data->office_state}}"
                     data-toff_city="{{$company_data->office_city}}"
                     data-toff_pincode="{{$company_data->office_pincode}}"
                     data-tbranch_add1="{{$company_data->branch_address1}}"
                     data-tbranch_add2="{{$company_data->branch_address2}}"
                     data-tbranch_state="{{$company_data->branch_state}}"
                     data-tbranch_city="{{$company_data->branch_city}}"
                     data-tbranch_pin="{{$company_data->branch_pincode}}"

                     data-tgst="{{$company_data->gst_no}}"
                     data-tcharges="{{$company_data->charges}}"
                     data-tregi="{{$company_data->registration}}"
                     data-treplace="{{$company_data->replacement}}"
                     data-tpayment="{{$company_data->paymenterm}}"
                     data-tstart_date="{{$company_data->start_date}}"
                     data-tend_date="{{$company_data->end_date}}"
                     data-tclient_since="{{$company_data->client_since}}"
                     data-tremark="{{$company_data->remark}}"
                     data-tdocuments="{{$company_data->documents}}"
                     data-tposition="{{$company_data->position}}"
                     data-texperience="{{$company_data->experience}}"
                     data-tsalary="{{$company_data->salary}}"
                     data-tv_status="{{$company_data->vecancy_status}}"
                     data-tcomp_loc="{{$company_data->comp_location}}"
                      data-toggle="tooltip" data-placement="top" title="view"><i class="fa fa-arrows" aria-hidden="true"></i></button>
                     </td>
                    <td><a href="update_company-{{$company_data->company_id}}" style="background-color: #2db38e" data-toggle="tooltip" data-placement="left" title="Edit Company" class="btn bg-primary wave-effect" ><i class="fa fa-pencil" aria-hidden="true" ></i></a></td>
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
                        <h4 class="modal-title" id="uModalLabel" style="color:#fff;">Client Details </h4>
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
                                                                </i>Company
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
                                                                               Name:
                                                                                                          
                                                                                <label for="first_name" id="company_name"
                                                                                    class="labels"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Contact:
                                                                                <label class="labels"
                                                                                    id="company_contact_no"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                          Type:
                                                              <label class="labels" id="company_type"></label>            </div>
                                                                        </div>
                                                                    </div>
                                                              </div>
                                                              <div class="row clearfix">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                              Email:
                                                                                <label class="labels"
                                                                                    id="company_email"> 
                                                                                  </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Owner Email:
                                                                                <label class="labels"
                                                                                    id="owner_email"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                              </div>

                                                              <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                              Web:
                                                                                <label class="labels"
                                                                                    id="company_web"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                              Establish Year:
                                                                                <label class="labels"
                                                                                    id="establish_year"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                              Turnover:
                                                                                <label class="labels"
                                                                                    id="turnover"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                              </div>
                                                              <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               Industry:
                                                                                <label class="labels"
                                                                                    id="industry"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                      <div class="form-group">
                                                                            <div class="form-line">
                                                                              Employee No.:
                                                                                <label class="labels"
                                                                                    id="employee_no"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                              Owner Name:
                                                                                <label class="labels"
                                                                                    id="owner_name"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                              </div>

                                                              <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Owner Contact:
                                                                                <label class="labels"
                                                                                    id="owner_phone"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                              Products of Company:
                                                                                <label class="labels"
                                                                                    id="products_of_co"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="row clearfix">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               Address1:
                                                                                <label class="labels"
                                                                                    id="company_address1"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                             Address2:
                                                                                <label class="labels"
                                                                                    id="company_address2"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                State:
                                                                                <label class="labels"
                                                                                    id="company_state"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               City:
                                                                                <label class="labels"
                                                                                    id="company_city"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                             Pincode:
                                                                                <label class="labels"
                                                                                    id="company_pincode"> </label>
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
                                                                </i>Office Address
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseTwo_19" class="panel-collapse collapse"
                                                            role="tabpanel" aria-labelledby="headingTwo_19">
                                                            <div class="panel-body">
                                                              <div class="row clearfix">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                              Address1:
                                                                                <label class="labels"
                                                                                    id="office_address1"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                             Address2:
                                                                                <label class="labels"
                                                                                    id="office_address2"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                  </div>
                                                                    <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               State:
                                                                                <label class="labels"
                                                                                    id="office_state"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                City:
                                                                                <label class="labels"
                                                                                    id="office_city"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Pincode:
                                                                                <label class="labels"
                                                                                    id="office_pincode"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                  </div>
                                                                  
                                                                  <div class="row clearfix">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Branch Address1:
                                                                                <label class="labels"
                                                                                    id="branch_address1"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Branch Address2:
                                                                                <label class="labels"
                                                                                    id="branch_address2"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                  </div>
                                                                      <div class="row clearfix">
                                                                     <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Branch State:
                                                                                <label class="labels"
                                                                                    id="branch_state"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Branch City:
                                                                                <label class="labels"
                                                                                    id="branch_city"> </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                Branch Pincode:
                                                                                <label class="labels"
                                                                                    id="branch_pincode"> </label>
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
                                                                </i>Payment Details
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
                                                                              Gst NO.:
                                                                                                           
                                                                                <label for="pref_state" id="gst_no"
                                                                                    class="labels"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                             Charges:
                                                                                <label class="labels"
                                                                                    id="charges"> </label>
                                                                                 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                               Registration:
                                                                                <label class="labels"
                                                                                    id="registration"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                  </div>
                                                                  <div class="row clearfix">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                              Replacement:
                                                                                <label class="labels"
                                                                                    id="replacement"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                            Payment Terms:
                                                                                <label class="labels"
                                                                                    id="paymenterm"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                           Contract Start Date:
                                                                                <label class="labels"
                                                                                    id="start_date"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                  </div>
                                                                    <div class="row clearfix">
                                                                    
                                                                    
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                            Contract End Date:
                                                                                <label class="labels"
                                                                                    id="end_date"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                              Client since:
                                                                                <label class="labels"
                                                                                    id="client_since"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                             Remark:
                                                                                <label class="labels"
                                                                                    id="remark"> </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                  </div>
                                                                    <div class="row clearfix">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                          Document:
                                                                                <label class="labels"
                                                                                    id="documents"> </label>
                                                                                
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
            $('#fid').val($(this).data('tid'));  console.log($(this).data('tid'));
            $('#company_name').html($(this).data('tfirst'));
            $('#company_contact_no').html($(this).data('tphone'));
            $('#company_email').html($(this).data('temail'));
             $('#company_type').html($(this).data('ttype'));

             $('#company_web').html($(this).data('tweb'));  console.log($(this).data('tid'));
            $('#establish_year').html($(this).data('teyear'));
            $('#turnover').html($(this).data('tturnover'));
            $('#products_of_co').html($(this).data('tproducts'));

            $('#industry').html($(this).data('ttindustry'));  console.log($(this).data('tid'));
            $('#employee_no').html($(this).data('temployee_no'));
            $('#owner_name').html($(this).data('towner_name'));
            $('#owner_email').html($(this).data('towner_email'));

            $('#owner_phone').html($(this).data('towner_phone'));  console.log($(this).data('tid'));
            $('#company_address1').html($(this).data('tcaddress1'));
            $('#company_address2').html($(this).data('tcaddress2'));
            $('#company_state').html($(this).data('tcstate'));

            $('#company_city').html($(this).data('tccity'));  console.log($(this).data('tid'));
            $('#company_pincode').html($(this).data('tcpin'));
            $('#office_address1').html($(this).data('toaddress1'));
            $('#office_address2').html($(this).data('toaddress2'));
            $('#office_state').html($(this).data('toff_state')).prop('href',$(this).data('tcresume'));


            $('#office_city').html($(this).data('toff_city'));  console.log($(this).data('tid'));
            $('#office_pincode').html($(this).data('toff_pincode'));
            $('#branch_address1').html($(this).data('tbranch_add1'));
            $('#branch_address2').html($(this).data('tbranch_add2'));
            $('#branch_state').html($(this).data('tbranch_state')).prop('href',$(this).data('tcresume'));
             $('#branch_city').html($(this).data('tbranch_city'));
            $('#branch_pincode').html($(this).data('tbranch_pin'));

             $('#gst_no').html($(this).data('tgst'));  console.log($(this).data('tid'));
            $('#charges').html($(this).data('tcharges'));
            $('#registration').html($(this).data('tregi'));
            $('#replacement').html($(this).data('treplace'));
            $('#paymenterm').html($(this).data('tpayment')).prop('href',$(this).data('tcresume'));
             $('#start_date').html($(this).data('tstart_date'));
            $('#end_date').html($(this).data('tend_date'));
             $('#client_since').html($(this).data('tclient_since')).prop('href',$(this).data('tcresume'));
             $('#remark').html($(this).data('tremark'));
            $('#documents').html($(this).data('tdocuments'));
           
           




            $('#updateModal').modal('show');
        });

 });
</script>

@endsection
