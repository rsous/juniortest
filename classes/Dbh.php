<?php

  class Dbh {
    private $host = '';
    private $dbName = '';
    private $username = '';
    private $password = '';

    protected function connect() {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
      $conn = new PDO($dsn, $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $conn;
    }
  }
  
?>