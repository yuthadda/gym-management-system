<?php

include_once "../layouts/header.php";
include_once "../controllers/user-controller.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $user = new UserController();
    $user = $user->getUserById($id);
}
var_dump($id);

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
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    echo "
                        <td>" . $user['user_name'] . "</td>
                        <td>" . $user['user_email'] . "</td>
                        <td>" . $user['user_phone'] . "</td>
                        <td>" . $user['user_address'] . "</td>
                        ";
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>