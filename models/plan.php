<?php

include_once('../includes/db.php');

class Plan
{

    public $planName, $planPrice, $planDuration, $planDescription;
    public $con;

    public function __construct()
    {
        $this->planName         = "default";
        $this->planPrice        = "default";
        $this->planDuration     = "default";
        $this->planDescription = "default";
    }

    //----------------------------------------Start Add Data----------------------------------------------------------
    public function addPlan($planName, $planPrice, $planDuration, $planDescription)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = 'insert into plans(plan_name,plan_price,Plan_duration,Plan_description)
                      values(:planName , :planPrice , :planDuration , :planDescription)';

            $statement = $this->con->prepare($sql);
            $statement->bindParam(':planName', $planName);
            $statement->bindParam(':planPrice', $planPrice);
            $statement->bindParam(':planDuration', $planDuration);
            $statement->bindParam(':planDescription', $planDescription);
            $result = $statement->execute();
            return $result;
        }
    }
    //----------------------------------------End Add Data----------------------------------------------------------

    //----------------------------------------Start get Data----------------------------------------------------------

    public function showPlan()
    {
        $this->con = Database::connect();
        $sql       = 'select * from plans where deleted_at is null';
        $statement = $this->con->prepare($sql);
        $result    = $statement->execute();
        if ($result) {
            return $statement->fetchAll();
        }
        return null;
    }

    //----------------------------------------End get Data----------------------------------------------------------


    //----------------------------------------Start get Data By Id----------------------------------------------------------

    public function getPlanByID($id)
    {
        $this->con = Database::connect();
        $sql = "select * from plans where  plan_id=:id";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id", $id);
        $result = $statement->execute();
        if ($result) {
            return $statement->fetch();
        } else
            return null;
    }

    public function updatePlan($id, $name, $price, $duration, $description)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = "update plans set plan_name=:name,plan_price=:price,plan_duration=:duration,plan_description=:description where plan_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id", $id);
            $statement->bindParam(":name", $name);
            $statement->bindParam(":price", $price);
            $statement->bindParam(":duration", $duration);
            $statement->bindParam(":description", $description);
            $result = $statement->execute();
            return $result;
        }
    }

    public function deletePlan($id)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $today = new DateTime();
            $strDate = $today->format('Y-m-d H:i:s');
            $this->con = Database::connect();
            if ($this->con) {
                $sql = "update plans set deleted_at=:date where plan_id=:id";
                $statement = $this->con->prepare($sql);
                $statement->bindParam(":date", $strDate);
                $statement->bindParam(":id", $id);
                $result = $statement->execute();
                return $result;
            }
        }
    }

    
    public function searchPlan($data){
        $this->con= Database::connect();
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "select * from plans 
        where plan_name like :data
        and deleted_at is NULL";
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

    public function planCount(){
        $this->con= Database::connect();
        $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT COUNT(*) as planCount from payments WHERE deleted_at is null GROUP by plan_id";
        $statement = $this->con->prepare($sql);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }
    }
}
