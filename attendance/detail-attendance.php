<?php

include_once "../layouts/header.php";
include_once "../controllers/attendance-controller.php";
include_once "../controllers/membership-controller.php";
$attendanceController = new AttendanceController();
$attendances = $attendanceController->memberAttenDetail($_GET['id']);
$attenCount = $attendanceController->attendanceCount($_GET['id']);

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
                    <div class="col-md-12 text-center mb-3 attencount">
                        <h2><?php echo $membership['user_name']?>'s Attendance Information</h2>
                        <p><?php echo "Gmail - ". $membership['user_email'] ?></p>
                        
                    </div>
                    
                    
    
                    <div class="col-md-12">
                        <div class="col-md-4 d-flex mb-2 btndiv">
                        <input type="date" name="attendate" class="form-control inputMonth" id="attendate" value="<?= date('Y-m-d') ?>">
                        <button memberid="<?= $_GET['id'] ?>" class="btn border-dark btndateSearch" id="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>No</th>
                                    <th>Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                $count = 1;
                                foreach ($attendances as $attendance) {
                                    echo "
                            <tr id=" . $attendance['atten_id'] . ">
                                <td><img class='rounded-circle' style='width:40px' src='../img/undraw_profile_2.svg'
                            alt='...'></td>
                                <td class='align-middle'>" . $count++ . "</td>
                                <td class='align-middle'>" . $attendance['check_date'] . "</td>
                                
                            </tr>
                            ";
                                }
                                ?>
                                <tr><td colspan="3" ><?php echo "Total Check-in : ". $attenCount['attenCount']."days" ?></td></tr>
                            </tbody>
                        </table>
                        <a class='btn btn-dark mx-2' href='c-atten.php'>Back</a></td>

                    </div>
                </div>
            </div>
            </div>
            
            <script src="../scripts/jquery-3.7.1.min.js" >
            </script>

            <script>
                 $(document).on('click','.btndateSearch',function(){
                    console.log("heeeeeeeeeee");
                   
                   let btn = $(this);
                   let memberid = btn.attr('memberid');
                   console.log(memberid);
                   let id = btn.closest('.btndiv').find('#attendate').val();
                    console.log(id);
                    let tbody =$('#tbody');
                    console.log(tbody);

                    $.ajax({
                        url:'search-atten.php',
                        method:'post',
                        data: {id:id,memberid:memberid},
                        success:function(response){

                    tbody.children().remove();
                    console.log(response);
                    tbody.append(response);
                }
                    })

                




                // $.ajax({
                //     method : "post",
                //     url: "get-plan-price.php",
                //     data: {id:id},
                    
                //     success: function (response) {
                        
                //     }
                // });

            })
            </script>

            <?php include_once "../layouts/footer.php" ?>