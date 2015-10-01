<?php
if(isset($_POST['submit']))
{
	//Connecting to MySQL Database
	$con = mysqli_connect("localhost","root","","user");
	//Checking if connection successful
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	//To check if all fields are filled
    if(!isset($_POST['name']) ||
        !isset($_POST['user']) ||
        !isset($_POST['email']) ||
        !isset($_POST['pass']) ||
		!isset($_POST['cpass'])){
        died('Hey there! Your form is incomplete.');       
    }
	//Saving variables
	$fullName = $_POST['name'];
	$userName = $_POST['user'];
	$email = $_POST['email'];
	$password =  $_POST['pass'];
	$cpassword = $_POST['cpass'];
	$error_message="ERROR: ";
	
	//To check if passwords match
	if($password != $cpassword){
		$error_message.="PASSWORDS DO NOT MATCH.";
		echo $error_message;
	}
	
	//Form Verification
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	if(!preg_match($email_exp,$email)) {
		$error_message .= 'Invalid Email ID<br />';
		echo $error_message;
	}
    $string_exp = "/^[A-Za-z .'-]+$/";
	if(!preg_match($string_exp,$fullName)) {
		$error_message .= 'Wrong Name<br />';
		echo $error_message;
	}
  
  $user=" ===== ";
  $user.="   Name: ".$fullName;
  $user.="   Username: ".$userName;
  $user.="   Email: ".$email;
  $user.="   Password: ".$password;
	
	
	if($error_message == "ERROR: ")
  {
	//Opening, Saving, Closing Text File
    #$file = fopen("data.txt","a+");
    #fwrite($file,$user);
    #fclose($file);
	
	
	//MySQL Queries and other stuff
	
	$query = "INSERT INTO userdata (name,email,user,pass) VALUES ('$fullName','$email','$userName','$password')";
	
	$data= mysqli_query($con,$query);
	if($data)
	{
		echo "REGISTRATION SUCCESSFUL";
	}
	else
	{
		echo "REGISTRATION UNSUCCESSFUL";
	}
  }
	//Closing database connection
	mysqli_close($con);
}
?>