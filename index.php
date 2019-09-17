<!DOCTYPE html>
<html>
<head>
	<title>
		:: ID-CARD GENERATION ::
	</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="utf-8">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="styles/css/bootstrap.min.css">
	<script src="styles/js/jquery.js"></script>
	<script src="styles/js/bootstrap.min.js"></script>
</head>
<body>
	<header class="bg-info text-light header" style="width:100%; padding:1%">
		STUDENT DETAILS
	</header>
	<div class="col-md-4 offset-4">
		<!-- <div class="alert alert-success"> </div> -->
		<div class="card" style="box-shadow:0px 8px 8px -8px #000; margin:2% 0">
			<div class="card-header bg-info text-light text-center"> REGISTER </div>
			<div class="card-body">
				<form method="post" action="" enctype="multipart/form-data">
					<input type="text" id="name" name="name" class="form-control" placeholder="NAME" required> <br>
					<input type="email" name="email" class="form-control" placeholder="E-MAIL" required> <br>
					<input type="file" name="image" class="form-control" required> <br>
					<input type="mobile" name="mobile" class="form-control" placeholder="MOBILE" required> <br>
					<textarea class="form-control" name="address" placeholder="ADDRESS" required></textarea> <br>
					<select class="form-control" required name="blood">
						<option> SELECT YOUR BLOOD GROUP </option>
						<option> A+ </option>
						<option> B+</option>
						<option> AB+</option>
						<option> A-</option>
						<option> B- </option>
						<option> AB- </option>
						<option> O+ </option>
						<option> O- </option>
					</select> <br>
					<input type="submit" name="submit" class="btn btn-info btn-block" value="REGISTER">
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<!-- Php -->
<?php
extract($_POST);
extract($_GET);
include('config.php');
if(isset($submit)){

	$target_dir = "upload/";
	
$target_file = $target_dir . basename($_FILES["image"]["name"]);
// Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){

	$image=$_FILES['image']['name'];
	$image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    $insert_data=mysqli_query($conn,"INSERT INTO `users`(`name`, `email`, `image`, `mobile`, `address`) VALUES ('$name','$email','$image','$mobile','$address') ");
    if($insert_data){
    	echo '<script> window.open("success.php","_self"); </script>';
    } else {
    	echo "INSERT INTO `users`(`name`, `email`, `image`, `mobile`, `address`) VALUES ('$name','$email','$image','$mobile','$address') ";
    }
}

// $getData=mysqli_query($conn,"SELECT * FROM `users`");
// while($row=mysqli_fetch_array($getData)){
// 	?>
// 	<img src="<?php echo $row['image']; ?>">
// 	<?php
// }
}


?>