@extends('layouts.master')

@section('content')
     @include('includes.message-block')
     <div class="container">
		<div class="row">
			<div class="col-md-12 ">
					<div  class="col-lg-6">
					
						
						Welcome : {{Auth::user()->name}} </br>
						Your Email:@if(Auth::user()->post)
						{{Auth::user()->post->first_name}} 
						@endif
						
						<h1 class="well well-lg">All Image List</h1>
						@foreach( $images as $image )
    					<div class="table table-bordered bg-success">
    	<img src="{!! 'public/images/'.$image->filePath !!}">
    					{{--	<img src="{{'/images/'.$image->filePath}}">--}}
    					</div>
						@endforeach
		
						
					</div>
				</div>
			</div>
		</div>
	</div>
 @endsection