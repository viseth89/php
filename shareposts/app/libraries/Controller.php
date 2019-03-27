<?php

/*
*
* Base Controller
* Loads the models and views
*
*/

class Controller {
  // Load model
  public function model($model) {
    // Require model file
    require_once '../app/models/' . $model . '.php';

    // Instantiate Model
    return new $model();
  }

  // Load view
  // Takes in two args
  public function view($view, $data = []){
    // Check for view file
    if(file_exists('../app/views/' . $view . '.php')){
      require_once '../app/views/' . $view . '.php';
    } else {
      // View does not exist!!!!
      // die will kill application
      die('View Does not exist');
    }
  }
}