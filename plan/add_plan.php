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


            <div class="content-header">
                <div id="route">
                    <a href="../view/index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a>
                </div>
                <h1>Plan Insert Form</h1>
            </div>

            <div class="header">
                <span id="icon"><i class="fas fa-align-justify"></i> </span>
                <h5 id="title">Plan-info</h5>
            </div>

            <div class="container">
                <div class="row">


                    <div class="col-md-10">

                        <form action="" method="POST">

                            <div class="control-group">
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
                            <div class="control-group">

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

                            <div class="control-group ">
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
                            <div class="control-group">
                                <label for="" class="form-label">Enter Description</label>
                                <input type="text" name="planDescription" class="form-control" id="" value="<?php if(isset($planDescription)) echo $planDescription ?>">
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
    </div>

    <style>
        .container {

            border: 1px solid #cdcdcd;
            border-top: none;
            font-family: "Open Sans", sans-serif;
            margin-top: -9px;
            max-width: 720px;



        }

        #route {
            background-color: #fff;
            border-bottom: 1px solid #e3ebed;

        }

        #route a {
            padding: 8px 20px 8px 10px;
            display: inline-block;
            background-image: url(../img/breadcrumb.png);
            background-position: center right;
            background-repeat: no-repeat;
            font-size: 11px;
            background-color: #666666;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .header {
            margin-bottom: 0;
            margin-left: 288px;
            margin-right: 77px;
            max-width: 720px;
        }

        #icon {
            padding: 9px 10px 7px 11px;
            float: left;
            border-right: 1px solid #cdcdcd;
            margin-right: 10px;
        }

        #title {
            background-color: #efefef;
            border: 1px solid #cdcdcd;
            padding: 12px;
            font-size: 12px;
            font-weight: bold;

        }

        .control-group {
            padding: 10px;
            border-bottom: 1px solid #cdcdcd;
            width: 100%;
        }
    </style>

    <?php include_once "../layouts/footer.php" ?>