<?php

include_once "../layouts/header.php";
include_once "../controllers/facility-controller.php";

$facility = new FacilityController();
$facilitite = $facility->getAllFacility();


?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once "../layouts/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php include_once "../layouts/nav.php" ?>

                <div class="container">

                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h2>Facility Information</h2>
                        </div>
                        <div class="col-md-8 mb-3">
                            <?php
                            if (isset($_GET['msg'])) {
                                if ($_GET['msg'] == 'updatesuccess') {
                                    echo "
                                <span class='alert alert-success'>facility successfully updated</span>
                                ";
                                } else if ($_GET['msg'] == 'addsuccess') {
                                    echo "
                                    <span class='alert alert-success'>facility successfully added</span>
                                    ";
                                }
                            }

                            ?>
                        </div>
                        <!-- <div class="col-md-4 d-flex mb-3">
                            <input type="text" class="form-control FacSearch" placeholder="Search facility informations....">
                            <button class="btn border-dark btnFacSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div> -->
                        <div class="col-md-12">

                            <table class="table table-striped display responsive nowrap" id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quality</th>
                                        <th>Vendor</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php
                                    $count = 1;
                                    foreach ($facilitite as $facility) {
                                        echo "
                            <tr id=" . $facility['fac_id'] . ">
                                <td>" . $count++ . "</td>
                                <td>" . $facility['fac_name'] . "</td>
                                <td>" . $facility['fac_price'] . " $</td>
                                <td>" . $facility['fac_qty'] . "</td>
                                <td>" . $facility['fac_vendor'] . "</td>
                                <td>
                                <a class='btn btn-warning mx-1' href='edit-facility.php?id= " . $facility['fac_id'] . "'><i class='fa-solid fa-pen-to-square'></i> Edit</a>
                                <a class='btn btn-danger mx-1 btnDeleteFacility'><i class='fa-solid fa-trash'></i>  Delete</a></td>
                            </tr>
                            ";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <a class='btn btn-dark mx-2' href='./create-facility.php'>create facilities</a></td>

                        </div>
                    </div>
                </div>
            </div>
       


    <?php include_once "../layouts/footer.php" ?>