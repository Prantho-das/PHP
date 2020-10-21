<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Brand</h2>
        <div class="block copyblock">
            <?php
            if (isset($_REQUEST['submit'])) {
                $brand = $_POST["brand"];
                if (!empty($brand)) {
                    $query = "INSERT INTO `brand`(brandname) VALUES ('$brand')";
                    $add = $db->insert($query);
                    if ($add == true) {
                        echo "<h1 style='color:green'>INSERTED</h1>";
                    }
                } else {
                    echo "<h1 style='color:red'>SORRY</h1>";
                }
            }
            ?>
            <form action='' method='post'>
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="brand" placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php' ?>