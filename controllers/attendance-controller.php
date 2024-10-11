<?php 

include_once ('../models/attendance.php');

class AttendanceController{

    public function insertAttendanceById($member_id)
    {
        $attendance   = new Attendance();
        $result =  $attendance->insertAttendanceById($member_id);
        return $result;
        
    }

    public function CreateAttendance($member_id)
    {
        $attendance   = new Attendance();
        $result =  $attendance->createAtten($member_id);
        return $result;
        
    }


    // public function exit($member_id)
    // {
    //     $attendance   = new Attendance();
    //     return $attendance->insertAttendanceById($member_id)->exit();
    //     // $exist = $attendance->insertAttendanceById($member_id)->exist();
    // }

   
    public function getStatusdataById($member_id)
    {
        $attendance   = new Attendance();
        $result =  $attendance->getstatusById($member_id);
        return $result;
    }

    
    public function getPlanById($id)
    {
        $plan   = new Plan();
        return $plan->getPlanById($id);
       
    }

    

}





?>