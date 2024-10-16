<?php
session_start();

 $con;

 $email="";
 $password="";

 $con= mysqli_connect("localhost","root","","gymsystemdb");

 
    if(isset($_POST["submit"]))
    {
        $email            = $_POST['email'];
        $password         = $_POST['password'];
        $error = false;

        if(empty($_POST['email']))
        {
            $emailmessage = "Please Enter Email";
            $error = true;

        }else 
        {
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
           {$validmessage = "Please Enter Valid Email";
            $error = true;} 
            else
            {
                $email =trim($_POST["email"]) ;
            }
        }
       



        if(empty($_POST['password']))
        {
            $messagepass = "Please Enter  Password";
            $error = true;

            

        }else 
        {
            if(strlen($_POST['password'])<6)
            {$qtymessage = "Password must be at least 6 characters";
            $error = true;}
            else
            {
                $password =trim($_POST["password"]);
            }
        }
        


        if(!$error)
        {
           
            
            echo "Reached here";
            $sql       = "SELECT * from logins where user_email='$email' AND user_password='$password'";
            $result1 = mysqli_query($con,$sql);

            

            if(mysqli_num_rows($result1)>=1 )
            {
                

                $row = mysqli_fetch_array($result1);
                $hash_password = $row['user_password'];

                

                
                    $_SESSION['username']=$email;
                    header('location:view/index.php');
                

               
                
                
            }
            else
            {
                //$_SESSION['error']="invalid email or password";
                //$wrong = "invalid email or password";
                echo "<script>alert('invalid email or password')</script>";
                header('location:login.php');
            }
            
           
        }
        
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
    <body class="bg-info " img src="../img/background.jpg">
        <div id="layoutAuthentication" class="pt-5">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div><?php
                                if(isset($_GET['msg'])){
                                    if($_GET['msg'] == 'success'){
                                        echo "
                                <span class='alert alert-success'>Registration Account Successful!</span>
                                ";
                                    }else if($_GET['msg'] == 'fail'){
                                        echo "
                                    <span class='alert alert-danger'>Registration Account Fail!</span>
                                    ";
                                    }
                                }
                                
                                ?></div>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">


                                        <span class="text-danger "><?php if(isset($emailmessage))echo $emailmessage;?></span>
                                        <span class="text-danger "><?php if(isset($validmessage))echo $validmessage;?></span>
                                            <div class="form-floating mb-3">
                                            
                                                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" value="<?php echo $email ?>"/>
                                                <label for="inputEmail">Enter Email or UserName</label>
                                            </div>

                                            
                                            
                                            <span class="text-danger mb-2"><?php if(isset($messagepass))echo $messagepass;?></span>
                                            <span class="text-danger "><?php if(isset($qtymessage))echo $qtymessage;?></span>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" value="<?php echo $password ?>"/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button class="btn btn-primary" name="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dist/js/scripts.js"></script>
    </body>

    <style>
        
    </style>
</html>
