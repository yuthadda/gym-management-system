<?php

include_once ('../controllers/plan-controller.php');

$planController = new PlanController();
$plans = $planController->showPlan();

?>



<?php include_once ('../layouts/header.php') ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include_once ('../layouts/sidebar.php') ?>

        <!-- Content Wrapper -->
        <duv id="content-wrapper" class="d-flex flex-column">

        <?php include_once ('../layouts/nav.php') ?>

        <div class="col-md-12">
        <table class="table table-striped">

        <thead>
            <tr>
                <th>NO</th>
                <th>Name</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody id="tbody">

            <?php 
            $count=1;
            foreach($plans as $plan)
            {
                echo "<tr id=".$plan['plan_id'].">";
                echo "<td>" .$count++ ."</td>";
                echo "<td>" .$plan['plan_name'] ."</td>";
                echo "<td>" .$plan['plan_price']." $" ."</td>";
                echo "<td>" .$plan['plan_duration']." months" ."</td>";
                echo "<td>" .$plan['plan_description'] ."</td>";
                echo "<td> <a class='btn btn-info mx-1' href='detail-plan.php?plan_id=".$plan['plan_id']."'>Detail </a>
                           <a class='btn btn-warning mx-1' href='edit-plan.php?plan_id=".$plan['plan_id']."'>Edit</a>
                           <button class='btn btn-danger btnPlanDelete'>Delete</button>"
                        ."</td>";
                
                echo "</tr>";
            }
            ?>
        

        </tbody>

        </table>
        <div class="col-md-6">
    <?php                                    
        echo "<td><a class='btn btn-dark mx-2' href='../view/index.php'>Back</a></td>";
    ?>
    </div>  
        </div>

        
    

    


        </div>
    </div>
        <?php include_once ('../layouts/footer.php') ?>







