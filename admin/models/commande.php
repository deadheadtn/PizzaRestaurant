<?php
include_once("connection.php");
class commande {
    // we define 3 attributes
    // they are public so that we can access them using $commande->author directly
    private $id;
    private $nom;
    private $prenom;
    private $total_price;
    private $created;
    private $modified;
    private $status;
    

    public function __construct($id, $nom, $prenom, $total_price, $created, $modified,$status) {
      $this->id = $id;
      $this->nom  = $nom;
      $this->prenom = $prenom;
      $this->total_price  = $total_price;
      $this->created = $created;
      $this->modified = $modified;
      $this->status = $status;
    
    }
    public function getid() {
      return $this->id;
    }
    public function getnom() {
      return $this->nom;
    }
    public function getprenom() {
      return $this->prenom;
    }
    public function getstatus() {
      return $this->status;
    }
    public function getcreated() {
      return $this->created;
    }
    public function getmodified() {
      return $this->modified;
    }
    public function gettotal_price() {
      return $this->total_price;
    }
  

   public static  function all() {
      $list = [];
      $db = Db::getInstance();
     $req = $db->query('select o.*,u.*,o.status as status from orders o join users u on o.id_user=u.id_user order by o.id desc');

      // we create a list of commande objects from the database results
     foreach($req->fetchAll() as $commande) {
       $list[] = new commande($commande['id'],$commande['prenom'],$commande['nom'],$commande['total_price'],$commande['created'],$commande['modified'],$commande['status']);
      }
      return $list; 
}
public static function status() {
   $db = Db::getInstance();
 if (!empty($_REQUEST['id'])){
        $query=$db->query("update orders set status='0' where id=".$_REQUEST['id']);
        echo $query?'deglawi':'err';die;
      }
}
}

  
  ?>
  