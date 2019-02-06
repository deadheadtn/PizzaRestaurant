<?PHP
include "CrudReclamation.php";
include "reclamation.php";
$crudRec=new CrudReclamation();
$conn=$crudRec->cnx;//public
$date= date('Y-m-d H:i:s');
$state=1;
$doc=new reclamation($_GET['name'],$_GET['email'],$_GET['texte'],$state,$date);
$crudRec->ajouterReclamation($doc,$conn);
if($crudRec)
	echo 'ok';
?>