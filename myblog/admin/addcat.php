<?php include 'inc/header.php' ?>
     <?php include 'inc/sidebar.php' ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
               <?php
                if(isset($_REQUEST['submit'])){
                        $cat=$_POST["cat"];
                        if(!empty($cat)){
                            $query="INSERT INTO `category`(category) VALUES ('$cat')";
                            $add=$db->insert($query);
                            if($add== true){
                                echo "<h1 style='color:green'>updated</h1>";
                            } 
                        }
                        else{
                            echo "<h1 style='color:red'>sorry</h1>";
                        }
                    }      
                ?>
                 <form action='' method='post'>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cat" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
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