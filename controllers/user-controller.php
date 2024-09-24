<?php 
    include_once "../models/user.php";

class UserController{

    function getAllUser(){
        $user = new UserModel();
        return $user->getAllUser();
    }

    function insertUser($name,$email,$phone,$address){
        $user = new UserModel();
        return $user->insertUser($name,$email,$phone,$address);
    }

    function getUserById($id){
        $user = new UserModel();
        return $user->getUserById($id);
    }

    function updateUser($id,$name,$email,$phone,$address){
        $user = new UserModel();
        return $user->updateUser($id,$name,$email,$phone,$address);
    }

    function deleteUser($id){
        $user = new UserModel();
        return $user->deleteUser($id);
    }
}


?>