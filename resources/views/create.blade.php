@extends('layouts.master')

@section('content')
     @include('includes.message-block')
     <div class="container" >
			<h3> Create course </h3>
		{!! Form::open(array('route' => 'save','class'=>'form-horizontal','method'=>'POST'))  !!}
		{!!	Form::token(); !!}
		{!!	  csrf_field() ; !!} 
  			<div class="form-group">
    			<label>First Name</label>
    			<input type="text" name="first_name" class="form-control"  placeholder="First Name">
  			</div>
  			<div class="form-group">
    			<label>Middle Name</label>
    			<input type="text" name="middle_name" class="form-control"  placeholder="Middle Name">
  			</div>
  			<div class="form-group">
    			<label>Last Name</label>
    			<input type="text" name="last_name" class="form-control"  placeholder="Last Name">
  			</div>

  			<div class="form-group">
    			<label>Gender</label>
				<select class="form-control" name="gender">
  					<option>Male</option>
  					<option>Female</option>  	
				</select>
			</div>
        	<div class="form-group">
          		<label> Date Of Birth</label>  
          		<input type="date" name="dob" class="form-control" placeholder="Date Of Birth">
        	</div>

        	<div class="form-group">
    			<label>Nationality</label>
    			<input type="text" name="nationality" class="form-control"  placeholder="Nationality">
  			</div>

  			<div class="form-group">
    			<label>NID</label>
    			<input type="text" name="nid" class="form-control"  placeholder="NID">
  			</div>

  			<div class="form-group">
    			<label>Email</label>
    			<input type="email" name="email" class="form-control"  placeholder="Email">
  			</div>

  			<div class="form-group">
    			<label>Phone</label>
    			<input type="text" name="phone_no" class="form-control"  placeholder="Phone">
  			</div>

  			<div class="form-group">
    			<label>About Me</label>
    			<textarea class="form-control" name="about_me" placeholder="About Me" rows="3"></textarea>
  			</div>

       
  			<button type="submit" class="btn btn-default">Submit</button>
		{!! Form::close() !!}
		</div>

 @endsection