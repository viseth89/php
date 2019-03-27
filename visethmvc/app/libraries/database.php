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

  // Prepare statemnt with query
  public function query($sql){
    $this->stmt = $this->dbh->prepare($sql);
  }

  // Bind Values
  public function bind($param, $value, $type = null){
    if(is_null($type)){
      switch(true){
        case is_int($value):
          $type = PDO :: PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO :: PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO :: PARAM_NULL;
          break;
        default:
          $type = PDO :: PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  // Execute the prepare statement
  public function execute(){
    return $this->stmt->execute();
  }

  // Get result set as array of objects
  public function resultSet(){
    $this ->execute();
    return $this ->stmt ->fetchAll(PDO :: FETCH_OBJ);
  }

  // Get single reord as object 
  public function single(){
    $this->execute();
    return $this ->stmt ->fetch(PDO::FETCH_OBJ);
  }

  // Get row count
  public function rowCount(){
    return $this->stmt->rowCount();
  }
}