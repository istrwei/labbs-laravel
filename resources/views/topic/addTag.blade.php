@extends('layouts.master')

@section('title', 'Add tag for ' . $topic->title)

@section('content')
<form class="form-horizontal" method="post" action="/topics/{{ $topic->id }}/tags">
  {!! csrf_field() !!}
  <div class="form-group">
    <label for="tag" class="col-sm-2 control-label">Tag</label>
    <div class="col-sm-10 col-md-8">
      @foreach ($tags as $tag)
        <label class="radio-inline">
          <input type="radio" name="tag" value="{{ $tag->id }}"> {{ $tag->name }}
        </label>
      @endforeach
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </div>
</form>
@endsection
