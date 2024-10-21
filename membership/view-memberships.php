<?php

include_once "../layouts/header.php";

?>

<?php

require_once "../controllers/membership-controller.php";

$membershipController = new MembershipController();
$memberships = $membershipController->getAllMemberships();

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

                    


                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h2>Membership Information</h2>
                        </div>
                        <!-- Error Showing Alerts -->
                    
                        <div class="col-md-8 mb-3">
                            <?php
                            if (isset($_GET['msg'])) {
                                if ($_GET['msg'] == 'fail') {
                                    echo "<span class=' alert alert-danger' >Error in adding</span>";
                                } elseif ($_GET['msg'] == 'updatefail') {
                                    echo "<span class=' alert alert-danger' >Error in Updating</span>";
                                } elseif ($_GET['msg'] == 'deleted') {
                                    echo "<span class=' alert alert-success' >membership successfully deleted!</span>";
                                } elseif ($_GET['msg'] == 'faildelete') {
                                    echo "<span class=' alert alert-danger' >Error in deleting</span>";
                                } elseif ($_GET['msg'] == 'updatesuccess') {
                                    echo "<span class=' alert alert-success' >membership successfully updated!</span>";
                                } else {
                                    echo "<span class=' alert alert-success' >membership successfully added!</span>";
                                }
                            }
                            ?>


                        </div>

                        <div class="col-md-4 d-flex mb-3">
                        <input type="text" class="form-control MemberSearch" placeholder="Search member informations....">
                        <button class="btn border-dark btnMemberSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No</th>
                                        <th>Member ID</th>
                                        <th>Member Name</th>

                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"><?php $count = 1; ?>
                                    <?php foreach ($memberships as $membership): ?>
                                        <tr id="<?= $membership['member_id'] ?>">
                                            <td> <img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                            alt='...'> </td>
                                            <td class='align-middle'><?= $count++ ?></td>
                                            <td class='align-middle'><?= 'GM-' . $membership['member_id'] ?></td>
                                            <td class='align-middle'><?= $membership['user_name'] ?></td>

                                            <td class='align-middle'><?= $membership['user_address'] ?></td>
                                            <td>
                                                <a href='./membership-detail.php?id=<?= $membership['member_id'] ?>' class="btn  btn-info mx-1">Detail</a>
                                                <a href='./membership-progress.php?id=<?= $membership['member_id'] ?>' class="btn  btn-success mx-1">Progress</a>
                                                <a href='./edit-membership.php?id=<?= $membership['member_id'] ?>' class="btn  btn-warning mx-1">Edit</a>
                                                <a class="btn btn-danger btnDeleteMembership">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <a class='btn btn-dark mx-2' href='../view/index.php'>Back</a></td>

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once "../layouts/footer.php" ?>