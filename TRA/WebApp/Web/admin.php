<?php
session_start();

require('./smartyHeader.php');

$mysqli = new mysqli("127.0.0.1","root","","tra",3306);
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }//mysqli if

$smarty->assign('username',$_SESSION["username"]);        

//retrieving all the admins
$result = $mysqli->query("select * from trausers where role=\"admin\"");
$admin = array();
while($row = mysqli_fetch_assoc($result)){
    $admin[] = $row;
}
$smarty->assign('admin',$admin);

//retrieving all the normal users
$result = $mysqli->query("select * from trausers where role=\"user\"");
$user = array();
while($row = mysqli_fetch_assoc($result)){
    $user[] = $row;
}
$smarty->assign('user',$user);

$smarty->display('admin_dashboard.tpl');
?>