<?php 

use Application\core\Controller;


class Home extends Controller{

    //chama a view index.php do /home ou /
    public function index(){

        $this->view('home/index');
            
    }
}


?>