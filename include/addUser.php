<?php 
	include('dbconn.php');
	if(empty($_SESSION['login'])){
		header('Location:login.php');
	}
?>

<?php 
	if (isset($_REQUEST['addBtn'])) {
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$con = $_REQUEST['con'];
		$email = $_REQUEST['email'];
		$pass = "123456";
		$dj = date("d/m/Y");
		$sql = "INSERT INTO users_tab VALUES('','$fname','$lname','$con','$email','$pass','$dj','','','','')";
				mysql_query($sql);
				header('Location:addUser.php');
				echo "Registration Successful :)";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Users</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div id="wrapper">
	<div id="header">
		<table>
				<tr>
					<td align="center" class="name">
						Giesel Online Library
					</td>
					<td align="right">
						<ul>
							<li><a href="adminPage.php">MyProfile</a></li>
							<li><a href="destroy.php">Logout</a></li>
						</ul>		
					</td>
					<td>
						<table>
							<tr>
								<td align="right">
									<p style="color: white; font-size: 20px; font-weight: bold;">Welcome, <?php echo $_SESSION['name'] ?></p>
								</td>
								<td>
									<?php
										$email = $_SESSION['email'];
										$sql = "SELECT users_dp FROM admin_tab WHERE users_email = '$email' ";
										$res = mysql_query($sql);
										$row = mysql_fetch_array($res);
										$img = $row['users_dp'];
										echo "<img src='".$img."'height='50' width='50' style= 'border-radius: 50%'/>";
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
		</table>
	</div>
	<div id="con">
		
		<div id="leftPanel">
			<table align="center">
				<th>My Profile Home</th>
				<tr>
					<td>
						<a href="adminPage.php">My Profile Home</a>
					</td>
				</tr>
			</table>
			<table align="center">
				<th>Account</th>
				<tr>
					<td>
						<a href="accInfo.php">Account Information</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="admineditInfo.php">Edit Login Information</a>
					</td>
				</tr>

			</table>
			<table align="center">
				<th>Modules</th>
				<tr>
					<td>
						<a href="addAdmin.php">Add Admins</a>		
					</td>
				</tr>
				<tr>
					<td>
						<a href="manAdmin.php">Manage Admins</a>
					</td>
				</tr>
				<tr>
					<td>
						<hr />
					</td>
				</tr>
				<tr>
					<td>
						<a href="addUser.php">Add Users</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="manUser.php">Manage Users</a>
					</td>
				</tr>
				<tr>
					<td>
						<hr />
					</td>
				</tr>
				<tr>
					<td>
						<a href="addBook.php">Add Books</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="manBook.php">Manage Books</a>
					</td>
				</tr>
				<tr>
					<td>
						<hr />
					</td>
				</tr>
				<tr>
					<td>
						<a href="addCategory.php">Add Category</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="manCategory.php">Manage Category</a>
					</td>
				</tr>
			</table>
		</div>

		<div id="rightPanel">
			<div id="content">
				<div id="info">
					<table align="center">
						<th colspan="2">Add User</th>
						<tr>
							<td align="center">
								<form action="" method="POST">
									<table align="center">
										<tr>
											<td align="right">
												<input type="text" name="fname" placeholder="First Name">
											</td>
											<td>
												<input type="text" name="lname" placeholder="Last Name">
											</td>
										</tr>
										<tr>
											<td align="right">
												<input type="text" name="con" placeholder="10-digit Mobile Number">
											</td>
											<td>
												<input type="text" name="email" placeholder="Email">
											</td>
										</tr>
										<tr >
											<td colspan="3" align="center">
												<input type="submit" name="addBtn" value="Add User" class="regBtn">
											</td>
										</tr>
										
									</table>
								</form>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

	</div>

	<div id="footer">
		<div id="footcon">
			<table>
				<tr>
					<td>
						<div id="block"> </div>
					</td>
					<td align="center" class="name">
						<h3>GIESEL ONLINE LIBRARY</h3>
					</td>
					<td align="right">
					<ul>
						<li><a>About Us</a></li>
						<li><a>Help</a></li>
						<li><a>Contact Us</a></li>
						<li><a>Agents</a></li>
						<li><a>Advertisers</a></li>
						<li><a>Media</a></li>
						<li><a>Privacy</a></li>
						<li><a>Cookies</a></li>
						<li><a>T & C</a></li>
						<li><a>Site Map</a></li>
					</ul>		
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
</div>
</body>
</html>