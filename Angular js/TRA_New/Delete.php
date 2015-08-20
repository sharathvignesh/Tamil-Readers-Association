<?php include 'database.php'; ?>
 
<?php
 
// create a variable

$id_=$_POST['id1'];
$first_name=$_POST['fnd2'];


//Execute the query
 
 
mysqli_query($connect,"Delete from trausers where id=$id_ or first_name=\"$first_name\"");

                
    if(mysqli_affected_rows($connect) > 0){
    echo "<p>Congrats Record Deleted!!</p>";
   echo '<a href="admin/index.php">go back!</a>';

} else {
    echo "Sorry Record Not deleted<br />";
    echo mysqli_error ($connect);
}

