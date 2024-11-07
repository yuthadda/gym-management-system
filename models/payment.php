<?php 

include_once "../includes/db.php";

class Payment{
   
    public $con;

    public function getAllPayment()
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = "select payments.*,memberships.*,plans.*,users.user_name from payments
             join memberships join plans join users
             where payments.member_id=memberships.member_id
             and payments.plan_id=plans.plan_id
             and memberships.user_id=users.user_id
             and memberships.deleted_at is null
             and plans.deleted_at is null
             and users.deleted_at is null
             and payments.deleted_at is null";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if ($result) {
                return $statement->fetchAll();
            } else {
                return null;
            }
        }
    }

    public function insertPayment($member_id, $plan_id, $paid_date, $expired_date,$status)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = "insert into payments(member_id,plan_id,paid_date,expired_date,status) values (:memberId,:planId,:paidDate,:expiredDate,:status)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":memberId", $member_id);
            $statement->bindParam(":planId", $plan_id);
            $statement->bindParam(":paidDate", $paid_date);
            $statement->bindParam(":expiredDate", $expired_date);
            $statement->bindParam(":status", $status);
            $result = $statement->execute();
            return $result;
        }
    }

    public function getPaymentById($id)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = "select payments.*,memberships.*,plans.*,users.*
              from payments join memberships join plans join users
               where payment_id = :id 
               and payments.member_id=memberships.member_id
               and payments.plan_id=plans.plan_id
               and memberships.user_id=users.user_id
               and payments.deleted_at is null
               and memberships.deleted_at is null
               and plans.deleted_at is null
               and users.deleted_at is null";
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

    public function getPaymentByMembershipId($id)
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = "select payments.*,plans.* 
            from payments join plans
             where payments.member_id = :id 
             and payments.status = 'active'
             and payments.plan_id=plans.plan_id ";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id", $id);
            $result = $statement->execute();
            if ($result) {
                return $statement->fetchAll();
            } else {
                return null;
            }
        }
    }

    

    public function updatePayment($id,$member_id, $plan_id, $paid_date, $expired_date,$status){
        $this->con = Database::connect();
        if($this->con){
            $sql = "update payments set member_id=:memberId,plan_id=:planId,paid_date=:paidDate,expired_date=:expriedDate,status=:status where payment_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->bindParam(":memberId", $member_id);
            $statement->bindParam(":planId", $plan_id);
            $statement->bindParam(":paidDate", $paid_date);
            $statement->bindParam(":expiredDate", $expired_date);
            $statement->bindParam(":status", $status);
            $result = $statement->execute();
            return $result;
        }
    }

    public function deletePayment($id){
        $this->con = Database::connect();
        if($this->con){
            $today = new DateTime();
            $strDate = $today->format('Y-m-d H:i:s');
            $this->con = Database::connect();
            if($this->con){
                $sql = "update payments set deleted_at=:date where payment_id=:id";
                $statement = $this->con->prepare($sql);
                $statement->bindParam(":date",$strDate);
                $statement->bindParam(":id",$id);
                $result = $statement->execute();
                return $result;
            }
        }
    }

    public function checkExpired(){
        $this->con = Database::connect();
        if($this->con){
            $today = new DateTime();
            $strDate = $today->format('Y-m-d');
            $status = "expired";
            $this->con = Database::connect();
            if($this->con){
                $sql = "update payments set status=:status where expired_date<:date";
                $statement = $this->con->prepare($sql);
                $statement->bindParam(':status',$status);
                $statement->bindParam(":date",$strDate);
                $result = $statement->execute();
                return $result;
            }
        }
    }

    public function searchPayment($data){
        $this->con= Database::connect();
        $sql = "SELECT payments.*,memberships.*,users.*,plans.*
         from payments Join memberships Join users Join plans
         on payments.plan_id=plans.plan_id
         and memberships.user_id=users.user_id
         and payments.member_id=memberships.member_id
         where(users.user_name like :data)
         and payments.deleted_at is NULL";
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

    public function getNoPaymentMember(){
        $this->con= Database::connect();
        $sql = "select users.*,memberships.* from memberships join users 
        where memberships.member_id 
        not in (select payments.member_id from payments where payments.status='active') 
        and users.user_id=memberships.user_id 
        and  users.deleted_at is NULL 
        and memberships.deleted_at is NULL";
        $statement = $this->con->prepare($sql);
        $result = $statement->execute();
        if($result){
            return $statement->fetchAll();
        }else{
            return null;
        }
    }

    public function getPaymentByMonth()
    {
        $this->con = Database::connect();
        $sql = "SELECT 
                YEAR(payments.paid_date) AS year, 
                MONTH(payments.paid_date) AS month, 
                SUM(plans.plan_price) AS total_income 
            FROM payments JOIN plans
            WHERE payments.plan_id = plans.plan_id
            GROUP BY YEAR(payments.paid_date), MONTH(payments.paid_date) 
            ORDER BY YEAR(payments.paid_date), MONTH(payments.paid_date)";
        $statement = $this->con->prepare($sql);
        $result = $statement->execute();
        if ($result) {
            return $statement->fetchAll();  
        }
    }

    public function getMemberByPayment()
    {
        $this->con = Database::connect();
        $sql = "SELECT 
                YEAR(payments.paid_date) AS year, 
                MONTH(payments.paid_date) AS month, 
                COUNT(memberships.member_id) AS total_member
            FROM payments JOIN memberships
            WHERE payments.member_id = memberships.member_id
            GROUP BY YEAR(payments.paid_date), MONTH(payments.paid_date) 
            ORDER BY YEAR(payments.paid_date), MONTH(payments.paid_date)";
        $statement = $this->con->prepare($sql);
        $result = $statement->execute();
        if ($result) {
            return $statement->fetchAll();  
        }
    }
}