<?php

include_once "../layouts/header.php";
include_once "../controllers/plan-controller.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = new UserController();
    $user = $user->getUserById($id);
}

if (isset($_POST['submit'])) {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $user = new UserController();
        $result = $user->updateUser($id, $name, $email, $phone, $address);
        if ($result) {
            header('location:view-user.php?msg=updatesuccess');
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
                    <div class="col-md-3"></div>
                    <div class="col-md-6 card shadow p-5 mt-5">
                        <h4 class="text-center mb-3">Update Plan Informations</h4>
                        <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Enter Plan Name</label>
                                <input type="text" name="name" class="form-control" value="<?php

                                                                                            echo $user['user_name'];
                                                                                            ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_name)) {
                                        echo $error_name;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter User Email</label>
                                <input type="text" name="email" class="form-control" value="<?php

                                                                                            echo $user['user_email'];
                                                                                            ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_email)) {
                                        echo $error_email;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter User Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?php

                                                                                            echo $user['user_phone'];
                                                                                            ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_phone)) {
                                        echo $error_phone;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Enter User Address</label>
                                <input type="text" name="address" class="form-control" value="<?php

                                                                                                echo $user['user_address'];
                                                                                                ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_address)) {
                                        echo $error_address;
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary ">Update Plan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>