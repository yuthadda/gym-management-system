<?php 

include_once ('../includes/db.php');

class Plan{

    public $planName,$planPrice,$planDuration,$planDescription;
    public $con;

    public function __construct()
    {
        $this->planName         = "default";
        $this->planPrice        = "default";
        $this->planDuration     = "default";
        $this->planDescription = "default";
    }

//----------------------------------------Start Add Data----------------------------------------------------------
    public function addPlan($planName,$planPrice,$planDuration,$planDescription)
    {
            $this->con = Database::connect();
            if($this->con)
            {
                $sql = 'insert into plans(plan_name,plan_price,Plan_duration,Plan_description)
                      values(:planName , :planPrice , :planDuration , :planDescription)';

                $statement = $this->con->prepare($sql);
                $statement->bindParam(':planName',$planName);
                $statement->bindParam(':planPrice',$planPrice);
                $statement->bindParam(':planDuration',$planDuration);
                $statement->bindParam(':planDescription',$planDescription);
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
        if($result)
        {
            return $statement->fetchAll();  
        }
        return null;
    }

//----------------------------------------End get Data----------------------------------------------------------



}





?>