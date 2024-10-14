<?php
session_start();

 $con;

 $con= mysqli_connect("localhost","root","","gymsystemdb");

 
    if(isset($_POST["submit"]))
    {
        $error = false;

        if(empty($_POST['email']))
        {
            $message = "please Enter Email";
            $error = true;

        }
        else
        {
            $email =trim($_POST["email"]) ;
        }

        if(empty($_POST['password']))
        {
            $messagepass = "please Enter  Password";
            $error = true;

        }
        else
        {
            $password =trim($_POST["password"]);
        }

        if(!$error)
        {
           
            
            
            $sql       = "SELECT * from logins where user_email='$email' AND user_password='$password'";
            $result1 = mysqli_query($con,$sql);

            

            if(mysqli_num_rows($result1)>=1)
            {
                $_SESSION['email']=$email;
                header('location:view/index.php');
            }
            else
            {
                //$_SESSION['error']="invalid email or password";
                //$wrong = "invalid email or password";
                echo "<script>alert('invalid email or password')</script>";
                header('location:login2.php');
            }
            
           
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
    
    <title>signin-signup</title>
</head>
<body>
    <div class="container">
        <div class="signin-signup">
            <form action=""method="post" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="email" placeholder="Username" >
                </div>

                <div>
                    <span style="color:red"><?php if(isset($message))  echo $message; ?></span>
                </div>
                
                <div class="input-field">
                    
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" >
                </div>

                <div >
                    <span style="color:red" ><?php if(isset($messagepass))  echo $messagepass;?></span>
                </div>
                <div>
                    <span style="color:red"><?php if(isset($wrong))  echo $wrong;?></span>
                </div>

                <button class="btn btn-dark" name="submit">Login</button>
                
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>
            <form action="" class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="Sign up" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Member of Brand?</h3>
                    <p>Already Have Account.Signin To Your Account</p>
                    <button class="btn"  id="sign-in-btn">Sign in</button>
                </div>
                <img src="img/signin.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>New to Brand?</h3>
                    <p>Welcome To Our Grand Mandalay Gym </p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
                <img src="img/signup.svg" alt="" class="image">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script >

let sign_in_btn  = document.querySelector("#sign-in-btn");
let sign_up_btn  = document.querySelector("#sign-up-btn");
let container    = document.querySelector(".container");
let sign_in_btn2 = document.querySelector("#sign-in-btn2");
let sign_up_btn2 = document.querySelector("#sign-up-btn2");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

sign_up_btn2.addEventListener("click", () => {
    container.classList.add("sign-up-mode2");
});
sign_in_btn2.addEventListener("click", () => {
    container.classList.remove("sign-up-mode2");
});
    </script>

    <style>

#errorshow
{
   color: red; 
}
         
    </style>
</body>
</html>