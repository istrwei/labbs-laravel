@extends('layouts.master')

@section('title', 'Login')

@section('content')
  <form class="form-horizontal" method="post" action="/auth/login">
    {!! csrf_field() !!}
    <input type="hidden" name="remember" value="true">
    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10 col-md-6">
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10 col-md-6">
        <input type="password" class="form-control" id="password" name="password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </form>
@endsection
