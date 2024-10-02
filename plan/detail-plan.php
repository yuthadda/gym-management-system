<?php

include_once "../layouts/header.php";
include_once "../controllers/plan-controller.php";


    

if (isset($_GET['plan_id'])) {
    $id = $_GET['plan_id'];

    $planController = new PlanController();
    $plan = $planController->getPlanById($id);
}
//var_dump($id);



?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once "../layouts/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <div class="content-header">
            <div id="route">
            <a href="../view/index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a>
            </div>
          
        </div>

            <div class="container">
                <div class="row">
                     
               <main id="main">

               <div class="card" >
               <div class="header">
            <a href="../view/view_plan.php" title="Go Back To List"><i class="fa-solid fa-circle-arrow-left fa-2x "></i>Go Back To List</a>     
        </div>

               
                        <div class="m-b-25" >
                        <img src="../img/plan.jpg" class="card-img-top"  alt="">
                        </div>

                        <div class="card-body">

                            <h5 class="card-title">Plan Id : <span class="text-info"> <?php echo $plan['plan_id'] ?> </span></h5>
                            <h5 class="card-title">Plan Name : <span class="text-info"> <?php echo $plan['plan_name'] ?> </span></h5>
                            <h5 class="card-title">Plan Price : <span class="text-info"> <?php echo $plan['plan_price'] ?> $</span></h5>
                            <h5 class="card-title">Plan Duration : <span class="text-info"> <?php echo $plan['plan_duration'] ?> </span></h5>
                            <h5 class="card-title">Plan Description : <span class="text-info"> <?php echo $plan['plan_description'] ?> </span></h5>

                        </div>
                        
                    

                </div>
                    
                </main>
                    
                </div>
            </div>

        </div>
        </div>

        <style>

            .card
            {
                height: 500px;
                width: 500px;
                margin: 20px;
                background-color: #efefef;
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

            #main
            {
                
                margin: auto ;
                margin-top: 100px;
            }

            .header a
            {
                text-decoration: none;
            }

            .header i
            {
                border-radius: 50%;
                color: #333;
                padding-top: 10px;
                padding-right:20px ;

                
            }
            
            .card img
            {
                margin-top: 30px;
                border-radius: 50%;
                height: 100px;
                width: 100px;
            }


        </style>
            <?php include_once "../layouts/footer.php" ?>