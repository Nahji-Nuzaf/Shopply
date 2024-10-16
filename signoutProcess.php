<?php

session_start();

if(isset($_SESSION["shopply"])){
    $_SESSION["shopply"] = null;
    session_destroy();

    echo ("success");

}

?>