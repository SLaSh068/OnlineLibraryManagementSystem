<?php 
	include('dbconn.php');

	if (isset($_REQUEST['subBtn'])) {
		$fname = $_REQUEST['fname'];
		$con = $_REQUEST['con'];
		$mail = $_SESSION['temp_mail'];
		$result = mysql_query("SELECT temp_fname, temp_con FROM temp_tab WHERE temp_fname = '$fname', temp_con = '$con' ");
		$rws = mysql_num_rows($result);

		if($rws=1){
			mysql_query("CREATE TABLE auth_tab ( code VARCHAR(255) NOT NULL)");
			$email = $_SESSION['temp_mail'];
			$no1 = md5(rand().$email);
			$no2=substr($no1,3,6);
			mysql_query("INSERT INTO auth_tab VALUES('$no2')");
		}
		else{
			echo "Incorrect Details!";
		}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>One-Time Verification</title>
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
				</tr>
		</table>
	</div>
	<div id="con">
				
		<div id="rightPanel" style="margin-left: 140px;">
			<div id="content">
				<div id="info">
					<table align="center">
						<th colspan="1">One-Time Verification</th>
						<tr>
							<td align="center">
								<form action="" method="POST">
									<table align="center">
										<tr>
											<td colspan="2" align="center">
												<p style="color: white; font-size: 25px; font-weight: bold;">Please enter your Name and Contact No.</p>
											</td>
										</tr>
										<tr>
											<td align="right">
												<input type="text" name="fname" placeholder="First Name">
											</td>
											<td>
												<input type="text" name="con" placeholder="10-digit Mobile No.">
											</td>
											</tr>
										<tr >
											<td colspan="3" align="center">
												<br />
												<input type="submit" name="subBtn" value="Generate Code" class="regBtn">
											</td>
										</tr>
										<tr>
											<td colspan="2" align="center">
												<br />
												<br />
												<input type="text" name="auth_code" value="<?php 
												$res = mysql_query("SELECT * FROM auth_tab");
												while($rws = mysql_fetch_array($res))
												echo $rws[0];


												?>" >
												<p style="color: white; font-size: 25px; font-weight: bold;">Enter the above code <a href="auth_code.php" style="color: yellow; font-size: 25px; font-weight: bold;">here</a></p>
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