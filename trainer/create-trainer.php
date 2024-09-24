<?php
include_once "../layouts/header.php";
?>

<!-- PHP Logics  -->
 <?php 

 include_once "../controllers/trainer-controller.php";

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
    $result = $trainerController->createTrainer($trainer_name,$trainer_email,$trainer_phone,$trainer_salary);
    if($result) header('location:trainers.php?msg="success"');
    else header('location:trainers.php?msg="fail"');

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

<div class="container border p-5">
    <div class="row my-2 ">
        <div class=" col-md-12 text-center">

            <h5 class="">New trainer form</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 my-3 mx-auto">
            <form action="" method="post" class="">
                <div class=" form-group">
                    <label for="trainerName" class=" form-label" >Name</label>
                    <input type="text" name="trainerName" class=" form-control" required id="trainerName">
                </div>
    
                <div class=" form-group">
                    <label for="trainerName" class=" form-label" >Email</label>
                    <input type="text" name="trainerEmail" class=" form-control" required id="trainerEmail">
                </div>
    
                <div class=" form-group">
                    <label for="trainerName" class=" form-label" >Phone</label>
                    <input type="text" name="trainerPhone" class=" form-control" required id="trainerPhone">
                </div>
    
                <div class=" form-group">
                    <label for="trainerName" class=" form-label" >Salary</label>
                    <input type="number" name="trainerSalary" class=" form-control" required id="trainerSalary">
                </div>
    
                <div class="">
                    <button type="submit" class=" btn btn-primary" name="submit" >Add Trainer</button>
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
