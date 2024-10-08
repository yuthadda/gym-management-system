<?php

include_once "../layouts/header.php";

?>

<?php 



require_once "../controllers/membership-controller.php";

$membershipController = new MembershipController();
$memberships = $membershipController->getAllMembershipsAttendance();

include_once  "../controllers/attendance-controller.php";


$attendanceController = new AttendanceController();


if(isset($_GET['id'])){

    $id = $_GET['id'];

    
    $attendance = $attendanceController->insertAttendanceById($id);
    $exist = $attendanceController->getStatusdataById($id);
    
}








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

<!-- Error Showing Alerts -->
<div class="row my-2">
    <div class="col-md-12">
                            <?php
                            if(isset($_GET['msg'])){
                                if($_GET['msg'] == 'fail'){
                                   echo "<span class=' alert alert-danger' >Error in adding</span>";
                                }

                                elseif($_GET['msg'] == 'updatefail'){
                                    echo "<span class=' alert alert-danger' >Error in Updating</span>";

                                }elseif($_GET['msg'] == 'deleted'){
                                    echo "<span class=' alert alert-success' >Successfully deleted</span>";

                                }elseif($_GET['msg'] == 'faildelete'){
                                    echo "<span class=' alert alert-danger' >Error in deleting</span>";

                                }
                                elseif($_GET['msg'] == 'updatesuccess'){
                                    echo "<span class=' alert alert-success' >Successfully updated</span>";
                                }
                                else{
                                   echo "<span class=' alert alert-success' >Added Successfully</span>";
                                }
                            }
                             ?>

                      
    </div>
</div>


<div class="row">
    <div class="col-md-12 mx-auto">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Member ID</th>
                    <th>Member Name</th>
                   
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody><?php $count=1; ?>
                    <?php foreach($memberships as $membership): ?>
                        <tr id="<?= $membership['member_id'] ?>">
                            <td><?= $count++ ?></td>
                            <td><?= 'GM-'.$membership['member_id'] ?></td>
                            <td><?= $membership['user_name'] ?></td>
                            <td><?= $membership['user_phone'] ?></td>
                            <td><?= $membership['user_address'] ?></td>
                            <td><?= $membership['user_email'] ?></td>
                            
                            

                            <td>
                                <?php if($membership['atten_status']=='present') : ?>
                           
                                    <a  class="btn btn-sm btn-danger " >Already Checked</a>

                                <?php else : ?>
                           <a href="view-attendance.php?id=<?= $membership['member_id'] ?>" class="btn btn-sm btn-info btnCheck" >Check In</a>
                           <?php endif; ?> 
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

        <?php include_once "../layouts/footer.php" ?>
