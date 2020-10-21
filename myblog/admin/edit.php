<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Create Page</h2>
        <div class="block">
            <?php
            if (isset($_GET["id"])) {
                $id = $_GET['id'];
            }
            if (isset($_REQUEST['post'])) {
                $title = $_POST["title"];
                $nav = $_POST["nav"];
                $post = $_POST["post"];
                if (!empty($title) && !empty($nav) && !empty($post)) {
                    $query = "UPDATE pages SET `nav`='$nav', `title`='$title', `post`='$post' WHERE id=$id";
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
            $select = "SELECT * FROM pages where id=$id";
            $query = $db->select($select);
            while ($pages = mysqli_fetch_array($query)) { ?>
                <form action="" method="POST">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input name="title" type="text" value="<?php echo $pages['title'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>nav</label>
                            </td>
                            <td>
                                <input name="nav" type="text" value="<?php echo $pages['nav'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name='post' class="tinymce"><?php echo $pages['post'] ?></textarea>
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