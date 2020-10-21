<?php include 'inc/header.php'; ?>
<?php
if(isset($_REQUEST['cid'])){
    $cid = $_COOKIE['cid'];
}
$selcart = "SELECT * FROM `cart` WHERE customerid=$cid";
$rows = $db->select($selcart);
if(mysqli_num_rows($rows)>0){
while ($row = mysqli_fetch_assoc($rows)) {
    $pid= $row['productid'];
    $cusid = $row['customerid'];
    $pname = $row['pname'];
    $price = $row['price'];
    $quan = $row['quantity'];
        $ins = "INSERT INTO `order`(`customerid`, `productid`, `pname`, `quantity`, `price`)
        VALUES ('$cusid','$pid','$pname','$quan','$price')";
        $insert = $db->insert($ins);
        }
        if ($ins == true) {
            echo $th="Thank you";
        }
} else {
    echo "Insert Something";
}
$del="DELETE FROM `cart` WHERE customerid=$cid";
$dell=$db->delete($del);
if($dell == true){
    echo "Inserted";
}
?>

<?php include 'inc/footer.php'; ?>