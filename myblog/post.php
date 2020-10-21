<?php include 'inc/header.php'; ?>
<?php 
if(!isset($_GET['id'])){
	header('location:404.php');
}
else{
		$id=$_GET['id'];
		$select="SELECT * FROM post where postid = $id";
		$query = $db->select($select);
		while($row= mysqli_fetch_array($query)){?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $row['Title'];?></h2>
				<h4><?php echo $help->date($row['time']);?>, <?php echo $row['author'];?></h4>
				<img src="images/<?php echo $row['Image'];?>" alt="MyImage"/>
				<p><?php echo $row['post'];?></p>
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
				</div>
			</div>
		</div>
		<?php
		}
}
?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>