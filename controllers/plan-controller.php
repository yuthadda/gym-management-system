<?php 

include_once ('../models/plan.php');

class PlanController{

    public function addPlan($planName,$planPrice,$planDuration,$planDescription)
    {
        $plan   = new Plan();
        $result =  $plan->addPlan($planName,$planPrice,$planDuration,$planDescription);
        return $result;
    }

   
    public function showPlan()
    {
        $plan   = new Plan();
        $result = $plan->showPlan();
       return $result;
    }

    
    public function getPlanById($id)
    {
        $plan   = new Plan();
        return $plan->getPlanById($id);
       
    }

    function updatePlan($id,$name,$price,$duration,$description){
        $plan = new Plan();
        return $plan->updatePlan($id,$name,$price,$duration,$description);
    }

    function deletePlan($id){
        $plan = new Plan();
        return $plan->deletePlan($id);
    }

    function searchUser($data){
        $user  = new UserModel();
        return $user->searchUser($data);
    }


    

}





?>