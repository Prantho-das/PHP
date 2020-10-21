<?php include 'inc/header.php'; ?>
<center>
    <h1 style="text-align: center;font-weight:600;font-size:2rem;margin-top:1rem;">USER PROFILE</h1>
    <hr/ style="background: rgb(93, 49, 131); width:90px;height:5px;border-radius:15px;margin:1rem auto 2rem auto;">
    <table class="profile">
        <?php
        if (isset($_COOKIE['cid'])) {
            $cid = $_COOKIE['cid'];
            $cuq = "select * FROM customer WHERE id='$cid'";
            $user = $db->select($cuq);
            while ($row = mysqli_fetch_assoc($user)) { ?>
                <tr>
                    <th>Name</th>
                    <td><?php echo $row['name']; ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php echo $row['address']; ?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td> <?php echo $row['city']; ?></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td><?php echo $row['country']; ?></td>
                </tr>
                <tr>
                    <th>Zip</th>
                    <td><?php echo $row['zip']; ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo $row['phone']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $row['email']; ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
    <a href='proup.php' class="usebtn">UPDATE</a>
</center>
<?php include 'inc/footer.php'; ?>