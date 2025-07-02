<?php

require "connectionshop.php";

if(isset($_GET["id"])){

    $watch_id = $_GET["id"];

    $watchlist_rs = Shopply::search("SELECT * FROM `wishlist` WHERE `wishlist_id`='".$watch_id."'");

    if($watchlist_rs->num_rows != 0){

        Shopply::iud("DELETE FROM `wishlist` WHERE `wishlist_id`='".$watch_id."'");
        echo ("Deleted");

    }else{
        echo ("Something went wrong");
    }

}

?>