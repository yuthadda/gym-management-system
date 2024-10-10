<?php 

require_once "../includes/db.php";
class Membership{
    public $con;

    public $deleted_at;

    public function __construct() {
        
    }

    public function insertMembership($user_id,$trainer_id,$weight,$height){
        $this->con = Database::connect();
        if($this->con){
            $sql = "INSERT INTO memberships(user_id,trainer_id,weight,height)
             values(:user_id,:trainer_id,:weight,:height)";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(':user_id',$user_id);
            $statment->bindParam(':trainer_id',$trainer_id);
            $statment->bindParam(':weight',$weight);
            $statment->bindParam(':height',$height);
           return  $statment->execute();
        }
    }

    public function getAllMemberships(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT memberships.*,users.*
            FROM memberships JOIN users
             WHERE memberships.user_id=users.user_id 
             AND memberships.deleted_at is null 
             AND users.deleted_at is null";
            $statment =  $this->con->prepare($sql);
            $result = $statment->execute();
            if($result) return $statment->fetchAll();
            else return null;
        }

    }

    public function getMembershipById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT memberships.*,users.*
             FROM memberships join users  
             WHERE memberships.member_id=:id 
             AND memberships.user_id=users.user_id";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(":id",$id);
            $result = $statment->execute();
            if($result) return $statment->fetch();
            else return null;
        }
    }

    public function delete($id){
        $today = new DateTime();
        $dateString = $today->format('Y-m-d H:i:s');
        $this->con = Database::connect();
        if($this->con){
            $sql = "UPDATE memberships SET deleted_at=:date WHERE member_id=:id";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(':date',$dateString);
            $statment->bindParam(":id",$id);
            $result = $statment->execute();
            return $result;
        }
    }

    public function updateMembership($trainer_id,$weight,$height,$id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "UPDATE memberships SET trainer_id=:trainer_id,
            weight=:weight,
            height=:height WHERE member_id=:id";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(':trainer_id',$trainer_id);
            $statment->bindParam(':weight',$weight);
            $statment->bindParam(':height',$height);
            $statment->bindParam(':id',$id);
           return  $statment->execute();
        }
    }

    public function countAttendance($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "UPDATE memberships SET attendance =attendance+1 WHERE member_id=:id";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(":id",$id);
            $result = $statment->execute();
            return $result;
        }
    }


    public function getAllMembershipsAttendance(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT memberships.*,users.*,attendances.*
            FROM memberships JOIN users join attendances
             WHERE memberships.user_id=users.user_id 
             AND memberships.member_id=attendances.member_id 
             AND memberships.deleted_at is null 
             AND users.deleted_at is null
             AND attendances.deleted_at is null
             Group by memberships.member_id";
            $statment =  $this->con->prepare($sql);
            $result = $statment->execute();
            if($result) return $statment->fetchAll();
            else return null;
        }

    }

    // public function getAllMembershipsAttendance(){
    //     $this->con = Database::connect();
    //     if($this->con){
    //         $sql = "SELECT memberships.*,users.*
    //         FROM memberships JOIN users
    //          WHERE memberships.user_id=users.user_id 
    //          AND memberships.deleted_at is null 
    //          AND users.deleted_at is null";
    //         $statment =  $this->con->prepare($sql);
    //         $result = $statment->execute();
    //         if($result) return $statment->fetchAll();
    //         else return null;
    //     }
    // }
}