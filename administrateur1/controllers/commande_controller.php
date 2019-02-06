
<?php

  class commandesController {
    public function index() {
      // we store all the commandes in a variable
      $commandes = commande::all();
      require_once('views/commande/index.php');
    }
    public function  status() {
      commande::status();
    }
    
   
}
?>