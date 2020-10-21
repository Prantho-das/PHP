<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">
            <?php
            if (isset($_GET["update"])) {
                $id = $_GET["update"];
            } else {
                header('location:../404.php');
            }
            if (isset($_REQUEST['post'])) {
                $title = $_POST["title"];
                $post = $_POST["post"];
                $author = $_POST["author"];
                $catid = $_POST["catid"];
                if (!empty($catid) && !empty($title) && !empty($author) && !empty($post)) {
                    $query = "UPDATE post SET catid='$catid', Title='$title', post='$post', author='$author' where postid='$id'";
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
            $select = "select * from post where postid=$id";
            $query = $db->select($select);
            while ($row = mysqli_fetch_array($query)) { ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">

                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input name="title" type="text" value="<?php echo $row['Title']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select name="catid" id="select" name="select">
                                    <?php
                                    $select = "SELECT * FROM `category`";
                                    $query = $db->select($select);
                                    while ($roww = mysqli_fetch_array($query)) { ?>
                                        <option
                                        <?php 
                                        if($row['catid']==$roww['catid']){
                                            echo 'selected';
                                        }?>
                                        value="<?php echo $roww['catid']; ?>"> <?php echo $roww['category']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $row['author']; ?>" name='author' id="date-picker" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name='post' value="" class="tinymce">
                                    <?php echo $row['post']; ?>
                                </textarea>
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
<?php include 'inc/footer.php' ?>