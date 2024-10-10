<?php 

include_once "../controllers/attendance-controller.php";

$attendanceController = new AttendanceController();

if(isset($_POST['id'])){

    $id = $_POST['id'];

    
    $attendanceController->insertAttendanceById($id);
    $attendanceController->getStatusdataById($id);
    
    echo "Already checked today!";

}