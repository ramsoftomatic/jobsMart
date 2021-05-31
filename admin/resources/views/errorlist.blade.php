@extends('layouts.form-app')

@section('title')
JobSmartIndia| View Error List
@endsection

@section('content-header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="content-header">
      <h1>
        View Error List
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Error List</li>
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

      <div class="row" id="errorlisttable">
        @include('errorlisttable')
@endsection
