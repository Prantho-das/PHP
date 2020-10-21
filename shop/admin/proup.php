<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                header('location:404.php');
            }
            if (isset($_REQUEST['submit'])) {
                 $pdname = $_POST['name'];
                 $catid = $_POST['category'];
                 $brandid = $_POST['brand'];
                 $price = $_POST['price'];
                 $prodetail = $_POST['des'];
                 $file = $_FILES['file']['name'];
                 $filet = $_FILES['file']['type'];
                 $filetloc = $_FILES['file']['tmp_name'];
                 $fn = "pra" . uniqid() . $file;
                 $files = "upload/" . $fn;
                 $fileup = $_FILES['file']['type'];
                 $type = $_POST['type'];
                if (
                    !empty($pdname) && !empty($brandid) && !empty($catid) && !empty($prodetail)
                    && !empty($price) && !empty($type) )
                 {
                    if (!empty($file)) {
                        move_uploaded_file($filetloc, $files);
                        $que = "Update products set pdname='$pdname', brandid='$brandid', 
                        catid='$catid', prodetail='$prodetail' ,img='$fn',
                        price='$price', type='$type' where id=$id";
                        $proin = $db->update($que);
                        if ($proin == true) {
                            echo "<h1 style='color:green'>UPDATED</h1>";
                        }
                    } else {
                        $quea = "Update products set pdname='$pdname', brandid='$brandid', 
                        catid='$catid', prodetail='$prodetail',
                        price='$price', type='$type' where id=$id";
                        $proina = $db->update($quea);
                        if ($proina == true) {
                            echo "<h1 style='color:green'>UPDATED</h1>";
                        }
                    }
                } 
                else {
                    echo "<h1 style='color:red'>SORRY</h1>";
                }
                //image type
            }
            ?>
            <?php
            $adq = "select * from products";
            $con = $db->select($adq);
            while ($row = mysqli_fetch_assoc($con)) { ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">

                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $row['pdname'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>

                                <select id="select" name="category">
                                    <option>Select Category</option>
                                    <?php
                                    $adq = "SELECT * FROM category";
                                    $con = $db->select($adq);
                                    while ($roww = mysqli_fetch_assoc($con)) { ?>
                                        <option <?php
                                                if ($row['catid'] == $roww['id']) {
                                                    echo 'selected';
                                                }
                                                ?> value="<?php echo $roww['id'] ?>"><?php echo $roww['catname'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Brand</label>
                            </td>
                            <td>
                                <select id="select" name="brand">
                                    <option>Select Brand</option>
                                    <?php
                                    $badq = "SELECT * FROM brand";
                                    $bcon = $db->select($badq);
                                    while ($rowx = mysqli_fetch_assoc($bcon)) { ?>
                                        <option <?php
                                                if ($row['brandid'] == $rowx['brandid']) {
                                                    echo 'selected';
                                                }
                                                ?> value="<?php echo $rowx['brandid'] ?>"><?php echo $rowx['brandname'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="des"><?php echo $row['prodetail'] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Price</label>
                            </td>
                            <td>
                                <input type="text" name="price" value="<?php echo $row['price'] ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="file" />
                                <img style="height: 50px;width:50px;margin-top:1rem;float:left;" src="upload/<?php echo $row['img']; ?>" alt="" </td> </tr> <tr>
                            <td>
                                <label>Product Type</label>
                            </td>
                            <td>
                                <select id="select" name="type">
                                    <option>Select Type</option>
                                    <?php
                                    if ($row['type'] == 1) {
                                    ?>
                                        <option selected value="1">Featured</option>
                                        <option value="2">Non-Featured</option>
                                    <?php } else {
                                    ?>
                                        <option value="1">Featured</option>
                                        <option selected value="2">Non-Featured</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>