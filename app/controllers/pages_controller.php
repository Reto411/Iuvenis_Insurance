<?php
  class PagesController {
    public function home() {
      $first_name = 'Jon';
      $last_name  = 'Snow';
      require_once('app/views/pages/home.php');
    }

    public function error() {
      require_once('app/views/pages/error.php');
    }
  }
?>