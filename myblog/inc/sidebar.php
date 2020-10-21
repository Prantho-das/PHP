<div class="sidebar clear">
	<div class="samesidebar clear">
		<h2>Categories</h2>
		<ul>
			<?php
			$select = "SELECT * FROM `category` ORDER BY catid";
			$query = $db->select($select);
			while ($row = mysqli_fetch_assoc($query)) { ?>
				<li><a href="category.php?id=<?php echo $row['catid']; ?>"><?php echo $row['category']; ?></a></li>
			<?php
			};
			?>
		</ul>
	</div>

	<div class="samesidebar clear">
		<h2>Latest articles</h2>
		<?php
		$select = "SELECT * FROM `post` ORDER BY postid DESC Limit 4";
		$query = $db->select($select);
		while ($row = mysqli_fetch_assoc($query)) { ?>
			<div class="popular clear">
				<h3><a href="post.php?id=<?php echo $row['postid']; ?>"><?php echo $row['Title']; ?></a></h3>
				<a href="post.php?id=<?php echo $row['postid']; ?>"><img src="images/<?php echo $row['Image']; ?>" alt="post image" /></a>
				<p><?php echo $help->read($row['post'], 100); ?></p>
			</div>
		<?php
		};
		?>

	</div>
</div>
</div>