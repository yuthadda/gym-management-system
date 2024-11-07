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


    public function getTodayMember(){
        $attendance = new Attendance();
        $result = $attendance->getTodayMember();
        return $result;
    }

    public function memberAttenDetail($id){
        $attendance = new Attendance();
        $result = $attendance->memberAttenDetail($id);
        return $result;
    }

    public function searchAttendance($data,$member_id){
        $attendance = new Attendance();
        $result = $attendance->searchAttendance($data,$member_id);
        return $result;
    }

    public function attendanceCount($id){
        $attendance = new Attendance();
        $result = $attendance->attendanceCountMonthly($id);
        return $result;
    }

    public function searchAttendanceCount($data,$member_id){
        $attendance = new Attendance();
        $result = $attendance->getAttenByMonth($data,$member_id);
        return $result;
    }

    

}





?>