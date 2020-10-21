<?php
$connect = mysqli_connect("localhost", "root", "", "chat") or die(mysqli_error($connect));
$coid = $_POST['coid'];
//$me=$_COOKIE['name'];
if (isset($coid)) {
    $mq = "SELECT * FROM `msg` WHERE coid='$coid' ORDER BY time DESC";
    $msq = mysqli_query($connect, $mq);
    while ($mrow = mysqli_fetch_assoc($msq)) {
        $output=  "<div class='msgg';>
                        <h4> {$mrow['frm']}</h4>
                        <p> {$mrow['msg']}</p>
                        <h6> {$mrow['time']}</h6>
                    </div>";
echo $output;
}
}
?>