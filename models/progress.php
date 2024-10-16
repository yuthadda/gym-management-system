<?php 

include_once ('../includes/db.php');

class Progress{

        public $con;

    public function __construct()
    {
        
    }

//----------------------------------------Start Add Data----------------------------------------------------------
    public function addProgress($memberId,$weight,$height)
    {
        $today = new DateTime();
        $dateString = $today->format('Y-m-d');
            $this->con = Database::connect();
            if($this->con)
            {
                $sql = 'insert into progresses(member_id,new_weight,new_height,created_at)
                      values(:memberId , :weight , :height , :createdAt)';

                $statement = $this->con->prepare($sql);
                $statement->bindParam(':memberId',$memberId);
                $statement->bindParam(':weight',$weight);
                $statement->bindParam(':height',$height);
                $statement->bindParam(':createdAt',$dateString);
               $result = $statement->execute();
                return $result;
            }
    }
//----------------------------------------End Add Data----------------------------------------------------------

//----------------------------------------Start get Data----------------------------------------------------------

    public function showAllProgress()
    {
        $this->con = Database::connect();
        $sql       = 'select progresses.*,memberships.*,users.* from progresses join memberships join users where progresses.member_id=memberships.member_id and memberships.user_id=users.user_id and users.deleted_at is null and progresses.deleted_at is null and memberships.deleted_at is null';
        $statement = $this->con->prepare($sql);
        $result    = $statement->execute();
        if($result)
        {
            return $statement->fetchAll();  
        }
        return null;
    }

//----------------------------------------End get Data----------------------------------------------------------


//----------------------------------------Start get Data By Id----------------------------------------------------------

public function getProgressById($id)
        {
            $this->con=Database::connect();
             $sql = 'select progresses.*,memberships.*,users.* from
              progresses join memberships join users
               where memberships.member_id=:id 
               and progresses.member_id=memberships.member_id
               and memberships.user_id = users.user_id
               and users.deleted_at is null
               and  progresses.deleted_at is null
                and memberships.deleted_at is null';
            $statement=$this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result=$statement->execute();
            if($result)
            {
                return $statement->fetchAll();
            }
            else
            return null;
        }


        public function searchProgress($data){
            $this->con= Database::connect();
        $sql = "select * from progresses where prog_id like :data or member_id like :data or new_weight like :data or new_height like :data and deleted_at is NULL";
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





?>