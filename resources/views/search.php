<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>DVD Search</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('css/style.css')?>"> 
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <h3>DVD Search</h3>
          <form action="/dvds" method="get">
            <p class="search-header">Title: </p>
            <input class="search-field" type="text" name="dvd_title">
            <br>
            <p class="search-header">Genre: </p>
            <select class="search-field" name="genre_id">
             	<option value='all'>All</option>
          	<?php foreach ($genres as $genre) : ?>
                <option value='<?php echo $genre->id ?>'>
                	<?php echo $genre->genre_name ?>
                </option>
      		  <?php endforeach; ?>
            </select>
            <br>
            <p class="search-header">Rating: </p>
            <select class="search-field" name="rating_id">
             	<option value='all'>All</option>
          	<?php foreach ($ratings as $rating) : ?>
                <option value='<?php echo $rating->id ?>'>
                	<?php echo $rating->rating_name ?>
                </option>
      		<?php endforeach; ?>
            </select>
            <br>
            <input type="submit" class="btn btn-default" value="Search">
          </form>
        </div>
        <div class="col-md-4">
          <h3>Genres</h3>
          <ul>
            <?php foreach ($genres as $genre) : ?>
              <li>
                <a href="<?php echo '/genres/' . $genre->id . '/dvds/'?>">
                  <?php echo $genre->genre_name ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>