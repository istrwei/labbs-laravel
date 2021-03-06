<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>@yield('title') - Labbs</title>
    <meta name='viewport' content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Labbs</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="/topics">Topics</a></li>
            <li><a href="/tags">Tags</a></li>
            <li><a href="/users">Users</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::user())
              <li><a href="/settings">{{ Auth::user()->name }}</a></li>
              <li><a href="/topics/create">Create Topic</a></li>
            @else
              <li><a href="/auth/login">Login</a></li>
              <li><a href="/auth/register">Register</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="container">
        <div class='row'>
          <div class="col-md-9">
            @yield('content')
          </div>
          <div class="col-md-3">
            @section('sidebar')
            <div class="panel panel-default">
              <div class="panel-body">
                <ul>
                  <li>{{ $globalStatistics['topicsCount'] }} Topics</li>
                  <li>{{ $globalStatistics['usersCount'] }} Users</li>
                </ul>
              </div>
            </div>
            @show
          </div>
        </div>
      </div>
    </div>
    <script src='/js/vendor.js'></script>
  </body>
</html>
