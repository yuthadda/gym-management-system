
<?php

include_once ('../controllers/plan-controller.php');

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
       
        
        <div class="content-header">
            <div id="route">
            <a href="../view/index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a>
            </div>
            <h1>Plan Insert Form</h1>
        </div>
        
        <div class="header">
                        <span id="icon"><i class="fas fa-align-justify"></i> </span>
                    <h5 id="title">Plan-info</h5>
         </div>

        <div class="container">
            <div class="row">
                
                
                <div class="col-md-10">
                    
                    <form action="" method="POST">
    
                        <div class="control-group">
                        <label for="" class="form-label">Enter Name</label>
                        <input type="text" name="planName" class="form-control" id="">
                            
                        </div>
                        <div class="control-group">
                            
                        <label for="" class="form-label">Enter Price</label>
                            <input type="text" name="planPrice" class="form-control" id="">

                            
                            
                        </div>
                        
                        <div class="control-group ">
                        <label for="" class="form-label">Enter Duration</label>
                        <input type="number" name="planDuration" class="form-control" id="">
                            
                        </div>
                        <div class="control-group">
                        <label for="" class="form-label">Enter Description</label>
                        <input type="text" name="planDescription" class="form-control" id="">

                            
                        </div>
                        <div class="control-group ">
                            <button type="submit" name="submit" class="btn btn-primary  ">Add Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>

    <style>

        .container{

            border: 1px solid #cdcdcd;
            border-top: none;
            font-family: "Open Sans", sans-serif;
            margin-top: -9px;
            max-width: 720px;
            
            
            
        }

        #route
        {
            background-color: #fff;
            border-bottom: 1px solid #e3ebed;
           
        }

        #route a
        {
            padding: 8px 20px 8px 10px;
            display: inline-block;
            background-image: url(../img/breadcrumb.png);
            background-position: center right;
            background-repeat: no-repeat;
            font-size: 11px;
            background-color: #666666;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .header
        {
            margin-bottom: 0;
            margin-left: 288px;
            margin-right: 77px;
            max-width: 720px;
        }

        #icon
        {
            padding: 9px 10px 7px 11px;
            float: left;
            border-right:1px solid #cdcdcd;
            margin-right: 10px;
        }

        #title
        {
            background-color: #efefef;
            border: 1px solid #cdcdcd;
            padding: 12px;
            font-size: 12px;
            font-weight: bold;
            
        }

        .control-group
        {
            padding: 10px;
            border-bottom: 1px solid #cdcdcd;
            width: 100%;   
        }


    </style>

        <?php include_once "../layouts/footer.php" ?>
