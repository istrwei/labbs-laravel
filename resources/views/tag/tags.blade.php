@extends('layouts.master')

@section('title', 'All Tags')

@section('content')
  @foreach ($tags as $tag)
    <p>
      <a href="/tags/{{ $tag->id }}"><span class="label label-default">{{ $tag->name }}</span></a>
      {{ $tag->description }}
    </p>
  @endforeach
@endsection

@section('sidebar')
  <div class="panel panel-default">
    <div class="panel-body">
      <a href="/tags/create" class="btn btn-success btn-lg">Create Tag</a>
    </div>
  </div>

  @parent
@endsection
