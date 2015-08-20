<?php
//include("../WebApp/utilFunctions.php");
// a generic database query that returns an array of results
// each row of the results can be fetched using fetchNextRow

function runQuery($dbServer, $dbServerPort, $dbUserName, $dbUserPassword, $dbName, $query, $parameters){

    //error_log( 'runQuery: Query input '. $query );

	$result = null;
	$dbConnection = null;

	$dataSourceName = DB_TYPE . ":";
	if(DB_TYPE == MSSQL){ // MSSQL sqlsrv driver requires a different DSN string
		$dataSourceName .= "Server=" . $dbServer; 
		if($dbServerPort != null)
			$dataSourceName .= "," . $dbServerPort;
		$dataSourceName .= ";Database=" . $dbName;
	}
	else{
		$dataSourceName .= "host=" . $dbServer; 
		if($dbServerPort != null)
			$dataSourceName .= ";port=" . $dbServerPort;
		$dataSourceName .= ";dbname=" . $dbName;
	}
	//echo $dataSourceName."<BR/>";
	try{ // consider using a persistent connection to reduce overhead
		$dbConnection = new PDO($dataSourceName, $dbUserName, $dbUserPassword);
	}
	catch (PDOException $e){
		//die(ERROR_MARKER . " " . $e->getMessage() . "<br/>");
		echo ERROR_MARKER . " " . $e->getMessage() . "<br/>";
		return;
	}
	
	$statement = $dbConnection->prepare($query);
	$statement->execute($parameters);

	$lastIndexId = $dbConnection -> lastInsertId(); //getting Last ID

	if($statement->errorCode() != "00000"){ // 00000 is SQL success code
	
		$errorArray = $statement->errorInfo();
		global $dieString;
		$dieString = ERROR_MARKER . " Query Failed - " . $query . "<br/>";
		// index 0 is SQL code, 1 is driver code, 2 is error message
		if($errorArray[2] != null)
			$dieString .= $errorArray[2];
		if(DUMP_ARRAYS_ON_ERROR)
			$dieString .= "<br/>" . implode(", ", $parameters);
		$dieString .= "<br/>";
		//die($dieString);
		echo $dieString;
		$statement = "queryFailed";
		//return "queryFailed";
	}
	//unset($dbConnection);	
	return array("statement" => $statement, "lastIndexId" => $lastIndexId);
	//return $statement;
}
function getError(){
global $dieString;
		return $dieString;
		}
function numAffectedRows($result){
	$num = $result->rowCount();
	return $num;
}

function affectedRowsXML($result){
	$num = numAffectedRows($result);
	$s = '<?xml version="1.0" encoding="iso-8859-1"?>'
		."<data>"
		. $num
		."</data>";
	return $s;
}
	
function fetchNextRow($result){
	$row = $result->fetch(PDO::FETCH_ASSOC);
	return $row;
}

// This is a temporary fix to make queries safer for unknown inputs
// TODO The long term fix should be to use prepared statements. 
function escapeInputForSafety($inputString){
	$outputString = null;
	if (DB_TYPE == MYSQL){
		$outputString = mysql_real_escape_string($inputString);
	}
	elseif (DB_TYPE == MSSQL){
		$outputString = $inputString; // MSSQL does not have a function
	}
	elseif (DB_TYPE == POSTGRESQL){
		$outputString = pg_escape_string($inputString);
	}
	return $outputString;
}

// MYSQL and MSSQL require dates in different formats
function dateString($d){
	$s = null;
	if (DB_TYPE == MYSQL){
		$s = $d;
	}
	elseif (DB_TYPE == MSSQL){ // PDO does not require the different date format
		$s = $d; //$d->format('Y-m-d H:i:s');
	}
	elseif (DB_TYPE == POSTGRESQL){
		$s = $d;
	}
	return $s;
}

// take the results of the database query and produce a string version of the results
// each row is parsed using the passed rowParseFunction, which separates fields using FIELD_DELIMITER
// each row is separated using RECORD_DELIMITER
function resultsToString($result, $rowParseFunction){
	$cumulativeResults = "";
	$counter = 0;
	
	$row = fetchNextRow($result);
	if($row == null){
		return "";
	}
	else{
		do{
			//print_r($row);
			$singleRecordString = $rowParseFunction($row);
			if ($counter > 0) 
				$cumulativeResults .= RECORD_DELIMITER;
			$cumulativeResults .= $singleRecordString;
			$counter++;

			$row = fetchNextRow($result);
		} while ($row);
		return $cumulativeResults;
	}
}

// the results of a query come back in an associative array of (key, value) pairs
// key is variable name, value is for this variable name
// PostgreSQL flattens all names to lower case by default, 
// so we need a wrapper to retrieve without rewriting all queries to be case sensitive
function getValue($row, $variableName){
	$retrievalKey = (DB_TYPE == POSTGRESQL) ? strtolower($variableName) : $variableName;
	try{
		$rawValue = $row[$retrievalKey];
	}
	catch(Exception $e){
		echo "Row  " . $row;
		echo "Variable/RetrievalKey " . $retrievalKey;
		echo $e->getMessage();
		return;
	}
	//$cleanerValue = escapeInputForSafety($rawValue);
	return $rawValue;
}

?>