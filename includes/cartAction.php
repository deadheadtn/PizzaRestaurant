<?php
include 'cart.php';
$cart = new Cart;
require_once "recaptchalib.php";
$secret = "6LeTmRwUAAAAAGc-99ZEP1KpRJl2fUJBhgoIOMYq";
// empty response
$response = null;
// check secret key
$reCaptcha = new ReCaptcha($secret);
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
include '../config.php';
$db=Db::getInstance();
if(isset($_REQUEST['controller']) && !empty($_REQUEST['controller'])){
    if($_REQUEST['controller'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        $query = "SELECT * FROM produit WHERE id_produit = ".$productID;
        $row = $db->query("SELECT * FROM produit WHERE id_produit = ".$productID);
        $row = $row->fetch();
        $itemData = array(
            'id' => $row['id_produit'],
            'name' => $row['nom'],
            'price' => $row['prix'],
            'qty' => 1
        );
        $insertItem = $cart->insert($itemData);
        echo $insertItem?'ok':'err';die;
    }elseif($_REQUEST['controller'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $qty=$_REQUEST['qty'];
        if($qty<1)
            $qty=1;
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $qty
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['controller'] == 'changestatus' && !empty($_REQUEST['id'])){
        $query=$db->query("update orders set status='0' where id=".$_REQUEST['id']);
        echo $query?'ok':'err';die;
    }
    elseif($_REQUEST['controller'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_POST['controller'] == 'placeOrder' && $response != null && $response->success &&  $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        $insertOrder = $db->query("INSERT INTO orders (id_user, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $sql = '';
            $orderID = $db->lastInsertId();
            echo $orderID;
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id,product_id, quantity) VALUES ('".$orderID."','".$item['id']."', '".$item['qty']."');";
            }
            $requete=$db->query("update users set nbr_point=nbr_point+".$cart->total()." where id_user=".$_SESSION['sessCustomerID']);
            $insertOrderItems =$db->query($sql);
            if($insertOrderItems){
                $cart->destroy();
                header("Location: orderSuccess.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}