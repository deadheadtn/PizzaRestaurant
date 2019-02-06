<?php
include_once("config.php");
$action = $_REQUEST['controller'];
session_start();
$db = Db::getInstance();


 if($action =='modifier'){
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];
    $email = $_REQUEST['email'];
    $date_naissance=$_REQUEST['date_naissance'];
    $adresse=$_REQUEST['adresse'];
    $num_tel=$_REQUEST['num_tel'];
    $id= $_SESSION['loggeduser'];
	$req = $db->query("SELECT * FROM users WHERE email='$email' ");
    $user=$req->fetch();

    if (strlen($nom) < 3){
        echo "nom";
    }
    else if (strlen($prenom) < 3){
        echo "prenom";
    }
    else { 
    	$query = $db->prepare("UPDATE users  SET nom= :nom, prenom= :prenom, email= :email, date_naissance= :date_naissance, adresse= :adresse, num_tel= :num_tel WHERE id_user = :id ");
    	$query->execute(array('nom'=> $nom ,'prenom'=> $prenom ,'email'=> $email ,'date_naissance'=> $date_naissance ,'adresse'=> $adresse ,'num_tel'=> $num_tel ,'id'=> $id ));
        $lastID = $db->lastInsertId();
    
    echo "ok";
}
}

?>