hello core

<?php 

 /*
  * App Core Class
  * Creates URL & loads core controller
  * URL FORMAT - /controller/method/params
 */

class Core {
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  PUBLIC FUNCTION __construct() {
    // print_r($this->getUrl());

    $url = $this->getUrl();

    // Look in controllers for first value
    if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this -> currentController = ucwords($url[0]);

    }
  }
// Get Url
  public function getUrl() {
    if(isset($_GET['url'])){
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      // explode/expand url into array
      $url = explode('/', $url);
      return $url;

    }
  }
}

