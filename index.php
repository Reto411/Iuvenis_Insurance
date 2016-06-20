<?php
  session_start();
  require_once('connection.php');

  //if not logged in, go to login
  if (!isset($_SESSION['person']) && !(isset($_GET['controller']) && $_GET['controller'] == 'kunden' && isset($_GET['action']) && $_GET['action'] == 'registrieren')) {
    $controller = 'personen';
    $action     = 'login';
  }
  else if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } 
  else {
    $controller = 'pages';
    $action     = 'index';
  }

  require_once('app/views/layout.php');
  //session_destroy();
?>