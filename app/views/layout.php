<DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <header>
      <a href='/iuvenis_insurance'>Home</a>
      <?php
      if (isset($_SESSION['person']) && isset($_SESSION['rolle'])) {
        ?>
          <a href='/iuvenis_insurance/<?php //?controller=kunden&action=registrieren ?>'>Profil</a>
          <a href='/iuvenis_insurance/?controller=vertrag&action=index'>Versicherungsverträge</a>
          <a href='/iuvenis_insurance/<?php //?controller=kunden&action=registrieren ?>'>Schadensfälle</a>
        <?php
        if ($_SESSION['rolle'] == 'Mitarbeiter') {
          ?>
            <a href='/iuvenis_insurance/<?php //?controller=kunden&action=registrieren ?>'>Administration</a>
          <?php
        }
      }
      ?>
    </header>
    <br/>
    <?php require_once('routes.php'); ?>
    <br/>
    <footer>
      Copyright by iuvenis
    </footer>
  <body>
<html>