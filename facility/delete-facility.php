<?php

include_once "../controllers/facility-controller.php";
$id = $_POST['id'];

$facility = new FacilityController();
$result = $facility->deleteFacility($id);

if($result){
    $data = array("status"=>"true");
    echo json_encode($data);
}else{
    $data = array("status"=>"false");
    echo json_encode($data);
}

?>