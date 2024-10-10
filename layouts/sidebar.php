<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion sticky-top" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Gym Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="../view/index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user"
        aria-expanded="true" aria-controls="user">
        <i class="fa-solid fa-user fa-fw"></i>
        <span>User</span>
    </a>
    <div id="user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../user/view-user.php">View User</a>
            <a class="collapse-item" href="../user/create-user.php">Add User</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa-solid fa-fw fa-dumbbell"></i>
        <span>Memberships</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Components:</h6>
            <a class="collapse-item" href="../membership/view-memberships.php">View Memberships</a>
            <a class="collapse-item" href="../membership/create-membership.php">Add Memberships</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trainer"
        aria-expanded="true" aria-controls="trainer">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Trainer</span>
    </a>
    <div id="trainer" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../trainer/trainers.php">view trainers</a>
            <a class="collapse-item" href="../trainer/create-trainer.php">add trainer</a>
            
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#plan"
        aria-expanded="true" aria-controls="plan">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Subscription & Plans</span>
    </a>
    <div id="plan" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Plan:</h6>
            <a class="collapse-item" href="../plan/view_plan.php">View Plans</a>
            <a class="collapse-item" href="../plan/add_plan.php">Add Plans</a>
            
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#facility"
        aria-expanded="true" aria-controls="facility">
        <i class="fa-solid fa-fw fa-dumbbell"></i>
        <span>Facility</span>
    </a>
    <div id="facility" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../facility/view-facility.php">View Facility</a>
            <a class="collapse-item" href="../facility/create-facility.php">Add Facility</a>
            
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#attendance"
        aria-expanded="true" aria-controls="attendance">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Attendance</span>
    </a>
    <div id="attendance" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../attendance/view-attendance.php">View In </a>
           
            
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#progress"
        aria-expanded="true" aria-controls="progress">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Member Progress</span>
    </a>
    <div id="progress" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../progress/create-progress.php">Update Progress </a>
            <a class="collapse-item" href="../progress/view-progress.php">View Progress</a>
            
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment"
        aria-expanded="true" aria-controls="payment">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Payment</span>
    </a>
    <div id="payment" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../payment/create-payment.php">Make Payment </a>
            <a class="collapse-item" href="../payment/view-payments.php">View Payment</a>
            
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

Nav Item - Tables -->
<!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li> -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->