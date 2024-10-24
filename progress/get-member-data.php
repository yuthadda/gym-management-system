<?php 

include_once "../controllers/membership-controller.php";

$membershipController = new MembershipController();
$member = $membershipController->getMembershipById($_POST['id']);

echo json_encode($member);

