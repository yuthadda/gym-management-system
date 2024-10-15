<?php

include_once "../layouts/header.php";

?>

<?php

require_once "../controllers/trainer-controller.php";

$id = $_GET['id'];

$trainerController = new TrainerController();
$trainer = $trainerController->getTrainerById($id);

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
                        <h5 class="card-title text-center"><?php echo $trainer['trainer_name'] ?></h5>
                        <p><i class="fa-solid fa-envelope mr-2"></i>Email : <?php echo $trainer['trainer_email'] ?></p>
                        <p><i class="fa-solid fa-phone mr-2"></i>Phone : <?php echo $trainer['trainer_phone'] ?></p>
                        <p><i class="fa-solid fa-location-dot mr-2"></i>Salary : <?php echo $trainer['trainer_salary'] ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
            </div>
            </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>