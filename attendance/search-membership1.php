<?php



include_once "../controllers/membership-controller.php";
$data = $_POST['value'];
$membershipController = new MembershipController();
$memberships = $membershipController->searchMembership($data);
// var_dump($memberships);
$count = 1;
$output = "";

foreach($memberships as $membership){

    $output .= "
    <tr id=" . $membership['member_id'].">
        
                                <td class='align-middle'>" ."GM-" . $membership['member_id'] . "</td>
                                <td class='align-middle'>" . $membership['user_name'] . "</td>
                               <td class='align-middle'>
                                <a class='btn btn-info mx-1' href='membership-progress.php?id=" . $membership['member_id'] . "'><i class='fa-solid fa-circle-info'></i> Detail</a>
                               </td>
                               <td>
                              <a  class='btn btn-sm btnNewCheckIn' style='background: #04ab5c; color: white'><i class='fa-sharp fa-solid fa-check'></i> Check-In</a>
                            </td>

     <tr>";
   
    
}

echo $output;
?>