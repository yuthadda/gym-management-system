<?php

include_once ('../controllers/planController.php');

if(isset($_POST['submit']))
{
    if(!empty($_POST['planName']) && !empty($_POST['planPrice']) && 
    !empty($_POST['planDuration']) && !empty($_POST['planDescription']))
    {
        $planName         = $_POST['planName'];
        $planPrice        = $_POST['planPrice'];
        $planDuration     = $_POST['planDuration'];
        $planDescription = $_POST['planDescription'];
    }

    $planController = new PlanController();
    $result = $planController->addPlan($planName,$planPrice,$planDuration,$planDescription);

    if($result)
    {
        header('location:view_plan.php?msg=success');
    }
    else
    {
        header('location:view_plan.php?msg=failed');
    }
}


?>



<?php include_once ('../layouts/header.php') ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include_once ('../layouts/sidebar.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        
   
        <form action="" method="post">
            <div class="col-md-6">
                <div>
                    <label for="" class="form-label">Enter Name</label>
                    <input type="text" name="planName" class="form-control" id="">
                </div>

                <div>
                    <label for="" class="form-label">Enter Price</label>
                    <input type="text" name="planPrice" class="form-control" id="">
                </div>

                <div>
                    <label for="" class="form-label">Enter Duration</label>
                    <input type="number" name="planDuration" class="form-control" id="">
                </div>

                <div>
                    <label for="" class="form-label">Enter Description</label>
                    <input type="text" name="planDescription" class="form-control" id="">
                </div>

                

                <div>
                    <button class="btn btn-dark" name="submit">Add Plan</button>
                </div>
            </div>
        </form>
    


        </div>
    </div>
        <?php include_once ('../layouts/footer.php') ?>







