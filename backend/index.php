<?php
require_once 'require-generic.php';

$pesan = false;
$halaman = false;
$halaman_header = false;
$halaman_isi = false;
$halaman_footer = false;


if(isset($_REQUEST['hal'])){
	$halaman = trim(strtolower($_REQUEST['hal']));
	if(!file_exists($halaman."-body.php")) $halaman = false;
}

if($halaman){
	$halaman_header = $halaman."-header.php";
	$halaman_isi = $halaman."-body.php";
	$halaman_footer = $halaman."-footer.php";
}

if($halaman_header) require $halaman_header;
?>
<html>
	<head>
		<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
		<title>Title</title>
	</head>
	<body>
		<header>
			<nav>
				<a href="?hal=ganti-password">Ganti Password</a>
				<a href="../logout.php">Logout</a>
			</nav>
		</header>
		<article>
			<?php if($pesan){ ?><p class="notice"><?=$pesan?></p><?php } ?>
			<?php if($halaman_isi) require $halaman_isi; ?>			
		</article>
	</body>
</html>
<?php 
if($halaman_footer) require $halaman_footer;
