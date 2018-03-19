<?php 
	include('dbconn.php');
	if(empty($_SESSION['login'])){
		header('Location: login.php');
	}
?>

<?php 
	if (isset($_REQUEST['save'])) {
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$cl = $_REQUEST['filter'];
		$ai = $_REQUEST['filter2'];
		$email = $_SESSION['email'];
		$sql = "UPDATE users_tab SET users_fname = '$fname', users_lname = '$lname', cl = '$cl', ai = '$ai' WHERE users_email = '$email' ";
		mysql_query($sql);
	}

	if (isset($_REQUEST['ques'])) {
		$sec = $_REQUEST['sec'];
		$email = $_SESSION['email'];
		$sql = "UPDATE users_tab SET sec_ques = '$sec' WHERE users_email = '$email' ";
		mysql_query($sql);
	}

	if (isset($_REQUEST['upload'])) {
	$path="image/".$_FILES['img']['name'];
	$email = $_SESSION['email'];
	move_uploaded_file($_FILES['img']['tmp_name'],$path);
	$sql="UPDATE users_tab SET users_dp ='$path' WHERE users_email = '$email' ";
	mysql_query($sql) or die(mysql_error());
	$res=mysql_query("SELECT users_dp FROM users_tab WHERE users_email = '$email' ");
	while ($rws1 = mysql_fetch_array($res)) 
		{
			$_SESSION['img_path']=$rws1[0];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="profile1.css">
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
						<th>Edit Account Information</th>
						<tr>
							<td>
								<div id="panel">
									<form action="" method="POST">
										<table>
										<th colspan="2">Personal Profile</th>
										<tr>
											<td align="left">
												First Name : <input type="text" name="fname" value="<?php 
													$email = $_SESSION['email'];
													$sql = "SELECT users_fname from users_tab WHERE users_email = '$email' ";
													$result = mysql_query($sql);
													$rws = mysql_fetch_array($result);
													echo $rws[0];
												?>">
											</td>
											<td align="left">
												Country Location : <select name="filter">
																		<option value="Australia">Australia</option>
																		<option value="Brazil">Brazil</option>
																		<option value="China">China</option>
																		<option value="Denmark">Denmark</option>
																		<option value="Egypt">Egypt</option>
																		<option value="Finland">Finland</option>
																		<option value="Great Britain">Great Britain</option>
																		<option value="Hungary">Hungary</option>
																		<option value="India">India</option>
																		<option value="Jamaica">Jamaica</option>
																		<option value="Kenya">Kenya</option>
																		<option value="USA">USA</option>
																	</select>
											</td>
										</tr>
										<tr>
											<td align="left">
												Last Name : <input type="text" name="lname" value="<?php 
													$email = $_SESSION['email'];
													$sql = "SELECT users_lname from users_tab WHERE users_email = '$email' ";
													$result = mysql_query($sql);
													$rws = mysql_fetch_array($result);
													echo $rws[0];
												?>">
											</td>
											<td align="left">
												Area of Interest : <select name="filter2">
																		<option value="Arts">Arts</option>
																		<option value="Engineering">Engineering</option>
																		<option value="MBA">MBA</option>
																		<option value="Research">Research</option>
																	</select>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<p>First name and Last name should be Alphanumeric with the following allowed characters : hyphen(-), single quotes(''), space and dot.</p>
											</td>
										</tr>
										<tr>
											<td align="right" colspan="2">
												<input type="submit" name="save" value="Save" class="btn">
											</td>
										</tr>
									</table>
									</form>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div id="panel">
									<hr />
									<table>
										<tr>
											<td>
												Login
											</td>
											<td>
												<?php 
													$email = $_SESSION['email'];
													$sql = "SELECT users_email from users_tab WHERE users_email = '$email' ";
													$result = mysql_query($sql);
													$rws = mysql_fetch_array($result);
													echo $rws[0];
												?>
											</td>
											<td align="left">
												<a href="userchangeEmail.php">Change Email Address</a>
											</td>
										</tr>
										<tr>
											<td>
												Password
											</td>
											<td>
												********
											</td>
											<td align="left">
												<a href="userchangePass.php">Change Password</a>
											</td>
										</tr>
									</table>
									<hr />
								</div>		
							</td>
						</tr>
						<tr>
							<td>
								<div id="dp">
									<form action="" method="POST" enctype="multipart/form-data">
										<table>
											<tr>
												<td align="center">
													<p style="color: white; font-size: 20px;">Change Profile Picture</p>
												</td>
												<td>
													<input type="file" name="img">
												</td>
												<td>
													<input type="submit" name="upload" value="Save" class="btn">
												</td>
											</tr>
										</table>
									</form>
									<hr />
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div id="ques">
									<form action="" method="POST">
										<table>
											<th colspan="3">Security Question</th>
											<tr>
												<td align="left">
													<p style="color: white; font-size: 20px;">What is your favourite movie?</p>
												</td>
												<td align="left">
													<input type="text" name="sec">
												</td>
												<td align="left">
													<input type="submit" name="ques" value="Save Answer" class="btn">
												</td>
											</tr>
										</table>
									</form>
									<hr />
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