<?php

include_once "../layouts/header.php";
include_once "../controllers/membership-controller.php";
include_once "../controllers/user-controller.php";
include_once "../controllers/trainer-controller.php";

$membershipController = new MembershipController();

$userController = new UserController();
$users = $userController->getAllUser();

$trainerController = new TrainerController();
$trainers = $trainerController->getAllTrainers();

if(isset($_POST['submit']))
{
    $user_id = $_POST['user_id'];
    if(!empty($_POST['trainer_id']))
    {
        $trainer_id = $_POST['trainer_id'];
    }
    else
    {
        $trainer_id = null;
    }
    $weight = $_POST['weight'];
    $height = $_POST['height'];

    $result=$membershipController->createMembership($user_id,$trainer_id,$weight,$height);
    if($result)
    {
        header('location:view-memberships.php?msg=success');
    }
    else
    {
        header('location:view-memberships.php?msg=fail');
    }
}


// include_once "../controllers/user-controller.php";

// if(isset($_POST['submit'])){
//     $error = false;
//     if(empty($_POST['name'])){
//         $error_name = "Please enter user name";
//         $error = true;
//     }else{
//         $name = $_POST['name'];
//     }
//     if(empty($_POST['email'])){
//         $error_email = "Please enter user email";
//         $error = true;
//     }else{
//         $email = $_POST['email'];
//     }
//     if(empty($_POST['phone'])){
//         $error_phone = "Please enter user phone";
//         $error = true;
//     }else{
//         $phone = $_POST['phone'];
//     }
//     if(empty($_POST['address'])){
//         $error_address = "Please enter user address";
//         $error = true;
//     }else{
//         $address = $_POST['address'];
//     }

//     if(!$error){
//         header('location:view-user.php?msg=addsuccess');
//     }
//     $user = new UserController();
//     $user = $user->insertUser($name,$email,$phone,$address);
   
// }

?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once "../layouts/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
        <?php include_once "../layouts/nav.php" ?>
        
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="" method="POST">


                        <div class="col-md-4 my-3">
                            <label for="" class="form-label">User Name</label>
                            <select name="user_id" id="" class=" form-select" required  >
                                <option value="">Choose User Name</option>
                                <?php foreach($users as $user): ?>
                                    <option value="<?= $user['user_id'] ?>"><?= $user['user_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4 my-3">
                            <label for="" class="form-label">Trainer Name</label>
                            <select name="trainer_id" id="" class="form-select">
                            <option value="">Choose Trainer Name</option>
                            <option value="">No Trainer</option>
                            <?php foreach($trainers as $trainer): ?>
                                
                                    <option value="<?= $trainer['trainer_id'] ?>"><?= $trainer['trainer_name'] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
              
                        
                        <div class=" form-group">
                    <label  class=" form-label" >Weight</label>
                    <input type="text" name="weight" class=" form-control" required id="weight">
                </div>
    
                <div class=" form-group">
                    <label  class=" form-label" >Height</label>
                    <input type="text" name="height" class=" form-control" required id="height">
                </div>
                    
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary float-right ">Add Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include_once "../layouts/footer.php" ?>
