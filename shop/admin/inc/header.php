<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php?signup');
}
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
include "class/class.php";
include "class/help.php";
$db = new database();
$help = new help();
if (isset($_GET['id'])) {
    if ($_GET['id'] == "logout") {
        setcookie('name', '', time() - 86400 * 7);
        session_unset();
        session_destroy();
        header('location:login.php?Loggedout');
    }
}
$email = $_COOKIE['name'];
$adq = "SELECT uname FROM `user` WHERE email='$email'";
$con = $db->select($adq);
while ($row = mysqli_fetch_assoc($con)) {
    $un = $row['uname'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <style>
        .inbox input[type="text"],
        .inbox input[type="email"] {
            border: 1px solid #cfc5b6;
            border-radius: 3px;
            margin-bottom: 5px;
            padding: 5px;
            width: 300px;
        }

        .inbox .input[type="submit"] {
            background: #b7801c none repeat scroll 0 0;
            border: 1px solid #e6af4b;
            color: #fff;
            cursor: pointer;
            font-size: 20px;
            padding: 1px 10px;
        }

        .inbox input[type="submit"]:hover {
            background: #FEF4E5;
            color: #000;
        }

        .inbox textarea {
            height: 110px;
            margin-bottom: 10px;
            padding: 5px;
            width: 300px;
            border: 1px solid #cfc5b6;
        }

        .inbox td {
            color: white;
            font-weight: bold;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

</head>

<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/livelogo.png" alt="Logo" />
                </div>
                <div class="floatleft middle">
                    <h1>Training with live project</h1>
                    <p>www.trainingwithliveproject.com</p>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php echo $un; ?></li>
                            <li><a href="?id=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
                <li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
                <li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href=""><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>