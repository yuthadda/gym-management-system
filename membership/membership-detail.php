<?php

include_once "../layouts/header.php";

?>

<?php

require_once "../controllers/membership-controller.php";
include_once "../controllers/trainer-controller.php";
include_once "../controllers/payment-controller.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}



$membershipController = new MembershipController();
$membership = $membershipController->getMembershipById($id);

if (!$membership['trainer_id'] == null) {
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
                            if (isset($_GET['msg'])) {
                                if ($_GET['msg'] == 'fail') {
                                    echo "<span class=' alert alert-danger' >Error in adding</span>";
                                } elseif ($_GET['msg'] == 'updatefail') {
                                    echo "<span class=' alert alert-danger' >Error in Updating</span>";
                                } elseif ($_GET['msg'] == 'deleted') {
                                    echo "<span class=' alert alert-success' >Successfully deleted</span>";
                                } elseif ($_GET['msg'] == 'faildelete') {
                                    echo "<span class=' alert alert-danger' >Error in deleting</span>";
                                } elseif ($_GET['msg'] == 'updatesuccess') {
                                    echo "<span class=' alert alert-success' >Successfully updated</span>";
                                } else {
                                    echo "<span class=' alert alert-success' >Added Successfully</span>";
                                }
                            }
                            ?>

                      
    </div>
</div> -->


                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 card shadow p-3 mt-5" style="width: 30rem;">
                            <div class="d-flex">
                                <div class="pl-4 bg-gray-800 text-gray-200 " style="width: 40%;">
                                    <img class="card-img-top mt-5" src='../img/undraw_profile_2.svg' alt="Card image cap" style="width: 10rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">GM-<?php echo $membership['member_id'] ?></h5>
                                        <p class=" ">Membership Name : <?php echo $membership['user_name'] ?></p>
                                        <p>Trainer : <?php

                                                            if (!$membership['trainer_id'] == null) {
                                                                echo "<h3>";
                                                                echo $trainer['trainer_name'];
                                                                echo "</h3>";
                                                            } else {
                                                                echo "No Trainer";
                                                            }

                                                            ?></p>
                                        <p><i class="fa-solid fa-envelope mr-2"></i>Email : <?php echo $membership['user_email'] ?></p>
                                        <p><i class="fa-solid fa-phone mr-2"></i>Phone : <?php echo $membership['user_phone'] ?></p>
                                        <p><i class="fa-solid fa-location-dot mr-2"></i>Address : <?php echo $membership['user_address'] ?></p>
                                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
                                <div class="ml-5" style="width:500px">
                                    <div class="">
                                        <div class="d-flex">
                                            <div class=" w-50 ">
                                                <p>Initial Weight : </p>
                                                <p><?php echo $membership['weight'] ?> </p>
                                            </div>
                                            <div">
                                                <p>Initial Height : </p>
                                                <p><?php echo $membership['height'] ?> </p>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <div class="d-flex">
                                            <div>
                                                
                                            </div>
                                            <div>

                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                      

                                        <div>
                                            <?php

                                            foreach ($payments as $payment) {
                                                echo "<p>";
                                                echo "Plan Name : " . $payment['plan_name'];
                                                echo "</p>";

                                                echo "<p>";
                                                echo "Plan Price : " . $payment['plan_price'];
                                                echo "</p>";

                                                echo "<p>";
                                                echo "Plan Duration : " . $payment['plan_duration'];
                                                echo "</p>";

                                                echo "<p>";
                                                echo "Plan Information : " . $payment['plan_description'];
                                                echo "</p>";

                                                echo "<p>";
                                                echo "Paid Date : " . $payment['paid_date'];
                                                echo "</p>";

                                                echo "<p>";
                                                echo "Expired Date : " . $payment['expired_date'];
                                                echo "</p>";

                                                echo "<p>";
                                                echo "Plan Status : " . $payment['status'];
                                                echo "</p>";
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- /.container-fluid -->

                </div>
           
            <!-- End of Main Content -->

            <?php include_once "../layouts/footer.php" ?>