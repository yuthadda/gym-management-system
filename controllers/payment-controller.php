<?php 

include_once "../models/payment.php";

class PaymentController{

    
    function getAllPayment(){
        $payment = new Payment();
        return $payment->getAllPayment();
    }

    function insertPayment($member_id, $plan_id, $paid_date, $expired_date,$status){
        $payment = new Payment();
        return $payment->insertPayment($member_id, $plan_id, $paid_date, $expired_date,$status);
    }

    function getPaymentById($id){
        $payment = new Payment();
        return $payment->getPaymentById($id);
    }

    function getPaymentByMembershipId($id){
        $payment = new Payment();
        return $payment->getPaymentByMembershipId($id);
    }

    function updatePayment($id,$member_id, $plan_id, $paid_date, $expired_date,$status){
        $payment = new Payment();
        return $payment->updatePayment($id,$member_id, $plan_id, $paid_date, $expired_date,$status);
    }

    function deletePayment($id){
        $payment = new Payment();
        return $payment->deletePayment($id);
    }

    function checkExpire(){
        $payment = new Payment();
        return $payment->checkExpired();
    }

    function searchPayment($data){
        $payment = new Payment();
        return $payment->searchPayment($data);
    }

    function getNoPaymentMember(){
        $payment = new Payment();
        return $payment->getNoPaymentMember();
    }
    
}