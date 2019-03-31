
<?php
		require_once("connection.php");

		if(isset($_POST['submitform']))
		{
			$dir="upload/";
			$image=$_FILES['uploadfile']['name'];
			$temp_name=$_FILES['uploadfile']['tmp_name'];

			if($image!="")
			{
				if(file_exists($dir.$image))
				{
					$image= time().'_'.$image;
				}

				$fdir= $dir.$image;
				move_uploaded_file($temp_name, $fdir);
			}

				$query="insert IGNORE into `tbl_images` (`id`,`image`) values ('','$image')";
				mysqli_query($con,$query) or die(mysqli_error($con));
				header('Location:profile.html');
				$done=1;
				//echo "File Uploaded Sucessfully ";

		}

?>


<!DOCTYPE html>
<html>
<head>
	<title>File Upload to Database</title>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Add icon library -->
	<link rel="stylesheet" type="text/css" href="profile.css">

</head>
<body>
	

			<div>
						<h1>File Upload with PHP and MySQLI</h1>

						<form action="index.php" method="post" enctype="multipart/form-data">
							
							Upload Images/File : <input type="file" name="uploadfile" id="uploadfile">

						   </br>
						   
						    <button id="submitform" type="submit" name="submitform">Upload</button>
						</form>
			</div>


			<div>
					<h2>Show All Upload Images</h2>

					<table border="1" cellpadding="2" cellspacing="0">
							<tr>
									<th>Sr.NO</th>
									<th>Name</th>
							</tr>
					<?php 
							$i=1;
							$sql="select * from `tbl_images`";
							$qry=mysqli_query($con,$sql);

							while($row=mysqli_fetch_assoc($qry))
							{

					?>
							<tr>
									<td><?php  echo $i;?></td>
									<td><img src="upload/<?php echo $row['image'];?>" width="100" height="100" alt="nothing" ></td>
									

							</tr>
				 <?php
				 			$i++;
				 		}
				 ?>
					</table>
			</div>
 
</body>

<script>
	$(document).ready(function(){
		$('#submitform').click(function(){ //use id
			var image_name=$('#uploadfile').val();
			if(image_name=='')
			{
				alert("PLease Select image");
				return false;
			}
			else
			{
				var extension=$('#uploadfile').val().split('.').pop().toLowerCase();
				if(jQuery.inArray(extension,['gif','png','jpg','jpeg']) == -1)
				{
					alert('invalid image file');
					$('#uploadfile').val('');
					return false;
				}
			}
		})
	});
</script>
</html>

