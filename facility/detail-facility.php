<?php

include_once "../layouts/header.php";
include_once "../controllers/facility-controller.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $facility = new FacilityController();
    $facility = $facility->getFacilityById($id);
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
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qualtity</th>
                                    <th>Vendor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    echo "
                        <td>" . $facility['fac_name'] . "</td>
                        <td>" . $facility['fac_price'] . "</td>
                        <td>" . $facility['fac_qty'] . "</td>
                        <td>" . $facility['fac_vendor'] . "</td>
                        ";
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>