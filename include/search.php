<?php 
	include('dbconn.php');
	if(empty($_SESSION['login'])){
		header('Location: login.php');
		
	}
	
	if (isset($_REQUEST['search_button'])) {
		$searchquery = preg_replace('#[^a-z 0-9?!]#i', '', $_REQUEST['search_query']);

		if ($_REQUEST['filter'] == "Book Name") {
			$sql = "SELECT books_name, books_author, books_category,availability FROM books_tab WHERE books_name LIKE '%$searchquery%' ";
		} else if ($_REQUEST['filter'] == "Book Author"){
				$sql = "SELECT books_name, books_author, books_category,availability FROM books_tab WHERE books_author LIKE '%$searchquery%' ";
		} else if ($_REQUEST['filter'] == "Book Category"){
				$sql = "SELECT books_name, books_author, books_category,availability FROM books_tab WHERE books_category LIKE '%$searchquery%' ";
		}
	}
?>

<?php 
	if(isset($_REQUEST['issue'])){
		$sql = "CREATE TABLE bk_issue ( bk_name  VARCHAR(255) NOT NULL )";
		mysql_query($sql);
		$item = $_REQUEST['item'];
		$sql = "INSERT INTO bk_issue VALUES('$item')";
		mysql_query($sql);
		header('Location: issueBook2.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Search Books</title>
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
						<img src="../img/useradd.png" width="50" height="50">
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
					<th colspan="5">Search Books</th>
					<tr>
						<td>
							<div id="search">
								<form action="search.php" method="POST">
									<table>
										<tr>
											<td align="right">
												<label>Search By :</label>
												<select name="filter">
													<option value="Book Name">Book Name</option>
													<option value="Book Author">Book Author</option>
													<option value="Book Category">Book Category</option>
												</select>
											</td>
											<td align="left">
												<input type="text" name="search_query">
												<input type="submit" name="search_button" value="GO">
											</td>
										</tr>
								</table>
								</form>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div id="tab">
								<table align="center">
								<th>Book Name</th>
								<th>Book Author</th>
								<th>Category</th>
								<th>Available</th>
								<th>Action</th>
								<?php 
								$result = mysql_query($sql) or die(mysql_error());
								$count = mysql_num_rows($result);

								while($row = mysql_fetch_array($result)) { ?>
									<tr>
										<td align="center"><?php echo $row['books_name']; ?></td>
										<td align="center"><?php echo $row['books_author']; ?></td>
										<td align="center"><?php echo $row['books_category']; ?></td>
										<td align="center"><?php 
										if($row['availability']==1){
											echo "Yes";
										}
										else{
											echo "No";
										}

										 ?>
										</td>
										<td align="center"><?php
										if($row['availability']==1){
											$id = $row['books_name'];
											echo "<form action=\"\" method=\"POST\"><input type=\"hidden\" name=\"item\" value=\"$id\">
											<input type=\"submit\" name=\"issue\" value=\"Issue Book\"></form>";
										}
										else{
											echo "N/A";
										}

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
