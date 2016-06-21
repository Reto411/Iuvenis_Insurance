<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Iuvenis Insurance</title>
      <link rel="stylesheet" type="text/css" href="/iuvenis_insurance/public/css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="/iuvenis_insurance/public/css/site.css" />
      <script src="/public/js/modernizr-2.6.2.js"></script>
      <script src="/public/js/scripts.js"></script>
  </head>

  <body>
      <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
              <div class="navbar-header">
                  <!-- Mobile Navigation -->
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a href="/iuvenis_insurance/" class="navbar-brand">Iuvenis Insurance</a>
              </div>
              <!--- Normal Navigation-->
              <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                      <li><a href='/iuvenis_insurance/'>Home</a></li>
                      <?php
                            if (isset($_SESSION['person']) && isset($_SESSION['rolle'])) {
                              ?>
                                
                                <li><a href='/iuvenis_insurance/?controller=vertrag&action=index'>Versicherungsverträge</a></li>
                                <li><a href='/iuvenis_insurance/<?php //?controller=kunden&action=registrieren ?>'>Schadensfälle</a></li>
                              <?php
                              if ($_SESSION['rolle'] == 'Mitarbeiter') {
                                ?>
                                  <li><a href='/iuvenis_insurance/<?php //?controller=kunden&action=registrieren ?>'>Administration</a></li>
                                <?php
                              }
                              ?>
                              <form class="navbar-form navbar-right" method="POST">
                                <button class="btn btn-success" type="submit">Logout</button>
                              </form>
                              <?php
                            }
                            ?>
                  </ul>
              </div>
          </div>
      </div>

      <div class="body-content">
            <hr/>
            <hr/>
            <?php require_once('routes.php'); ?>
            <hr />
            <footer>
                <p>&copy; 2016 - Iuvenis Insurance</p>
            </footer>
      </div>

      <script src="iuvenis_insurance/public/js/jquery-1.10.2.js"></script>
      <script src="iuvenis_insurance/public/js/bootstrap.js"></script>
      <script src="iuvenis_insurance/public/js/respond.js"></script>
  </body>
</html>