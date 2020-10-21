<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Category</h2>
        <div class="block copyblock">
            <?php
            // if($_SERVER["REQUEST_METHOD"]== "post"){
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
            } else {
                header('location:../404.php');
            }
            if (isset($_REQUEST['submit'])) {
                $category = $_POST['cat'];
                if (!empty($category)) {
                    $catupd = "UPDATE category SET category='$category' WHERE catid=$id";
                    $catlog = $db->update($catupd);
                    if ($catlog == true) {
                        echo "<h1 style='color:green'>updated</h1>";
                    }
                } 
                else {
                    echo "<h1 style='color:red'>sorry</h1>";
                }
            }
            ?>
            <?php
            $select = "SELECT * FROM category where catid='$id'";
            $query = $db->select($select);
            while ($cat = mysqli_fetch_assoc($query)) { ?>
                <form action='' method='post'>
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="cat" value='<?php echo $cat['category']; ?>' class="medium" />
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
            }
            ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php' ?>