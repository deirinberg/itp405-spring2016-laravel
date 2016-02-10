<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
      <?php if ($dvd): ?>
        <title><?php echo $dvd->title ?></title>
      <?php else: ?>
        <title><?php echo 'No DVD' ?></title>
      <?php endif ?>  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/style.css')?>"> 
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/dvd-style.css')?>"> 
  </head>
<body>
  <?php if (!$dvd): ?>
    <form class="back-button" action="/dvds/search" method="get">
      <h2>No DVD</h2>
      <input type="submit" class="btn btn-default" value="Search for a DVD">
    </form>
  <?php else: ?>
    <button type="button" class="back-button btn btn-default" onclick="history.back(-1);">Back</button>
    <h2 class="results-title">
      <?php echo $dvd->title; ?>
    </h2>
    <div class="dvd-info-container">
       <ul class="dvd-header">
        <li>
          <p class="info-header"><strong>Rating</strong>: </p>
        </li>
        <li>
          <p class="info-header"><strong>Genre</strong>: </p>
        </li>
        <li>
          <p class="info-header"><strong>Label</strong>: </p>
        </li>
        <li>
          <p class="info-header"><strong>Sound</strong>: </p>
        </li>
        <li>
          <p class="info-header"><strong>Format</strong>: </p>
        </li>
      </ul>
      <ul class="dvd-info">
        <li>
          <p class="info-item"><?php echo $dvd->rating_name ?></p>
        </li>
        <li>
          <p class="info-item"><?php echo $dvd->genre_name ?></p>
        </li>
        <li>
          <p class="info-item"><?php echo $dvd->label_name ?></p>
        </li>
        <li>
          <p class="info-item"><?php echo $dvd->sound_name ?></p>
        </li>
        <li>
          <p class="info-item"><?php echo $dvd->format_name ?></p>
        </li>
      </ul>
    </div>
    <hr id="info-separator">
    <div class="add-review">
      <h3>Add Review</h3>
      <?php if (count($errors) > 0) : ?>
          <ul class="errors">
              <?php foreach ($errors->all() as $error) : ?>
                  <li>
                      <?php echo $error ?>
                  </li>
              <?php endforeach ?>
          </ul>
      <?php endif ?>

      <?php if (session('success')) : ?>
          <p class="success">Review successfully added.</p>
      <?php endif ?>

      <form action="/dvds/<?php echo $dvd->id ?>/review" method="post">
      <?php echo csrf_field() ?>
      <p class="review-header">Rating: </p>
      <select class="review-field" name="rating">
      <?php for ($x = 1; $x <= 10; $x++) {
          echo "<option value=" . $x . ">";
            echo $x;
          echo "</option>";
      }?>
      </select>
      <br>
      <p class="review-header">Title: </p>
      <input class="review-field" type="text" name="title">
      <br>
      <p class="review-header">Description: </p>
      <textarea class="review-field" type="text" name="description"></textarea>
      <br>
      <div class="submit">
        <input type="submit" class="btn btn-default" value="Submit">
      </div>
    </form>
    </div>
    <hr>
    <div class="reviews">
     <?php if (empty($reviews)): ?>
      <h3>No Reviews</h3>
     <?php else: ?>
      <h3>Reviews</h3>
      <div class="table-responsive">
      <table class="table">
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Rating</th>
        </tr>
        <?php foreach ($reviews as $review) : ?>
          <tr>
            <td>
              <?php echo $review->title ?>
            </td>
            <td>
              <?php echo $review->description ?>
            </td>
            <td>
              <?php echo $review->rating ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
      </div>
    <?php endif ?>
   </div>
  <?php endif ?>
</body>
</html>

