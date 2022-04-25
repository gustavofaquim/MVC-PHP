<?php 
namespace Application\core;

use Application\models\Users;

/**
* Esta classe é responsável por instanciar um model e chamar a view correta
* passando os dados que serão usados.
*/

class Controller{
  
  /**
  * Este método é responsável por chamar uma determinada view (página).
  *
  * @param  string  $model   É o model que será instanciado para usar em uma view, seja seus métodos ou atributos
  */

  public function model($model){
      require '../Application/models/' . $model . '.php';
      $class = 'Application\\models\\'. $model;
      // Dá erro quando o construtor é instanciado com métodos
      return new $class();
  }



  /**
  * Este método é responsável por chamar uma determinada view (página).
  *
  * @param  string  $view   A view que será chamada (ou requerida)
  * @param  array   $data   São os dados que serão exibido na view
  */
  public function view(string $view, $data = []){
    require('../Application/views/'. $view. '.php'); 
  }


  /**
  * Este método é herdado para todas as classes filhas que o chamaram quando
  * o método ou classe informada pelo usuário não forem encontrados.
  */
  public function pageNotFound(){
      $this->view('error404');
  }

  public function home(){
    $this->view('home/index');
  }
 

}

?>