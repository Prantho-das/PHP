<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Customer Id</th>
                        <th>Product Name</th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET["del"])) {
                        $id = $_GET['del'];
                        $delq = "DELETE FROM `order` WHERE id=$id";
                        $delete = $db->delete($delq);
                        if ($delete == "deleted") {
                            echo "<h1 style='margin:1rem;color:red'>Deleted</h1>";
                        }
                    }
                    if (isset($_GET["up"])) {
                        $up = $_GET['up'];
                        $updatte = "UPDATE `order` SET `status`=1 WHERE id=$up";
                        $update = $db->update($updatte);
                        if ($update == true) {
                            echo "<h1 style='margin:1rem;color:red'>Shifted</h1>";
                        }
                    }
                    $select = "SELECT * FROM `order`";
                    $query = $db->select($select);
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr class="odd gradeX" <?php
                                                if ($row['status'] == 0) {
                                                    echo "style='background:red;color:white;'";
                                                } else {
                                                    echo "style='background:blue;color:white;'";
                                                }
                                                ?>>


                            <td>
                                <center><?php echo $i++; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row['customerid']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row['pname']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row['productid']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row['quantity']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $row['price']; ?></center>
                            </td>
                            <td>
                                <center><a style='color:white;' href="?up=<?php echo $row['id']; ?>">Shift</a> || <a style='color:white;' href="?del=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'inc/footer.php' ?>