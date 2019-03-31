
<?php
		session_start();
		$username=$_SESSION['username'];
		
		$con=mysqli_connect("localhost","root", "","avote");

?>


<!DOCTYPE html>
<html>
<head>
	<title>File Upload to Database</title>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="profile.css">

	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



</head>
<body>

			<div class="container">
					

				<div class="row">
						  <div class="col-sm-8">	
					<?php 
							$i=1;
							$sql="select * from `authentication`";
							$qry=mysqli_query($con,$sql);

							while($row=mysqli_fetch_assoc($qry))
							{
								if ($username==$row['username']){

					?>

						
								<div class="card">
									
									  <h1><?php  echo $row['username'];?></h1>
									  <p class="title">User Details </p>
									  <p class="card-content"><?php  echo $row['email'];?></p>
									  <p class="card-content"><?php  echo $row['campus'];?> </p>
									  <p class="card-content"><?php  echo $row['phonenumber'];?> </p>
									  <p class="card-content"><?php  echo $row['gender'];?></p>
									  <p class="card-content"><?php  echo $row['idnumber'];?> </p>
									  <p>University of KwaZulu-Natal</p>
									  
									  <p><button>Help Center</button></p>
								</div>
	

					<?php
								}
				 			$i++;
				 		}
					?>
					</div>

					 <div class="col-sm-4">
						    <div class="card">
						      <div class="card-body">
						        <h5 class="card-title">Terms and Conditions</h5>

						        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						        <p class="card-text">
						        <form novalidate>
						        <div class="form-group">
								    <div class="form-check">
								      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
								      <label class="form-check-label" for="invalidCheck">
								        Agree to terms and conditions
								      </label>
								      <div class="invalid-feedback">
								        You must agree before submitting.
								      </div>
								    </div>
								  </div>
								   <a href="studentvote.php" class="btn btn-primary" type="submit">Vote</a>
								<!-- <a href="studentvote.php"> <button class="btn btn-primary" type="submit">Submit form</button> </a> -->
							    </form>
								</p>
						      
						      </div>
						    </div>
						 </div>
					</div>
					
			</div>

		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 
</body>

</html>

