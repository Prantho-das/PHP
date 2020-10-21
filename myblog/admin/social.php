<?php include 'inc/header.php' ?>
     <?php include 'inc/sidebar.php' ?>
     <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">     
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">       
                  <?php
                // if($_SERVER["REQUEST_METHOD"]== "post"){
                    if(isset($_REQUEST['submit'])){
                        $facebook=$_POST['facebook'];
                        $twitter=$_POST['twitter'];
                        $linkedin=$_POST['linkedin'];
                        $google=$_POST['google'];
                        if(!empty($facebook) && !empty($twitter) && !empty($linkedin) && !empty($google)){
                            $upslogan="UPDATE social SET Facebook='$facebook',Twitter='$twitter',LinkedIn='$linkedin',Google='$google' WHERE ID=1";
                            $uplog=$db->update($upslogan);
                            if($uplog== true){
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
                    $select="SELECT * FROM social where id=1";
                    $query = $db->select($select);
                    while($social= mysqli_fetch_array($query)){?>
                 <form action='' method='post'>
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value='<?php echo $social['Facebook']; ?>' class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter"  value='<?php echo $social['Twitter']; ?>' class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="linkedin"  value='<?php echo $social['LinkedIn']; ?>' class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="google" value='<?php echo $social['Google']; ?>' class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
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