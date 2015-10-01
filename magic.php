<?php
if(isset($_POST['Submit'])) {
     
    //Opening, Saving, Closing Text File
    $file = fopen("databank.txt","a+");
    fwrite($file,$user);
    fclose($file);
     
    function died($error) {
        //Error Code
        echo "Oops! There were errors in your form.";
        echo $error."<br /><br />";
        die();
    }
     
    //To check if all fields are filled
    if(!isset($_POST['name']) ||
        !isset($_POST['user']) ||
        !isset($_POST['email']) ||
        !isset($_POST['pass'])) {
        died('Hey there! Your form is incomplete.');       
    }
     
    $fullname = $_POST['name'];
	$userName = $_POST['user'];
	$email = $_POST['email'];
	$password =  $_POST['pass'];
    $error_message = "Oops! Error 911";
	
	//Form Verification
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'Wrong email<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$fullname)) {
    $error_message .= 'Wrong name<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $user = "##############################";
     
    
     
    $user .= "Name: ".($fullname)."\n";
    $user .= "Username: ".($userName)."\n";
    $user .= "Email: ".($email)."\n";
    $user .= "Password: ".($password)."\n";
?>
Registration Successful
<?php
}
die();
?>