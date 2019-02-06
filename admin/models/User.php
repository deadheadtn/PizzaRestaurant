<?php
include_once("connection.php");
class User {
    // we define 3 attributes
    // they are public so that we can access them using $User->author directly
    public $id_user;
    public $nom;
    public $prenom;
    public $sexe;
    public $date_naissance;
    public $adresse;
    public $CIN;
    public $num_tel;
    public $nbr_point;
    public $image;
    public $email;
    public $privilege;
    public $username;
    public $password;
    public $status;

    public function __construct($id_user, $nom, $prenom, $sexe, $date_naissance, $adresse,$CIN,$num_tel,$nbr_point,$image,$email,$privilege,$Username,$password,$status) {
      $this->id_user = $id_user;
      $this->nom  = $nom;
      $this->prenom = $prenom;
      $this->sexe  = $sexe;
      $this->date_naissance = $date_naissance;
      $this->adresse = $adresse;
      $this->CIN = $CIN;
      $this->num_tel = $num_tel;
      $this->nbr_point = $nbr_point;
      $this->image = $image;
      $this->email = $email;
      $this->privilege = $privilege;
      $this->username = $Username;
      $this->password = $password;
      $this->status = $status;
    }
  

   public static  function all() {
      $list = [];
      $db = Db::getInstance();
     $req = $db->query('SELECT * FROM users ORDER BY nbr_point');

      // we create a list of User objects from the database results
     foreach($req->fetchAll() as $User) {
       $list[] = new User($User['id_user'],$User['prenom'],$User['nom'],$User['sexe'],$User['date_naissance'],$User['adresse'],$User['CIN'],$User['num_tel'],$User['nbr_point'],$User['image'],$User['email'],$User['privilege'],$User['username'],$User['password'],$User['status']);
      }
      return $list; 
}
public function verif()
  {
    $db = Db::getInstance();
   $req = $db->query("SELECT * FROM users WHERE email like '%$this->email%'");
    $user=$req->fetch();
    if ($user['email']==$this->email){

    return false;
  }
  $req = $db->query("SELECT * FROM users WHERE CIN like '%$this->CIN%'");
    $user=$req->fetch();
    if ($user['CIN']==$this->CIN){
    return false;
  }
return true;
}
  
  public function add() {
    $db = Db::getInstance();

$req = $db->query("INSERT INTO users(nom,prenom,sexe,date_naissance,email,CIN,privilege,username,password,num_tel,adresse,status) VALUES('".$this->nom."', '".$this->prenom."', '".$this->sexe."', '".$this->date_naissance."', '".$this->email."', '".$this->CIN."','1','".$this->username."','".$this->password."','".$this->num_tel."','".$this->adresse."','approved')");
  }  
}
/*
    public static function find($id_user) {
      $db = Db::getInstance();
      // we make sure $id_user is an integer
      $id_user = intval($id_user);
      $req = $db->prepare('SELECT * FROM Users WHERE id_user = :id_user');
      // the query was prepared, now we replace :id_user with our actual $id_user value
      $req->execute(array('id_user' => $id_user));
      $User = $req->fetch();
        return= new User($User['id_user'], $User['nom'], $User['prenom'], $User['sexe'], $User['date_naissance'], $User ['adresse'],$User ['CIN'],$User ['num_tel'],$User ['nbr_point'],$User ['image'],$User ['email'],$User ['privilege'],$User ['Username'],$User ['password'],)

    }
  */
  
  ?>
  