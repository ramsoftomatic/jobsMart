@extends('layouts.form-app')

@section('title')
JobsMartIndia| Add Staff
@endsection

@section('content-header')
<section class="content-header">
      <h1>
        Add Staff
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Staff</li>
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
      <h3><center>{{session('failure')}}</center></h3>
    </div> 
  @endif

          <div class="row">
        <!-- contact form -->
        <div class="col-md-10 col-md-offset-1 myformdiv">
        
        <form name="myform" id="myform" action="add_staff/add" class="contact-form" method="post"  >
          {{csrf_field()}}
          
         <div class="col-xs-12">
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Name</label>
                  <input type="text" name="name" id="name" class="form-control has-feedback-left name" value="{{old('company_name')}}" placeholder="Name">
                     <span class="error" aria-hidden="true">{{$errors->first('name')}}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Contact No</label>
                      <input type="number" name="mobile" id="mobile" class="form-control has-feedback-left mobile" value="{{old('mobile')}}" placeholder="Contact Number">
                        <span class="error" aria-hidden="true">{{$errors->first('mobile')}}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Address</label>
                      <input type="text" name="address" id="address" class="form-control has-feedback-left address"  value="{{old('address')}}" placeholder="Address">
                    <span class="error" aria-hidden="true">{{$errors->first('address')}}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Location</label>
                      <input type="text" name="location" id="location" class="form-control has-feedback-left location" value="{{old('location')}}" placeholder="location">
                     <span class="error" aria-hidden="true">{{$errors->first('location')}}</span>
                  </div>
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">joining Date</label>
                      <input type="text" name="date" id="datepicker" class="form-control has-feedback-left datepicker" value="" placeholder="Date" autocomplete="off" >
                       <span class="error" aria-hidden="true">{{$errors->first('date')}}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Salary</label>
                      <input type="text" name="salary" id="salary" class="form-control has-feedback-left salary" value="{{old('salary')}}" placeholder="salary">
                      <span class="error" aria-hidden="true">{{$errors->first('salary')}}</span>
                  </div>
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Email</label>
                      <input type="text" name="email" id="email" class="form-control has-feedback-left email" value="{{old('email')}}" placeholder="Email">
                      <span class="error" aria-hidden="true">{{$errors->first('email')}}</span>
                  </div>         
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Password</label>
                      <input type="password" name="password" class="form-control has-feedback-left password" value="{{old('password')}}" placeholder="password" id="password">
                     <span class="error" aria-hidden="true">{{$errors->first('password')}}</span>
                  </div>  
                  <div class="col-lg-3 col-sm-12 col-xs-12 col-md-4 form-group">
                      <label for="GST number">Clients</label>
                      <select class="form-control has-feedback-left clients" id="clients"  name="clients[]" placeholder="clients" multiple="true">
                          <option value="">Select clients</option>
                        @foreach($clients as $client_data)
                          <option value="{{$client_data->company_id}}">{{$client_data->company_name}}</option>
                        @endforeach 
                        </select>                 
                        <span class="error" aria-hidden="true">{{$errors->first('clients')}}</span>
                  </div>   
              </div> 
          <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4 col col-md-offset-4 col-lg-offset-4 form-group">
                    <button type="submit" class="btn btn-primary form-control col-md-4" >Submit</button>
                  </div>
        </form>
        </div>
        <!-- /contact form -->

      </div>
      <!-- /Row -->

</section>

  
 <style type="text/css">
    .error {
      color: #ca7878;
    }
    .phone_email_input {
      margin-bottom: 2px;
    }
  </style>
<script>
   $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
        autoclose: true,
        zIndexOffset: 9999
    });
</script>
@endsection
