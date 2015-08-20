<?php
    //Create Database connection
    $db = mysql_connect("localhost","root","");
    if (!$db) {
        die('Could not connect to db: ' . mysql_error());
    }
 
    //Select the Database
    mysql_select_db("tra",$db);
    
    //Replace * in the query with the column names.
    $result = mysql_query("select * from trausers", $db);  
    
    //Create an array
    $json_response = array();
    
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $row_array['id'] = $row['id'];
        $row_array['first_name'] = $row['first_name'];
        $row_array['last_name'] = $row['last_name'];
        $row_array['role'] = $row['role'];
        $row_array['phone'] = $row['phone'];
        $row_array['email'] = $row['email'];
        
        //push the values in the array
        array_push($json_response,$row_array);
    }
    echo json_encode($json_response);
    
    //Close the database connection
   mysql_close($db);
 
?>