<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "chat") or die(mysqli_error($connect));
$emai =$_SESSION['id'];
if (isset($_GET['id'])) {
    if ($_GET['id'] == "logout") {
        $upq = "UPDATE `user` SET `status`=0 WHERE email='$emai'";
        $ups = mysqli_query($connect, $upq);
        setcookie('name', '', time() - 86400 * 7);
        session_unset();
        session_destroy();
        header('location:login.php');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
</head>