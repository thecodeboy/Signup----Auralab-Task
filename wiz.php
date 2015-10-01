<?php
require 'db.php';



#Form Verification
if(!isset($_POST['name']) ||
        !isset($_POST['user']) ||
        !isset($_POST['email']) ||
        !isset($_POST['pass'])) {
        died('Oops! Some fields are missing.');       
    }

function NewUser()
{
	$fullname = $_POST['name'];
	$userName = $_POST['user'];
	$email = $_POST['email'];
	$password =  $_POST['pass'];
	$query = "INSERT INTO databank (fullname,userName,email,pass) VALUES ('$fullname','$userName','$email','$password')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	}
}


$db = new Db();
$query=("SELECT * FROM databank WHERE userName = '$_POST[user]' AND pass = '$_POST[pass]'" or die(mysql_error()));


function SignUp()
{
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = $mysqli->query($query);
	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		newuser();
	}
	else
	{
		echo "Hey there! You already have an account.";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>