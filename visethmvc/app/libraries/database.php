<?php 

/*
* PDO Database Class
* Connects to Database
* Create prepared statements
* Bind Values
* Return rows and results
*/

class Database {
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;

  private $dbh;
  private $stmt;
  private $error;

  public function __construct() {
    // Set DSN
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    $options = array(
      // Can improve performance if connection with db established
      PDO :: ATTR_PERSISTENT => true,
      // 1 OF 3 MODES SELECTED 
      PDO :: ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION
    );

    // Create PDO Instance
    try {

    } catch(PDOException $e){
      // get error message
      $this->error = $e->getMessage();
      echo $this->error;
    }


    try{
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    } catch(PDOException $e){
      $this->error = $e->getMessage();
      echo $this->error;
    }

    
  }
}