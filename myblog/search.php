<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
 <?php
        if(!empty($_POST['search'])){
          $key= $_POST['search'];
        }
        else{
            header('location:404.php');
        }
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
        <h1 style="margin:1.5rem 0rem;text-align:center;">YOUR SEARCH WAS <span style="color:red;text-transform:uppercase;"><?php echo $key; ?></span></h1>
        <?php
		$select="SELECT * FROM `post` WHERE `Title` LIKE '%$key%' OR `author` LIKE '%$key%' OR `post` LIKE '%$key%'";
		$query = $db->select($select);
		while($row= mysqli_fetch_assoc($query)){?>
			<div class="samepost clear">
				<h2><a href=""><?php echo $row['Title'];?></a></h2>
				<h4><?php echo $help->date($row['time']);?>, By <a href="#"><?php echo $row['author'];?></a></h4>
				 <a href="#"><img src="images/<?php echo $row['Image'];?>" alt="post image"/></a>
				<p>
					<?php echo $help->read($row['post'],200);?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['postid'];?>">Read More</a>
				</div>
			</div>
		<?php
		};
		?>
		</div>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>