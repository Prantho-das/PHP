<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">
            <?php
            $email=$_COOKIE['name'];
            if (isset($_REQUEST['submit'])){
                $old = $_POST["old"];
                $new = $_POST["new"];
            if(!empty($old) && !empty($new)){
                $old=md5($old);
                $new=md5($new);
                    $select = "SELECT * FROM `user` WHERE email='$email' AND password='$old'";
                    $msg = $db->select($select);
                    $num = mysqli_num_rows($msg);
                    if ($num == 1){
                            $query = "UPDATE user SET `password`='$new' WHERE email='$email'";
                            $add = $db->update($query);
                            if ($add == true) {
                                echo "<h1 style='color:green'>UPDATED</h1>";
                            } else {
                                echo "<h1 style='color:red'>SORRY</h1>";
                            }
                        } 
                        else {
                            echo "<h1 style='color:red'>INCORRECT PASSWORD</h1>";
                        }
                    }
                    else{
                        echo "<h1 style='color:red'>FILL UP REQUIRED FIELD</h1>";
                    }
              }
            ?>
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>Old Password</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Old Password..." name="old" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>New Password</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter New Password..." name="new" class="medium" />
                        </td>
                    </tr>


                    <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php' ?>