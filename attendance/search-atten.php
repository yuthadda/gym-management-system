<?php

include_once "../controllers/attendance-controller.php";
$data = $_POST['id'];
$member_id = $_POST['memberid'];
$attendanceController = new AttendanceController();
$attendances = $attendanceController->searchAttendance($data,$member_id);

$attencount = $attendanceController->searchAttendanceCount($data,$member_id);

$count = 1;
$output = "";
 foreach($attendances as $attendance){
     $output .= "
     <tr id=" . $attendance['member_id'] . ">
                                 <td><img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                             alt='...'></td>
                                 <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" . $attendance['check_date'] . "</td>
                            </tr>
    ";
 }

 $output .= "<tr><td><h5 class='text-center'>Total Check-in: " . $attencount['attenCount'] . " days</h5></td></tr>";
 echo $output;
?>