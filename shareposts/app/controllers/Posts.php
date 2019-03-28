<?php 
  class Posts extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->postModel = $this->model('Post');
    }
    public function index(){
      // Get posts

      $posts = $this->postModel->getPosts();
      $data = [
        'posts' => $posts
      ];

      // Load view
      $this->view('posts/index', $data);
    }
  }