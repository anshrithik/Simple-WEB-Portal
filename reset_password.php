<?php
session_start();

include("connection.php");
include("functions.php");

?>

<!DOCTYPE html>

<html>

<head>
    <title>
        Reset Password
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

<body style="background-image: url('https://www.teahub.io/photos/full/26-265214_download-pc-gaming-keyboard-monitor-computer-wallpapers-gaming.jpg'); background-repeat: no-repeat; background-position: center;">
    <div class="reset form">
        <div class="login-dark reset form">
            <form method="post">
            <h1 style="font-family: 'Teko', sans-serif; font-size: 50px; text-align: center;">Reset Password</h1>
            <br>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" required></div>
            <div class="form-group"><input class="btn btn-primary btn-block btn-login" type="submit" id="button"></div>
        </div>
        </form>
    </div>
</body>
</html>
