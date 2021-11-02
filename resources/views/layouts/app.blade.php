<!DOCTYPE html>
<html lang="ja">

    <head>

      <meta charset="utf-8" />   
      <title>Laravel News - @yield('title')</title>

      <!-- Styles -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 

    </head>
    <body>
        <div class="wrapper">
            @yield('content')
        </div>
    </body>
</html>