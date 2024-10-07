<?php

include_once "../models/facility.php";

class FacilityController{

    function getAllFacility(){
        $facility = new FacilityModel();
        return $facility->getAllFacility();
    }
    function insertFacility($name,$price,$qty,$vendor){
        $facility = new FacilityModel();
        return $facility->insertFacility($name,$price,$qty,$vendor);
    }

    function getFacilityById($id){
        $facility = new FacilityModel();
        return $facility->getFacilityById($id);
    }

    function updateFacility($id,$name,$price,$qty,$vendor){
        $facility = new FacilityModel();
        return $facility->updateFacility($id,$name,$price,$qty,$vendor);
    }

    function deleteFacility($id){
        $facility = new FacilityModel();
        return $facility->deleteFacility($id);
    }

    public function getTotalPrice(){
        $facility = new FacilityModel();
        return $facility->getTotalPrice();
    }
}

?>