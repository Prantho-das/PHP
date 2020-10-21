<?php include 'inc/header.php'; ?>
<div class="main">
	<div class="content">
		<?php
		$que = "select * from brand";
		$seltt = $db->select($que);
		if (mysqli_num_rows($seltt) > 0) {
			while ($cat = mysqli_fetch_assoc($seltt)) { ?>
				<div class="content_top">
					<div class="heading">
						<h3>Latest from <?php echo $cat['brandname'] ?></h3>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
					<?php $bidd = $cat['brandid'] ?>
					<?php
					$que = "select * from products where brandid='$bidd' limit 4";
					$selt = $db->select($que);
					if (mysqli_num_rows($selt) > 0) {
						while ($row = mysqli_fetch_assoc($selt)) { ?>
							<div class="grid_1_of_4 images_1_of_4">
								<a href="preview.php?pid=<?php echo $row['id']; ?>"><img style="height: 100px;" src="admin/upload/<?php echo $row['img']; ?>" alt="" /></a>
								<h2><?php echo $row['pdname']; ?></h2>
								<p><?php echo $help->read($row['prodetail'], 30); ?></p>
								<p><span class="price"><?php echo $row['price']; ?></span></p>
								<div class="button"><span><a href="preview.php?pid=<?php echo $row['id']; ?>" class="details">Details</a></span></div>
							</div>
					<?php
						}
					} else {
						echo "<h1 style='color:red;text-align:center;margin:2rem 0rem;'>SORRY....!NO RESULT FOUND</h1>";
					}
					?>
				</div>
		<?php
			}
		}
		 else 
		{
			echo "<h1 style='color:red;text-align:center;margin:2rem 0rem;'>SORRY....!NO RESULT FOUND</h1>";
		}
		?>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>