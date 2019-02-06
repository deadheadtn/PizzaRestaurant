<?php
// include database configuration file
require_once('config.php');
$db=Db::getInstance();	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>aa</title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
</head>
</head>
<body>
<!--div class="container">
    <h1>Products</h1>
    <a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row list-group">
        <?php
        header("location:viewCart.php");
        //get rows query
        /*$query=$db->query("SELECT * FROM produit");
            foreach($query->fetchAll() as $row){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row["nom"]; ?></h4>
                    <p class="list-group-item-text"><?php echo $row["categorie"]; ?></p>
                    <img src="../<?php echo $row['image']; ?>"  height="300" width="300"/>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"><?php echo '$'.$row["prix"].' TND'; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id_produit"]; */?>">Ajouer au Panier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php //}?>
    </div>
</div-->
</body>
</html>