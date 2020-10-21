<?php include 'inc/header.php'; ?>
<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<?php
			if (isset($_REQUEST['signin'])) {
				$un = $_POST['username'];
				$ps = $_POST['password'];
				if (!empty($un) && !empty($ps)) {
					$login = $db->customer($un,$ps);
				} else {
					echo '<h1>Please Fill Up The Field</h1>';
				}
			}
			?>
			<form action="" method="post" id="member">
				<input name="username" type="text" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
				<input name="password" type="text" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
				<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
				<div class="buttons">
					<div><button name="signin" class="grey">Sign In</button></div>
				</div>
			</form>
		</div>
		<div class="register_account">
			<h3>Register New Account</h3>
			<?php
			if (isset($_REQUEST['creat'])) {
				$name = $_POST['name'];
				$add = $_POST['add'];
				$ct = $_POST['ct'];
				$cnt = $_POST['cnt'];
				$zip = $_POST['zip'];
				$phn = $_POST['phn'];
				$em = $_POST['em'];
				$pass = $_POST['pass'];
				if (
					!empty($name) && !empty($add) && !empty($ct) && !empty($cnt) &&
					!empty($zip) && !empty($phn) && !empty($em) && !empty($pass)
				) {
					$chk = "select * from customer where email='$em'";
					$chs = $db->select($chk);
					if (mysqli_num_rows($chs) == 0) {
						$qur = "INSERT INTO `customer`(`name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `password`)
						 VALUES ('$name','$add','$ct','$cnt','$zip','$phn','$em','$pass')";
						$int = $db->insert($qur);
						if ($int) {
							echo "<h1 style='color:green'>INSERTED</h1>";
						} else {
							echo "<h1 style='color:red'>SORRY</h1>";
						}
					} else {
						echo "<h1 style='color:red'>YOU ARE ALREADY REGISTERED....</h1>";
						echo "<h1 style='color:blue'>PLEASE LOG IN......</h1>";
					}
				} else {
					echo "<h1 style='color:red'>INSERT EVERY FIELD</h1>";
				}
			}
			?>
			<form action="" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" value="Name" onfocus="this.placeholder = '';" onblur="if (this.placeholder == '') {this.placeholder = 'Name';}">
								</div>

								<div>
									<input type="text" name="ct" placeholder="City" onfocus="this.placeholder = '';" onblur="if (this.placeholder == '') {this.placeholder = 'City';}">
								</div>

								<div>
									<input type="text" name="zip" placeholder="Zip-Code" onfocus="this.placeholder = '';" onblur="if (this.placeholder == '') {this.placeholder = 'Zip-Code';}">
								</div>
								<div>
									<input type="text" name="em" placeholder="E-Mail" onfocus="this.placeholder = '';" onblur="if (this.placeholder == '') {this.placeholder = 'E-Mail';}">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="add" placeholder="Address" onfocus="this.placeholder = '';" onblur="if (this.placeholder == '') {this.placeholder = 'Address';}">
								</div>
								<div>
									<select id="country" name="cnt" onchange="change_country(this.value)" class="frm-field required">
										<option value="null">Select a Country</option>
										<option value="AF">Afghanistan</option>
										<option value="AL">Albania</option>
										<option value="DZ">Algeria</option>
										<option value="AR">Argentina</option>
										<option value="AM">Armenia</option>
										<option value="AW">Aruba</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
										<option value="AZ">Azerbaijan</option>
										<option value="BS">Bahamas</option>
										<option value="BH">Bahrain</option>
										<option value="BD">Bangladesh</option>
									</select>
								</div>

								<div>
									<input type="text" name="phn" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
								</div>

								<div>
									<input type="text" name="pass" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><button class="grey" name="creat">Create Account</button></div>
				</div>
				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>