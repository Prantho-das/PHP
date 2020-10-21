<?php include 'inc/header.php'; ?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Cart</h2>
				<table class="tblone">
					<tr>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="25%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<?php
					if (isset($_GET["crdel"])) {
						$id = $_GET['crdel'];
						$delq = "delete from cart where id=$id";
						$delete = $db->delete($delq);
						header('location:?.php');
						if ($delete == "deleted") {
							echo "<h1 style='margin:1rem;color:red'>Deleted</h1>";
						}
					}
					if (isset($_REQUEST['submit'])) {
						$quan = $_POST['quantity'];
						$pd = $_POST['prod'];
						if ($quan > 0) {
							$que = "update cart set quantity=$quan where productid=$pd";
							$up = $db->update($que);
							if ($up) {
								header('location:?.php');
								echo "<h1 style='margin:1rem;color:blue'>UPDATED</h1>";
							}
						} else {
							echo "<h1 style='margin:1rem;color:red'>SORRY....!</h1>";
						}
					}
					$cid = $_COOKIE['cid'];
					$selcart = "SELECT * FROM `cart` WHERE customerid=$cid";
					$rows = $db->select($selcart);
					$total = 0;
					while ($row = mysqli_fetch_assoc($rows)) { ?>
						<tr>
							<td><?php echo $row['pname']; ?></td>
							<td><img src="admin/upload/<?php echo $row['img'] ?>" alt="" /></td>
							<td><?php echo $row['price']; ?></td>
							<td>
								<form action="" method="post">
									<input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" />
									<input type="hidden" name="prod" value="<?php echo $row['productid']; ?>" />
									<input type="submit" name="submit" value="Update" />
								</form>
							</td>
							<td>Tk.<?php echo $tot = ($row['quantity'] * $row['price']); ?></td>
							<?php $total = $tot + $total; ?>
							<td><a href="?crdel=<?php echo $row['id']; ?>">X</a></td>
						</tr>
					<?php
					}
					?>
				</table>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Sub Total : </th>
						<td>TK. <?php echo $total; ?></td>
					</tr>
					<tr>
						<th>VAT : </th>
						<td>TK. <?php echo $vat = $total * 0.15; ?></td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td>TK.<?php echo $gd = ($vat + $total); ?> </td>
					</tr>
				</table>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="<?php
								if (isset($_COOKIE['eml'])) {
									echo "checkout.php";
								} else {
									echo 'login.php';
								}
								?>
					"> <img src="images/check.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>