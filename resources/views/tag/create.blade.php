@extends('layouts.master')

@section('title', 'Create Tag')

@section('content')
  <form class="form-horizontal" method="post" action="/tags">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="name" class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10 col-md-8">
        <input type="text" class="form-control" id="name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label for="description" class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10 col-md-8">
        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
  </form>
@endsection
