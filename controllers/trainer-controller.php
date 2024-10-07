<?php 

require_once "../models/trainer.php";
class TrainerController{
    public function createTrainer($trainer_name,$trainer_email,$trainer_phone,$trainer_salary){
        $trainer = new Trainer();
        return $trainer->insertTrainer($trainer_name,$trainer_email,$trainer_phone,$trainer_salary);
    }
    public function getAllTrainers(){
        $trainer = new Trainer();
        return $trainer->getAllTrainers();
    }

    public function getTrainerById($id){
        $trainer = new Trainer();
        return $trainer->getTrainerById($id);
    }

    public function update($trainer_name,$trainer_email,$trainer_phone,$trainer_salary,$id){

        $trainer = new Trainer();
        return $trainer->update($trainer_name,$trainer_email,$trainer_phone,$trainer_salary,$id);
        
    }

    public function delete($id){
        $trainer = new Trainer();
        return $trainer->delete($id);
    }

    public function getTotalSalary(){
        $trainer = new Trainer();
        return $trainer->getTotalSalary();
    }
    
}