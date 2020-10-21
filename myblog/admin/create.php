<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Create Page</h2>
        <div class="block">
            <?php
            if (isset($_REQUEST['post'])) {
                $title = $_POST["title"];
                $nav = $_POST["nav"];
                $post = $_POST["post"];
                if (!empty($title) && !empty($nav) && !empty($post)) {
                    $query = "INSERT INTO `pages`(`nav`, `title`, `post`) VALUES ('$nav','$title','$post')";
                    $add = $db->insert($query);
                    if ($add == true) {
                        echo "<h1 style='color:green'>Inserted</h1>";
                    }
                } else {
                    echo "<h1 style='color:red'>sorry</h1>";
                }
            }
            ?>
            <form action="" method="POST">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input name="title" type="text" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>nav</label>
                        </td>
                        <td>
                            <input name="nav" type="text" placeholder="Enter Nav Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea name='post' class="tinymce"></textarea>
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
<?php include 'inc/footer.php' ?>