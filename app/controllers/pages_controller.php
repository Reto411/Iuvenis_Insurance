<?php
  class PagesController {
    public function index() {
      require_once('app/views/pages/home.php');
    }

    public function error() {
      require_once('app/views/pages/error.php');
    }
  }
?>