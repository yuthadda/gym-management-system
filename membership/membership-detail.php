<?php

include_once "../layouts/header.php";

?>

<?php 

require_once "../controllers/membership-controller.php";
include_once "../controllers/trainer-controller.php";
include_once "../controllers/payment-controller.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}



$membershipController = new MembershipController();
$membership = $membershipController->getMembershipById($id);

if(!$membership['trainer_id'] == null){
    $trainer_id = $membership['trainer_id'];
    $trainerController = new TrainerController();
    $trainer = $trainerController->getTrainerById($trainer_id);
}

$paymentController = new PaymentController();
$payments = $paymentController->getPaymentByMembershipId($id);

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

<!-- Error Showing Alerts -->
<!-- <div class="row my-2">
    <div class="col-md-12">
                            <?php
                            if(isset($_GET['msg'])){
                                if($_GET['msg'] == 'fail'){
                                   echo "<span class=' alert alert-danger' >Error in adding</span>";
                                }

                                elseif($_GET['msg'] == 'updatefail'){
                                    echo "<span class=' alert alert-danger' >Error in Updating</span>";

                                }elseif($_GET['msg'] == 'deleted'){
                                    echo "<span class=' alert alert-success' >Successfully deleted</span>";

                                }elseif($_GET['msg'] == 'faildelete'){
                                    echo "<span class=' alert alert-danger' >Error in deleting</span>";

                                }
                                elseif($_GET['msg'] == 'updatesuccess'){
                                    echo "<span class=' alert alert-success' >Successfully updated</span>";
                                }
                                else{
                                   echo "<span class=' alert alert-success' >Added Successfully</span>";
                                }
                            }
                             ?>

                      
    </div>
</div> -->


<div class="row">
    <div class="col-md-9 mx-auto">
     
    <h3>Membership Id : <?php echo "GM-".$membership['member_id'] ?></h3>
    <h3>User Name : <?php echo $membership['user_name'] ?></h3>
    <h3>User Email : <?php echo $membership['user_email'] ?></h3>
    <h3>User Phone : <?php echo $membership['user_phone'] ?></h3>
    <h3>User Address : <?php echo $membership['user_address'] ?></h3>
    <h3>User Initial Weight : <?php echo $membership['weight'] ?></h3>
    <h3>User Initial Height : <?php echo $membership['height'] ?></h3>

    <?php
    
    if(!$membership['trainer_id'] == null){
        echo "<h3>";
        echo $trainer['trainer_name'];
        echo "</h3>";
    }
    
    ?>
    
    <?php 

    foreach($payments as $payment){

        echo "<h4>";
        echo "Plan Name : ".$payment['plan_name'];
        echo "</h4>";

        echo "<h4>";
        echo "Plan Price : ".$payment['plan_price'];
        echo "</h4>";

        echo "<h4>";
        echo "Duration : ".$payment['plan_duration'];
        echo "</h4>";

        echo "<h4>";
        echo "Info : ".$payment['plan_description'];
        echo "</h4>";

        echo "<h4>";
        echo $payment['paid_date'];
        echo "</h4>";

        echo "<h4>";
        echo $payment['expired_date'];
        echo "</h4>";

        echo "<h4>";
        echo $payment['status'];
        echo "</h4>";
    }
    
    ?>


    </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

        <?php include_once "../layouts/footer.php" ?>
