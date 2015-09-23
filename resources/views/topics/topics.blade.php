@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-12 topic-list">
      @foreach ($topics as $topic)
        <div class="topic-item">
          <div class="topic-avatar">
            <a href="#">
              <img src="{{ Gravatar::src($topic->author->email, 64) }}" alt="{{ $topic->author->name }}">
            </a>
          </div>
          <div class="topic-header">
            <div class="pull-right">
              {{ $topic->replies()->count() }}
            </div>
            <header>
              <a href="/topics/{{ $topic->id }}">{{ $topic->title }}</a>
            </header>
            <div>
              {{ $topic->author->name }} {{ $topic->updated_at }}
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="col-md-12 text-center">
      <div class="center-block">
        {!! $topics->render() !!}
      </div>
    </div>
  </div>
@endsection
