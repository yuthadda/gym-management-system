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

        
       <!-- Main Content -->
<div id="content">

<?php include_once "../layouts/nav.php" ?>

<!-- Begin Page Content -->
<div class="container">


<div class="row">
    <div class="col-md-12 bg-light">
    <h3>Trainer name : <?= $trainer['trainer_name'] ?></h3>
    <p>Trainer personal ID : <?= $trainer['trainer_id'] ?></p>
    <p>email : <?= $trainer['trainer_email'] ?></p>
    <p>phone : <?= $trainer['trainer_phone'] ?></p>
    <p>salary : <?= $trainer['trainer_salary'] ?></p>

    </div>
</div>

   
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

        <?php include_once "../layouts/footer.php" ?>
