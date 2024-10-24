<?php
include_once "../layouts/header.php";
?>

<!-- PHP Logics  -->
 <?php 

 include_once "../controllers/trainer-controller.php";

 if(isset($_GET['id'])){

    $id = $_GET['id'];

    $trainerController = new TrainerController();
    $trainer = $trainerController->getTrainerById($id);

 }

 if(isset($_POST['submit'])){
    if(
        (!empty($_POST['trainerName']))
         && (!empty($_POST['trainerEmail']))
          && (!empty($_POST['trainerPhone']))
           && (!empty($_POST['trainerSalary']))){

        $trainer_name = $_POST['trainerName'];
        $trainer_email = $_POST['trainerEmail'];
        $trainer_phone = $_POST['trainerPhone'];
        $trainer_salary = $_POST['trainerSalary'];

    }

    $trainerController = new TrainerController();
    $result = $trainerController->update($trainer_name,$trainer_email,$trainer_phone,$trainer_salary,$id);
    if($result) header('location:trainers.php?msg="updatesuccess"');
    else header('location:trainers.php?msg="updatefail"');

 }
 
 ?>
 
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once "../layouts/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        
       <!-- Main Content -->
<div id="content">

<?php include_once "../layouts/nav.php" ?>

<!-- Begin Page Content -->
<div class="container">

<div class="container">
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 card shadow p-5 mt-5">
            <h4 class="text-center mb-3">Update Trainer Informations</h4>
            <form action="" method="post" class="">
                <div class=" form-group mb-3">
                    <label for="trainerName" class=" form-label" >Name</label>
                    <input type="text" name="trainerName" class=" form-control" required id="trainerName" value="<?= $trainer['trainer_name'] ?>" >
                </div>
    
                <div class=" form-group mb-3">
                    <label for="trainerName" class=" form-label" >Email</label>
                    <input type="text" name="trainerEmail" class=" form-control" required id="trainerEmail" value="<?= $trainer['trainer_email'] ?>">
                </div>
    
                <div class=" form-group mb-3">
                    <label for="trainerName" class=" form-label" >Phone</label>
                    <input type="text" name="trainerPhone" class=" form-control" required id="trainerPhone" value="<?= $trainer['trainer_phone'] ?>">
                </div>
    
                <div class=" form-group mb-3">
                    <label for="trainerName" class=" form-label" >Salary</label>
                    <input type="number" name="trainerSalary" class=" form-control" required id="trainerSalary" value="<?= $trainer['trainer_salary'] ?>">
                </div>
    
                <div class="">
                    <button type="submit" class=" btn btn-primary" name="submit" >Update Trainer</button>
                    <a href="trainers.php" class=" btn btn-primary" >cancel</a>

                </div>
                
                
            </form>
        </div>
    </div>

</div>

   
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

        <?php include_once "../layouts/footer.php" ?>
