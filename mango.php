<?php
if(isset($_POST['submit']))
{
	//To check if all fields are filled
    if(!isset($_POST['name']) ||
        !isset($_POST['user']) ||
        !isset($_POST['email']) ||
        !isset($_POST['pass']) ||
		!isset($_POST['cpass'])){
        died('Hey there! Your form is incomplete.');       
    }
	//Saving variables
	$fullname = $_POST['name'];
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
	if(!preg_match($string_exp,$fullname)) {
		$error_message .= 'Wrong Name<br />';
		echo $error_message;
	}
  
  $user=" ===== ";
  $user.="   Name: ".$fullname;
  $user.="   Username: ".$userName;
  $user.="   Email: ".$email;
  $user.="   Password: ".$password;
	
	
	if($error_message == "ERROR: ")
  {
	//Opening, Saving, Closing Text File
    $file = fopen("data.txt","a+");
    fwrite($file,$user);
    fclose($file);
	echo "REGISTERED SUCCESSFULLY";
  }
	
}
?>