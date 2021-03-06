<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>
      {{ $title or 'Spotify' }}
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/artist-style.css') }}"> 
  </head>
<body>

  @yield('content')

</body>
</html>