<!-- @if (!Session::has('username'))
{{Redirect::to('/') }}
@endif -->

@extends('layouts.app')

@section('title')
JobsMartIndia| Dashboard
@endsection

@section('content-header')
<section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <!-- <li class="active">Dashboard</li> -->
      </ol>
</section>
@endsection

@section('content')
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Candidates</span>
              <span class="info-box-number">2000<!-- <small>%</small> --></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-building-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Companies</span>
              <span class="info-box-number">2000<!-- <small>%</small> --></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-person-add"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Placed Candidates</span>
              <span class="info-box-number">2000<!-- <small>%</small> --></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-cash"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Earning</span>
              <span class="info-box-number">2000<!-- <small>%</small> --></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Potential Cash Folw</span>
              <span class="info-box-number">2000<!-- <small>%</small> --></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>

      <!-- /.row (main row) -->

    </section>
    @endsection
