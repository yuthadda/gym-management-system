<?php

include_once "../layouts/header.php";
include_once "../controllers/user-controller.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $user = new UserController();
    $user = $user->getUserById($id);
}
// var_dump($id);

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
                    <div class="col-md-4"></div>
                <div class="col-md-4 card shadow p-3 mt-5 " style="width: 30rem;">
                    <img class="card-img-top mx-auto mt-5" src='../img/undraw_profile_2.svg' alt="Card image cap" style="width: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $user['user_name'] ?></h5>
                        <p ><i class="fa-solid fa-envelope mr-2"></i>Email : <?php echo $user['user_email'] ?></p>
                        <p><i class="fa-solid fa-phone mr-2"></i>Phone : <?php echo $user['user_phone'] ?></p>
                        <p><i class="fa-solid fa-location-dot mr-2"></i>Address : <?php echo $user['user_address'] ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
                </div>
            </div>
            </div>
            

            <?php include_once "../layouts/footer.php" ?>