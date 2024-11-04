<?php

include_once "../layouts/header.php";

?>

<?php

require_once "../controllers/trainer-controller.php";

$trainerController = new TrainerController();
$trainers = $trainerController->getAllTrainers();

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

                    <!-- Error Showing Alerts -->
                    <div class="row my-2">

                    </div>


                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h2>Trainer Information</h2>
                        </div>
                        <div class="col-md-8 mb-3">
                            <?php
                            if (isset($_GET['msg'])) {
                                if ($_GET['msg'] == 'fail') {
                                    echo "<span class=' alert alert-danger' >Error in adding</span>";
                                } elseif ($_GET['msg'] == 'updatefail') {
                                    echo "<span class=' alert alert-danger' >Error in Updating</span>";
                                } elseif ($_GET['msg'] == 'deleted') {
                                    echo "<span class=' alert alert-success' >Successfully deleted</span>";
                                } elseif ($_GET['msg'] == 'faildelete') {
                                    echo "<span class=' alert alert-danger' >Error in deleting</span>";
                                } elseif ($_GET['msg'] == 'updatesuccess') {
                                    echo "<span class=' alert alert-success' >trainer successfully updated!</span>";
                                } else {
                                    echo "<span class=' alert alert-success' >trainer successfully added!</span>";
                                }
                            }
                            ?>


                        </div>
                        <div class="col-md-4 d-flex mb-3">
                            <input type="text" class="form-control TrainerSearch" placeholder="Search trainer informations....">
                            <button class="btn border-dark btnTrainerSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"><?php $count = 1; ?>
                                    <?php foreach ($trainers as $trainer): ?>
                                        <tr id="<?= $trainer['trainer_id'] ?>">
                                            <td class="text-center"><img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                                                    alt='...'></td>
                                            <td class='align-middle'><?= $count++ ?></td>
                                            <td class='align-middle'><?= $trainer['trainer_name'] ?></td>
                                            <td class='align-middle'><?= $trainer['trainer_email'] ?></td>
                                            <td class='align-middle'><?= $trainer['trainer_phone'] ?></td>
                                            
                                            <td>
                                                <a href='./trainer-detail.php?id=<?= $trainer['trainer_id'] ?>' class="btn btn-info mx-1"><i class='fa-solid fa-circle-info'></i> Detail</a>
                                                <a href='./edit-trainer.php?id=<?= $trainer['trainer_id'] ?>' class="btn btn-warning mx-1"><i class='fa-solid fa-pen-to-square'></i> Edit</a>
                                                <a class="btn btn-danger btnDeleteTrainer"><i class='fa-solid fa-trash'></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <a class='btn btn-dark mx-2' href='./create-trainer.php'>create trainers</a></td>

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once "../layouts/footer.php" ?>