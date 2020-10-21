<?php include 'inc/header.php'; ?>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<?php
				if (isset($_GET['pid'])) {
					$id = $_GET['pid'];
				}
				$select = "SELECT category.catname,brand.brandname,products.* FROM ((products INNER join brand on 
				products.brandid=brand.brandid) INNER JOIN category on products.catid=category.id) WHERE products.id='$id'";
				$query = $db->select($select);
				while ($row = mysqli_fetch_assoc($query)) { ?>
					<div class="grid images_3_of_2">
						<img src="admin/upload/<?php echo $img = $row['img'] ?>" alt="" />
					</div>
					<div class="desc span_3_of_2">
						<h2><?php echo $p = $row['pdname']; ?></h2>
						<p><?php echo $help->read($row['prodetail'], 150); ?></p>
						<div class="price">
							<p>Price: <span><?php echo $pr = $row['price']; ?></span></p>
							<p>Category: <span><?php echo $row['catname']; ?></span></p>
							<p>Brand:<span><?php echo $row['brandname']; ?></span></p>
						</div>
						<?php
						if (isset($_REQUEST['submit'])) {
							$quan = $_POST['quantity'];
							$cid = $_COOKIE['cid'];

							if ($quan > 0) {
								$cck = "select * FROM cart WHERE productid='$id' AND customerid='$cid'";
								$ccn = $db->select($cck);
								if (mysqli_num_rows($ccn) == 1) {
									echo "product is already added";
								} else {
									$inscart = "INSERT INTO `cart`(`productid`, `customerid`, `pname`, `price`, `quantity`,`img`)
								 	VALUES ('$id','$cid','$p','$pr','$quan','$img')";
									$ins = $db->insert($inscart);
									if ($ins== true) {
										// header('location:cart.php');
										echo "<script>window.location.href='cart.php'</script>";
									}
								}
							} else {
								echo "fill up correct number";
							}
						}

						?>

						<div class="add-cart">
							<form action="
							<?php
							if (isset($_COOKIE['eml'])) {
							} else {
								echo "login.php";
							}
							?>	
							" method="post">
								<input type="number" class="buyfield" name="quantity" value="1" />
								<input type="submit" class="buysubmit" name="submit" value="Buy Now" />
							</form>

						</div>
					</div>
					<div class="product-desc">
						<h2>Product Details</h2>
						<p><?php echo $row['prodetail'] ?></p>
					</div>
				<?php
				};
				?>
			</div>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php
					$select = "SELECT * FROM `category`";
					$query = $db->select($select);
					$i = 1;
					while ($row = mysqli_fetch_assoc($query)) { ?>
						<li><a href="productbycat.php?cat=<?php echo $row['id'] ?>"><?php echo $row['catname'] ?></a></li>
					<?php
					};
					?>
				</ul>

			</div>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>