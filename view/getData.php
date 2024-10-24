<?php 

include_once "../controllers/payment-controller.php";



if(isset($_POST['income']))

{
    $paymentController = new PaymentController();
    $payments = $paymentController->getPaymentByMonth();
    echo json_encode($payments);
}


?>