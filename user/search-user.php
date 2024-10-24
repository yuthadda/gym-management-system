<?php

include_once "../controllers/user-controller.php";
$data = $_POST['value'];
$userController = new UserController();
$users = $userController->searchUser($data);
$count = 1;
$output = "";
foreach($users as $user){
    $output .= "
     <tr id=" . $user['user_id'] . ">
                                <td><img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                            alt='...'></td>
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" . $user['user_name'] . "</td>
                                <td class='align-middle'>" . $user['user_email'] . "</td>
                                <td class='align-middle'>" . $user['user_phone'] . "</td>
                                <td class='align-middle'>" . $user['user_address'] . "</td>
                                <td><a class='btn btn-info mx-1' href='detail-user.php?id=" . $user['user_id'] . "'><i class='fa-solid fa-circle-info'></i>  Detail</a>
                                <a class='btn btn-warning mx-1' href='edit-user.php?id= " . $user['user_id'] . "'><i class='fa-solid fa-pen-to-square'></i> Edit</a>
                                <a class='btn btn-danger mx-1 btnDeleteUser'><i class='fa-solid fa-trash'></i>  Delete</a></td>
                            </tr>
    ";
}
echo $output;
?>