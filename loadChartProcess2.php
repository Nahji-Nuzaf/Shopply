<?php

include "connectionshop.php";

$crs = Shopply::search("SELECT `product`.product_id,`product`.title, `wishlist`.product_product_id AS `most_liked` 
FROM `wishlist` INNER JOIN `product` ON `wishlist`.product_product_id=`product`.product_id GROUP BY `product`.product_id
,`product`.title ORDER BY `most_liked` DESC LIMIT 5;");

$cnum = $crs->num_rows;

$labels = array();
$data = array();

for ($i=0; $i < $cnum; $i++) { 
    $cd = $crs->fetch_assoc();

    $clabels[] = $cd["title"];
    $cdata[] = $cd["most_liked"];
}

$json = array();
$json["labels"] = $clabels;
$json["data"] = $cdata;

echo json_encode($json);

?>