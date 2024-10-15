<?php 

include_once "../controllers/attendance-controller.php";

$attendanceController = new AttendanceController();

if(isset($_POST['id'])){

    $id = $_POST['id'];
    
        $result = $attendanceController->CreateAttendance($id);
    
    if($result){
        $data = array("msg"=>"Check In Success");
        echo json_encode($data);
    }else{
        $data = array("msg"=>"Already Checked");
        echo json_encode($data);
    }

}