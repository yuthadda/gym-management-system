<?php
include_once "../layouts/header.php";
?>

<!-- PHP Logics  -->
<?php

include_once "../controllers/trainer-controller.php";

if (isset($_POST['submit'])) {
    $error = false;
    if (empty($_POST['trainerName'])) {
        $error_name = "Please enter trainer name";
        $error = true;
    } else {
        $trainer_name = $_POST['trainerName'];
    }

    if (empty($_POST['trainerEmail'])) {
        $error_email = "Please enter trainer email";
        $error = true;
    } else {
        $trainer_email = $_POST['trainerEmail'];
    }

    if (empty($_POST['trainerPhone'])) {
        $error_phone = "Please enter trainer phone";
        $error = true;
    } else {
        $trainer_phone = $_POST['trainerPhone'];
    }

    if (empty($_POST['trainerSalary'])) {
        $error_salary = "Please enter trainer salary";
        $error = true;
    } else {
        $trainer_salary = $_POST['trainerSalary'];
    }

    if (!$error) {
        $trainerController = new TrainerController();
        $result = $trainerController->createTrainer($trainer_name, $trainer_email, $trainer_phone, $trainer_salary);
        if ($result) header('location:trainers.php?msg="success"');
        else header('location:trainers.php?msg="fail"');
    }
}


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

                    <div class="container border p-5">
                        <div class="row my-2 ">
                            <div class=" col-md-12 text-center">

                                <h5 class="">New trainer form</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 my-3 mx-auto">
                                <form action="" method="post" class="">
                                    <div class=" form-group">
                                        <label for="trainerName" class=" form-label">Name</label>
                                        <input type="text" name="trainerName" class=" form-control" id="trainerName" value="<?php if(isset($trainer_name)) echo $trainer_name ?>">
                                        <span class="text-danger">
                                            <?php if(isset($error_name)) echo $error_name ?>
                                        </span>
                                    </div>

                                    <div class=" form-group">
                                        <label for="trainerName" class=" form-label">Email</label>
                                        <input type="text" name="trainerEmail" class=" form-control" id="trainerEmail" value="<?php if(isset($trainer_email)) echo $trainer_email ?>">
                                        <span class="text-danger">
                                            <?php if(isset($error_email)) echo $error_email ?>
                                        </span>
                                    </div>

                                    <div class=" form-group">
                                        <label for="trainerName" class=" form-label">Phone</label>
                                        <input type="text" name="trainerPhone" class=" form-control" id="trainerPhone" value="<?php if(isset($trainer_phone)) echo $trainer_phone ?>">
                                        <span class="text-danger">
                                            <?php if(isset($error_phone)) echo $error_phone ?>
                                        </span>
                                    </div>

                                    <div class=" form-group">
                                        <label for="trainerName" class=" form-label">Salary</label>
                                        <input type="number" name="trainerSalary" class=" form-control" id="trainerSalary" value="<?php if(isset($trainer_salary)) echo $trainer_salary ?>">
                                        <span class="text-danger">
                                            <?php if(isset($error_salary)) echo $error_salary ?>
                                        </span>
                                    </div>

                                    <div class="">
                                        <button type="submit" class=" btn btn-primary" name="submit">Add Trainer</button>
                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once "../layouts/footer.php" ?>