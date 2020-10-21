<?php include 'inc/header.php'; ?>
<center>
    <h1 style="text-align: center;font-weight:600;font-size:2rem;margin-top:1rem;">USER PROFILE</h1>
    <hr/ style="background: rgb(93, 49, 131); width:90px;height:5px;border-radius:15px;margin:1rem auto 2rem auto;">
    <?php
    if (isset($_COOKIE['cid'])) {
        $cid = $_COOKIE['cid'];
    }
    if (isset($_REQUEST['upate'])) {
        $name = $_POST['name'];
        $add = $_POST['add'];
        $ct = $_POST['ct'];
        $cnt = $_POST['cnt'];
        $zip = $_POST['zip'];
        $phn = $_POST['phn'];
        $em = $_POST['em'];
        if (
            !empty($name) && !empty($add) && !empty($ct) && !empty($cnt) &&
            !empty($zip) && !empty($phn) && !empty($em)
        ) {
            $qur = "UPDATE `customer` SET `name`='$name',`address`='$add',`city`='$ct',`country`='$cnt',`zip`='$zip',`phone`='$phn',`email`='$em' WHERE id=$cid";
            $up = $db->update($qur);
            if ($up) {
                echo "<h1 style='color:green;font-weight:600'>UPDATED</h1>";
            } else {
                echo "<h1 style='color:red'>SORRY</h1>";
            }
        } else {
            echo "<h1 style='color:red'>INSERT EVERY FIELD</h1>";
        }
    }
    ?>
    <form action="" method="post" id="pup">
        <table class="profile">
            <?php
            $cuq = "select * FROM customer WHERE id='$cid'";
            $user = $db->select($cuq);
            while ($row = mysqli_fetch_assoc($user)) { ?>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" name="add" value="<?php echo $row['address']; ?>"></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><input type="text" name="ct" value="<?php echo $row['city']; ?>"></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td><input type="text" name="cnt" value="<?php echo $row['country']; ?>"></td>

                </tr>
                <tr>
                    <th>Zip</th>
                    <td><input type="text" name="zip" value="<?php echo $row['zip']; ?>"></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><input type="number" name="phn" value="<?php echo $row['phone']; ?>"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="em" value="<?php echo $row['email']; ?>"></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <button class="usebtn" name="upate">UP NOW</button>
    </form>
</center>
<?php include 'inc/footer.php'; ?>