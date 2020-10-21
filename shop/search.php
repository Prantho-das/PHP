<?php include 'inc/header.php'; ?>
<?php
if (isset($_POST["search"])) {
    $search = $_POST["search"];
}
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3><?php echo $search; ?></h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
            $select = "SELECT * FROM `products` WHERE pdname LIKE '%$search%' OR prodetail LIKE '%$search%' OR price LIKE '%$search%'";
            $query = $db->select($select);
            if ($num = mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $sid = $row['id'];
                    $que = "select * from products where id=$sid order by id desc";
                    $selt = $db->select($que);
                    while ($row = mysqli_fetch_assoc($selt)) { ?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <a href="preview.php?pid=<?php echo $row['id']; ?>"><img style="height: 100px;" src="admin/upload/<?php echo $row['img']; ?>" alt="" /></a>
                            <h2><?php echo $row['pdname']; ?></h2>
                            <p><?php echo $help->read($row['prodetail'], 30); ?></p>
                            <p><span class="price"><?php echo $row['price']; ?></span></p>
                            <div class="button"><span><a href="preview.php?pid=<?php echo $row['id']; ?>" class="details">Details</a></span></div>
                        </div>
                    <?php
                    }
                }
            } else {
                echo "<h1 style='color:red;text-align:center'>SORRY....!NO RESULT FOUND</h1>";
            }
            // }
            ?>
        </div>



    </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>