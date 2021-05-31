@extends('layouts.form-app')

@section('title')
JobSmartIndia| View Resume
@endsection

@section('content-header')
<section class="content-header">
      <h1>
        View Resume
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Resume</li>
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
        <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive" id="resumetable">
              <div class="row">
              <div class="col-lg-12">
              @include('resumetable')
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
			</div>
</section>

@endsection
