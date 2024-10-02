<?php 

include_once ('../models/progress.php');

class ProgressController{

    public function addProgress($memberId,$weight,$height)
    {
        $progress   = new Progress();
        $result =  $progress->addProgress($memberId,$weight,$height);
        return $result;
    }

   
    public function showAllProgress()
    {
        $progress   = new Progress();
        $result = $progress->showAllProgress();
       return $result;
    }

    
    public function getProgressById($id)
    {
        $progress   = new Progress();
        $result = $progress->getProgressById($id);
       return $result;
    }

    

}





?>