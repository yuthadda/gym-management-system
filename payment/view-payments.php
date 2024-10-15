<?php

include_once "../layouts/header.php";

?>

<?php 

require_once "../controllers/payment-controller.php";

$paymentController = new PaymentController();

$paymentController->checkExpire();

$payments = $paymentController->getAllPayment();

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
<div class="row my-2">
<div class="col-md-12 text-center mb-3">
                            <h2>Payment Information</h2>
                        </div>
    <div class="col-md-12 mb-3">
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
                                   echo "<span class=' alert alert-success' >Payment Added Successfully</span>";
                                }
                            }
                             ?>

                      
    </div>
</div>


<div class="row">
    <div class="col-md-12 mx-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Member Name</th>
                   <th>Plan Name</th>
                   <th>Paid Date</th>
                   <th>Plan Duration</th>
                   <th>Expire Date</th>
                   <th>Acc-status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody><?php $count=1; ?>
                    <?php foreach($payments as $payment): ?>
                        <tr id="<?= $payment['payment_id'] ?>">
                            <td><?= $count++ ?></td>
                            <td><?= $payment['user_name'] ?></td>
                            <td><?= $payment['plan_name'] ?></td>
                            <td><?= $payment['paid_date'] ?></td>
                            <td><?= $payment['plan_duration'].' Months' ?></td>
                            <td><?= $payment['expired_date'] ?></td>
                            <td class=" " ><?= $payment['status'] ?>
                           <?php 
                                if($payment['status']=='active'){
                                    echo "<i class='fa-solid fa-circle text-success fa-xs align-baseline'></i>";
                                }else{
                                    echo "<i class='fa-solid fa-circle text-danger fa-xs align-baseline'></i>";

                                }
                           ?>
                            </td>
                            <td>
                                <a href='./invoice.php?id=<?= $payment['payment_id'] ?>' class="btn btn-sm btn-info" >view invoice</a>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

        <?php include_once "../layouts/footer.php" ?>
