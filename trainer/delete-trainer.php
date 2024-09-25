<?php   

require_once "../controllers/trainer-controller.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $trainerController = new TrainerController();
    $result = $trainerController->delete($id);

    if($result){
        $data = array(
            "status" => 'true'
        );
        echo json_encode($data);
        
    }else{
        $data = array(
            "status" => 'false'
        );
        echo json_encode($data);

    }
}