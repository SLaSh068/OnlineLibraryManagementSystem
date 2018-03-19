<?php 
	include('dbconn.php');
	if(empty($_SESSION['login'])){
		header('Location: login.php');
	}
	$sql = "SELECT * FROM cat_tab";
	$query = mysql_query($sql) or die(mysql_error());
?>

<?php 
	if(isset($_REQUEST['edit'])){
		$sql = "CREATE TABLE ed_tab ( ed_name  VARCHAR(255) NOT NULL )";
		mysql_query($sql);
		$item = $_REQUEST['item'];
		$sql = "INSERT INTO ed_tab VALUES('$item')";
		mysql_query($sql);
		header('Location: editCategory.php');
	}
?>

<?php 
	if(isset($_REQUEST['delete'])){
		$sql = "CREATE TABLE del_tab ( del_name  VARCHAR(255) NOT NULL )";
		mysql_query($sql);
		$item = $_REQUEST['item'];
		$sql = "INSERT INTO del_tab VALUES('$item')";
		mysql_query($sql);
		header('Location: deleteCategory.php');
	}
?>

<html>
<head>
	<title>Manage Category</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" type="text/css" href="user.css">
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
				<table align="center">
						<th colspan="2">Manage Category</th>
						<tr>
						<td>
							<div id="tab">
								<table align="center">
								<th>Category Name</th>
								<th colspan="2">Action</th>
								<?php while($row = mysql_fetch_array($query)) { ?>
									<tr>
										<td align="center"><?php echo $row['cat_name']; ?></td>
										<td align="right" style="padding-top: 3px;"><?php 
											$id = $row['cat_name'];
											echo "<form action=\"\" method=\"POST\"><input type=\"hidden\" name=\"item\" value=\"$id\">
											<input type=\"submit\" name=\"edit\" value=\"Edit\"></form>";
										?>
											
										</td>
										<td align="center" style="padding-top: 3px;"><?php 
											$id = $row['cat_name'];
											echo "<form action=\"\" method=\"POST\"><input type=\"hidden\" name=\"item\" value=\"$id\">
											<input type=\"submit\" name=\"delete\" value=\"Delete\"></form>";
										?>
										</td>
									</tr>
							<?php	}	?>
							</table>
							</div>	
						</td>
					</tr>
				</table>
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