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
            $sql = "SELECT memberships.*,users.* FROM memberships JOIN users WHERE memberships.user_id=users.user_id";
            $statment =  $this->con->prepare($sql);
            $result = $statment->execute();
            if($result) return $statment->fetchAll();
            else return null;
        }

    }

    public function getMembershipById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT memberships.*,users.*, FROM membderships WHERE member_id=:id";
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
            $sql = "UPDATE trainers SET deleted_at=:date WHERE trainer_id=:id";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(':date',$dateString);
            $statment->bindParam(":id",$id);
            $result = $statment->execute();
            if($result) return $statment->fetch();
            else return null;
        }
    }

    public function update($trainer_name,$trainer_email,$trainer_phone,$trainer_salary,$id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "UPDATE trainers SET trainer_name=:name,
            trainer_email=:email,
            trainer_phone=:phone,
            trainer_salary=:salary WHERE trainer_id=:id";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(':name',$trainer_name);
            $statment->bindParam(':email',$trainer_email);
            $statment->bindParam(':phone',$trainer_phone);
            $statment->bindParam(':salary',$trainer_salary);
            $statment->bindParam(':id',$id);
           return  $statment->execute();
        }
    }

}