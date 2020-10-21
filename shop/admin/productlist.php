<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Post List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Post Title</th>
						<th>Description</th>
						<th>Category</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($_GET["del"])) {
						$id = $_GET['del'];
						$pic =$_GET['pic'];
						$delq = "delete from products where id=$id";
						unlink("upload/".$pic);
						$delete = $db->delete($delq);
						if ($delete == "deleted") {
							echo "<h1 style='margin:1rem;color:red'>Deleted</h1>";
						}
					}
					$adq = "SELECT products.*,category.catname FROM products INNER JOIN category ON category.id=products.catid";
					$con = $db->select($adq);
					while ($row = mysqli_fetch_assoc($con)) { ?>
						<tr class="even gradeC">
							<td><?php echo $row['pdname'] ?></td>
							<td><?php echo $help->read($row['prodetail'],70); ?></td>
							<td><?php echo $row['catname']; ?></td>
							<td class="center"><img style="height: 50px;width:50px;margin-top:1rem;" src="upload/<?php echo $row['img']; ?>" alt=""></td>
						<td><a href="proup.php?id=<?php echo $row['id']?>">Edit</a> || <a href="?del=<?php echo $row['id']?>& pic=<?php echo $row['img']; ?>">Delete</a></td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>