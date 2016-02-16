<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>New DVD</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('css/style.css')?>"> 
  </head>
  <body>
    <h3>New DVD</h3>
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
        <p class="success">DVD successfully added.</p>
    <?php endif ?>

    <form action="/dvds/create/new" method="post">
      <?php echo csrf_field() ?>
      <p class="search-header">Title: </p>
      <input class="search-field" type="text" name="title">
      <br>
      <p class="search-header">Label: </p>
      <select class="search-field" name="label_id">
      <?php foreach ($labels as $label) : ?>
          <option value='<?php echo $label->id ?>'>
            <?php echo $label->label_name ?>
          </option>
      <?php endforeach; ?>
      </select>
      <br>
      <p class="search-header">Sound: </p>
      <select class="search-field" name="sound_id">
      <?php foreach ($sounds as $sound) : ?>
          <option value='<?php echo $sound->id ?>'>
            <?php echo $sound->sound_name ?>
          </option>
      <?php endforeach; ?>
      </select>
      <br>
      <p class="search-header">Genre: </p>
      <select class="search-field" name="genre_id">
    	<?php foreach ($genres as $genre) : ?>
          <option value='<?php echo $genre->id ?>'>
          	<?php echo $genre->genre_name ?>
          </option>
		  <?php endforeach; ?>
      </select>
      <br>
      <p class="search-header">Rating: </p>
      <select class="search-field" name="rating_id">
    	<?php foreach ($ratings as $rating) : ?>
          <option value='<?php echo $rating->id ?>'>
          	<?php echo $rating->rating_name ?>
          </option>
		  <?php endforeach; ?>
      </select>
      <br>
      <p class="search-header">Format: </p>
      <select class="search-field" name="format_id">
      <?php foreach ($formats as $format) : ?>
          <option value='<?php echo $format->id ?>'>
            <?php echo $format->format_name ?>
      </option>
      <?php endforeach; ?>
      </select>
      <br>
      <input type="submit" class="btn btn-default" value="Submit">
    </form>
  </body>
</html>