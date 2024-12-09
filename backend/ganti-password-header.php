<?php 

if(isset($_POST['act']) && $_POST['act'] == "ganti-password"){

	$password_baru_plain = strtolower(trim($_POST['password-baru']));

	$password_baru = md5($password_baru_plain);
	$password_baru_konfirmasi = md5(strtolower(trim($_POST['password-baru-konfirmasi'])));

	if(!empty($password_baru_plain) && $password_baru == $password_baru_konfirmasi){

		$data_user = util_get_user(config_get_username());

		$data_user['password'] = $password_baru;
		$data_user['perlu-ganti-pass'] = 0;

		util_set_user(config_get_username(),$data_user);

		header('location: ../logout.php');
		exit;
	}

	$pesan = "PASSWORD TIDAK DAPAT DIGANTI, PASTIKAN TIDAK KOSONG SERTA KONFIRMASI PASSWORD BENAR";
}
