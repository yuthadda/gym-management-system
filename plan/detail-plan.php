<?php

include_once "../layouts/header.php";
include_once "../controllers/plan-controller.php";


    

if (isset($_GET['plan_id'])) {
    $id = $_GET['plan_id'];

    $planController = new PlanController();
    $plan = $planController->getPlanById($id);
}




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
                <a href="view_plan.php"><i class="fa-solid fa-backward text-dark" ></i></a>
                    <img class="card-img-top mx-auto mt-5" src='../img/plan.jpg' alt="Card image cap" style="width: 200px; height:200px">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $plan['plan_name'] ?> Plan</h5>
                        <p ><i class="fa-solid fa-dollar-sign mr-2"></i></i>Price : <?php echo $plan['plan_price'] ?> $</p>
                        <p><i class="fa-regular fa-clock mr-2"></i></i>Duration : <?php echo $plan['plan_duration'] ?></p>
                        <p><i class="fa-solid fa-circle-info mr-2"></i></i>Description : <?php echo $plan['plan_description'] ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
                </div>
            </div>

        </div>
        

        
            <?php include_once "../layouts/footer.php" ?>