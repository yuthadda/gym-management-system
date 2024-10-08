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

    public function getMembershipById($id){
        $membership = new Membership();
        return $membership->getMembershipById($id);
    }

    public function update($trainer_id,$weight,$height,$id){

        $membership = new Membership();
        return $membership->updateMembership($trainer_id,$weight,$height,$id);
        
    }

    public function delete($id){
       $membership = new Membership();
       return $membership->delete($id);
    }

    public function countAttendance($id){
        $membership = new Membership();
        return $membership->countAttendance($id);
     }

     public function getAllMembershipsAttendance(){
        $membership = new Membership();
        return $membership->getAllMembershipsAttendance();
    }
    
}