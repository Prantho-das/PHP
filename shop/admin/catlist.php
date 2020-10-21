<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($_GET["del"])) {
						$id = $_GET['del'];
						$delq = "delete from category where id=$id";
						$delete = $db->delete($delq);
						if ($delete == "deleted") {
							echo "<h1 style='margin:1rem;color:red'>Deleted</h1>";
						}
					}
					$select = "SELECT * FROM `category`";
					$query = $db->select($select);
					$i = 1;
					while ($row = mysqli_fetch_assoc($query)) { ?>
						<tr class="odd gradeX">
							<td><?php echo $i++; ?></td>
							<td><?php echo $row['catname']; ?></td>
							<td><a href="catup.php?id=<?php echo $row['id']; ?>">Edit</a> || <a href="?del=<?php echo $row['id']; ?>">Delete</a></td>
						</tr>
					<?php
					};
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include 'inc/footer.php' ?>