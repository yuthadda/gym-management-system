<?php

include_once('../controllers/plan-controller.php');

$planController = new PlanController();
$plans = $planController->showPlan();

?>



<?php include_once('../layouts/header.php') ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once('../layouts/sidebar.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once('../layouts/nav.php') ?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h2>Plan Information</h2>
                        </div>
                        <div class="col-md-8 mb-3">
                        <?php
                        if (isset($_GET['msg'])) {
                            if ($_GET['msg'] == 'updatesuccess') {
                                echo "
                                <span class='alert alert-success'>plan successfully updated</span>
                                ";
                            } else if ($_GET['msg'] == 'success') {
                                echo "
                                    <span class='alert alert-success'>plan successfully added!</span>
                                    ";
                            }
                        }

                        ?>
                    </div>
                    
                    <div class="col-md-4 d-flex mb-3">
                        <input type="text" name="data" class="form-control PlanSearch" placeholder="Search plan informations....">
                        <button class="btn border-dark btnPlanSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                        <div class="col-md-12 mb-3">
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="tbody">

                                    <?php
                                    $count = 1;
                                    foreach ($plans as $plan) {
                                        echo "<tr id=" . $plan['plan_id'] . ">";
                                        echo "<td>" . $count++ . "</td>";
                                        echo "<td>" . $plan['plan_name'] . "</td>";
                                        echo "<td>" . $plan['plan_price'] . " $" . "</td>";
                                        echo "<td>" . $plan['plan_duration'] . " months" . "</td>";
                                        echo "<td>" . $plan['plan_description'] . "</td>";
                                        echo "<td> <a class='btn btn-info mx-1' href='detail-plan.php?plan_id=" . $plan['plan_id'] . "'><i class='fa-solid fa-circle-info'></i> Detail</a>
                           <a class='btn btn-warning mx-1' href='edit-plan.php?plan_id=" . $plan['plan_id'] . "'><i class='fa-solid fa-pen-to-square'></i> Edit</a>
                           <button class='btn btn-danger btnPlanDelete'><i class='fa-solid fa-trash'></i> Delete</button>"
                                            . "</td>";

                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                                
                            </table>
                            <a class='btn btn-dark mx-2' href='add_plan.php'>create plans</a></td>

                        </div>
                    </div>
                </div>



            </div>








</body>
<?php include_once('../layouts/footer.php') ?>