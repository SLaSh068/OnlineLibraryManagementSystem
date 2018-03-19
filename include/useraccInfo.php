<?php 
	include('dbconn.php');
	if(empty($_SESSION['login'])){
		header('Location: login.php');
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="profile.css">
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
				<div id="info">
					<table align="center">
						<th>Account Information</th>
						<tr>
							<td>
								<div id="panel">
									<table>
										<th>Personal Profile</th>
										<tr>
											<td>
												<table align="left">
													<tr>
														<td align="left">
															Name : <?php 
																	$email = $_SESSION['email'];
																	$sql = "SELECT users_fname, users_lname from users_tab WHERE users_email = '$email' ";
																	$result = mysql_query($sql);
																	$rws = mysql_fetch_array($result);
																	echo $rws[0]." ".$rws[1];
																?>
														</td>		
													</tr>
													<tr>
														<td align="left">
															Area of Interest : <?php 
																				$email = $_SESSION['email'];
																				$sql = "SELECT ai from users_tab WHERE users_email = '$email' ";
																				$result = mysql_query($sql);
																				$rws = mysql_fetch_array($result);
																				echo $rws[0];
																			?>
														</td>		
													</tr>
													<tr>
														<td align="left">
															Country Location : <?php 
																				$email = $_SESSION['email'];
																				$sql = "SELECT cl from users_tab WHERE users_email = '$email' ";
																				$result = mysql_query($sql);
																				$rws = mysql_fetch_array($result);
																				echo $rws[0];
																			?>
														</td>		
													</tr>
												</table>
											</td>
											<td align="right" rowspan="3">
												<div id="profpic">
													<?php
														$email = $_SESSION['email'];
														$sql = "SELECT users_dp FROM users_tab WHERE users_email = '$email' ";
														$res = mysql_query($sql);
														$row = mysql_fetch_array($res);
														$img = $row['users_dp'];
														echo "<img src='".$img."'height='250' width='250' />";
													?>
												</div>
											</td>
										</tr>
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
</body>
</html>