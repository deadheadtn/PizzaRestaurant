
<?php

  class UsersController {
    public function index() {
      // we store all the Users in a variable
      $Users = User::all();
      require_once('views/Users/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=Users&action=show&id=x
      // without an id we just redirect to the error page as we need the User id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right User
      $User = User::find($_GET['id']);
      require_once('views/Users/show.php');
    }
 public function formulaire() {
 require_once('views/Users/Ajout.php');
 }
 public function ajouter() {
 	$nom= $_POST['name'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$date_naissance = $_POST['date_naissance'];
$adresse = $_POST['adresse'];
$CIN = $_POST['CIN'];
$num_tel = $_POST['num_tel'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_verif = $_POST['password_verif'];  
$User= new User('',$nom, $prenom, $sexe, $date_naissance, $adresse,$CIN,$num_tel,'','',$email,'',$username,$password,'approved');
if ($User->verif()==false)
    {
      require_once('views/pages/error.php');
    }
    else {


$User->add();
$Users = User::all();
      require_once('views/Users/index.php');

 }
  }
}
?>