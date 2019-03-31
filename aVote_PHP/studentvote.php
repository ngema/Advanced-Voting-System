
<?php
		require_once("connection.php");

	/*	if(isset($_POST['submitform']))
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

		}*/

?>


<!DOCTYPE html>
<html>
<head>
	<title>File Upload to Database</title>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



</head>
<body>


		<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Candidate</th>
			      <th scope="col">Picture</th>
			      <th scope="col">Position</th>

			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
							$i=1;
							$sql="select * from `tbl_images`";
							$qry=mysqli_query($con,$sql);

							while($row=mysqli_fetch_assoc($qry))
							{

					?>
				 <form>
			    <tr>
			      <th scope="row"><?php echo $i; ?> </th>
			      <td>Mark</td>
			      <td><img src="upload/<?php echo $row['image'];?>" width="100" height="100" alt="nothing" ></td>
			      <td>@mdo</td>
			      
			       <td><input type="radio" name="vote" required></td>
			      
			    </tr>

				<?php
				 			$i++;
				 		}
				 ?>
				 
			   </form>
			  </tbody>
			</table>
			


		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
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

