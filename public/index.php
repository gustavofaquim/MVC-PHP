<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../Application/views/template/header.php';
?>

<?php
  require '../Application/autoload.php';

  //require '../Application/controllers/Login.php';

  session_start();
  use Application\core\App;
  //use Application\controllers\Login;

      

  //$aut = new Login();
  //$aut->verificarLogado();
  $app = new App();

?>

<?php 

require '../Application/views/template/footer.php';
?>   
