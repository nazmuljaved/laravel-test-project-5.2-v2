@extends('layouts.master')

@section('content')
     @include('includes.message-block')
     <div class="container" >
			<h3> Update Profile </h3>
		{!! Form::open(array('route' => 'update','class'=>'form-horizontal','method'=>'POST'))  !!}
	   {!!	Form::token(); !!}
		    {!!	  csrf_field() ; !!} 
  			<div class="form-group">
    			<label>First Name</label>
    			<input type="text" name="first_name" class="form-control"   
          value="@if($posts->first()){{$posts->first()->first_name}}@endif">
  			</div>
  			<div class="form-group">
    			<label>Middle Name</label>
    			<input type="text" name="middle_name" class="form-control"  value="@if($posts->first()){{$posts->first()->middle_name}}@endif">
  			</div>
  			<div class="form-group">
    			<label>Last Name</label>
    			<input type="text" name="last_name" class="form-control"   value="@if($posts->first()){{$posts->first()->last_name}}@endif">
  			</div>

  			<div class="form-group">
    			<label>Gender</label>
				<select class="form-control" name="gender" value="@if($posts->first()){{$posts->first()->gender}}@endif">
  					<option>Male</option>
  					<option>Female</option>  	
				</select>
			</div>
        	<div class="form-group">
          		<label> Date Of Birth</label>  
          		<input type="date" name="dob" class="form-control"  value="@if($posts->first()){{$posts->first()->dob}}@endif">
        	</div>

        	<div class="form-group">
    			<label>Nationality</label>
    			<input type="text" name="nationality" class="form-control"   value="@if($posts->first()){{$posts->first()->nationality}}@endif">
  			</div>

  			<div class="form-group">
    			<label>NID</label>
    			<input type="text" name="nid" class="form-control"   value="@if($posts->first()){{$posts->first()->nid}}@endif">
  			</div>

  			<div class="form-group">
    			<label>Email</label>
    			<input type="email" name="email" class="form-control"   value="@if($posts->first()){{$posts->first()->email}}@endif">
  			</div>

  			<div class="form-group">
    			<label>Phone</label>
    			<input type="text" name="phone_no" class="form-control"   value="@if($posts->first()){{$posts->first()->phone_no}}@endif">
  			</div>

  			<div class="form-group">
    			<label>About Me</label>
    			<textarea class="form-control" name="about_me"  rows="3">@if($posts->first()){{$posts->first()->about_me}}@endif</textarea>
  			</div>

       
  			<button type="submit" class="btn btn-default">Submit</button>
		{!! Form::close() !!}            
		</div>

 @endsection  