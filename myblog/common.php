<?php include 'inc/header.php'; ?>
<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<?php
			if (isset($_GET["id"])) {
				$id = $_GET['id'];
			}
			$select = "SELECT * FROM pages where id=$id";
			$query = $db->select($select);
			while ($pages = mysqli_fetch_array($query)) { ?>
				<h2><?php echo $pages['title']; ?></h2>
				<p><?php echo $pages['post']; ?></p>
			<?php
			}
			?>
		</div>
	</div>
	<?php include 'inc/sidebar.php'; ?>
</div>
<?php include 'inc/footer.php'; ?>