<?php include 'inc/header.php'; ?>
<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<h2>Contact us</h2>
			<?php
			if (isset($_REQUEST['submit'])) {
				$firstname = help::validate($_POST["firstname"]);
				$lastname = help::validate($_POST["lastname"]);
				$email = help::validate($_POST["email"]);
				$sub = help::validate($_POST["subject"]);
				$message = help::validate($_POST["message"]);
				if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($message)) {
					$query = "INSERT INTO `contact` (`fn`, `ln`, `email`, `msg`,`sub`) VALUES ('$firstname','$lastname','$email','$message','$sub')";
					$add = $db->insert($query);
					if ($add == true) {
						echo "<h1 style='color:green'>SENT</h1>";
					}
					else{
						echo "<h1 style='color:red'>SORRY...! NOT SENT</h1>";
					}
				} else {
					echo "<h1 style='color:red'>PLEASE UP REQUIRED FIELD</h1>";
				}
			}
			?>
			<form action="" method="post">
				<table>
					<tr>
						<td>Your First Name:</td>
						<td>
							<input type="text" name="firstname" placeholder="Enter first name" required="1" />
						</td>
					</tr>
					<tr>
						<td>Your Last Name:</td>
						<td>
							<input type="text" name="lastname" placeholder="Enter Last name" required="1" />
						</td>
					</tr>

					<tr>
						<td>Your Email Address:</td>
						<td>
							<input type="email" name="email" placeholder="Enter Email Address" required="1" />
						</td>
					</tr>
					<tr>
						<td>Your Subject:</td>
						<td>
							<input type="text" name="subject" placeholder="Enter Subject" required="1" />
						</td>
					</tr>
					<tr>
						<td>Your Message:</td>
						<td>
							<textarea name="message"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="submit" value="Submit" />
						</td>
					</tr>
				</table>
				<form>
		</div>
	</div>
	<?php include 'inc/sidebar.php'; ?>
	<?php include 'inc/footer.php'; ?>