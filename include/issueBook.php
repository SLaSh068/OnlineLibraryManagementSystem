<?php 
	include('dbconn.php');
	if(empty($_SESSION['login'])){
		header('Location:login.php');
	}
?>

<?php 
	if (isset($_REQUEST['yes'])) {
		$em = $_SESSION['email'];
		$sql = "SELECT user_email FROM book_register WHERE user_email = '$em' ";
		$res = mysql_query($sql) or die(mysql_error());
		$rws = mysql_num_rows($res);
		if($rws<3){
			$sql = "SELECT * FROM bk_issue";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$name = $row['bk_name'];
			$sql = "UPDATE books_tab SET availability = '0' WHERE books_name = '$name' ";
			mysql_query($sql);
			$sql = "SELECT books_category FROM books_tab WHERE books_name = '$name'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$cat = $row['books_category'];
			$email = $_SESSION['email'];
			$doi = date("d/m/Y");
			$dor = date('d/m/Y', mktime(0, 0, 0, date('m'), date('d') + 14, date('Y'))); 
			$sql = "INSERT INTO book_register VALUES('','$name','$email','$doi','$dor','$cat')";
			mysql_query($sql);
			$sql = "DROP TABLE bk_issue";
			mysql_query($sql);
			header('Location: browse.php');
		}
		else{
			$message = "Cannot borrow more books";
			echo "<div><h3>$message</h3></div>";
		}
	}
	else if (isset($_REQUEST['no'])) {
		$sql = "DROP TABLE bk_issue";
		mysql_query($sql);
		header('Location: browse.php');
	}
?>
<html>
<head>
	<title>Issue Book</title>
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
										$sql = "SELECT users_dp FROM users_tab WHERE users_email = '$email' ";
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
				<table align="center">
						<th>Issue Book</th>
						<tr>
						<td>
							<div id="tab">
								<?php 
									$sql = "SELECT bk_name FROM bk_issue";
									$result = mysql_query($sql);
									$row = mysql_fetch_array($result);
									$name = $row['bk_name'];
									$sql = "SELECT books_name FROM books_tab WHERE books_name = '$name' ";
									$result = mysql_query($sql);
									$row = mysql_fetch_array($result);
									$name = $row['books_name'];
									$em = $_SESSION['email'];
									$sql = "SELECT users_email FROM users_tab WHERE users_email = '$em' ";
									$result = mysql_query($sql);
									$row = mysql_fetch_array($result);
									$email = $row['users_email'];
								?>
								<form action="" method="POST">
									<table align="center">
										<tr>
											<td align="center" colspan="2">
												<?php 
													echo "Issue Book"." ".$name."?";

												?>
											</td>
										</tr>
										<tr>
											<td align="right">
												<input type="submit" name="yes" value="YES">
											</td>
											<td align="left">
												<input type="submit" name="no" value="NO">
											</td>
										</tr>
									</table>
								</form>
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