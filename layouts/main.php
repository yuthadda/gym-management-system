<?php



    include_once "../controllers/trainer-controller.php";
    include_once "../controllers/facility-controller.php";
    include_once "../controllers/payment-controller.php";
    include_once "../controllers/membership-controller.php";
    include_once "../controllers/attendance-controller.php";
    include_once "../controllers/plan-controller.php";

    $trainerController = new TrainerController();
    $trainer = $trainerController->getTotalSalary();

    $facilityController = new FacilityController();
    $facilities = $facilityController->getTotalPrice();

    $expense = $trainer['total'] + $facilities['total_fac'];

    $paymentController = new PaymentController();
    $payments = $paymentController->getAllPayment();
    $totalPaymentPrice = 0;
    foreach($payments as $payment){
        $totalPaymentPrice += $payment['plan_price'];
    }

    $membershipController = new MembershipController();
    $member = $membershipController->memberCount();

    $attendanceController = new AttendanceController();
    $attendance = $attendanceController->getTodayMember();

    $planController = new PlanController();
    $plans = $planController->showPlan();


?>

<!-- Main Content -->
<div id="content">

<?php include_once "nav.php" ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Expense </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $expense ?></div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalPaymentPrice ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today Active Member
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $attendance['todayCount'] ?></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-auto">
                        <i class="fa-solid fa-people-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Gym Members</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $member['memberCount'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-people-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Income Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    

                    <div class="card mb-4">
                                    
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Popular Plans</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">

                        <!-- <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Half-Year Transformation 
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> 90-Day Transformation
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i>  Cardio
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Monthly Plan
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle " style="color: #800080"></i> Weight Gain
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle " style="color: #DC143C"></i> Weight Loss
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle " style="color: #FF69B4"></i> Zumba
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle " style="color: #000000"></i> Yoga
                        </span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xl-8 col-lg-7">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Membership Overview
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart2" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
    </div>

    

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
