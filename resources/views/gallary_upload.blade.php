@extends('layouts.master')

@section('content')
     @include('includes.message-block')
     
    <h1 class="well well-lg">Upload Image</h1>
    <div class="container">
   {!! Form::open(array('route' => 'saveImage','class'=>'form-horizontal','method'=>'POST','files'=>true))  !!}
   {{--   {!! Form::open(['route'=>'saveImage', 'files'=>true]) !!}	--}}  
        	{!!	Form::token(); !!}
		    {!!	  csrf_field() ; !!} 
        <div class="form-group">
            {!! Form::label('image', 'Choose an image') !!}
            {!! Form::file('image') !!}
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
		{!! Form::close() !!}   

       
    </div>
     
 @endsection