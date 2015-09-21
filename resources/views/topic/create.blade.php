@extends('layouts.master')

@section('title', 'Create Topic')

@section('content')
  <form class="form-horizontal" method="post" action="/topics">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="title" class="col-sm-2 control-label">Title</label>
      <div class="col-sm-10 col-md-8">
        <input type="text" class="form-control" id="title" name="title">
      </div>
    </div>
    <div class="form-group">
      <label for="body" class="col-sm-2 control-label">Body</label>
      <div class="col-sm-10 col-md-8">
        <textarea class="form-control" id="body" name="body" rows="5"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
  </form>
@endsection
