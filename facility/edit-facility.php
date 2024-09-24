<?php

include_once "../layouts/header.php";
include_once "../controllers/facility-controller.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $facility = new FacilityController();
    $facility = $facility->getFacilityById($id);
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['qty']) && !empty($_POST['vendor'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $vendor = $_POST['vendor'];
        $facility = new FacilityController();
        $result = $facility->updateFacility($id, $name, $price, $qty, $vendor);
        if ($result) {
        header('location:view-facility.php?msg=updatesuccess');
    }
    } 

    
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
                        <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Enter Facility Name</label>
                                <input type="text" name="name" class="form-control" value="<?php

                                                                                            echo $facility['fac_name'];
                                                                                            ?>">
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter Price</label>
                                <input type="text" name="price" class="form-control" value="<?php

                                                                                            echo $facility['fac_price'];
                                                                                            ?>">
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter Quantity</label>
                                <input type="text" name="qty" class="form-control" value="<?php

                                                                                            echo $facility['fac_qty'];
                                                                                            ?>">
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter Vendor Name</label>
                                <input type="text" name="vendor" class="form-control" value="<?php

                                                                                                echo $facility['fac_vendor'];
                                                                                                ?>">
                                
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary float-right ">Update Facility</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>