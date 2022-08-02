<?php
require_once "db.php";
session_start();
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $run_query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($run_query);

    //if user record is available in database then $count will be equal to 1
    if ($count == 1) {

        $row = mysqli_fetch_array($run_query);
        $_SESSION["id"] = $row["id"];
        $_SESSION["name"] = $row["username"];
        $_SESSION["isLogedIn"] = true;

        echo "<script> 
        location.href='dashboard.php'; </script>";
        exit;
    } else {
        echo "<script> 
        alert('Invalid Credentials !!!');
        location.href='login.html'; </script>";
        exit;
    }
} else if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $dob = mysqli_real_escape_string($con, $_POST["dob"]);
    $blood_type = mysqli_real_escape_string($con, $_POST["blood_type"]);
    $governorate = mysqli_real_escape_string($con, $_POST["governorate"]);
    $donate_day = mysqli_real_escape_string($con, $_POST["donate_day"]);


    $sql =  "INSERT INTO `users`(`username`, `email`, `password`, `phone`, `dob`, `blood_type`, `governorate`, `donate_day`) 
    VALUES ('$username','$email','$password','$phone','$dob','$blood_type','$governorate','$donate_day')";

    if (mysqli_query($con, $sql)) {

        echo "<script> 
        alert('register_success');
        location.href='login.html'; </script>";
        exit;
    }
} else {
    echo "<script> 
        alert('Invalid Data !!!');
        location.href='signup.html'; </script>";
        exit;
}
