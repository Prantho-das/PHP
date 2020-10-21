<?php include 'inc/header.php' ?>
     <?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock"> 
                <?php
                // if($_SERVER["REQUEST_METHOD"]== "post"){
                    if(isset($_REQUEST['submit'])){
                        $title=$_POST['title'];
                        $slogan=$_POST['slogan'];
                        if(!empty($title) && !empty($slogan)){
                            $upslogan="UPDATE slogan SET sloga='$title',des='$slogan' WHERE ID=1";
                            $uplog=$db->update($upslogan);
                            if($uplog == true){
                                echo "<h1 style='color:green'>updated</h1>";
                            }
                            
                        }
                        else{
                            echo "<h1 style='color:red'>sorry</h1>";
                        }
                    }
                // }
                ?>          
                <?php
                    $select="SELECT * FROM slogan where id=1";
                    $query = $db->select($select);
                    while($titslogan= mysqli_fetch_array($query)){?>    
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value='<?php echo $titslogan['sloga']; ?>' name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value='<?php echo $titslogan['des']; ?>' name="slogan" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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