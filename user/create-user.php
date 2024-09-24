<?php

include_once "../layouts/header.php";
include_once "../controllers/user-controller.php";

if(isset($_POST['submit'])){
    $error = false;
    if(empty($_POST['name'])){
        $error_name = "Please enter user name";
        $error = true;
    }else{
        $name = $_POST['name'];
    }
    if(empty($_POST['email'])){
        $error_email = "Please enter user email";
        $error = true;
    }else{
        $email = $_POST['email'];
    }
    if(empty($_POST['phone'])){
        $error_phone = "Please enter user phone";
        $error = true;
    }else{
        $phone = $_POST['phone'];
    }
    if(empty($_POST['address'])){
        $error_address = "Please enter user address";
        $error = true;
    }else{
        $address = $_POST['address'];
    }

    if(!$error){
        header('location:view-user.php?msg=addsuccess');
    }
    $user = new UserController();
    $user = $user->insertUser($name,$email,$phone,$address);
   
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
                            <label for="" class="form-label">Enter User Name</label>
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
                            <label for="" class="form-label">Enter User Email</label>
                            <input type="text" name="email" class="form-control" value="<?php if(isset($email)) echo $email ?>">
                            <span class="text-danger">
                            <?php
                            if(isset($error_email)){
                                echo $error_email;
                            }
                            ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter User Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php if(isset($phone)) echo $phone ?>">
                            <span class="text-danger">
                            <?php
                            if(isset($error_phone)){
                                echo $error_phone;
                            }
                            ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter User Address</label>
                            <input type="text" name="address" class="form-control" value="<?php if(isset($address)) echo $address ?>">
                            <span class="text-danger">
                            <?php
                            if(isset($error_address)){
                                echo $error_address;
                            }
                            ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary float-right ">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include_once "../layouts/footer.php" ?>
