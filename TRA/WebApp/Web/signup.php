<?php
session_start();
require('smartyHeader.php');


//if role session variable is set, it means that the admin has logged in already. therefore the user that is gonna be created is an admin user

if(isset($_SESSION["role"]))
$smarty->assign('role', "Admin");
else
$smarty->assign('role', "User");

$smarty->display('registration.tpl');
?>