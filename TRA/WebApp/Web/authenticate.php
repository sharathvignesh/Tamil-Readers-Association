<?php
session_start();
require('database.php');

if(isset($_SESSION["signInError"])){
    unset($_SESSION["signInError"]);
}

$role = "";
$_SESSION["username"] = $_POST["username"];
$username = $_POST["username"];
$password = $_POST["password"];

$result = $mysqli->query("select * from trausers"); 
$check = false;

while($row = $result->fetch_array()){
    if($row["username"] == $username){
        if($row["password"] == $password){
            $_SESSION["role"] = $row["role"];
            $check = true;
            break;
            //now $row contains the logged in username
        }//password check if
    }//username check if 
}//while

if($check == true){
    //remember me
    if (isset($_POST['remember']) && $_POST["remember"] == 'on'){
        setcookie("username",$username,time()+(60*60*1));
        setcookie("password",$password,time()+(60*60*1));
    }
    echo ($_POST["remember"]);
    
    
    if($_SESSION["role"] == "admin"){
        header("Location: admin.php");
    }else{
        header("Location: user.php");
    }
}else {
    $_SESSION["signInError"] = true;
    header("Location: index.php");
}
    

    
    
