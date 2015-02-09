<?php
namespace Itp\Music;

require_once __DIR__ . '/../vendor/autoload.php';

use \Itp\Base\Database;

class ArtistQuery extends Database
{ 
  public function getAll()
  {
    $sql = "
      SELECT id, artist_name
      FROM artists
    ";
    
    $statement = static::$pdo->prepare($sql);
    $statement->execute();
    $artists = $statement->fetchAll();
    
    return $artists;
  }
}