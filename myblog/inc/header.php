<!DOCTYPE html>
<html>

<head>
	<title>Basic Website</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	<style>
		.page {
			padding: 5px !important;
			text-decoration: none;
			height: 20px;
			width: 20px;
			background: blue;
			color: white;
		}

		.pagination {
			float: right;
			margin: 1rem;
		}

		.active {
			background: #b7801c;
		}
	</style>

	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
				effect: 'random',
				slices: 10,
				animSpeed: 500,
				pauseTime: 5000,
				startSlide: 0, //Set starting Slide (0 index)
				directionNav: false,
				directionNavHide: false, //Only show on hover
				controlNav: false, //1,2,3...
				controlNavThumbs: false, //Use thumbnails for Control Nav
				pauseOnHover: true, //Stop animation while hovering
				manualAdvance: false, //Force manual transitions
				captionOpacity: 0.8, //Universal caption opacity
				beforeChange: function() {},
				afterChange: function() {},
				slideshowEnd: function() {} //Triggers after all slides have been shown
			});
		});
	</script>
</head>

<body>
	<!-- database connection start -->
	<?php
	include "lib/Database.php";
	include "helpers/help.php";
	$help = new help();
	$db = new database();
	?>
	<!-- database connection finished -->
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
				<?php
				$select = "SELECT * FROM `slogan`";
				$query = $db->select($select);
				while ($row = mysqli_fetch_assoc($query)) { ?>
					<img src="images/<?php echo $row['img']; ?>" alt="Logo" />
					<h2><?php echo $row['sloga']; ?></h2>
					<p><?php echo $row['des']; ?></p>
				<?php
				}
				?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php
				$select = "SELECT * FROM `social`";
				$query = $db->select($select);
				while ($row = mysqli_fetch_assoc($query)) { ?>
					<a href="<?php echo $row['Facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="<?php echo $row['Twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="<?php echo $row['LinkedIn']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
					<a href="<?php echo $row['Google']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
				<?php
				};
				?>
			</div>
			<div class="searchbtn clear">
				<form action="search.php" method="post">
					<input type="text" name="search" placeholder="Search keyword..." />
					<input type="submit" name="submit" value="Search" />
				</form>
			</div>
		</div>
	</div>
	<div class="navsection templete">
		<ul>
			<li><a id="active" href="index.php">Home</a></li>
			<?php
			$select = "SELECT * FROM pages";
			$query = $db->select($select);
			while ($page = mysqli_fetch_array($query)) { ?>
				<li><a href="common.php?id=<?php echo $page['id']; ?>"><?php echo $page['nav']; ?></a></li>
			<?php
			}
			?>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</div>