<?php 
	include('dbconn.php');
	if (isset($_REQUEST['regBtn'])) {
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$con = $_REQUEST['con'];
		$email = $_REQUEST['email'];
		$pass = md5($_REQUEST['password']);
		$pwd = md5($_REQUEST['password2']);
		$dj = date("d/m/Y");
		if($pass==$pwd){

			$checkuser = "SELECT users_fname from admin_tab WHERE users_email = '$email'";
			$res = mysql_query($checkuser);
			$rw = mysql_num_rows($res);
			$data = mysql_fetch_array($res);
			if($rw>0 && $data[1]='$fname'){
				echo "User already exists!";
			}
			else{
				$qry = "SELECT users_fname FROM users_tab WHERE users_email = '$email'";
				$result = mysql_query($qry);
				$rws = mysql_num_rows($result);
					if ($rws>0) {
						echo "User already exists!";
					}
					else{
						$sql = "CREATE TABLE temp_tab ( temp_fname VARCHAR(255) NOT NULL , temp_lname VARCHAR(255) NOT NULL , temp_con VARCHAR(255) NOT NULL , temp_email VARCHAR(255) NOT NULL , temp_pwd VARCHAR(255) NOT NULL )";
						mysql_query($sql);
						$sql = "INSERT INTO temp_tab VALUES('$fname','$lname','$con','$email','$pass')";
						mysql_query($sql);
						$_SESSION['temp_mail'] = $email;
						header('Location: auth.php');
					}
			}
			echo "Registration Successful :)";
		}

		else{

			echo "Passwords don't match!";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="verify.js" type="text/javascript"></script>
</head>
<body>
	<div id="regwrapper">
		<div id="header">
			<ul>
				<li><a href="#">HOME</a></li>
				<li><a href="#">NEW ARRIVALS</a></li>
				<li><a href="#">ONLINE BOOKS</a></li>
				<li><a href="#">E-GALLERY</a></li>
				<li><a href="#">QUESTION PAPERS</a></li>
			</ul>
		</div>
		<div id="content">
				<img src="../img/useradd.png">
				<form action="" method="POST" onsubmit="return validate() ">
					<table align="center">
						<tr>
							<td>
								<input type="text" name="fname" id="fname"  placeholder="First Name" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="lname" id="lname" placeholder="Last Name" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="con" id="con" placeholder="10-digit Mobile Number" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="email" id="email" placeholder="Email" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="password" name="password" id="pass" placeholder="Password" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="password" name="password2" id="pass" placeholder="Confirm Password" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="regBtn" value="REGISTER" class="regBtn">
							</td>
						</tr>
					</table>
					<p>Already have an account? <a href="login.php">Log In!</a></p>
				</form>
		</div>
	</div>
</body>
</html>