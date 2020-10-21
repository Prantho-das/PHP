<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Category</h2>
        <div class="block copyblock">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                header('location:404.php');
            }
            if (isset($_REQUEST['submit'])) {
                $cat = $_POST["cat"];
                if (!empty($cat)) {
                    $query = "Update category set catname='$cat' where id=$id";
                    $add = $db->update($query);
                    if ($add == true) {
                        echo "<h1 style='color:green'>UPDATED</h1>";
                    }
                } else {
                    echo "<h1 style='color:red'>SORRY</h1>";
                }
            }
            ?>
            <?php
            $select = "SELECT * FROM `category` where id=$id";
            $query = $db->select($select);
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <form action='' method='post'>
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="cat" value="<?php echo $row['catname']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            <?php
            };
            ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php' ?>