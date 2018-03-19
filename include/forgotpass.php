<?php

	include('dbconn.php'); 
	if(isset($_REQUEST['subBtn'])){
		$sec = $_REQUEST['sec'];
		$email = $_REQUEST['email'];
		setcookie('uname',$email,time()+60*60*24*30);
		setcookie('upass',$pass,time()+60*60*24*30);
		
		if(isset($_COOKIE['uname']) && isset($_COOKIE['upass'])){
			$email = $_COOKIE['uname'];
			$pass = $_COOKIE['upass'];
		}
		$checkuser = "SELECT users_email, users_pwd from admin_tab WHERE users_email = '$email' AND sec_ques = '$sec' ";
		$res = mysql_query($checkuser);
		$rw = mysql_num_rows($res);
		if($rw==1){
			$sql = "SELECT users_fname, users_email FROM admin_tab WHERE users_email = '$email' ";
			$result = mysql_query($sql) or die(mysql_error());
			while($rws = mysql_fetch_array($result)){
				$_SESSION['name'] = $rws[0];
				$_SESSION['email'] = $rws[1];
			}
			$_SESSION['login']=1;
			header('Location:adminPage.php');
		}
		else{
			$qry = "SELECT users_email,users_pwd FROM users_tab WHERE users_email = '$email' AND sec_ques = '$sec' ";
			$result = mysql_query($qry);
			$rws = mysql_num_rows($result);
			if ($rws>0) {
				$sql = "SELECT users_fname, users_email FROM users_tab WHERE users_email = '$email' ";
				$result = mysql_query($sql) or die(mysql_error());
				while($rws = mysql_fetch_array($result)){
				$_SESSION['name'] = $rws[0];
				$_SESSION['email'] = $rws[1];
			}
			$_SESSION['login']=1;
				header('Location:userProfile.php');
			}
			else{
				echo "Check Login Details!";
			}
		}
	}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>
<form method="POST" action="">
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
						<th colspan="1">Forgot Password</th>
						<tr>
							<td align="center">
								<form action="" method="POST">
									<table align="center">
										<tr>
											<td colspan="2" align="center">
												<p style="color: white; font-size: 25px; font-weight: bold;">Please enter the answer to your security question</p>
											</td>
										</tr>
										
											<tr>
											<td align="right">
												<p style="color: white; font-size: 24px;">What is your favourite movie? </p>
											</td>
											<td align="left">
												<input type="text" name="sec" placeholder="Security Answer">
											</td>
											</tr>
											<tr>
											<td align="right">
												<p style="color: white; font-size: 24px;">Enter your registered Email address </p>
											</td>
											<td align="left">
												<input type="text" name="email" placeholder="Registered Email">
											</td>
											</tr>


										<tr >
											<td colspan="2" align="center">
												<br />
												<input type="submit" name="subBtn" value="RESET PASSWORD" class="regBtn">
											</td>
										</tr>
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
</form>
</body>
</html>