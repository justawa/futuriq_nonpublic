<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Futuriq</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <section>
      <div class="login">
        <div class="text-center"><img class="img-fluid mb-3" src="{{ asset('images/logo-tele.png') }}"></div>
        @yield('content')
      </div>
    <section>
  </body>
</html>