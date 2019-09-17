<?php
include('config.php');
extract($_POST);
extract($_GET);
if(isset($email)){
$preview=mysqli_query($conn,"SELECT * FROM `users` WHERE email='$email'");
while($row=mysqli_fetch_array($preview)){
	?>
	<div class="col-md-10 offset-1"> 
<div class="card" style="box-shadow: 0px 8px 8px -8px #000">
	<!-- <div class="card-header bg-info text-light text-center"> <?php echo $row['name']; ?></div> -->
	<div class="card-body">
		<img src="<?php echo $row['image']; ?>" class="img-responsive" style="width:200px; height:200px; display:block; margin:0 auto"> <br>
		<center>
		<table>
			<tr> <td> Name: </td> <td> <?php echo $row['name']; ?></td> </tr>
			<tr> <td> Email: </td> <td> <?php echo $row['email']; ?></td> </tr>
			<tr> <td> Mobile: </td> <td> <?php echo $row['mobile']; ?></td> </tr>
			<tr> <td> Address: </td> <td> <?php echo $row['address']; ?></td> </tr>

		</table>
		</center>
	</div>
</div>
</div>
	<?php
}
}
?>