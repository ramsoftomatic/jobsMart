@extends('layouts.form-app')

@section('title')
JobSmartIndia| Staff List
@endsection

@section('content-header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="content-header">
      <h1>
       Staff List
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Staff List</li>
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

      <div class="row" id="staff_list">
          <div class="box">
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Location</th>
                  <th>Joining_date</th>
                  <th>Salary</th>
                  <th>Email</th>
                  <th>Clients</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                  @foreach($staff as $staff_list)
                   <tr>
                    <td>{{$i++}}</td>
                    <td>{{$staff_list->name}}</td>
                    <td>{{$staff_list->mobile}}</td>
                    <td>{{$staff_list->address}}</td>
                    <td>{{$staff_list->location}}</td>
                    <td>{{$staff_list->joining_date}}</td>
                    <td>{{$staff_list->salary}}</td>
                    <td>{{$staff_list->email}}</td>
                    <td>{{$staff_list->company}}</td>
                     
                     
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

      </div>
</section>
@endsection
