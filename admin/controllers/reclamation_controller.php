
<?php

  class reclamationController {
    public function index() {
      // we store all the reclamation in a variable
      $reclamations = reclamation::all();
      require_once('views/reclamation/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=reclamation&action=show&id=x
      // without an id we just redirect to the error page as we need the reclamation id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right reclamation
      $reclamation = reclamation::update($_GET['id']);
      require_once('views/reclamation/show.php');
    }
   
 public function supprimer() {
  reclamation::delete($_GET['id']);
  $reclamations = reclamation::all();
      require_once('views/reclamation/index.php');
 }


  }
?>