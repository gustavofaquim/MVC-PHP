<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>MVC</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  </head>
  <body>

  <?php
    require '../Application/autoload.php';

    use Application\core\App;
    use Application\core\Controller;

    $app = new App();

  ?>
  <script src="/assets/js/jquery.slim.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>