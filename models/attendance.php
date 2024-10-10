<?php 

include_once ('../includes/db.php');

class Attendance{

   
    public $con;

public $atten_status = "present";

    public function __construct()
    {
        
    }

//----------------------------------------Start Add Data----------------------------------------------------------
    public function insertAttendanceById($member_id)
    {
            $this->con = Database::connect();
            if($this->con)
            {
                $today = new DateTime();
                $dateString = $today->format('Y-m-d');

                $sql = 'Select * from attendances where member_id=:id and check_date=:date';

                $statement = $this->con->prepare($sql);
                $statement->bindParam(':id',$member_id);
                $statement->bindParam(':date',$dateString);
                 $result = $statement->execute();
                
               if($result)
               {
                $existing =$statement->fetch();
               }



               if($existing)
               {
                
                 
                    $exist = "Already Check Today";
                  return $exist;
                
               }
               else
               {
            $sql = "INSERT INTO attendances(member_id,check_date,atten_status)
             values(:id,:date,:atten_status)";
            $statement =  $this->con->prepare($sql);
            $statement->bindParam(':id',$member_id);
            $statement->bindParam(':date',$dateString);
            $statement->bindParam(':atten_status',$this->atten_status);
             return  $result = $statement->execute();
               }
               
            }
    }
//----------------------------------------End Add Data----------------------------------------------------------

//----------------------------------------Start get Data----------------------------------------------------------

    public function getstatusById($member_id)
    {
        $today = new DateTime();
        $dateString = $today->format('Y-m-d');
        $this->con = Database::connect();
        $sql       = 'Update attendances set atten_status="present"  where   member_id=:id and check_date=:date';
        $statement = $this->con->prepare($sql);
        $statement->bindParam(":id",$member_id);
        $statement->bindParam(':date',$dateString);
        $result    = $statement->execute();
       return $result;
    }

//----------------------------------------End get Data----------------------------------------------------------


//----------------------------------------Start get Data By Id----------------------------------------------------------

public function getPlanByID($id)
        {
            $this->con=Database::connect();
            $sql = "select * from plans where  plan_id=:id";
            $statement=$this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result=$statement->execute();
            if($result)
            {
                return $statement->fetch();
            }
            else
            return null;
        }


}





?>