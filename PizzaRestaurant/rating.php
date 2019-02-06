<?php
require_once('config.php');
$db=Db::getInstance();

function getRatingByProductId($productId) {
	$query = "SELECT SUM(vote) as vote, COUNT(vote) as count from rating WHERE product_id =".$productId;

      $result = $db->query($query);
      $resultSet = $result->fetch;
      if($resultSet['count']>0) {
      	return ($resultSet['vote']/$resultSet['count']);
      } else {
      	return 0;
      }
	
}
/*if(isset($_REQUEST['type'])) {
	if($_REQUEST['type'] == 'save') {
		$vote = $_REQUEST['vote'];
		$productId = $_REQUEST['productId'];
	      $query = "INSERT INTO rating (product_id, vote) VALUES ('$productId', '$vote')";
	      // get connection
	      $con = connect();
	      $result = mysqli_query($con, $query);
	      echo 1; exit;
	} 
	<?php 
$query = "SELECT SUM(vote) as vote, COUNT(vote) as count from rating WHERE product_id =55";
$result = $db->query($query);
 $resultSet = $result->fetch();
  if($resultSet['count']>0) {
        $rating=$resultSet['vote']/$resultSet['count'];
      } else {
        $rating=0;
      }
        if(isset($_REQUEST['type'])) {
    if($_REQUEST['type'] == 'save') {
        $vote = $_REQUEST['vote'];
        $productId = $_REQUEST['productId'];
          $query = "INSERT INTO rating (product_id, vote) VALUES ('55', '3')";
          // get connection
          
          $result = $db->query($query);
           exit;
    }
    }
?>
}*/

?>
