<?php
/*
* Author: Rohit Kumar
* Website: iamrohit.in
* Date: 09-03-2016
* App Name: Star rating system
* Description: Star rating demo using Jquery, PHP and Mysql
*/
function connect() {
$hostname = "localhost";
$username = "arij";
$password = "";
$dbname = "projet";
  $con = mysqli_connect($hostname, $username, $password, $dbname);	
  return $con;
}

function getRatingByProductId($con, $productId) {
	$query = "SELECT SUM(vote) as vote, COUNT(vote) as count from rating WHERE product_id = $productId";

      $result = mysqli_query($con, $query);
      $resultSet = mysqli_fetch_assoc($result);
      if($resultSet['count']>0) {
      	return ($resultSet['vote']/$resultSet['count']);
      } else {
      	return 0;
      }
	
}
if(isset($_REQUEST['type'])) {
	if($_REQUEST['type'] == 'save') {
		$vote = $_REQUEST['vote'];
		$productId = $_REQUEST['productId'];
	      $query = "INSERT INTO rating (product_id, vote) VALUES ('$productId', '$vote')";
	      // get connection
	      $con = connect();
	      $result = mysqli_query($con, $query);
	      echo 1; exit;
	} 
}

?>
