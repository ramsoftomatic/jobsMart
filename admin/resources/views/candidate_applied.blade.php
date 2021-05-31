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
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 myformdiv">
  
    <div class="row">
    
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                <div class="form-group">
                    <label for="job">
                            Search Type
                    </label>
                    <select class="form-control select2" id="search_type">
                    
                    <option value="job_wise">Job Wise</option>
                    <option value="candidate_wise">candidate Wise</option>
                    </select>
                </div>
            </div>
           
        </div>
        <div class="row">
        <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr NO</th>
                  <th>Job</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mob No</th>
                  <th>DOB</th>
                  <th>Total Experience</th>
                  <th>Education</th>
                  <th>Apply at</th>
                  <th>Resume</th>
                </tr>
                </thead>
                <tbody>
                <?php $j=1;
                for($i=0;$i<sizeof($data_array);$i++)
                {
                ?>
                @foreach($data_array[$i] as $row)
                <tr>
                   <td align="center">{{$j++}}</td>
                   <td>{{$row->job_title}}</td>
                   <td>{{$row->name}}</td>
                   <td>{{$row->email}}</td>
                   <td align="center">{{$row->mobile}}</td>
                   <td align="center">@if($row->dob!=''){{date('d-m-Y',strtotime($row->dob))}} @endif</td>
                   <td align="center">@if($row->total_exp!=''){{$row->total_exp}} yr @endif</td>
                   <td align="center">{{$row->high_edu_level}}</td>
                   <td align="center">{{date('d-m-Y',strtotime($row->apply_at))}}</td>
                   <td><a href="public/{{$row->resume}}" target="_blank">View Resume</a></td>
                </tr>
                @endforeach
                <?php } ?>
                </tbody>
              </table>
            </div>
        </div>

  </div>

  </div>
      
</section>



 
<link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>


     $(document).ready(function () {
        $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'responsive'  : true
    });
        $('.select2').select2();

$("#search_type").select2({
 placeholder: "Select search type",
 allowClear: true
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$("#search_type").change(function(){
   var search_type= $(this).val();
    $.ajax({
                   type: 'POST',
                   url: 'search_candidate',
                   data: {
                     search_type :search_type,
                    
                   },
                   success: function (data) {
                     console.log(data);
                     $('.box-body').empty().html(data);
                     $('#example2').DataTable({
                        'paging'      : true,
                        'lengthChange': true,
                        'searching'   : true,
                        'ordering'    : true,
                        'info'        : true,
                        'autoWidth'   : true,
                        'responsive'  : true
                        });
                  
                   },
                   error:function(data) {
                     console.log(data);
                   }
               });
        
})


        

 });
</script>
@endsection
