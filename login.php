<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($user_data == true || !isset($user_data)) {
    header("Location: index.php");
    die;
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password) && !is_numeric($username))
    {
        //read from the database
        $query = "select * from users where username = '$username' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location:index.php");
                    die;
                }
            }
        }
        echo "Wrong Username or Password!";
    
    }else
    {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>

<html>

<head>
    <title>
        Login
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-image: url('https://www.teahub.io/photos/full/26-265214_download-pc-gaming-keyboard-monitor-computer-wallpapers-gaming.jpg'); background-repeat: no-repeat; background-position: center;">
    <!-- Login form -->
    <div class="login-dark">
        <form method="post">
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" value="" id="password" required>
                <br>
                <input type="checkbox" onclick="myFunction()">
                <span style="font-size: 15px; font-family: Arial, Helvetica, sans-serif; margin-left: 5px; color:rgb(201, 193, 193);">Show Password</span>
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block btn-login" type="submit">Log In</button></div>
            <a href="reset_password.php" class="forgot">Forgot password?</a>
            <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                <div class="border-bottom w-100 ml-5"></div>
                <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                <div class="border-bottom w-100 mr-5"></div>
            </div>
            <!-- Social login -->
            <br>
            <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                <i class="fa fa-facebook-f mr-2"></i>
                <span class="font-weight-bold">Continue with Facebook</span>
            </a>
            <br>
            <a href="#" class="btn btn-primary btn-block py-2 btn-twitter">
                <i class="fa fa-twitter mr-2"></i>
                <span class="font-weight-bold">Continue with Twitter</span>
            </a>
            <br>
            <a href="#" class="btn btn-primary btn-block py-2 btn-google">
                <i class="fa fa-google mr-2"></i>
                <span class="font-weight-bold">Continue with Google</span>
            </a>
            <br>
            <!-- Sign UP -->
            <div class="text-center w-100">
                <p class="text-muted font-weight-bold">New User ? <a href="signup.php" class="text-primary ml-2">Sign Up</a></p>
            </div>
    </div>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>