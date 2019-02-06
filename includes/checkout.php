<?php
include 'config.php';

include 'cart.php';
$cart = new Cart;
$db=Db::getInstance();
if($cart->total_items() <= 0){
    header("Location: viewCart.php");
}
if(!isset($_SESSION['loggeduser']))
{
    header('location:viewCart.php');
}
else
{
$_SESSION['sessCustomerID'] = $_SESSION['loggeduser'];
$query = $db->query("SELECT * FROM users WHERE id_user = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{width: 100%;padding: 50px;}
    .table{width: 65%;float: left;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    </style>
</head>
<body>
<div class="container">
    <h1>Passer la Commande</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Totale</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo $item["price"].' TND'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo $item["subtotal"].' TND'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>Panier vide......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo $cart->total().' TND'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Details</h4>
        <p><?php echo $custRow['nom']; ?></p>
        <p><?php echo $custRow['email']; ?></p>
        <p><?php echo $custRow['num_tel']; ?></p>
        <p><?php echo $custRow['adresse']; ?></p>
    </div>
    <div class="footBtn">
        <form action="cartAction.php" method="POST">
        <input name="controller" type="hidden" value="placeOrder">
        <input type="submit"  value="Valider la Commande" class="btn btn-success orderBtn">
       <div class="g-recaptcha" data-sitekey="6LeTmRwUAAAAAGD58orWuIe286-Ol438WKaVVaK9"></div>
       </form>
    </div>
</div>
</body>
<?php }?>
</html>