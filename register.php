<?php
include_once ("includes/db.php");

 $con;

    $email="";
    $password="";
    $confirmpassword="";
    

if(isset($_POST['submit']))
{
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $confirmpassword  = $_POST['confirmpassword'];

    
    $passwordhash     = password_hash($password,PASSWORD_DEFAULT);


    $error = false;

    if(empty($_POST['email']))
    {
        $emailmessage = "Please Enter Email";
        $error=true;
    }else
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $validmessage = "Please Enter Valid Email";
    }
    }

    

    if(empty($password))
    {
        $passmessage = "Please Enter Password";
        $error = true;
    }else
    {
        if(strlen($password) < 6)
        {
            $qtymessage = "Password must be at least 6 characters";
        }
    }
    

    if($password != $confirmpassword)
    {
        $matchmessage = "Password does not match";
        $error= true;
    }


//----------------------------------------------------Insert Data Into Database if no error----------------------------------------------------------------------------------------------

    if(!$error)
    {
        $con = Database::connect();
        if($con)
        {
            $sql = "SELECT * FROM logins WHERE user_email = '$email'";
            $statement =$con->prepare($sql);
             $statement->execute();
            

            if($statement->rowCount()>0)
            {
                $exist = "Email Already Exist";
            }

            else
            {
                $sql = "INSERT INTO logins (user_email , user_password) VALUE(:email, :passwordhash)";
            $statement = $con->prepare($sql);
            $statement->bindParam(':email',$email);
            $statement->bindParam(':passwordhash',$passwordhash);
            $result = $statement->execute();
            
            if($result)
            {
                //echo json_encode(['status' => 'success', 'message' => 'Registration successful!']);
                header('location:login.php?msg=success');
            }
            else
            {
                header('location:login.php?msg=fail');
            }
            }
           
           

            
        }
    

    }


//----------------------------------------------------End----------------------------------------------------------------------------------------------
   
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-info">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Account</h3></div>
                                    <div class="card-body">
                                        <form method="POST" id="registrationform">

                                       <?php if(isset($exist)) echo "<div class='alert alert-danger'>".$exist."</div>" ?>

                                        <span class="text-danger"><?php if(isset($emailmessage))echo $emailmessage;?></span>

                                        <span class="text-danger"><?php if(isset($validmessage))echo $validmessage;?></span>
                                            <div class="form-floating mb-3">
                                            
                                          
                                                <input class="form-control" id="inputEmail"  name="email" type="email" placeholder="name@example.com" value="<?php echo $email ?>" />
                                                <label for="inputEmail">Enter Email</label>
                                            </div>

                                            
                                                
                                           
                                            <span class="text-danger"><?php if(isset($passmessage))echo $passmessage;?></span>
                                            <span class="text-danger"><?php if(isset($qtymessage))echo $qtymessage;?></span>
                    
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" value="<?php echo $password ?>"/>
                                                <label for="inputPassword">Password</label>
                                            </div>

                                            
                                            <span class="text-danger"><?php if(isset($matchmessage))echo $matchmessage;?></span>
                    
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="confirmpassword" type="password" placeholder="Confirm Password" value="<?php echo $confirmpassword ?>" />
                                                <label for="inputPassword">ConfirmPassword</label>
                                            </div>

                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                                <button class="btn btn-primary btnRegister" type="submit" name="submit">Create Account</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Already have account? Sign in!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts/jquery-3.7.1.min.js"></script>
        <script src="dist/js/scripts.js"></script>

        <!-- <script>
//-----------------------------------------------------------Register Messgae Start-----------------------------------------------------------------------
$(document).ready(function(){
            $('#registrationform').on('submit',function(e){

                    e.preventDefault();

                    var formdata = $(this).serialize();

                    $.ajax({
                            type:'POST',
                            url:'register.php',
                            data:formdata,
                            dataType:'json',
                            success:function(response)
                            {
                                if(response.status == "success")
                                {
                                    alert(response.message)
                                    window.location.reload()
                                 }
        
                             }

                            })

                    })

                })
//-----------------------------------------------------------Register Messgae End-----------------------------------------------------------------------

        </script>  -->
    </body>

    <style>
        
    </style>
</html>
