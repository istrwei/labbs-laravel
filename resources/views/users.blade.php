@extends('layouts.master')

@section('title', 'Active Users')

@section('content')
  <div class="row">
    @foreach ($users as $user)
      <div class="col-xs-3 col-md-2">
        <a href="#" class="thumbnail">
          <img src="{{ Gravatar::src($user->email, 256) }}" alt="{{ $user->name }}">
        </a>
      </div>
    @endforeach

    <div class="col-md-12 text-center">
      <div class="center-block">
        {!! $users->render() !!}
      </div>
    </div>
  </div>
@endsection
