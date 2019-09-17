<?php 
error_reporting(0);
session_start();
if($_SESSION['admin']){
	echo "<script> window.open('dashboard.php','_self'); </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		:: ID-CARD GENERATION ::
	</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="utf-8">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="../styles/css/bootstrap.min.css">
	<script src="../styles/js/jquery.js"></script>
	<script src="../styles/js/bootstrap.min.js"></script>
</head>
<body>
	<header class="bg-danger text-light header" style="width:100%; padding:1%">
		ADMIN
	</header>
	<div class="col-md-4 offset-4">
		<!-- <div class="alert alert-success"> </div> -->
		<div class="card" style="box-shadow:0px 8px 8px -8px #000; margin:2% 0">
			<div class="card-header bg-danger text-light text-center"> REGISTER </div>
			<div class="card-body">
				<form method="post" action="" enctype="multipart/form-data">
					<input type="email" name="email" class="form-control" placeholder="E-MAIL" required> <br>
					<input type="password" name="password" class="form-control" placeholder="PASSWORD"> <br>
					<input type="submit" name="submit" class="btn btn-danger btn-block" value="REGISTER">
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
include('../config.php');
extract($_POST);
extract($_GET);
if(isset($submit)){
	$check=mysqli_query($conn,"SELECT * FROM `admin` WHERE email='$email' AND `password`='$password'");
	if(mysqli_num_rows($check)==1){
		$_SESSION['admin']=$email;
		echo "<script> window.open('dashboard.php','_self'); </script>";
	} else {
		echo "SELECT * FROM `admin` WHERE email='$email' AND `password`='$password'";
	}
}
?>