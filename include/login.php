<?php 
	include('dbconn.php');
	if (isset($_REQUEST['logBtn']) || (isset($_COOKIE['uname']) && isset($_COOKIE['upass']))) {
		$email = $_REQUEST['email'];
		$pass = md5($_REQUEST['password']);
		if(isset($_REQUEST['rem']) && $_REQUEST['rem']==1){
			setcookie('uname',$email,time()+60*60*24*30);
			setcookie('upass',$pass,time()+60*60*24*30);
		}
		if(isset($_COOKIE['uname']) && isset($_COOKIE['upass'])){
			$email = $_COOKIE['uname'];
			$pass = $_COOKIE['upass'];
		}
		$checkuser = "SELECT users_email, users_pwd from admin_tab WHERE users_email = '$email' AND users_pwd = '$pass' ";
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
			$qry = "SELECT users_email,users_pwd FROM users_tab WHERE users_email = '$email' AND users_pwd = '$pass' ";
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
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="logwrapper">
		<div id="header">
			<ul>
				<li><a href="#">HOME</a></li>
				<li><a href="#">NEW ARRIVALS</a></li>
				<li><a href="#">ONLINE BOOKS</a></li>
				<li><a href="#">E-GALLERY</a></li>
				<li><a href="#">QUESTION PAPERS</a></li>
			</ul>
		</div>
		<div id="logcontent">
				<img src="../img/useradd.png">
				<form action="" method="POST">
					<table align="center">
						<tr>
							<td>
								<input type="text" name="email" placeholder="Username" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="password" name="password" placeholder="Password" required>
							</td>
						</tr>
						<tr>
							<td align="center"><input type="checkbox" name="rem" value="1"><b><u>Remember Me</u></b></td>
						</tr>
						<tr>
							<td>
								<input type="submit" name="logBtn" value="LOGIN" class="logBtn">
							</td>
						</tr>
					</table>
					<p><a href="forgotpass.php" target="_blank">Forgot Password?</a><br />
					<span>or <a href="register.php"><u>Click here</u></a> to <b>Register</b></span>
					</p>
				</form>
		</div>
	</div>
</body>
</html>