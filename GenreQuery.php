<?php

require_once __DIR__ . '/Database.php';

class GenreQuery extends Database
{
  public function getAll()
  {
    $sql = "
      SELECT id, genre
      FROM genres
    ";
    
    $statement = static::$pdo->prepare($sql);
    $statement->execute();
    $genres = $statement->fetchAll();
    
    return $genres;
  }
}