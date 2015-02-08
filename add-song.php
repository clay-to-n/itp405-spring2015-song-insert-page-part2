<?php
  require_once __DIR__ . '/Song.php';
  require_once __DIR__ . '/GenreQuery.php';
  require_once __DIR__ . '/ArtistQuery.php';
  
  $artistQuery = new ArtistQuery();
  $artists = $artistQuery->getAll();

  $genreQuery = new GenreQuery();
  $genres = $genreQuery->getAll();

  if (isset($_POST['submit'])) {
    $song = new Song();
    $song->setTitle($_POST['title']);
    $song->setArtistId($_POST['artistId']);
    $song->setGenreId($_POST['genreId']);
    $song->setPrice($_POST['price']);
    
    if (empty($_POST['title'])) {
      $message = "Please enter a title!"; 
    } else if (empty($_POST['artistId'])) {
      $message = "Please choose an artist!";
    } else {
      $song->save();
      $message = "The song " . $song->getTitle() . " with an ID of " . $song->getId() . " was inserted successfully!";
    }       
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- jQuery might be overkill for this tiny app but we need it for bootstrap-select -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="/add-song.css">
    
    <title>Add Song</title>
  </head>
  
  <body>
    <div class="container">     
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          
          <p>
            <?php if(isset($_POST['submit'])){
              echo $message;
            }
            ?>
          </p>
          
          <form method="post" class="add-song"> 
            <div class="input-group add-song">
              <input type="text" class="form-control" name="title" placeholder="Song Title">
              <span>
                <select name="artistId" class="selectpicker" data-live-search="true" data-width="100%">
                  <option data-hidden="true" value="">Artist</option>
                  <?php
                    foreach($artists as $artist){
                      echo "<option value=" . $artist['id'] . ">" . $artist['artist_name'] . "</option>";
                    }
                  ?>
                </select>
                <select name="genreId" class="selectpicker" data-live-search="true" data-width="100%">
                  <option data-hidden="true" value="">Genre</option>
                  <?php
                    foreach($genres as $genre){
                      echo "<option value=" . $genre['id'] . ">" . $genre['genre'] . "</option>";
                    }
                  ?>
                </select>
              </span>
              <input type="text" class="form-control" name="price" placeholder="Price" style="margin-top:8px">
              
              <button class="btn btn-default" type="submit" name="submit" style="width:100%">Add</button>
            </div>
          </form>
          
        </div>
      </div> 
    </div>
  </body>
  
</html>