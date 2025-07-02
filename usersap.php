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

                    include "adminheader.php";
                    include "connectionshop.php";

                    $rs = Shopply::search("SELECT * FROM `user`");
                    $num = $rs->num_rows;

                    ?>

                    <div class="col-12 mt-4 btn-toolbar justify-content-end">
                        <div class="row">
                            <div class="col-12">
                                <span>Total Users : <?php echo ($num); ?></span>
                            </div>
                            <div class="col-12 mt-2">
                                <button class="btn btn-dark me-2"><i class="bi bi-plus-lg"></i> Add User</button>

                            </div>
                        </div>

                        <!--button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button-->
                    </div>

                    <div class="col-lg-11">
                        <div class="row d-flex justify-content-end mt-4">
                            <!-- <div class="d-none" id="msgDiv" onclick="reload();">
                                <div class="alert alert-danger" id="msg"></div>
                            </div> -->
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="User E-mail" id="uid" />
                            </div>

                            <button class="btn btn-dark me-2 col-2" onclick="updateUserStatus();">Change Status</button>
                        </div>
                    </div>


                    <div class="col-lg-10 offset-1">

                        <div class="d-flex mt-3">
                            <div class="row">
                                <p class="fw-bold" style="font-size: 50px;">User Management</p>
                                
                            </div>
                        </div>
                        <hr/>

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="tnx">#</th>
                                    <th scope="col" class="tnx">Image</th>
                                    <th scope="col" class="tnx">First Name</th>
                                    <th scope="col" class="tnx">Last Name</th>
                                    <th scope="col" class="tnx">E-mail</th>
                                    <th scope="col" class="tnx">Mobile</th>
                                    
                                    <th scope="col" class="tnx">Status</th>
                                </tr>
                            </thead>

                            <?php


                            for ($i = 0; $i < $num; $i++) {
                                $ud = $rs->fetch_assoc();

                                $profimg = Shopply::search("SELECT * FROM `profile_image` WHERE user_email='" . $ud["email"] . "'");
                                $img = $profimg->fetch_assoc();

                            ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td> <img src="<?php echo $img["path"]; ?>" height="70px" style="clip-path: circle(35px);" /></td>
                                        <td> <?php echo $ud["fname"]; ?> </td>
                                        <td> <?php echo $ud["lname"]; ?> </td>
                                        <td class="fw-bold"> <?php echo $ud["email"]; ?> </td>
                                        <td> <?php echo $ud["mobile"]; ?> </td>
                                        

                                        <?php

                                        $us = Shopply::search("SELECT * FROM `status` WHERE `status_id`='" . $ud["user_status_status_id"] . "'");
                                        $us_data = $us->fetch_assoc();

                                        ?>
                                        <?php
                                        if ($ud["user_status_status_id"] == '1') {
                                        ?>
                                            <td class="badge rounded-pill text-bg-info ms-2 mt-3"> <?php echo $us_data["status_name"]; ?> </td>
                                        <?php
                                        } else if ($ud["user_status_status_id"] == '0') {
                                        ?>
                                            <td class="badge rounded-pill text-bg-danger ms-1 mt-2"> Deactive </td>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>