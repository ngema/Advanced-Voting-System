<?php
	//echo phpinfo();
    //echo " hi";
	if(isset($_POST['submit'])){
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "avote";

        
		// Create connection
		$con= mysqli_connect($host, $dbusername, $dbpassword, $dbname);
        $name = $con->real_escape_string($_POST['username']);
        $password = $con->real_escape_string($_POST['password']);


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
            header('Location:about.html');
        }
		else{
			echo "password incorrect";
            header('Location:login.html');
		}
		}
	}
	}
       
?>
