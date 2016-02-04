<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
      <?php if ($dvd_title || !empty($genre_name) || !empty($rating_name)): ?>
        <title><?php echo 'Search Results' ?></title>
      <?php else: ?>
        <title><?php echo 'All DVDs' ?></title>
      <?php endif ?>  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/style.css')?>"> 
  </head>
<body>
  <?php if (empty($dvds)): ?>
    <h2>No results for <em><?php echo $dvd_title ?></em></h2>
    <form action="/dvds/search" method="get">
        <input type="submit" class="btn btn-default" value="Try Again">
    </form>
  <?php else: ?>
    <form class="back-button" action="/dvds/search" method="get">
        <input type="submit" class="btn btn-default" value="Back">
    </form>
      <?php if ($dvd_title || !empty($genre_name) || !empty($rating_name)): ?>
        <h2 class="results-title">You searched for 
            <?php 
            $prev=false;
            if($dvd_title): ?>
                <em>
                <?php echo $dvd_title; 
                      $prev=true;?>
                </em>
            <?php endif ?>
            <?php if(!empty($genre_name)): ?>
                <?php if($prev): ?>
                    <?php echo '+ ';?>
                 <?php endif ?>
                <em>
                <?php echo $genre_name;
                      $prev=true;?>
                </em>
            <?php endif ?>
            <?php if(!empty($rating_name)): ?>
                <?php if($prev): ?>
                    <?php echo '+ '; ?>
                 <?php endif ?>
                <em>
                <?php echo $rating_name; 
                      $prev=true;?>
                </em>
            <?php endif ?>
            <?php echo ':';?>
        </h2>
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
        <th>Sound</th>
        <th>Format</th>
      </tr>
      <?php foreach ($dvds as $dvd) : ?>
        <tr>
          <td>
            <?php echo $dvd->title ?>
          </td>
          <td>
            <?php echo $dvd->rating_name ?>
          </td>
          <td>
            <?php echo $dvd->genre_name ?>
          </td>
          <td>
            <?php echo $dvd->label_name ?>
          </td>
          <td>
            <?php echo $dvd->sound_name ?>
          </td>
          <td>
            <?php echo $dvd->format_name ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    </div>
  <?php endif ?>
</body>
</html>

