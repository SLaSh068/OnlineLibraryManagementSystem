<?php 
	include('dbconn.php');
	if(empty($_SESSION['login'])){
		header('Location: login.php');
		
	}
	$em = $_SESSION['email'];
	$sql = "SELECT * FROM book_register WHERE user_email = '$em' ";
	$query = mysql_query($sql) or die(mysql_error());
?>
<?php 
	if(isset($_REQUEST['return'])){
		$em = $_SESSION['email'];
		$book_name = $_REQUEST['item'];
		$sql = "UPDATE books_tab SET availability = '1' WHERE books_name = '$book_name' ";
		mysql_query($sql);
		$sql = "DELETE FROM book_register WHERE book_name = '$book_name' ";
			mysql_query($sql);
		header('Location: retBooks.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Browse Books</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
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
							<li><a href="userProfile.php">MyProfile</a></li>
							<li><a href="destroy.php">Logout</a></li>
						</ul>		
					</td>
					<td align="right">
						<p style="color: white; font-size: 20px; font-weight: bold;">Welcome, <?php echo $_SESSION['name'] ?></p>
						</td>
						<td>
						<?php
							$email = $_SESSION['email'];
							$sql = "SELECT users_dp FROM users_tab WHERE users_email = '$email' ";
							$res = mysql_query($sql);
							$row = mysql_fetch_array($res);
							$img = $row['users_dp'];
							echo "<img src='".$img."'height='50' width='50' style= 'border-radius: 50%'/>";
						?>
					</td>
				</tr>
			</table>
		</div>
		<div id="leftPanel">
			<table align="center">
				<th>My Profile Home</th>
				<tr>
					<td>
						<a href="userProfile.php">My Profile Home</a>
					</td>
				</tr>
			</table>
			<table align="center">
				<th>Account</th>
				<tr>
					<td>
						<a href="useraccInfo.php">Account Information</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="usereditInfo.php">Edit Login Information</a>
					</td>
				</tr>

			</table>
			<table align="center">
				<th>Browse</th>
				<tr>
					<td>
						<a href="browse.php">Browse Books</a>		
					</td>
				</tr>
				<tr>
					<td>
						<a href="search.php">Search Books</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="retBooks.php">Return Books</a>
					</td>
				</tr>
			</table>
		</div>
		<div id="rightPanel">
			<div id="content">
				<table>
					<th colspan="5">Browse Books</th>
					<tr>
						<td>
							<div id="tab">
								<table align="center">
								<th>Book Name</th>
								<th>Issued For</th>
								<th>Date of Issue</th>
								<th>Date of Return</th>
								<th>Action</th>
								<?php while($row = mysql_fetch_array($query)) { ?>
									<tr>
										<td align="center"><?php echo $row['book_name']; ?></td>
										<td align="center"><?php echo $row['user_email']; ?></td>
										<td align="center"><?php echo $row['doi']; ?></td>
										<td align="center"><?php echo $row['dor']; ?></td>
										<td align="center"><?php
											$id = $row['book_name'];
											echo "<form action=\"\" method=\"POST\"><input type=\"hidden\" name=\"item\" value=\"$id\">
											<input type=\"submit\" name=\"return\" value=\"Return Book\"></form>";
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
</body>
</html>
