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
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($fname) && !empty($lname) && !empty($dob) && !empty($phone) && !empty($email) && !empty($password) && !is_numeric($username))
    {
        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,username,fname,lname,dob,phone,email,password) values ('$user_id','$username','$fname','$lname','$dob','$phone','$email','$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;

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
        Signup
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Teko:wght@300;500;600&display=swap');
    </style>
</head>

<body style="background-color: rgb(0, 0, 0);">
    <img src="https://i.pinimg.com/originals/ff/c3/8d/ffc38d9bce22d7a9eaa07b890e3af1a2.jpg" style="width: 1020px; height: 1000px; position: absolute;"></div>
    <!-- Signup form -->
    <div class="signup form">
        <div class="login-dark signup form">
            <form method="post">
                <h1 style="font-family: 'Teko', sans-serif; font-size: 50px; text-align: center;">Sign UP</h1>
                <br>
                <h1 style="font-family: 'Teko', sans-serif; font-size: 30px;">Create a New Account</h1>
                <br>
                <div class="form-group"><input class="form-control" id="username" type="text" name="username" placeholder="Username" pattern="[a-z0-9]{6,}" title="Must Contains Atleast 6 Characters, No Uppercase." required></div>
                <div class="form-group"><input class="form-control" id="fname" type="text" name="fname" placeholder="First Name" required></div>
                <div class="form-group"><input class="form-control" id="lname" type="text" name="lname" placeholder="Last Name" required></div>
                <div class="form-group"><input class="form-control" id="dob" type="date" name="dob" placeholder="Date Of Birth" required></div>
                <div class="form-group"><input class="form-control" id="phn" type="tel" name="phone" placeholder="Phone No." pattern="[0-9]{10,10}" title="Add a valid Phone Number." required></div>
                <div class="form-group"><input class="form-control" id="email" type="email" name="email" placeholder="Email" required></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" value="" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                        required></div>
                <div class="form-group"><input class="form-control" type="password" name="Confirm password" placeholder="Confirm Password" value="" id="confirm_password" required></div>
                <br>
                <input type="checkbox" onclick="myFunction()">
                <span style="font-size: 15px; font-family: Arial, Helvetica, sans-serif; margin-left: 5px; color:rgb(201, 193, 193);">Show Password</span>
                <div class="form-group"><input class="btn btn-primary btn-block btn-login signup" type="submit" id="button"></div>
                <br>
                <!-- Login  -->
                <div class="text-center w-100">
                    <p class="text-muted font-weight-bold">Already User ? <a href="login.php" class="text-primary ml-2">Login</a></p>
                </div>
        </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>