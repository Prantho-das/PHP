<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
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
						$delq = "delete from post where postid=$id";
						$delete = $db->delete($delq);
						if ($delete == "deleted") {
							echo "<h1 style='margin:1rem;color:red'>Deleted</h1>";
						}
					}
					$select = "SELECT post.*,category.category FROM post INNER JOIN category ON category.catid=post.catid";
					$query = $db->select($select);
					while ($row = mysqli_fetch_assoc($query)) { ?>
						<tr class="odd gradeX">
							<td>
								<center><?php echo $row['Title']; ?></center>
							</td>
							<td>
								<center><?php echo $help->read($row['post'], 70); ?></center>
							</td>
							<td>
								<center><?php echo $row['category']; ?></center>
							</td>
							<td>
								<class="center">
									<center><img src="../images/<?php echo $row['Image']; ?>" style="width:90px;height:40px;" alt="post image" /></center></td>
							<td><a href="postup.php?update=<?php echo $row['postid']; ?>">Edit</a> || <a href="?del=<?php echo $row['postid']; ?>">Delete</a></td>
						</tr>
					<?php
					};
					?>
				</tbody>
			</table>

		</div>
	</div>
</div>
<div class="clear">
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
	<?php include 'inc/footer.php' ?>