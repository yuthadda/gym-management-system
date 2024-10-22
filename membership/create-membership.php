<?php

include_once "../layouts/header.php";
include_once "../controllers/membership-controller.php";
include_once "../controllers/user-controller.php";
include_once "../controllers/trainer-controller.php";


$membershipController = new MembershipController();

$userController = new UserController();
$users = $userController->getNotMemberUser();

$trainerController = new TrainerController();
$trainers = $trainerController->getAllTrainers();

if (isset($_POST['submit'])) {
    $error = false;
    $user_id = $_POST['user_id'];
    if (!empty($_POST['trainer_id'])) {
        $trainer_id = $_POST['trainer_id'];
    } else {
        $trainer_id = null;
    }

    if (empty($_POST['weight'])) {
        $error_weight = "Please enter weight";
        $error = true;
    } else {
        $weight = $_POST['weight'];
    }

    if (empty($_POST['height'])) {
        $error_height = "Please enter height";
        $error = true;
    } else {
        $height = $_POST['height'];
    }

    if (!$error) {
        $result = $membershipController->createMembership($user_id, $trainer_id, $weight, $height);
        if ($result) {
            header('location:../payment/create-payment.php?msg=success');
        } else {
            header('location:view-memberships.php?msg=fail');
        }
    }
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
                    <div class="col-md-3"></div>
                    <div class="col-md-6 card shadow p-5 mt-5">
                    <h4 class="text-center mb-3">Add Membership Information</h4>
                        <form action="" method="POST">


                            <div class="form-group mb-3">
                                <label for="" class="form-label">User Name</label>
                                <select name="user_id" id="" class="form-control"  required>
                                    <option value="">Choose User Name</option>
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?= $user['user_id'] ?>"><?= $user['user_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Trainer Name</label>
                                <select name="trainer_id" id="" class="form-control" required>
                                    <option value="">Choose Trainer Name</option>
                                    <option value="">No Trainer</option>
                                    <?php foreach ($trainers as $trainer): ?>

                                        <option value="<?= $trainer['trainer_id'] ?>"><?= $trainer['trainer_name'] ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>


                            <div class=" form-group mb-3">
                                <label class=" form-label">Weight</label>
                                <input type="text" name="weight" class=" form-control" id="weight" value="<?php if(isset($weight)) echo $weight ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_weight)) {
                                        echo $error_weight;
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class=" form-group mb-3">
                                <label class=" form-label">Height</label>
                                <input type="text" name="height" class=" form-control" id="height" value="<?php if(isset($height)) echo $height ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_height)) {
                                        echo $error_height;
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Add Member</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            <!-- </div> -->

            <?php include_once "../layouts/footer.php" ?>