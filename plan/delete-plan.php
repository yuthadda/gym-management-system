<?php

include_once "../controllers/plan-controller.php";

$id = $_POST['id'];

$planController = new PlanController();
$result = $planController->deletePlan($id);

if($result){
    $data = array("status"=>"true");
    echo json_encode($data);
}else{
    $data = array("status"=>"false");
    echo json_encode($data);
}

?>