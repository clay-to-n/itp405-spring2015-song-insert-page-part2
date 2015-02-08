<?php

require_once __DIR__ . '/Database.php';

class Song extends Database
{
  private $title;
  private $id;
  private $artistId;
  private $genreId;
  private $price;
  
  // setTitle($title) - sets a title instance property
  public function setTitle($title)
  {
    $this->title = $title;
  }
  //  setArtistId($id) - sets an artist_id instance property
  public function setArtistId($artistId)
  {
    $this->artistId = $artistId;
  }
  //  setGenreId($genre_id) - sets a genre_id instance property
  public function setGenreId($genreId)
  {
    $this->genreId = $genreId;
  }
  //  setPrice($prie) - sets a price
  public function setPrice($price)
  {
    $this->price = $price;
  }
  //  save() - performs the insert
  public function save()
  {
    $sql = "
      INSERT INTO songs (title, artist_id, genre_id, price, added, created_at, updated_at) 
      VALUES (?, ?, ?, ?, NOW(), NOW(), NOW())
    ";
    $statement = static::$pdo->prepare($sql);
    $statement->bindParam(1, $this->title);
    $statement->bindParam(2, $this->artistId);
    $statement->bindParam(3, $this->genreId);
    $statement->bindParam(4, $this->price);
    $statement->execute();
    
    $this->id = static::$pdo->lastInsertId();
  }
  //  getTitle() - returns the song title
  public function getTitle()
  {
    return $this->title;
  }
  //  getId() - returns the id column of this song in the database (more on this below)
  public function getId()
  {
    return $this->id;
  }
}