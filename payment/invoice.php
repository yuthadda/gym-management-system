<?php

include_once "../layouts/header.php";
include_once "../controllers/payment-controller.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $paymentController = new PaymentController();
    $payment = $paymentController->getPaymentById($id);
}

$invoice_id = str_pad($payment['payment_id'], 4, "0", STR_PAD_LEFT);



?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once "../layouts/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <?php include_once "../layouts/nav.php" ?>

            <div class="container">
                
                <div class="container  justify-content-between border p-5 m-2 rounded">
                    <div class="row">
                        <div class="col-md-12">
                        <h3 class=" text-center">
                            GYM Inovice
                        </h3>
                        </div>
                    </div>
                <div class="  row">
                    <div class="col-md-4">
                        <h5 class=" font-weight-bolder"> Billed to </h5>
                        <h5>Member Name : <?= $payment['user_name'] ?></h5>
                        <h5>Phone : <?= $payment['user_phone'] ?></h5>
                        <h5>Email : <?= $payment['user_email'] ?></h5>
                        <h5>Address : <?= $payment['user_address'] ?></h5>
                    </div>

                    <div class="col-md-4"></div>

                    <div class="col-md-4 text-end">
                        <h5>Invoice ID : <?= $invoice_id ?></h5>
                        <h5>Invoice Date : <?= $payment['paid_date'] ?></h5>
                        
                    </div>
                    
                </div>

                <div class="row">
                   <div class="col-md-10 mx-auto my-1">
                   <table class=" table ">
                        <thead>
                            <tr>
                                <th>Plan Name</th>
                                <th  >Duration</th>
                                <th  >Price</th>
                            </tr>
                        </thead>
                        <tbody class=" table-group-divider">
                            <tr>
                                <td><?= $payment['plan_name'] ?></td>
                                <td><?= $payment['plan_duration'] ?></td>
                                <td><?= $payment['plan_price'] ?></td>
                            </tr>
                        </tbody>
                        <footer class=" table-group-divider" >
                            <tr class="  " >
                                <td colspan="2" class=" text-right" >Sub Total :</td>
                                <td colspan="" ><?= $payment['plan_price'] ?></td>
                            </tr>
                            <tr class=" " >
                            <td colspan="2" class=" text-right" >Tax(%) :</td>
                                <td colspan="" >0</td>
                            </tr>
                            <tr class=" " >
                             <td colspan="2" class=" text-right" >Discount(%) :</td>
                                <td colspan="" >0</td>
                            </tr>

                            <tr class=" " >
                             <td colspan="2" class=" text-right font-weight-bolder" ><h3>Total :</h3></td>
                                <td class=" font-weight-bolder" colspan="" ><h3><?= '$'.$payment['plan_price'] ?></h3></td>
                            </tr>
                        </footer>
                    </table>
                   </div>

                    
                </div>

                <div class="row">
                <div class="col-md-12 my-3">
                        <h3 class=""> Thank You Deeply From Our Heart!!!</h3>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-4">
                        <h5 class=" font-weight-bolder">Payment Detail </h5>
                        <h5>Member ID: <?= $payment['member_id'] ?></h5>
                        <h5>Account Name : <?= $payment['user_name'] ?></h5>
                        <h5>Payment Method : Cash</h5>
                        <h5>Pay Date : <?= $payment['paid_date'] ?></h5>
                </div>
                <div class="col-md-4"></div>

                <div class="col-md-4 text-end">
                    <h5>BRLRLR Gym</h5>
                    <h5>101x56st, Aung Myay Tharzan Township, Mandalay</h5>
                    
                </div>

                </div>
                </div>
                
            </div>

            <?php include_once "../layouts/footer.php" ?>