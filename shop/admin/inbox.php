<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Inbox</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Mob</th>
						<th>msg</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (isset($_GET["del"])) {
						$id = $_GET['del'];
						$delq = "delete from contact where id=$id";
						$delete = $db->delete($delq);
						if ($delete == "deleted") {
							echo "<h1 style='margin:1rem;color:red'>Deleted</h1>";
						}
					}
					$select = "SELECT * FROM `contact`";
					$query = $db->select($select);
					$i = 1;
					while ($row = mysqli_fetch_assoc($query)) { ?>
						<tr class="odd gradeX"
						 <?php
							if ($row['status'] == 0) {
								echo "style='background:green;color:white;'";
							} else {
								echo "style='background:blue;color:white;'";
							}
							?>>
							<td>
								<center><?php echo $i++; ?></center>
							</td>
							<td>
								<center><?php echo $row['fn']; ?></center>
							</td>
							<td>
								<center><?php echo $row['mob']; ?></center>
							</td>
							<td>
								<center><?php echo $help->read($row['msg'],30); ?></center>
							</td>
							<td>
								<center><a style='color:white;' href="reply.php?id=<?php echo $row['id']; ?>">Reply</a> || <a style='color:white;' href="?del=<?php echo $row['id']; ?>">Delete</a>
									|| <a style='color:white;' href="seen.php?seen=<?php echo $row['id']; ?>">Seen</a></center>
							</td>
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