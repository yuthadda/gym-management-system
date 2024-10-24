<?php

include_once "../controllers/plan-controller.php";
$data = $_POST['value'];
$planController = new PlanController();
$plans = $planController->searchPlan($data);
$count = 1;
$output = "";
foreach($plans as $plan){
    $output .= "
     <tr id=" . $plan['plan_id'] . ">
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" . $plan['plan_name'] . "</td>
                                <td class='align-middle'>" . $plan['plan_price'] . "</td>
                                <td class='align-middle'>" . $plan['plan_duration'] . "</td>
                                <td class='align-middle'>" . $plan['plan_description'] . "</td>
                                <td> <a class='btn btn-info mx-1' href='detail-plan.php?plan_id=" . $plan['plan_id'] . "'>Detail</a>
                           <a class='btn btn-warning mx-1' href='edit-plan.php?plan_id=" . $plan['plan_id'] . "'>Edit</a>
                           <button class='btn btn-danger btnPlanDelete'>Delete</button></td>
                            </tr>
    ";
}
echo $output;
?>