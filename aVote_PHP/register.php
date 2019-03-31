<?php
	//echo phpinfo();
	if(isset($_POST['submit'])){
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		//$dbname = "passwordhashing";
        $dbname = "avote";
		// Create connection
		$con =mysqli_connect( $host, $dbusername, $dbpassword, $dbname);


        $username = $con->real_escape_string($_POST['username']);
        $email = $con->real_escape_string( $_POST['email']);
        $password = $con->real_escape_string($_POST['password']);
        $cPassword = $con->real_escape_string($_POST['cPassword']);
        $campus= $con->real_escape_string($_POST['campus']);
        $phonenumber = $con->real_escape_string($_POST['phonenumber']);
        $gender = $con->real_escape_string($_POST['gender']);
        $idnumber = $con->real_escape_string($_POST['idnumber']);
        $image='';
        if (mysqli_connect_errno()){
            echo "error";
        }
        else{
		
		if($password != $cPassword){
            
            echo "Password do not match";}
		else {
			$hash=password_hash($password,PASSWORD_BCRYPT);
			
        $sql="INSERT INTO authentication(username,email,campus,phonenumber,gender,idnumber,password) VALUES ('$username','$email','$campus','$phonenumber','$gender','$idnumber','$hash')";
             if(mysqli_query($con,$sql)){
                echo "updated";
                header('Location:login.html');
             }
             else{
                echo "ERROR".mysqli_error($con);
             }
		}	
    }
}
?>