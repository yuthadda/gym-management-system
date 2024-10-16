<?php
include_once "../includes/db.php";

class UserModel
{

    public $con;

    public function getAllUser()
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = "select * from users where deleted_at is null";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if ($result) {
                return $statement->fetchAll();
            } else {
                return null;
            }
        }
    }

    public function insertUser($name, $email, $phone, $address)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = "insert into users(user_name,user_email,user_phone,user_address) values (:name,:email,:phone,:address)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":name", $name);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":phone", $phone);
            $statement->bindParam(":address", $address);
            $result = $statement->execute();
            return $result;
        }
    }

    public function getUserById($id)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = "select * from users where user_id = :id ";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id", $id);
            $result = $statement->execute();
            if ($result) {
                return $statement->fetch();
            } else {
                return null;
            }
        }
    }

    public function updateUser($id,$name,$email,$phone,$address){
        $this->con = Database::connect();
        if($this->con){
            $sql = "update users set user_name=:name,user_email=:email,user_phone=:phone,user_address=:address where user_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":phone",$phone);
            $statement->bindParam(":address",$address);
            $result = $statement->execute();
            return $result;
        }
    }

    public function deleteUser($id){
        $this->con = Database::connect();
        if($this->con){
            $today = new DateTime();
            $strDate = $today->format('Y-m-d H:i:s');
            $this->con = Database::connect();
            if($this->con){
                $sql = "update users set deleted_at=:date where user_id=:id";
                $statement = $this->con->prepare($sql);
                $statement->bindParam(":date",$strDate);
                $statement->bindParam(":id",$id);
                $result = $statement->execute();
                return $result;
            }
        }
    }

    public function searchUser($data){
        $this->con= Database::connect();
<<<<<<< HEAD
        $sql = "select * from users where (user_name like :data or user_email like :data or user_phone like :data or user_address like :data) and deleted_at is NULL";
=======
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select * from users 
        where (user_name like :data 
        or user_email like :data or 
        user_address like :data )
        and deleted_at is NULL";
>>>>>>> 0bdf05c15b94436e7abaf23d8b920b77966284b5
        $statement = $this->con->prepare($sql);
        $search_data = "%".$data."%";
        $statement ->bindParam(":data",$search_data);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }
    }

<<<<<<< HEAD
    public function getNotMemberUser(){
        $this->con= Database::connect();
        $sql = "select * from users where user_id 
        not in (select user_id from memberships) 
        and users.deleted_at is NULL";
        $statement = $this->con->prepare($sql);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }
    }
=======
    
>>>>>>> 0bdf05c15b94436e7abaf23d8b920b77966284b5
}
