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
	<div class="col-md-6 offset-3" style="margin-top:3%; box-shadow: 0px 8px 8px -8px #000">
		<div class="table-responsive">
	<table class="table table-striped table-bordered">
		<thead class="bg-info text-light">
		<tr>
			<th> Name </th>
			<th> Email </th>
			<th> </th>
		</tr>
		</thead>
		<tbody>
			<?php
			include('../config.php');
			$getData=mysqli_query($conn,"SELECT * FROM `users`");
			while($row=mysqli_fetch_array($getData)){
				$email=$row['email'];
				?>
				<tr>
					<td> <?php echo $row['name']; ?> </td>
					<td> <?php echo $row['email']; ?> </td>
					<?php 
					echo "<td><button id='butinfo_".$email."' class='btn btn-info btn-sm'>PREVIEW</button>"; 
					?>
					<!-- <td> <button class="btn btn-info btn-sm" value="<?php echo $row['email']; ?>" id='butinfo_".$email."'> PREVIEW </button> -->
<button class="btn btn-warning btn-sm" value="<?php echo $row['email']; ?>" id="button" onclick="getdata();"> GENERATE </button>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	</div>
	</div>	
	<!-- Modal -->
   <div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog">
 
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Info</h4>
      </div>
      <div class="modal-body">
 
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
     </div>
    </div>
   </div>
</body>
</html>

<script>
	$(document).ready(function(){
		$('.btn-info').click(function(){
			var id=this.id;
			 var splitid = id.split('_');
   var userid = splitid[1];
   $.ajax({
    url: '../front.php',
    type: 'post',
    data: {email: userid},
    success: function(response){ 
      $('.modal-body').html(response);
      $('#empModal').modal('show'); 
    }
  });
})
})
	// function getdata(){
	// 	var email=$("#button").val();
	// 	$.ajax({
	// 	type:"POST",
	// 	url:"../front.php",
	// 	crossDomain: true,
	// 	data:{email:email},
	// 	success:function(item){
	// 		console.log(item);
	// 		// $('.modal-body').html(item);

 //   //    // Display Modal
 //   //    $('#empModal').modal('show'); 
	// 	}
	// 	})
	// }
</script>


<!-- https://makitweb.com/dynamically-load-content-in-bootstrap-modal-with-ajax/ -->