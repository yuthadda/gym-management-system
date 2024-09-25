<?php 

include_once "../includes/db.php";

class Payment{
   
    public $con;

    public function getAllPayment()
    {
        $this->con = Database::connect();
        if ($this->con) {
            $sql = "select * from payments where deleted_at is null";
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
            $sql = "select * from payments where payment_id = :id ";
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
            $sql = "select payments.*,plans.* from payments join plans where payments.member_id = :id and payments.plan_id=plans.plan_id ";
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
}