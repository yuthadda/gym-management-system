
<?php

include_once('../includes/db.php');

class Attendance
{


    public $con;

    public $atten_status = "present";

    public function __construct() {}

    //----------------------------------------Start Add Data----------------------------------------------------------
    public function insertAttendanceById($member_id)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $today = new DateTime();
            $dateString = $today->format('Y-m-d');

            $sql = 'Select * from attendances where member_id=:id and check_date=:date';

            $statement = $this->con->prepare($sql);
            $statement->bindParam(':id', $member_id);
            $statement->bindParam(':date', $dateString);
            $result = $statement->execute();

            if ($result) {
                $existing = $statement->fetch();
            }



            if ($existing) {


                $exist = "Already Check Today";
                return $exist;
            } else {
                $sql = "INSERT INTO attendances(member_id,check_date,atten_status)
             values(:id,:date,:atten_status)";
                $statement =  $this->con->prepare($sql);
                $statement->bindParam(':id', $member_id);
                $statement->bindParam(':date', $dateString);
                $statement->bindParam(':atten_status', $this->atten_status);
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
        $statement->bindParam(":id", $member_id);
        $statement->bindParam(':date', $dateString);
        $result    = $statement->execute();
        return $result;
    }

    //----------------------------------------End get Data----------------------------------------------------------


    //----------------------------------------Start get Data By Id----------------------------------------------------------

    public function createAtten($member_id)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $today = new DateTime();
            $dateString = $today->format('Y-m-d');
            $status = "present";

            $sql = 'Select * from attendances where member_id=:id and check_date=:date';

            $statement = $this->con->prepare($sql);
            $statement->bindParam(':id', $member_id);
            $statement->bindParam(':date', $dateString);
            $result = $statement->execute();

            if ($result) {
                $existing = $statement->fetch();
            }
            if ($existing) {
                $exist = false;
                return $exist;
            } else {

                $sql = "INSERT INTO attendances(member_id,check_date,atten_status)
             values(:id,:date,:atten_status)";
                $statement =  $this->con->prepare($sql);
                $statement->bindParam(':id', $member_id);
                $statement->bindParam(':date', $dateString);
                $statement->bindParam(':atten_status', $status);
                return  $result = $statement->execute();
            }
        }
    }

    public function getTodayMember(){
        $today = new DateTime();
        $dateString = $today->format('Y-m-d');
        $this->con = Database::connect();
        $sql       = 'Select count(*) as todayCount from attendances where check_date = :date and deleted_at is null';
        $statement = $this->con->prepare($sql);
        $statement->bindParam(':date', $dateString);
        $result    = $statement->execute();
        if($result){
            return $statement->fetch();
        }else{
            return null;
        }
    }
//--------------------------------------Start Default Function---------------------------------------------
    public function memberAttenDetail($id){
        $this->con = Database::connect();

        $current_year = date('Y');
        $current_month = date('m');

        if($this->con){
            $sql = "SELECT memberships.*,users.*,attendances.*
             FROM memberships join users join attendances
             WHERE memberships.member_id=:id 
             AND memberships.member_id = attendances.member_id
             AND memberships.user_id=users.user_id
             and YEAR(attendances.check_date) = :year
             and MONTH(attendances.check_date) = :month ";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(":id",$id);
            $statment->bindParam(":year",$current_year);
            $statment->bindParam(":month",$current_month);
            $result = $statment->execute();
            if($result) return $statment->fetchAll();
            else return null;
        }
    }
//--------------------------------------End Default Function---------------------------------------------

//--------------------------------------Start SearchByMonth Function---------------------------------------------
    public function searchAttendance($data,$member_id){
        $this->con = Database::connect();

        $date = explode('-',$data);
        $current_year = $date[0];
        $current_month = $date[1];
        
        

        if($this->con){
            $sql = "SELECT memberships.*,users.*,attendances.*
             FROM memberships join users join attendances
             WHERE memberships.member_id=:id 
             AND memberships.member_id = attendances.member_id
             AND memberships.user_id=users.user_id
             and YEAR(attendances.check_date) = :year
             and MONTH(attendances.check_date) = :month ";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(":id",$member_id);
            $statment->bindParam(":year",$current_year);
            $statment->bindParam(":month",$current_month);
            $result = $statment->execute();
            if($result) return $statment->fetchAll();
            else return null;
        }
    }

    public function attendanceCountMonthly($id){
        $this->con = Database::connect();
        
        $current_year = date('Y');
        $current_month = date('m');

        if($this->con){
            $sql = "SELECT count(*) as attenCount from 
            attendances join memberships
             where memberships.member_id=:id 
             and attendances.member_id = memberships.member_id
             and YEAR(attendances.check_date) = :year
             and MONTH(attendances.check_date) = :month";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(":id",$id);
            $statment->bindParam(":year",$current_year);
            $statment->bindParam(":month",$current_month);
            $result = $statment->execute();
            if($result) return $statment->fetch();
            else return null;
        }
    }

    public function getAttenByMonth($data,$member_id){
        $this->con = Database::connect();
        
        $date = explode('-',$data);
        $current_year = $date[0];
        $current_month = $date[1];

        if($this->con){
            $sql = "SELECT count(*) as attenCount from 
            attendances join memberships
             where memberships.member_id=:id 
             and attendances.member_id = memberships.member_id
             and YEAR(attendances.check_date) = :year
             and MONTH(attendances.check_date) = :month";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(":id",$member_id);
            $statment->bindParam(":year",$current_year);
            $statment->bindParam(":month",$current_month);
            $result = $statment->execute();
            if($result) return $statment->fetch();
            else return null;
        }
    }

    public function attendanceCount($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "SELECT count(*) as
             attenCount from
              attendances join 
              memberships where memberships.member_id=:id and attendances.member_id = memberships.member_id";
            $statment =  $this->con->prepare($sql);
            $statment->bindParam(":id",$id);
            $result = $statment->execute();
            if($result) return $statment->fetch();
            else return null;
        }
    }
}





?>