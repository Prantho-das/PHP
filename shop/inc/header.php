<?php
ob_start();
include "admin/class/class.php";
include "admin/class/help.php";
$help = new help();
$db = new database();
?>
<!DOCTYPE HTML>

<head>
    <title>Store Website</title>
    <style>
        .profile {
            width: 90%;
            margin: 1rem;
        }

        #pup input {
            padding: 0.5rem !important;
            border-radius: 20px !important;
            border: 1px solid rgb(93, 49, 131);
            text-align: center;
            outline: none;
        }

        .profile th {
            height: 50px;
            font-weight: 600;
            vertical-align: middle !important;
        }

        .profile td {
            text-align: center;
        }

        .profile,
        td,
        tr {
            border: 1px solid rgb(93, 49, 131);
            vertical-align: middle !important;
        }

        .profile tr:nth-child(even) {
            background-color: rgb(93, 49, 131);
            color: white;
        }

        center {
            margin-bottom: 2rem;
        }

        .usebtn {
            margin-top: 1rem;
            outline: none;
            padding: 0.7rem 3rem;
            border: 1px solid rgb(93, 49, 131);
            border-radius: 25px;
            background: transparent;
            font-size: 1rem;
            font-weight: 600;
            transition: 0.5s ease-in-out;
        }

        .usebtn:hover {
            background: rgb(93, 49, 131);
            color: white;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
    </script>

</head>

<body>
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="" /></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form action="search.php" method="POST">
                        <input type="text" name="search" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}">
                        <input type="submit" name="sbtn" value="SEARCH">
                    </form>
                </div>
                <div class="shopping_cart">
                    <div class="cart">
                        <a href="cart.php" title="View my shopping cart" rel="nofollow">
                            <span class="cart_title">
                                <?php
                                if (isset($_COOKIE['cid'])) {
                                    $cid = $_COOKIE['cid'];
                                    $selcart = "SELECT * FROM `cart` WHERE customerid=$cid";
                                    $rows = $db->select($selcart);
                                    $total = 0;
                                    $num = mysqli_num_rows($rows);
                                    while ($row = mysqli_fetch_assoc($rows)) {
                                        $tot = ($row['quantity'] * $row['price']);
                                        $total = $tot + $total;
                                    }
                                    $vat = $total * 0.15;
                                    echo $gd = ($vat + $total);
                                } else {
                                    echo 0;
                                }
                                ?>
                            </span>
                            <span class="no_product">
                                <?php
                                if (isset($cid)) {
                                    echo $num;
                                } else {
                                    echo 0;
                                }
                                ?></span>
                        </a>
                    </div>
                </div>
                <?php
                if (isset($_GET['id'])) {
                    if ($_GET['id'] == "logout") {
                        setcookie('eml', '', time() - 86400 * 7);
                        setcookie('cid', '', time() - 86400 * 7);
                        header('location:index.php');
                    }
                }
                if (isset($_COOKIE['eml'])) {
                    echo "<div class='login'><a href='?id=logout'>Logout</a></div>";
                } else {
                    echo "<div class='login'><a href='login.php'>Login</a></div>";
                }
                ?>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="menu">
            <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a> </li>
                <li><a href="topbrands.php">Top Brands</a></li>
                <?php
                if (isset($_COOKIE['eml'])) {
                    echo "<li><a href='cart.php'>Cart</a></li>";
                    echo "<li><a href='profile.php'>Profile</a></li>";
                }
                ?>
                <li><a href="contact.php">Contact</a> </li>
                <div class="clear"></div>
            </ul>
        </div>