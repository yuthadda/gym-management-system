<?php

include_once "../layouts/header.php";
include_once "../controllers/facility-controller.php";

if(isset($_POST['submit'])){
    $error = false;
    if(empty($_POST['name'])){
        $error_name = "Please enter Facility name";
        $error = true;
    }else{
        $name = $_POST['name'];
    }
    if(empty($_POST['price'])){
        $error_price = "Please enter price";
        $error = true;
    }else{
        $price = $_POST['price'];
    }
    if(empty($_POST['qty'])){
        $error_qty = "Please enter quantity";
        $error = true;
    }else{
        $qty = $_POST['qty'];
    }
    if(empty($_POST['vendor'])){
        $error_vendor = "Please vendor name";
        $error = true;
    }else{
        $vendor = $_POST['vendor'];
    }

    if(!$error){
        $facility = new FacilityController();
        $facility = $facility->insertFacility($name,$price,$qty,$vendor);
        header("location:view-facility.php?msg=addsuccess");
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
                            <label for="" class="from-label">Enter Facility Name</label>
                            <input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name ?>">
                            <span class="text-danger">
                                <?php
                                if(isset($error_name)){
                                    echo $error_name;
                                }
                                ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="from-label">Enter Price</label>
                            <input type="text" name="price" class="form-control" value="<?php if(isset($price)) echo $price ?>">
                            <span class="text-danger">
                                <?php
                                if(isset($error_price)){
                                    echo $error_price;
                                }
                                ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="from-label">Enter Quantity</label>
                            <input type="text" name="qty" class="form-control" value="<?php if(isset($qty)) echo $qty ?>">
                            <span class="text-danger">
                                <?php
                                if(isset($error_qty)){
                                    echo $error_qty;
                                }
                                ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="from-label">Enter Vendor Name</label>
                            <input type="text" name="vendor" class="form-control" value="<?php if(isset($vendor)) echo $vendor ?>">
                            <span class="text-danger">
                                <?php
                                if(isset($error_vendor)){
                                    echo $error_vendor;
                                }
                                ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary float-right ">Add Facility</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include_once "../layouts/footer.php" ?>
o