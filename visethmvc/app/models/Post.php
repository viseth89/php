<?php 
  class Post {
    private $db;

    public function __construct() {
      // instantiate db class -> controller.php
      $this->db = new Database;

    }
  }