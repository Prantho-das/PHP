<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php 
			if(isset($_GET['page'])){
				$p =$_GET['page'];
				}else{
					$p=1;
				}
		?>
		<?php
		$limit=4;
		$offset=($p-1)*$limit;
		$select="SELECT * FROM `post` LIMIT $offset,$limit";
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
					<a href="post.php?id=<?php echo urlencode($row['postid']);?>">Read More</a>
				</div>
			</div>
		<?php
		};
		?>
<!--pagination-->
		<div class="pagination">
		<?php
		$sel="SELECT * FROM `post`";
		$sele = $db->select($sel);
		$num = mysqli_num_rows($sele);
		$page = ceil($num/$limit);
		for($i=1;$i<=$page;$i++){?>
			<a href="?page=<?php echo $i; ?>" class="page
			<?php
			if($p==$i){
				echo'active';
			}
			?>
			"><?php echo $i; ?></a>
			<?php
		}
		?>
		</div>
<!--pagination-->
		</div>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>