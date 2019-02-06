<?php
  class produit {
    // we define 3 attributes
    // they are public so that we can access them using $produit->author directly
    public $id_produit;
    public $nom;
    public $categorie;
	public $quantite;
    public $prix;
	public $reference;
	public $image;
	public $description;

    public function __construct($id,$nom,$reference, $categorie, $quantite, $prix,$image,$description) {
      $this->id_produit=$id;
	  $this->description = $description;
      $this->nom  = $nom;
      $this->categorie = $categorie;
	  $this->quantite  = $quantite;
      $this->prix = $prix;
	  $this->reference = $reference;
	  $this->image = $image;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM produit');

      // we create a list of produit objects from the database results
      foreach($req->fetchAll() as $produit) {
        $list[] = new produit($produit['id_produit'], $produit['nom'], $produit['reference'], $produit['categorie'], $produit['quantite'], $produit['prix'], $produit['image'],$produit['description']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
	  
      // we make sure $id is an integer
      $id = intval($id);
	  
      $req = $db->query('SELECT * FROM produit WHERE id_produit ='.$id);
      // the query was prepared, now we replace :id with our actual $id value
      
      $produit = $req->fetch();

      return new produit($produit['id_produit'], $produit['nom'], $produit['reference'], $produit['categorie'], $produit['quantite'], $produit['prix'], $produit['image'],$produit['description']);
    }
	public  function update() {
      $db = Db::getInstance();
	  if(!empty($this->nom)) {
	$sql ="UPDATE produit
SET nom = '".$this->nom."'
WHERE id_produit = '".$this->id_produit."';";
$db->query($sql);
}

if(!empty($this->reference)) {
	$sql ="UPDATE produit
SET reference = '".$this->reference."'
WHERE id_produit = '".$this->id_produit."';";
$db->query($sql);
}

if(!empty($this->image)) {
	$sql ="UPDATE produit
SET image = '".$this->image."'
WHERE id_produit = '".$this->id_produit."';";
$db->query($sql);
}

if(!empty($this->description)) {
	$sql ="UPDATE produit
SET description = '".$this->description."'
WHERE id_produit = '".$this->id_produit."';";
$db->query($sql);
}
if(!empty($this->prix)) {
	$sql ="UPDATE produit
SET prix = '".$this->prix."'
WHERE id_produit = '".$this->id_produit."';";
$db->query($sql);
}
	  
      
      
    }
    public static  function delete($id) {
        $db = Db::getInstance();
        $sql="DELETE from rating WHERE product_id ='".$id."'";
      $db->query($sql);
      $sql="DELETE from produit WHERE id_produit ='".$id."'";
      $db->query($sql);
    }
      public  function add() {
         $db = Db::getInstance();
        $sql="INSERT into produit (nom,reference,categorie,quantite,prix,image,description) VALUES ('".$this->nom."','".$this->reference."','".$this->categorie."','".$this->quantite."','".$this->prix."','".$this->image."','".$this->description."')";
        $db->query($sql);
      }

  }
?>