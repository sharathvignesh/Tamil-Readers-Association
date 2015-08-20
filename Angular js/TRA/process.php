<?php include 'database.php'; ?>
 
<?php
 
// create a variable
$first_name=$_POST['fnd'];
$last_name=$_POST['lnd'];
$role=$_POST['rol'];
$password=$_POST['pwd'];
$email=$_POST['email'];
$phone=$_POST['cnt'];

//Execute the query
 
 
mysqli_query($connect,"INSERT INTO trausers (first_name,last_name,email,password,role,phone)
                VALUES ('$first_name','$last_name','$email','$password','$role','$phone')");
                
    if(mysqli_affected_rows($connect) > 0){
    echo "<p>Employee Added</p>";
   
} else {
    echo "Employee NOT Added<br />";
    echo mysqli_error ($connect);
}

