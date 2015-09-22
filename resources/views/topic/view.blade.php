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
    <div class="panel-footer">
      {{ $topic->author->name }} {{ $topic->updated_at }}
    </div>
  </div>

  @foreach ($replies as $reply)
    <div class="panel panel-default">
      <div class="panel-body">
        <p>{{ $reply->body }}</p>
      </div>
      <div class="panel-footer">
        {{ $reply->author->name }} {{ $reply->created_at }}
      </div>
    </div>
  @endforeach

  <div class="text-center">
    <div class="center-block">
      {!! $replies->render() !!}
    </div>
  </div>

  <form class="form-horizontal" method="post" action="/topics/{{ $topic->id }}/replies">
    {!! csrf_field() !!}
    <div class="form-group">
      <div class="col-sm-12">
        <textarea class="form-control" id="body" name="body" rows="5"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">Reply</button>
      </div>
    </div>
  </form>
@endsection
