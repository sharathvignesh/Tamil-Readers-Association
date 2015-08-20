<?php
session_start();

require('smartyHeader.php');
require('database.php');

//if the role variable is set, an admin is being created or else its a normal user
if(!isset($_SESSION["role"]))
    $role = "user";
else
    $role = "admin";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$address = $_POST["address"];
$phone = $_POST["phone"];


$insert = "insert into trausers (username,firstname,lastname,email,password,role,address,phone)
values ('$username','$firstname','$lastname','$email','$password','$role','$address','$phone')";

if (mysqli_query($mysqli, $insert)) {
    echo "Registration Successful\n";
    echo "click <a href=\"index.php\">here</a> to login";
} else {
    echo "Please enter a valid username<br>";
    echo "click <a href=\"signup.php\">here</a> to go back";
}

?>
