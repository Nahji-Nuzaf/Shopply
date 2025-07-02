<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOPPLY | Admin</title>
    <link rel="icon" href="resources/Shopply Logo.png" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="row">

                    <?php
                    include "connectionshop.php";
                    ?>

                    <div class="col-12 mt-4 btn-toolbar justify-content-end">
                        <button class="btn btn-dark me-2"><i class="bi bi-printer-fill" onclick="printreport();"></i> Print</button>
                        <button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
                    </div>

                    <div class="col-lg-10 offset-1 mt-5" id="printr">

                        <div class="d-flex justify-content-center">
                            <div class="row align-items-center">
                                <p class="fw-bold mt-2 invoice1" style="font-size: 50px;">User Report</p>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="tnx">#</th>
                                    <th scope="col" class="tnx">First Name</th>
                                    <th scope="col" class="tnx">Last Name</th>
                                    <th scope="col" class="tnx">E-mail</th>
                                    <th scope="col" class="tnx">Mobile</th>
                                    <th scope="col" class="tnx">Joined Date</th>
                                    <th scope="col" class="tnx">Status</th>
                                </tr>
                            </thead>

                            <?php

                            $rs = Shopply::search("SELECT * FROM `user`");
                            $num = $rs->num_rows;


                            for ($i = 0; $i < $num; $i++) {
                                $ud = $rs->fetch_assoc();

                            ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td> <?php echo $ud["fname"]; ?> </td>
                                        <td> <?php echo $ud["lname"]; ?> </td>
                                        <td class="fw-bold"> <?php echo $ud["email"]; ?> </td>
                                        <td> <?php echo $ud["mobile"]; ?> </td>
                                        <td> <?php echo $ud["joined_date"]; ?> </td>

                                        <?php

                                        $us = Shopply::search("SELECT * FROM `status` WHERE `status_id`='" . $ud["user_status_status_id"] . "'");
                                        $us_data = $us->fetch_assoc();

                                        ?>
                                        <?php
                                        if ($ud["status"] == '1') {
                                        ?>
                                            <td class="text-primary"> <?php echo $us_data["status_name"]; ?> </td>
                                        <?php
                                        } else if ($ud["status"] == '0') {
                                        ?>
                                            <td class="text-danger"> Deactive </td>
                                        <?php
                                        }
                                        ?>
                                        
                                    </tr>

                                </tbody>
                            <?php

                            }

                            ?>

                        </table>

                        <div class="col-12 text-center mb-3">
                            <label class="form-label fs-5 text-black-50 fw-bold">
                                THANK YOU for doing Business with us !!
                            </label>
                        </div>

                        <div class="col-12 bottom mt-3">
                            <p class="text-center">&copy; 2023 Shopply.lk || All Rights Reserved</p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>