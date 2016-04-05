@extends('layouts.master')
@section('title')
Welcome
@endsection
@section('content')
@include('includes.message-block')
<div class="row">
    <div class="col-md-6">
        <h3> Sign Up</h3>
        <form action="{{route('signup')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">  
          <div class="form-group" {{$errors->has('name') ? 'has-error' : ''}}>
            <label >Your First Name</label>
            <input type="text" class="form-control" name="name" value="{{Request::old('name')}}" placeholder="User Name">
          </div>
          <div class="form-group" {{$errors->has('email') ? 'has-error' : ''}}>
            <label >Email address</label>
            <input type="email" class="form-control" name="email" value="{{Request::old('email')}}" placeholder="Email">
          </div>
           
          <div class="form-group" {{$errors->has('password') ? 'has-error' : ''}}>
            <label >Password</label>
            <input type="password" name="password" class="form-control" value="{{Request::old('password')}}" placeholder="Password">
          </div>
       
          <button type="submit" class="btn btn-default">Submit</button>
          
        </form>
    </div>

     <div class="col-md-6">
        <h3> Sign In</h3>
         <form action="{{route('signin')}}" method="POST">
             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
          <div class="form-group" {{$errors->has('email') ? 'has-error' : ''}}>
            <label >Email address</label>
            <input type="email" class="form-control" name="email" value="{{Request::old('email')}}" placeholder="Email">
          </div>
          <div class="form-group" {{$errors->has('password') ? 'has-error' : ''}}>
            <label >Password</label>
            <input type="password" name="password" class="form-control" value="{{Request::old('password')}}" placeholder="Password">
          </div>
       
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>

@endsection