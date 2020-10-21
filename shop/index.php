<?php include 'inc/header.php'; ?>
<div class="header_bottom">
	<div class="header_bottom_left">
		<div class="section group">
			<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					<a href="preview.html"> <img src="images/pic4.png" alt="" /></a>
				</div>
				<div class="text list_2_of_1">
					<h2>Iphone</h2>
					<p>Lorem ipsum dolor sit amet sed do eiusmod.</p>
					<div class="button"><span><a href="preview.html">Add to cart</a></span></div>
				</div>
			</div>
			<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					<a href="preview.html"><img src="images/pic3.png" alt="" /></a>
				</div>
				<div class="text list_2_of_1">
					<h2>Samsung</h2>
					<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
					<div class="button"><span><a href="preview.php">Add to cart</a></span></div>
				</div>
			</div>
		</div>
		<div class="section group">
			<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					<a href="preview.php"> <img src="images/pic3.jpg" alt="" /></a>
				</div>
				<div class="text list_2_of_1">
					<h2>Acer</h2>
					<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
					<div class="button"><span><a href="preview.php">Add to cart</a></span></div>
				</div>
			</div>
			<div class="listview_1_of_2 images_1_of_2">
				<div class="listimg listimg_2_of_1">
					<a href="preview.php"><img src="images/pic1.png" alt="" /></a>
				</div>
				<div class="text list_2_of_1">
					<h2>Canon</h2>
					<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
					<div class="button"><span><a href="preview.php">Add to cart</a></span></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="header_bottom_right_images">
		<!-- FlexSlider -->
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<?php
					$que = "select * from slider";
					$selt = $db->select($que);
					if (mysqli_num_rows($selt) > 0) {
						while ($row = mysqli_fetch_assoc($selt)) { ?>
							<li><img style="height:310px;" src="admin/upload/<?php echo $row['img']; ?>" alt="" /></li>
					<?php
						}
					} else {
						echo "<h1>NO RESULT FOUND</h1>";
					}
					?>
				</ul>
			</div>
		</section>
		<!-- FlexSlider -->
	</div>
	<div class="clear"></div>
</div>

<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Feature Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$que = "select * from products where type=1 limit 4";
			$selt = $db->select($que);
			if (mysqli_num_rows($selt) > 0) {
				while ($row = mysqli_fetch_assoc($selt)) { ?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php?pid=<?php echo $row['id']; ?>"><img style="height: 100px;" src="admin/upload/<?php echo $row['img']; ?>" alt="" /></a>
						<h2><?php echo $row['pdname']; ?></h2>
						<p><?php echo $help->read($row['prodetail'],30); ?></p>
						<p><span class="price"><?php echo $row['price']; ?></span></p>
						<div class="button"><span><a href="preview.php?pid=<?php echo $row['id']; ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			} else {
				echo "<h1 style='color:red;text-align:center;margin:2rem 0rem'>SORRY....!NO RESULT FOUND</h1>";
			}
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>New Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$que = "select * from products order by id desc limit 4";
			$selt = $db->select($que);
			if (mysqli_num_rows($selt) > 0) {
				while ($row = mysqli_fetch_assoc($selt)) { ?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="preview.php?pid=<?php echo $row['id']; ?>"><img style="height: 100px;" src="admin/upload/<?php echo $row['img']; ?>" alt="" /></a>
						<h2><?php echo $row['pdname']; ?></h2>
						<p><?php echo $help->read($row['prodetail'],30); ?></p>
						<p><span class="price"><?php echo $row['price']; ?></span></p>
						<div class="button"><span><a href="preview.php?pid=<?php echo $row['id']; ?>" class="details">Details</a></span></div>
					</div>
			<?php
				}
			} else {
				echo "<h1 style='color:red;text-align:center;margin:2rem 0rem'>SORRY....!NO RESULT FOUND</h1>";
			}
			?>
		</div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>