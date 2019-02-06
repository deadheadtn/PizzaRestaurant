

<?php

  class produitsController {
    public function index() {
      // we store all the produits in a variable
      $produits = produit::all();
      require_once('views/produits/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=produits&action=show&id=x
      // without an id we just redirect to the error page as we need the produit id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right produit
      $produit = produit::find($_GET['id']);
      require_once('views/produits/show.php');
    }
	 public function modifier() {
		 if (!isset($_GET['id'])) {
		
			 return call('pages', 'error');
		 }
		 
		 
		 
	 $produit= new produit($_GET['id'],'','','','0','','','');
	 if(!empty($_POST['nomproduit']))
		 $produit->nom=$_POST['nomproduit'];
	 	 if(!empty($_POST['refproduit']))
		 $produit->reference=$_POST['refproduit'];
	 	 	 if(!empty($_POST['descproduit']))
		 $produit->description=$_POST['descproduit'];
	 	 	 if(!empty($_POST['prixproduit']))
		 $produit->prix=$_POST['prixproduit'];
	 	 	 if(!empty($_POST['catgproduit']))
		 $produit->categorie=$_POST['catgproduit'];
		if($_GET['img']=="true") {
	 	 	 	 if($_FILES['photo']['size'] != 0 && empty($_POST['catgproduit']) ){
	
		$produit->image="img/produits/".$_GET['catg']."/".basename($_FILES['photo']['name']);
		echo $produit->image;
				 }else if($_FILES['photo']['size'] != 0 && !empty($_POST['catgproduit']) ){
				 	$produit->image="img/produits/".$_POST['catgproduit']."/".basename($_FILES['photo']['name']);
				 }
				
				}
				 $produit->update();
	     $produits = produit::all();
      require_once('views/produits/index.php');
	 }
 public function supprimer() {
 	produit::delete($_GET['id']);
 	$produits = produit::all();
      require_once('views/produits/index.php');
 }
 public function formulaire() {
 require_once('views/produits/Ajout.php');
 }
 public function ajouter() {
$produit= new produit('0',$_POST['nomproduit'],$_POST['refproduit'],$_POST['catgproduit'],$_POST['qttproduit'],$_POST['prixproduit'],"img/produits/".$_POST['catgproduit']."/".basename($_FILES['photo']['name']),$_POST['descproduit']);
$produit->add();
$produits = produit::all();
      require_once('views/produits/index.php');
 }
  }
?>