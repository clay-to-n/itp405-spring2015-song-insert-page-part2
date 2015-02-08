<?php

class Database
{
  private $host = 'itp460.usc.edu';
  private $dbname = 'music';
  private $user = 'student';
  private $password = 'ttrojan';
  protected static $pdo;
  
  public function __construct()
  {
    // So only one PDO is ever constructed
    if (!static::$pdo) {
      $connectionString = "mysql:host=" . $this->host . ";dbname=" . $this->dbname; 
      static::$pdo = new PDO($connectionString, $this->user, $this->password);
    }
  }
}