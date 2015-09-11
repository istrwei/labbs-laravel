@extends('layouts.master')

@section('title', $topic->title)

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    {{ $topic->title }}
  </div>
  <div class="panel-body">
    <p>{{ $topic->body }}</p>
  </div>
</div>

@foreach ($topic->replies as $reply)
  <div class="panel panel-default">
    <div class="panel-body">
      <p>{{ $reply->body }}</p>
    </div>
</div>@endforeach

<form class="form-horizontal" method="post" action="/topics/{{ $topic->id }}/replies">
  {!! csrf_field() !!}
  <div class="form-group">
    <label for="body" class="col-sm-2 control-label">Body</label>
    <div class="col-sm-10 col-md-8">
      <textarea class="form-control" id="body" name="body" rows="5"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Reply</button>
    </div>
  </div>
</form>
@endsection
