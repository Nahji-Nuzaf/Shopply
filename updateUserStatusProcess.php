<?php

include "connectionshop.php";

$user = $_POST["u"];

echo ($user);

if (empty($user)) {
    echo("Please Enter Your User Id.");
} else {
    $user_rs = Shopply::search("SELECT * FROM `user` WHERE `email`='".$user."' AND `user_status_status_id`='1'");
    $num = $user_rs->num_rows;

    if ($num == 1) {
        
        $d = $user_rs->fetch_assoc();

        if ($d["status"] == 1) {
            Shopply::iud("UPDATE `user` SET `status`='0' WHERE `email`='".$user."'");
            echo("Deactive");
        }

        if ($d["status"] == 0) {
            Shopply::iud("UPDATE `user` SET `status`='1' WHERE `email`='".$user."'");
            echo("Active");
        }
    }else{
        echo ("Invalid User !");
    }
}

?>