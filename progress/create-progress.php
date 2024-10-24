<?php

include_once "../layouts/header.php";
include_once "../controllers/membership-controller.php";
include_once "../controllers/progress-controller.php";


$membershipController = new MembershipController();
$memberships = $membershipController->getAllMemberships();

$progressController = new ProgressController();



if (isset($_POST['submit'])) {
    $error = false;
    $memberId = $_POST['member_id'];
    if (empty($_POST['weight'])) {
        $error_weight = "Please enter new weight";
        $error = true;
    } else {
        $weight = $_POST['weight'];
    }

    if (empty($_POST['height'])) {
        $error_height = "Please enter new height";
        $error = true;
    } else {
        $height = $_POST['height'];
    }

    if (!$error) {

        $result = $progressController->addProgress($memberId, $weight, $height);
        if ($result) {
            header('location:view-progress.php?msg=success');
        } else {
            header('location:view-progress.php?msg=fail');
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

        <div id="content">
            <?php include_once "../layouts/nav.php" ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 card shadow p-5 mt-5">
                        <form action="" method="POST">


                            <div class="from-group mb-3">
                                <label for="" class="form-label">User Name</label>
                                <select name="member_id" id="member" class=" form-control" required>
                                    <option value="">Choose User Name</option>
                                    <?php foreach ($memberships as $membership): ?>
                                        <option value="<?= $membership['member_id'] ?>"><?= $membership['user_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>




                            <div class=" form-group mb-3">
                                <label  class=" form-label">New Weight </label>
                                <span id="span" ></span>
                                <!-- <p class="form-label">current weight:</p> -->
                                <input type="text" name="weight" class=" form-control" id="weight" value="<?php if(isset($weight)) echo $weight ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_weight)) {
                                        echo $error_weight;
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class=" form-group mb-3">
                                <label  class=" form-label">New Height</label>
                                <span id="span2" ></span>

                                <input type="text" name="height" class=" form-control" id="height" value="<?php if(isset($height)) echo $height ?>">
                                <span class="text-danger">
                                    <?php
                                    if (isset($error_height)) {
                                        echo $error_height;
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary  ">Update Progress</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>

            <script src="../scripts/jquery-3.7.1.min.js" >
        </script>
        <script>

            $(document).on('change','#member',function(){
                let id = $(this).val()
                // console.log(id);
                let selectParent = $(this).parent()
                // console.log(selectParent);
                let span =selectParent.next().children('#span')
                console.log(span);

                let span2 =selectParent.next().next().children('#span2')
                console.log(span2);
                // console.log(price);
                // let exampleOpt = $(this).children('#exampleOpt');
                // console.log(exampleOpt);

                $.ajax({
                    method : "post",
                    url: "get-member-data.php",
                    data: {id:id},
                    
                    success: function (response) {
                        
                        let data =JSON.parse(response)
                        console.log(data);
                        let weight =data.weight
                        let height =data.height
                        // console.log(weight+height);
                        span.text("( initial :"+weight+" )")
                        span2.text("( initial :"+height+" )")
                        
                        
                    }
                });

            })

            //Duration
            // $(document).on('change','#plan',function(){
            //     let id = $(this).val()
            //     // console.log(id);
            //     let selectParent = $(this).parent()
            //     // console.log(selectParent);
            //     let duration =selectParent.next().next().children('#duration')
                

            //     $.ajax({
            //         method : "post",
            //         url: "get-plan-duration.php",
            //         data: {id:id},
                    
            //         success: function (response) {
            //             duration[0].value =response;
            //         }
            //     });

            // })
            
        </script>

            <?php include_once "../layouts/footer.php" ?>