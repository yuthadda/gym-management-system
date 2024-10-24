<?php

include_once "../layouts/header.php";
include_once "../controllers/attendance-controller.php";
include_once "../controllers/membership-controller.php";
include_once "../controllers/progress-controller.php";

$progressController = new ProgressController();
$progresses = $progressController->getProgressById($_GET['id']);


$membershipController = new MembershipController();
$membership = $membershipController->getMembershipById($_GET['id']);


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
                        <h2><?php echo $membership['user_name']?>'s Progress History</h2>
                        <p><?php echo "Initial Weight - ". $membership['weight'] ?></p>
                        <p><?php echo "Initial Height - ". $membership['height'] ?></p>
                       
                    </div>
                    
                    
    
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>New Weight</th>
                                    <th>New Height</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                $count = 1;
                                foreach ($progresses as $progress) {
                                    echo "
                            <tr id=" . $progress['prog_id'] . ">
                                <td><img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                            alt='...'></td>
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" . $progress['created_at'] . "</td>
                                <td class='align-middle'>" . $progress['new_weight'] . "</td>
                                <td class='align-middle'>" . $progress['new_height'] . "</td>
                            </tr>
                            ";
                                }
                                ?>
                            </tbody>
                        </table>
                        <a class='btn btn-dark mx-2' href='view-memberships.php'>Back</a></td>

                    </div>
                </div>
            </div>
            </div>

            <?php include_once "../layouts/footer.php" ?>