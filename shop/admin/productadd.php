<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            <?php
            if(isset($_REQUEST['submit'])){
                 $pdname=$_POST['name'];
                 $catid = $_POST['category'];
                 $brandid = $_POST['brand'];
                 $price = $_POST['price'];
                 $prodetail = $_POST['des'];
                 $file = $_FILES['file']['name'];
                 $filet = $_FILES['file']['type'];
                 $filetloc = $_FILES['file']['tmp_name'];
                 $fn="pra".uniqid().$file;
                 $files="upload/".$fn;
                 $fileup = $_FILES['file']['type'];
                 $type = $_POST['type'];
                
                     //image type if
                    if (!empty($pdname) && !empty($brandid) && !empty($catid) && !empty($prodetail) && !empty($file) && !empty($price) && !empty($type)) 
                    {
                        // if($filet == 'image/jpeg'){       
                        $que= "insert into products (`pdname`, `brandid`, `catid`, `prodetail`, `img`, `price`, `type`) 
                        values ('$pdname','$brandid','$catid','$prodetail','$fn','$price','$type')";
                         move_uploaded_file($filetloc, $files);
                        $proin= $db->insert($que);
                        if ($proin) {
                            echo "<h1 style='color:green'>INSERTED</h1>";
                        } 
                        else {
                            echo "<h1 style='color:red'>THERE IS SOME TECHNICAL ISSUE</h1>";
                        }
                    }
                    // } 
                    else {
                        echo "<h1 style='color:red'>PLEASE ENTER THE REQUIRED FIELD</h1>";
                    }
                    //image type
                //  } 
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" placeholder="Enter Product Name..." class="medium" />
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
                                while ($row = mysqli_fetch_assoc($con)) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['catname'] ?></option>
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
                                while ($row = mysqli_fetch_assoc($bcon)) { ?>
                                    <option value="<?php echo $row['brandid'] ?>"><?php echo $row['brandname'] ?></option>
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
                            <textarea class="tinymce" name="des"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="file" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="type">
                                <option>Select Type</option>
                                <option value="1">Featured</option>
                                <option value="2">Non-Featured</option>
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