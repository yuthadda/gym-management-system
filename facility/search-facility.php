<?php

include_once "../controllers/facility-controller.php";
$data = $_POST['value'];

$facilityController = new FacilityController();
$facilities = $facilityController->searchFacility($data);
$count = 1;
$output = "";
foreach($facilities as $facility){
    $output .= "
    <tr id=" . $facility['fac_id'] . ">
                                <td>" . $count++ . "</td>
                                <td>" . $facility['fac_name'] . "</td>
                                <td>" . $facility['fac_price'] . "</td>
                                <td>" . $facility['fac_qty'] . "</td>
                                <td>" . $facility['fac_vendor'] . "</td>
                                <td><a class='btn btn-info mx-1' href='detail-facility.php?id=" . $facility['fac_id'] . "'><i class='fa-solid fa-pen-to-square'></i> Detail</a>
                                <a class='btn btn-warning mx-1' href='edit-facility.php?id= " . $facility['fac_id'] . "'><i class='fa-solid fa-trash'></i> Edit</a>
                                <a class='btn btn-danger mx-1 btnDeleteFacility'>Delete</a></td>
                            </tr>
    ";
}
echo $output;
?>