<?php

include "connectionshop.php";

$cartId = $_POST["c"];
$newQty = $_POST["q"];


$rs = Shopply::search("SELECT * FROM cart INNER JOIN product ON cart.product_product_id = product.product_id WHERE cart_id = '" . $cartId . "'");

$num = $rs->num_rows;

if ($num > 0) {
    //cart item found
    $d = $rs->fetch_assoc();

    if($d["qty"] >= $newQty){
        //update query
        Shopply::iud("UPDATE cart SET qty = '" . $newQty . "' WHERE cart_id = '" . $cartId . "' ");
        echo("Success");
    }else{
        echo("Your Product Quantity exceeded!");
    }


}else{
     echo("Cart Item Not Found");
}

?>