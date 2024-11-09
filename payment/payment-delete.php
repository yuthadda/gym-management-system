<?php 

include_once "../controllers/payment-controller.php";

$paymentController = new PaymentController();
$result = $paymentController->deletePayment($_GET['id']);

if($result)
{
    header('location:view-payments.php?msg=deleted');
}
else
{
    header('location:view-payments.php?msg=faildelete');
}