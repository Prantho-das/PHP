<div class="clear">
    </div>
    <div id="site_info">
        <p>
         &copy; Copyright 
         <a href="http://trainingwithliveproject.com">
         <?php
            $select="SELECT * FROM footer where id=1";
            $query = $db->select($select);
            while($footer= mysqli_fetch_array($query)){
                echo $footer['copy'];
            }
        ?>

        </a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
