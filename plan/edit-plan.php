<?php

include_once "../layouts/header.php";
include_once "../controllers/plan-controller.php";

if (isset($_GET['plan_id'])) {
    $id = $_GET['plan_id'];
    $planController = new PlanController();
    $plan = $planController->getPlanById($id);
}

if (isset($_POST['submit'])) {

    if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['duration']) && !empty($_POST['description'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];
        $planController = new PlanController();
        $result = $planController->updatePlan($id, $name, $price, $duration, $description);
        if ($result) {
            header('location:view_plan.php?msg=updatesuccess');
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

            <?php include_once "../layouts/nav.php" ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 card shadow p-5 mt-5">
                        <h4 class="text-center mb-3">Update Plan Informations</h4>
                        <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Enter Plan Name</label>
                                <input type="text" name="name" class="form-control" value="<?php

                                                                                            echo $plan['plan_name'];
                                                                                            ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_name)) {
                                        echo $error_name;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter Price</label>
                                <input type="text" name="price" class="form-control" value="<?php

                                                                                            echo $plan['plan_price'];
                                                                                            ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_price)) {
                                        echo $error_price;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter Duration</label>
                                <input type="text" name="duration" class="form-control" value="<?php

                                                                                            echo $plan['plan_duration'];
                                                                                            ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_duration)) {
                                        echo $error_duration;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter Description</label>
                                <textarea type="text" name="description" class="form-control " style="text-align: start;white-space: pre-wrap" >
                                <?php echo htmlspecialchars(trim($plan['plan_description'])); ?>
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary ">Update Plan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>