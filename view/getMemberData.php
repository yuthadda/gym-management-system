<?php 

include_once "../controllers/payment-controller.php";



if(isset($_POST['member']))

{
    $paymentController = new PaymentController();
    $members = $paymentController->getMemberByPayment();
    echo json_encode($members);
}


?>