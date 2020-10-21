<?php include "inc/header.php"; ?>
<section>
    <div class="container d-flex align-items-center justify-content-center flex-column my-3">
        <?php
        $id = $_GET['id'];
        $usesel = "SELECT * FROM user WHERE id='$id'";
        $query = mysqli_query($connect, $usesel);
        while ($row = mysqli_fetch_assoc($query)) {
            $semai = $row['email'];
        }
        ?>
        <h1><?php echo $semai; ?></h1>
        <div class="message">
            <?php
            $checq = "SELECT * FROM `msg` WHERE (frm='$emai' AND too='$semai') OR (frm='$semai' AND too='$emai')";
            $cquery = mysqli_query($connect, $checq);
            $num = mysqli_num_rows($cquery);
            if ($num > 0) {
                while ($crow = mysqli_fetch_assoc($cquery)) {
                    $coid = $crow['coid'];
                }
                $coid;
            } else {
                $coid = uniqid("pra");
            }
            if (isset($_REQUEST["snt"])) {
                $msg = $_POST['msg'];
                if (empty($msg)) {
                    echo "Please Send Some Message";
                } else {
                    $min = "INSERT INTO `msg`(`frm`, `too`, `msg`, `coid`)
                        VALUES ('$emai','$semai','$msg','$coid')";
                    $mquery = mysqli_query($connect, $min);
                    if ($mquery == true) {
                        echo "sent";
                    } else {
                        echo "Sorry...! Not Sent";
                    }
                }
            }
            ?>


        </div>


        <form class="mt-3" action="" method="POST">
            <textarea name="msg" id="" cols="20" rows="2"></textarea>
            <button class="btn btn-success" name="snt">Send</button>
        </form>
        <script>
            const main = document.querySelector('.message');
            setInterval(() => {
                var hr = new XMLHttpRequest();
                // // Create some variables we need to send to our PHP file
                var url = "ajax.php";
                var id = "<?php echo $coid; ?>";
                var fn = "prantho";
                var ln = "das"
                var vars = "coid=" + id;
                hr.open("POST", url, true);
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // Access the onreadystatechange event for the XMLHttpRequest object
                hr.onreadystatechange = function() {
                    if (hr.readyState == 4 && hr.status == 200) {
                        var return_data = hr.responseText;
                        main.innerHTML = return_data;
                    }
                }
                // // Send the data to PHP now... and wait for response to update the status div
                hr.send(vars);
            }, 100);
        </script>
        <?php include "inc/footer.php"; ?>