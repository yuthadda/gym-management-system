<?php



include_once "../controllers/membership-controller.php";
$data = $_POST['value'];
$membershipController = new MembershipController();
$memberships = $membershipController->searchMembership($data);
// var_dump($memberships);
$count = 1;
$output = "";
$unique = [];
foreach($memberships as $membership){
    //$unique[$membership['member_id']] = $membership;
    //var_dump($unique[$membership['member_id']]['member_id']=$membership);
    $output .= "
    <tr id=" . $unique[$membership['member_id']]=$membership . ">
                                <td><img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                            alt='...'></td>
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" ."GM-" . $membership['member_id'] . "</td>
                                <td class='align-middle'>" . $membership['user_name'] . "</td>
                                <td class='align-middle'>" . $membership['user_address'] . "</td>
                               <td>
                                <a class='btn btn-info mx-1' href='membership-detail.php?id=" . $membership['member_id'] . "'>Detail</a>
                                <a class='btn btn-success mx-1' href='membership-progress.php?id= " . $membership['member_id'] . "'>Progress</a>
                                <a class='btn btn-warning mx-1' href='edit-membership.php?id= " . $membership['member_id'] . "'>Edit</a>
                                <a class='btn btn-danger btnDeleteMembership'>Delete</a>
                               </td>
                            </tr>
    ";
    echo $output;
    
}
?>