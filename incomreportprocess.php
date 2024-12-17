<?php

include "connectionshop.php";

$from = $_POST["from"];
$to = $_POST["to"];

// echo ($from);
// echo($to);

$date_rs = Shopply::search("SELECT * FROM `invoice` WHERE `date` BETWEEN '$from' AND '$to'");
$date_num = $date_rs->num_rows;

// echo ($date_data);

?>

<div class="col-lg-10 offset-1" id="printr">

    <div class="d-flex justify-content-center">
        <div class="row align-items-center">
            <p class="fw-bold mt-2 invoice1" style="font-size: 50px;">Income Document</p>
        </div>
    </div>
    <table class="table table-hover table-bordered" id="loadreport">
        <thead>
            <tr>
                <th scope="col" class="tnx">#</th>
                <th scope="col" class="tnx">Buyer email</th>
                <th scope="col" class="tnx">Order Id</th>
                <th scope="col" class="tnx">Date</th>
                <th scope="col" class="tnx">Qty</th>
                <th scope="col" class="tnx">Amount</th>
            </tr>
        </thead>

        <?php


        for ($i = 0; $i < $date_num; $i++) {
            $date_data = $date_rs->fetch_assoc();


            // $profimg = Shopply::search("SELECT * FROM `profile_image` WHERE user_email='" . $ud["email"] . "'");
            // $img = $profimg->fetch_assoc();

        ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $date_data["id"] ?></th>
                    <td> <?php echo $date_data["user_email"] ?> </td>
                    <td class="text-warning-emphasis fw-bold"> # <?php echo $date_data["order_id"]; ?> </td>
                    <td> <?php echo $date_data["date"]; ?> </td>
                    <td> <?php echo $date_data["qty"]; ?> </td>
                    <td class="text-primary fw-bold"> $<?php echo $date_data["amount"]; ?> </td>

                </tr>

            </tbody>
        <?php

        }

        ?>

    </table>

</div>
    <?php
    ?>