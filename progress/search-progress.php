<?php

include_once '../controllers/progress-controller.php';
$data = $_POST['value'];

$progressController = new ProgressController();
$progresses = $progressController->searchProgress($data);
$count = 1;
$output = "";

foreach($progresses as $progress){
    $output .= "
    <tr id=" . $progress['prog_id'] . ">
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" ."GM-". $progress['member_id'] . "</td>
                                <td class='align-middle'>" . $progress['user_name'] . "</td>
                                <td class='align-middle'>" . $progress['new_weight'] . "</td>
                                <td class='align-middle'>" . $progress['new_height'] . "</td>
                                <td class='align-middle'>" . $progress['created_at'] . "</td>
                                
                                <td>
                                <a class='btn btn-warning' href='edit-membership.php?id= " . $progress['prog_id'] . "'>Edit</a>
                                <a class='btn btn-danger btnDeleteProgress'>Delete</a></td>
                            </tr>
    ";
}

?>