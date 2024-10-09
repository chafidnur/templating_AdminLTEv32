<?php
session_start();
include('../../config/dbcon.php');

if (isset($_POST['login_btn'])) {
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $pass = md5($_POST['pass']); // Hash the password using MD5

    $result = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);

    if ($row && $pass == $row['password']) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['status'] = "login";
        $_SESSION['last_activity'] = time();
        $_SESSION['expire_time'] = 3600; // 1 hour in seconds

        if ($row['id'] == 1) {
            header('location:../dashboard.php');
        } else {
            header('location:../dashboard.php');
        }
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header('location:../index.php');
    }
} else {
    $_SESSION['error'] = "Invalid request";
    header('location:../index.php');
}
?>