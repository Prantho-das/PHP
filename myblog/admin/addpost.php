<?php include 'inc/header.php' ?>
     <?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">    
            <?php
                if(isset($_REQUEST['submit'])){
                    $title=$_POST["title"];
                    $post=$_POST["post"];
                    $author=$_POST["author"];
                    $catid=$_POST["catid"];
                        if(!empty($catid)&&!empty($title)&&!empty($author)&&!empty($post)){
                            $query="INSERT INTO `post`(`catid`, `Title`, `post`, `author`) VALUES ('$catid','$title','$post','$author')";
                            $add=$db->insert($query);
                            if($add== true){
                                echo "<h1 style='color:green'>Inserted</h1>";
                            }
                        }
                        else{
                            echo "<h1 style='color:red'>sorry</h1>";
                        }
                    }      
                ?>
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input  name="title" type="text" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select name="catid" id="select" name="select">
                                 <?php
                                    $select="SELECT * FROM `category`";
                                    $query = $db->select($select);
                                    while($row= mysqli_fetch_array($query)){?>
                                    <option value="<?php echo $row['catid'];?>" > <?php echo $row['category']; ?></option>
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
                                <input type="text" name='author' id="date-picker" />
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
                                <textarea  name='post' class="tinymce"></textarea>
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
