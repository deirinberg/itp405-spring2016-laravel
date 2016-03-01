<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Spotify Artist Search</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?php echo asset('css/style.css')?>"> 
</head>
<body>
  	<h3>Spotify Artist Search</h3>
	<form action="/spotify/artists" method="get" style="margin-top:25px;">
	    <p class="search-header">Artist Name: </p>
	    <input class="search-field" type="text" name="artist_name">
	    <br>
        <input type="submit" class="btn btn-default" value="Search">
	</form>
</body>
</html>