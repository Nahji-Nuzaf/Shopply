<?php

session_start();
require "connectionshop.php";

$sender = $_SESSION["shopply"]["email"];
$recever = $_POST["rm"];
$msg = $_POST["mt"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

Shopply::iud("INSERT INTO `chat`(`content`,`datetime`,`status`,`from`,`to`) VALUES ('".$msg."','".$date."','0','".$sender."','".$recever."')");

echo ("success");

?>