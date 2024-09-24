<?php 

require_once "../models/membership.php";
class MembershipController{
    public function createMembership($user_id,$trainer_id,$weight,$height){
        $membership = new Membership();
        return $membership->insertMembership($user_id,$trainer_id,$weight,$height);
    }
    public function getAllMemberships(){
        $membership = new Membership();
        return $membership->getAllMemberships();
    }

    public function getTrainerById($id){
        $trainer = new Trainer();
        return $trainer->getTrainerById($id);
    }

    public function update($trainer_name,$trainer_email,$trainer_phone,$trainer_salary,$id){

        $trainer = new Trainer();
        return $trainer->update($trainer_name,$trainer_email,$trainer_phone,$trainer_salary,$id);
        
    }

    public function delete($id){
        $trainer = new Trainer();
        return $trainer->delete($id);
    }
    
}