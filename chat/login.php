<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
</head>
<section class="bg-light" style="height:100vh">
    <div class="container py-5">
        <h1 class="text-center">Please Sign In</h1>
        <h4 class="text-center">Chat With Anyone & Make Friends</h4>
        <div class="form my-5 pt-4">
            <?php
            if (isset($_REQUEST['login'])) {
                $email = $_POST['email'];
                $pass = md5($_POST['pass']);
                if (!empty($email) && !empty($pass)) {
                    $connect = mysqli_connect("localhost", "root", "", "chat") or die(mysqli_errno($connect));
                    $usesel = "SELECT * FROM `user` WHERE email='$email' AND pass='$pass'";
                    $query = mysqli_query($connect, $usesel);
                    $num = mysqli_num_rows($query);
                    if ($num == 1) {
                        $upq = "UPDATE `user` SET `status`=1 WHERE email='$email'";
                        $ups = mysqli_query($connect, $upq);
                        if ($upq) {
                            if (isset($_POST['chk'])) {
                                setcookie('name', $email, time() + 86400 * 7);
                                session_start();
                                $_SESSION['id'] = $email;
                                header('location:active.php');
                            } else {
                                session_start();
                                $_SESSION['id'] = $email;
                                header('location:active.php');
                            }
                        }
                    } else {
                        echo "sorry";
                    }
                } else {
                    "please fill up every field";
                }
            }
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="pass" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="chk" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>

<body>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>