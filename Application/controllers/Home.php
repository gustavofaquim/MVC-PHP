<?php 

use Application\core\Controller;
use Application\controllers\Login;

class Home extends Controller{

    //chama a view index.php do /home ou /
    public function index(){
        $this->view('home/index');
    }
}


?>