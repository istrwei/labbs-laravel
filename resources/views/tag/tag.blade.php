@extends('layouts.master')

@section('title', $tag->name)

@section('content')
  <div class="page-header">
    <h1>{{ $tag->name }} <small>{{ $tag->description }}</small></h1>
  </div>
@endsection
