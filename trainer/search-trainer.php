<?php

include_once '../controllers/trainer-controller.php';
$data = $_POST['value'];

$trainerController = new TrainerController();
$trainers = $trainerController->searchTrainer($data);
$count = 1;
$output = "";
var_dump($trainers);
foreach ($trainers as $trainer) {
    $output .= "
     <tr id=" . $trainer['trainer_id'] . ">
                                <td><img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                            alt='...'></td>
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" . $trainer['trainer_name'] . "</td>
                                <td class='align-middle'>" . $trainer['trainer_email'] . "</td>
                                <td class='align-middle'>" . $trainer['trainer_phone'] . "</td>
                                <td><a class='btn btn-info mx-1' href='trainer-detail.php?id=" . $trainer['trainer_id'] . "'><i class='fa-solid fa-circle-info'></i> Detail</a>
                                <a class='btn btn-warning mx-1' href='edit-trainer.php?id= " . $trainer['trainer_id'] . "'><i class='fa-solid fa-pen-to-square'></i> Edit</a>
                                <a class='btn btn-danger mx-1 btnDeleteTrainer'><i class='fa-solid fa-trash'></i> Delete</a></td>
                            </tr>
     ";
}
echo $output;
?>
