<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head
    content must come *after* these tags -->

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <title> SAC - @yield('title')</title>
  </head>

  <body>
    @include('basePages.uofabar')

    <div class="container-fluid">
      @yield('content')
    </div> <!-- /container -->

    @include('basePages.uofafooter')
    <script src="{{ asset('js/all.js') }}"></script>
  </body>
</html>
