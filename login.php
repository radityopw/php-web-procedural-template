<?php 
require_once 'prepare.php';
session_start();
require_once 'config.php';
require_once 'util.php';

if($_SESSION[config_get_session_key()]){
	header('location: backend/');
	exit;
}


$pesan = "SILAKAN LOGIN UAS TEKNOLOGI BIG DATA 20241";

if(isset($_POST['username'])){
	// proses login
	$username = strtolower(trim($_POST['username']));
	$password = md5(strtolower(trim($_POST['password'])));

	$data = util_get_user($username);
	
	if($data){

		if($password == $data['password']){

			$_SESSION[config_get_session_key()] = $username;
			
			header("location: backend/");

			exit;
		}

	}

	$pesan = "USERNAME / PASSWORD SALAH!";
}

?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
	</head>
	<body>
		<p class="notice"><?=$pesan?></p>
		<br />
		<form action="login.php" method="POST">
			<div>
				<label>username</label>
				<input type="text" name="username" />
			</div>
			<div>
				<label>password</label>
				<input type="password" name="password" />
			</div>
			<div>
				<input type="submit" value="login" />
			</div>
		</form>
	</body>
</html>
