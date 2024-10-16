<?php 

require_once "../includes/db.php";
class Trainer{
    public $con;
    public $trainer_name;
    public $trainer_email;
    public $trainer_phone;
    public $trainer_salary;
    public $deleted_at;

    public function __construct() {
        
    }

    public function insertTrainer($trainer_name,$trainer_email,$trainer_phone,$trainer_salary){
        $this->con = Database::connect();
        if($this->con){
            $sql = "INSERT INTO trainers(trainer_name,trainer_email,trainer_phone,trainer_salary) values(:name,:email,:phone,:salary)";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(':name',$trainer_name);
            $statment->bindParam(':email',$trainer_email);
            $statment->bindParam(':phone',$trainer_phone);
            $statment->bindParam(':salary',$trainer_salary);
           return  $statment->execute();
        }
    }

    public function getAllTrainers(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT * FROM trainers WHERE deleted_at is NULL";
            $statment =  $this->con->prepare($sql);
            $result = $statment->execute();
            if($result) return $statment->fetchAll();
            else return null;
        }

    }

    public function getTrainerById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT * FROM trainers WHERE trainer_id=:id";
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
            return $result;
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

    
    public function getTotalSalary(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT SUM(trainer_salary) as total FROM trainers WHERE deleted_at is null";
            $statment =  $this->con->prepare($sql);
            $result = $statment->execute();
            if($result) return $statment->fetch();
            else return null;
        }

    }

    public function searchTrainer($data){
        $this->con= Database::connect();
        $sql = "select * from trainers where trainer_name like :data or trainer_email like :data or trainer_phone like :data or trainer_salary like :data and deleted_at is NULL";
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


}