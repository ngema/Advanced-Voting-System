<?php
	//echo phpinfo();
    //echo " hi";
	session_start();
	if(isset($_POST['submit'])){
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "avote";

        
		// Create connection
		$con= mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        $name = $con->real_escape_string($_POST['username']);
        $password = $con->real_escape_string($_POST['password']);
		$_SESSION['username']=$name; //capturing a section variable

        if (! $con){
            echo "Connected failure";
        }
		
        else{
			
        $sql= "SELECT id,password FROM authentication WHERE username='$name'";
		$result=mysqli_query($con,$sql);
		
		if (mysqli_num_rows($result)>0)
		{
			$data = mysqli_fetch_assoc($result); // store id and password
			//echo $data['password'];
	    if(password_verify($password,$data['password'])){
            echo "success";
			
            header('Location:studentprofile.php'); // redirect the user to studentprofile page
			exit();
        }
		else{
			echo "password incorrect";
            header('Location:login.html');
		}
		}
	}
	}
       
?>
