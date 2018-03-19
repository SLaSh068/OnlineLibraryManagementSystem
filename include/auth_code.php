<?php 
	include('dbconn.php');

	if (isset($_REQUEST['subBtn'])) {
	$code = $_REQUEST['auth_code'];
	$res = mysql_query("SELECT * FROM auth_tab");
	$rws = mysql_fetch_array($res);
	$check = $rws[0];
	if($check==$code){
		$sql = "SELECT * FROM temp_tab";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$fname = $row['temp_fname'];
		$lname = $row['temp_lname'];
		$con = $row['temp_con'];
		$email = $row['temp_email'];
		$pass = $row['temp_pwd'];
		$jd = date("d/m/Y");
		$sql = "INSERT INTO users_tab VALUES('','$fname','$lname','$con','$email','$pass','$jd','','','','')";
		mysql_query($sql);
		mysql_query("DROP TABLE auth_tab");
		mysql_query("DROP TABLE temp_tab");
		header('Location: regSuccess.php');
	}
	else{

		echo "Incorrect Code!";
		mysql_query("DROP TABLE auth_tab");
		mysql_query("DROP TABLE temp_tab");
	}
		header('Location: register.php');		
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Authentication</title>
	<link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>
<div id="wrapper">
	<div id="header">
		<table>
				<tr>
					<td align="center" class="name">
						Giesel Online Library
					</td>
				</tr>
		</table>
	</div>
	<div id="con">
				
		<div id="rightPanel">
			<div id="content">
				<div id="info">
					<table align="center">
						<th colspan="1">Account Authentication</th>
						<tr>
							<td align="center">
								<form action="" method="POST">
									<table align="center">
										<tr>
											<td align="center">
												<p style="color: white; font-size: 25px; font-weight: bold;">Please enter the <u>generated code</u> below</p>
											</td>
										</tr>
										<tr>
											<td align="center">
												<input type="text" name="auth_code">
											</td>
										</tr>
										<tr >
											<td align="center">
												<br />
												<input type="submit" name="subBtn" value="Submit Code" class="regBtn">
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