<?PHP
include "config1.php";
class CrudReclamation{
	public $cnx;
	function __construct(){
		$c=new config();
        $this->cnx=$c->cnx;		
	}
	
	function ajouterReclamation($doc,$conn){
		$req="INSERT INTO reclamation(name,email,texte,state,datee) 
		VALUES ('".$doc->getName()."','".$doc->getEmail()."','".$doc->getTexte()."','".$doc->getState()."','".$doc->getdate()."')";
		$conn->query($req);
	}
	function lu($id){
		$req="UPDATE `reclamation` SET `state`=0 WHERE `id_reclamation` = ".$id;
		$conn->query($req);
	 }
	}
	
	?>