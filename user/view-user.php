<?php

include_once "../layouts/header.php";
include_once "../controllers/user-controller.php";
$user = new UserController();
$users = $user->getAllUser();



?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once "../layouts/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            <?php include_once "../layouts/nav.php" ?>

            <div class="container">

                <div class="row">
                    <div class="col-md-12 text-center mb-3">
                        <h2>User Information</h2>
                    </div>
                    <div class="col-md-8 mb-3">
                        <?php
                        if (isset($_GET['msg'])) {
                            if ($_GET['msg'] == 'updatesuccess') {
                                echo "
                                <span class='alert alert-success'>user successfully updated</span>
                                ";
                            } else if ($_GET['msg'] == 'addsuccess') {
                                echo "
                                    <span class='alert alert-success'>user successfully added!</span>
                                    ";
                            }
                        }

                        ?>
                    </div>
                    
                    <div class="col-md-4 d-flex mb-3">
                        <input type="text" name="data" class="form-control UserSearch" placeholder="Search user informations....">
                        <button class="btn border-dark btnUserSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped" id='myTable'>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                $count = 1;
                                foreach ($users as $user) {
                                    echo "
                            <tr id=" . $user['user_id'] . ">
                                <td><img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                            alt='...'></td>
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" . $user['user_name'] . "</td>
                                <td class='align-middle'>" . $user['user_email'] . "</td>
                                <td class='align-middle'>" . $user['user_phone'] . "</td>
                                <td class='align-middle'>" . $user['user_address'] . "</td>
                                <td><a class='btn btn-info btn-sm mx-1' href='detail-user.php?id=" . $user['user_id'] . "'><i class='fa-solid fa-circle-info'></i></a>
                                <a class='btn btn-warning btn-sm mx-1' href='edit-user.php?id= " . $user['user_id'] . "'><i class='fa-solid fa-pen-to-square'></i></a>
                                <a class='btn btn-danger btn-sm mx-1 btnDeleteUser'><i class='fa-solid fa-trash'></i></a></td>
                            </tr>
                            ";
                                }
                                ?>
                            </tbody>
                           
                        </table>
                        <a class='btn btn-dark mx-2' href='./create-user.php'>create users</a></td>

                    </div>
                </div>
            </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>