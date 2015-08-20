<?php
include("Config.php");

function isSessionExpired(){

	if ((isset($_SESSION['LAST_ACTIVITY'])) && (PRESENT_TIME - $_SESSION['LAST_ACTIVITY'] > SESSION_TIMEOUT)) {
		if( (isset($_SESSION['adminUsername'])) || (isset($_SESSION['adminPassword'])) ){
			unset($_SESSION['adminUsername']);
			unset($_SESSION['adminPassword']);
			unset($_SESSION['LAST_ACTIVITY']);
			return true;	//session expired
		}
	}else {
		$_SESSION['LAST_ACTIVITY'] = PRESENT_TIME;        //captures present time
		return false;
	}
}

function isRestCall(){
	if(((isset($_REQUEST['requestType'])) && ($_REQUEST['requestType'] == 'RESTAPI')) ) {
		return true; //called by RESTAPI
	} else {
		return false;
	}
}

function invalidAckIfExpired(){
	if (isSessionExpired() && !isRestCall() ){
		userAcknowledgement("Your session has expired","login.php");
	} 
}

function userAcknowledgement($message,$redirect)
{
	//$dbName = $_REQUEST['dbName'];
	//echo "<script> alert('$message'); window.location = '$redirect?dbName=$dbName'; </script>";
	echo "<script> alert('$message'); window.location = '$redirect'; </script>";
}

function usernameHasInvalidCharacter($name) {
    return  preg_match('/[^a-z0-9]/', $name);
}

// verify that the two copies of the entered password match
function javascriptVerifyPasswordInputsMatch(){
	Print "<script>
		function verifyPasswordInputsMatch()
		{
			if(document.getElementById('password').value != document.getElementById('verifyPassword').value) {
				alert('Password mismatch');
				document.getElementById('password').value = '';
				document.getElementById('verifyPassword').value = '';
			}
		}
	</script>";
}

function getRoleForUserName($name)
{
 // TODO need to connected with database
	if( $name == 'admin' ) {
		
			return 'admin';
		}
		else if( $name == 'manager' ) {

			return 'manager';
		}
		else
			return 'user';
}

?>