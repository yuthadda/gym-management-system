<?php

include_once "../controllers/membership-controller.php";
$id = $_POST['id'];

$membershipController = new MembershipController();
$result = $membershipController->delete($id);

if($result){
    $data = array("status"=>"true");
    echo json_encode($data);
}else{
    $data = array("status"=>"false");
    echo json_encode($data);
}

?>