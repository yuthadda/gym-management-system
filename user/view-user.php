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

            <?php include_once "../layouts/nav.php" ?>

            <div class="container">
            <div class="row">
            <?php
                                if(isset($_GET['msg'])){
                                    if($_GET['msg'] == 'updatesuccess'){
                                        echo "
                                <span class='alert alert-success'>user successfully updated</span>
                                ";
                                    }else if($_GET['msg'] == 'addsuccess'){
                                        echo "
                                    <span class='alert alert-success'>user successfully added</span>
                                    ";
                                    }
                                }
                                
                                ?>
                            </div>
                <div class="row">
                    <h3 class="  ">User Information</h3>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($users as $user) {
                                    echo "
                            <tr id=".$user['user_id'].">
                                <td>" . $count++ . "</td>
                                <td>" . $user['user_name'] . "</td>
                                <td>" . $user['user_email'] . "</td>
                                <td>" . $user['user_phone'] . "</td>
                                <td>" . $user['user_address'] . "</td>
                                <td><a class='btn btn-primary' href='detail-user.php?id=" . $user['user_id'] . "'>Detail</a>
                                <a class='btn btn-primary' href='edit-user.php?id= ".$user['user_id']."'>Edit</a>
                                <a class='btn btn-primary btnDeleteUser'>Delete</a></td>
                            </tr>
                            ";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>