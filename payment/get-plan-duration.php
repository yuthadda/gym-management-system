<?php 

include_once "../controllers/plan-controller.php";

$planController = new PlanController();
$plan = $planController->getPlanById($_POST['id']);

echo $plan['plan_duration'].' months';