<?php

$mysqli = new mysqli("127.0.0.1","root","","tra",3306);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}//mysqli if

$firstname = $_POST["delFirstname"];
$id = intval($_POST["delId"]);

if($firstname == "") {
    if($mysqli->query("delete from trausers where id = $id" ) === TRUE){
        echo "without firstname<br>";
        echo "User Deleted Successfully<br>";
        echo "click <a href=\"index.php\">here</a> to go to back<br>";
    }
    else {
        echo "Error: " . $mysqli->error;
    }
}
else{
    if($mysqli->query("delete from trausers where id = $id and firstname = '$firstname'") === TRUE) {
        echo "User Deleted Successfully<br>";
        echo "click <a href=\"index.php\">here</a> to go to login page";
    }
    else {
        echo "Error: " . $mysqli->error;
    }
}
    
?>