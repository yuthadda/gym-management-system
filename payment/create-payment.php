<?php

include_once "../layouts/header.php";
include_once "../controllers/membership-controller.php";
include_once "../controllers/plan-controller.php";
include_once "../controllers/payment-controller.php";

$paymentController = new PaymentController();

$membershipController = new MembershipController();
$memberships = $membershipController->getAllMemberships();

$planController = new PlanController();
$plans = $planController->showPlan();




if(isset($_POST['submit']))
{
  
    $member_id = $_POST['member_id'];
    $plan_id = $_POST['plan_id'];

    $paid_date = $_POST['paid_date'];
   
    
    $plan = $planController->getPlanById($plan_id);
    $expDate = date('Y-m-d',strtotime('+'.$plan['plan_duration'].' months',strtotime($paid_date)));
    $status = 'active';


    $result=$paymentController->insertPayment($member_id,$plan_id,$paid_date,$expDate,$status);
    if($result)
    {
        header('location:view-payments.php?msg=success');
    }
    else
    {
        header('location:view-payments.php?msg=fail');
    }
}


// include_once "../controllers/user-controller.php";

// if(isset($_POST['submit'])){
//     $error = false;
//     if(empty($_POST['name'])){
//         $error_name = "Please enter user name";
//         $error = true;
//     }else{
//         $name = $_POST['name'];
//     }
//     if(empty($_POST['email'])){
//         $error_email = "Please enter user email";
//         $error = true;
//     }else{
//         $email = $_POST['email'];
//     }
//     if(empty($_POST['phone'])){
//         $error_phone = "Please enter user phone";
//         $error = true;
//     }else{
//         $phone = $_POST['phone'];
//     }
//     if(empty($_POST['address'])){
//         $error_address = "Please enter user address";
//         $error = true;
//     }else{
//         $address = $_POST['address'];
//     }

//     if(!$error){
//         header('location:view-user.php?msg=addsuccess');
//     }
//     $user = new UserController();
//     $user = $user->insertUser($name,$email,$phone,$address);
   
// }

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
                <div class="col-md-2"></div>
                <div class="col-md-8 card shadow p-5 mt-5">
                <h4 class="text-center mb-3 ">Add Payment Information</h4>
                    <form action="" method="POST">

                    <div class="row">
                    <div class="col-md-6 my-3">
                            <label for="" class="form-label">Member Name</label>
                            <select name="member_id" id="" class=" form-control" required  >
                                <option value="">Choose Member Name</option>
                                <?php foreach($memberships as $membership): ?>
                                    <option value="<?= $membership['member_id'] ?>"><?= $membership['user_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                    <div class="col-md-6 my-3">
                            <label for="paid_date" class="form-label">Paid Date</label>
                            <input class=" form-control" type="date" name="paid_date" id="paid_date">
                    </div>
                    </div>

                    <!-- PlanInputs -->
                     <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="" class="form-label">Available Plans</label>
                            <select name="plan_id" id="plan" class="form-control">
                            <option id="exampleOpt" value="">Choose A Plan</option>
                            <?php foreach($plans as $plan): ?>
                                    <option value="<?= $plan['plan_id'] ?>"><?= $plan['plan_name'] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    
                        <div class="col-md-4 mb-3">
                        <label  class=" form-label" >Plan Price</label>
                        <input type="number"  class=" form-control" readonly required id="price">
                        </div>

                        <div class="col-md-4 mb-3">
                        <label  class=" form-label" >Plan Duration</label>
                        <input type="text"  class=" form-control" readonly required id="duration">
                        </div>

                     </div>
                    
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary ">Make Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
       

        <script src="../scripts/jquery-3.7.1.min.js" >
        </script>
        <script>

            $(document).on('change','#plan',function(){
                let id = $(this).val()
                // console.log(id);
                let selectParent = $(this).parent()
                // console.log(selectParent);
                let price =selectParent.next().children('#price')
                // console.log(price);
                let exampleOpt = $(this).children('#exampleOpt');
                console.log(exampleOpt);

                $.ajax({
                    method : "post",
                    url: "get-plan-price.php",
                    data: {id:id},
                    
                    success: function (response) {
                        price[0].value =response;
                        exampleOpt.remove()
                    }
                });

            })

            //Duration
            $(document).on('change','#plan',function(){
                let id = $(this).val()
                // console.log(id);
                let selectParent = $(this).parent()
                // console.log(selectParent);
                let duration =selectParent.next().next().children('#duration')
                

                $.ajax({
                    method : "post",
                    url: "get-plan-duration.php",
                    data: {id:id},
                    
                    success: function (response) {
                        duration[0].value =response;
                    }
                });

            })
            
        </script>

        <?php include_once "../layouts/footer.php" ?>
