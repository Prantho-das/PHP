<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
        <div class="block">
            <?php
            if (isset($_REQUEST['submit'])) {
                $title = $_POST["title"];
                $file = $_FILES['file']['name'];
                $filet = $_FILES['file']['type'];
                $filetloc = $_FILES['file']['tmp_name'];
                $fn = "pra".uniqid().$file;
                $files = "upload/".$fn;
                $fileup = $_FILES['file']['type'];
                if ($filet == 'image/jpeg'){
                if (!empty($title) && !empty($file)){
                    move_uploaded_file($filetloc, $files);
                    $query = "INSERT INTO `slider`(title,img) VALUES ('$title','$fn')";
                    $add = $db->insert($query);
                    if ($add == true) {
                        echo "<h1 style='color:green'>INSERTED</h1>";
                    }
                } else {
                    echo "<h1 style='color:red'>SORRY</h1>";
                }
            }
        }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />
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