@extends('layouts.master')

@section('title', 'Register')

@section('content')
  <form class="form-horizontal" method="post" action="/auth/register">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="name" class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10 col-md-6">
        <input type="email" class="form-control" id="name" name="email" value="{{ old('email') }}">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10 col-md-6">
        <input type="password" class="form-control" id="password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label for="password_confirmation" class="col-sm-2 control-label">Confirm</label>
      <div class="col-sm-10 col-md-6">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </div>
  </form>
@endsection
