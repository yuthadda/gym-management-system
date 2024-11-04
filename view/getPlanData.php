<?php 

include_once "../controllers/plan-controller.php";



if(isset($_POST['plan']))

{
    $planController = new PlanController();
    $plans = $planController->planCount();
    echo json_encode($plans);
}

?>