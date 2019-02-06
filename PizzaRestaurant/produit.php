<?php
  class produit {
    // we define 3 attributes
    // they are public so that we can access them using $produit->author directly
    public $id;
    public $nom;
    public $reference;
	public $categorie;
	public $quantite;
    public $prix;
	public $image;
	public $description;

    public function __construct($id,$nom, $reference, $categorie, $quantite, $prix,$image,$description) {
      $this->id      = $id;
      $this->nom  = $nom;
      $this->reference = $reference;
	  $this->categorie  = $categorie;
	  $this->quantite  = $quantite;
      $this->prix = $prix; 
      $this->image = $image;
	  $this->description  = $description;
    }
	  public static function find($nom) {
      $db = Db::getInstance();
      // we make sure $id is an integer
     
      $req = $db->prepare('SELECT * FROM produits WHERE nom = :nom');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('nom' => $nom));
      $produit = $req->fetch();

      return new produit($produit['id'], $produit['nom'], $produit['type'], $produit['quantite'], $produit['prix']);
    }
  }