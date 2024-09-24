<?php

include_once "../controllers/user-controller.php";
$id = $_POST['id'];

$user = new UserController();
$result = $user->deleteUser($id);

if($result){
    $data = array("status"=>"true");
    echo json_encode($data);
}else{
    $data = array("status"=>"false");
    echo json_encode($data);
}

?>