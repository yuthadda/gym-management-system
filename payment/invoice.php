<?php

include_once "../layouts/header.php";
include_once "../controllers/payment-controller.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $paymentController = new PaymentController();
    $payment = $paymentController->getPaymentById($id);
}


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
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Invoice No : </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>address</th>

                                    <th>Plan Name</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Paid Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php

                                    $invoice_id = str_pad($payment['payment_id'], 4, "0", STR_PAD_LEFT);
                                    echo "
                        <td>" . $invoice_id . "</td>

                        <td>" . $payment['user_name'] . "</td>
                        <td>" . $payment['user_email'] . "</td>
                        <td>" . $payment['user_phone'] . "</td>
                        <td>" . $payment['user_address'] . "</td>

                        <td>" . $payment['plan_name'] . "</td>
                        <td>" . $payment['plan_duration'] . "</td>
                        <td>" . $payment['plan_price'] . "</td>

                        <td>" . $payment['paid_date'] . "</td>
                        ";
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>