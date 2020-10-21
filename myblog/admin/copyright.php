<?php include 'inc/header.php' ?>
     <?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                <?php
                // if($_SERVER["REQUEST_METHOD"]== "post"){
                    if(isset($_REQUEST['submit'])){
                        $copy=$_POST['copyright'];
                        if(!empty($copy)){
                            $upslogan="UPDATE footer SET copy='$copy' WHERE ID=1";
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
                    $select="SELECT * FROM footer where id=1";
                    $query = $db->select($select);
                    while($footer= mysqli_fetch_array($query)){?>    
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value='<?php echo $footer['copy']; ?>' name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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