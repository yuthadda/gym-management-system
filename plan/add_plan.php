<?php

include_once('../controllers/plan-controller.php');

if (isset($_POST['submit'])) {
    $error = false;
    if (empty($_POST['planName'])) {
        $error_name = "Please enter plan name";
        $error = true;
    } else {
        $planName = $_POST['planName'];
    }

    if (empty($_POST['planPrice'])) {
        $error_price = "Please enter plan price";
        $error = true;
    } else {
        $planPrice = $_POST['planPrice'];
    }

    if (empty($_POST['planDuration'])) {
        $error_duration = "Please enter plan duration";
        $error = true;
    } else {
        $planDuration = $_POST['planDuration'];
    }

    if (empty($_POST['planDescription'])) {
        $error_description = "Please enter plan description";
        $error = true;
    } else {
        $planDescription = $_POST['planDescription'];
    }

    if (!$error) {
        $planController = new PlanController();
        $result = $planController->addPlan($planName, $planPrice, $planDuration, $planDescription);

        if ($result) {
            header('location:view_plan.php?msg=success');
        } else {
            header('location:view_plan.php?msg=failed');
        }
    }
}



?>



<?php include_once('../layouts/header.php') ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once('../layouts/sidebar.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">
        <?php include_once "../layouts/nav.php" ?>
           

        

            <div class="container ">
            
                <div class="row">

                <div class="col-md-3"></div>

                    <div class="col-md-6 card shadow p-5 mt-5">
                    <h4 class="text-center ">Add Plan Information</h4>
                    <hr class="mb-3 w-100">

                        <form action="" method="POST">

                            <div class="control-group mb-3">
                                <label for="" class="form-label">Enter Name</label>
                                <input type="text" name="planName" class="form-control" id="" value="<?php if(isset($planName)) echo $planName ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_name)) {
                                        echo $error_name;
                                    }
                                    ?>
                                </span>

                            </div>
                            <div class="control-group mb-3">

                                <label for="" class="form-label">Enter Price</label>
                                <input type="text" name="planPrice" class="form-control" id="" value="<?php if(isset($planPrice)) echo $planPrice ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_price)) {
                                        echo $error_price;
                                    }
                                    ?>
                                </span>


                            </div>

                            <div class="control-group mb-3">
                                <label for="" class="form-label">Enter Duration</label>
                                <input type="number" name="planDuration" class="form-control" id="" value="<?php if(isset($planDuration)) echo $planDuration ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_duration)) {
                                        echo $error_duration;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="control-group mb-3">
                                <label for="" class="form-label">Enter Description</label>
                                <textarea type="text" name="planDescription" class="form-control" id="" value="<?php if(isset($planDescription)) echo $planDescription ?>">
                                </textarea>
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_description)) {
                                        echo $error_description;
                                    }
                                    ?>
                                </span>

                            </div>
                            <div class="control-group ">
                                <button type="submit" name="submit" class="btn btn-primary  ">Add Plan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    


   

    <?php include_once "../layouts/footer.php" ?>