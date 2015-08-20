<?php
session_start();

require('./smartyHeader.php');

//Invalid login
if(isset($_SESSION["signInError"]))
    $smarty->assign('error',"Invalid Login details");
else
    $smarty->assign('error',"");

//after logging out the error shouldn't be displayed
unset($_SESSION["signInError"]);

//Remember me
if(isset($_COOKIE["username"]))
    $smarty->assign('username',$_COOKIE["username"]);
else
    $smarty->assign('username',"");

if(isset($_COOKIE["password"]))
    $smarty->assign('password',$_COOKIE["password"]);
else
    $smarty->assign('password',"");

//this section gets executed when the cancel button of the registration form is clicked. if role is set then it must be an admin and therefore direct to admin.php 
if(!isset($_SESSION["role"]))
    $smarty->display('main.tpl');
else
    header("Location: admin.php");
    
?>