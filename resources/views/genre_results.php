<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
      <?php if (!empty($genre_name)): ?>
        <title><?php echo 'Search Results' ?></title>
      <?php else: ?>
        <title><?php echo $genre_name . ' DVDs' ?></title>
      <?php endif ?>  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/style.css')?>"> 
  </head>
<body>
  <?php if (empty($dvds)): ?>
    <h2>No <em><?php echo $genre_name ?></em> Movies</h2>
    <form action="/dvds/search" method="get">
        <input type="submit" class="btn btn-default" value="Try Again">
    </form>
  <?php else: ?>
    <form class="back-button" action="/dvds/search" method="get">
        <input type="submit" class="btn btn-default" value="Back">
    </form>
      <?php if (!empty($genre_name)): ?>
        <h2 class="results-title"><?php echo $genre_name . " DVDs"?></h2>
      <?php else: ?>
        <h2 class="results-title">All DVDs:</h2>
      <?php endif ?>
    <div class="table-responsive">
    <table class="table">
      <tr>
        <th>Title</th>
        <th>Rating</th>
        <th>Genre</th>
        <th>Label</th>
      </tr>
      <?php foreach ($dvds as $dvd) : ?>
        <tr>
          <td>
            <a href="/dvds/<?php echo $dvd->id?>">
              <?php echo $dvd->title ?>
            </a>
          </td>
          <td>
            <?php 
              if (!empty($dvd->rating)) {
                echo $dvd->rating->rating_name; 
              }
            ?>
          </td>
          <td>
            <?php 
              if (!empty($dvd->genre)) {
                echo $dvd->genre->genre_name; 
              }
            ?>
          </td>
          <td>
            <?php 
              if (!empty($dvd->label)) {
                echo $dvd->label->label_name; 
              }
            ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    </div>
  <?php endif ?>
</body>
</html>

