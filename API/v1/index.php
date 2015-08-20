<?php
require_once "../include/Config.php";
require "../libs/Slim/Slim.php";
require_once("./common.php");
require_once "../include/query.php";
//require_once "../include/DbHandler.php";


//spl_autoload_register(function ($class_name) {
//      if(strcmp(substr($class_name, -3, -3), "DAO") == 0)
//       {
//    		include '../src/dao/' . $class_name . '.php';
//       }
//});


\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array("debug"=>true));

$user_name = null;
/**
* Checking if the request has valid api key in the "Authorization" header
*/
function authenticate(\Slim\Route $route) {
	
	$headers = apache_request_headers();
	$response = array();
	$app = \Slim\Slim::getInstance();
	
	
	if (isset($headers["Authorization"])) {
		$db = new DbHandler();
		
		$api_key = $headers["Authorization"];
		
		$user = $db->isValidApiKey($api_key);
		
		if ($user == null) {
			
			$response["error"] = true;
			$response["message"] = "Access Denied. Invalid Api key";
			echoResponse(FAILURE_CODE,  $response);
			$app->stop();
		} else {      
			global $user_name;
			$user_name = $user;
			
		}
	} else {
		$response["error"] = true;
		$response["message"] = "Api key is misssing";
		echoResponse(404,  $response);
		$app->stop();
	}
}


//
//	Verifying required params posted or not
//	
function verifyRequiredParams($required_fields) {
	$error  =  false;
	$error_fields = "";
	$request_params = array();
	$request_params = $_REQUEST;
	
	foreach ($required_fields as $field) {
		if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
			$error = true;
			$error_fields .= $field . ",  ";
		}
	}

	if ($error) {
		// Required field(s) are missing or empty
		$response = array();
		$app = \Slim\Slim::getInstance();
		$response["error"] = true;
		$response["message"] = "Required field(s) " . substr($error_fields,  0,  -2) . " is missing or empty";
		echoResponse(SUCCESS_CODE,  $response);
		$app->stop();
	}
}


//
//  Echoing json response to client
//
function handleErrorResponse($response) {
    $errorResponse = array();
  
    if ($response == null) {
        $statusArray = array();     
        $statusArray["statusCode"] = FAILURE_CODE;
        $statusArray["message"] = UNAUTHORIZED;
        array_push($errorResponse, $statusArray);
        
        echoResponse(FAILURE_CODE, $errorResponse);
    }
                
    if ($response == FAILED) {
        $statusArray = array();
        $statusArray["statusCode"] = FAILURE_CODE;
        $statusArray["message"] =  INVALID_INPUT;
        array_push($errorResponse, $statusArray);
            
        echoResponse(FAILURE_CODE, $errorResponse);  
    }
    
}

//
//  Echoing json response to client
//
function echoResponse($status_code,  $response) {

    $app = \Slim\Slim::getInstance();

    // setting response content type to json
    $app->response->headers->set('Content-Type', 'application/json');   
    
    // Http response code
    $app->status($status_code);
            
    error_log("ECHO RESPONSE JSON - " . json_encode($response,JSON_PRETTY_PRINT));        
    echo json_encode($response,JSON_PRETTY_PRINT);
    //echo json_encode($response);  
}



//
//
//  User
//
//
$app->post("/User/Show/:id",  function() use ($app) {
require "../src/services/User.php";
//TODO: check this later include_once dirname(__FILE__) . '../../include/Config.php';

//  verifyRequiredParams(array("loginname", "password", "deviceid", "ipaddress", "gpscoordinates"));    
//  $userID = $app->request->post("userid");

    $request = $app->request();

    $userData = json_decode($request->post('data')); 
    $data = $userData->id;

    $userObj = new User( );   
    $response = $userObj->Show( $data );

    if ( ($response == null)  || ($response == FAILED) )
        handleErrorResponse($response);
    
    echoResponse(SUCCESS_CODE, $response);
            
});


//             
// ServiceAPIUtils::CallAPIService( $dataArray,"/User/ShowAll/123", "json" );


$app->post("/User/Authenticate/123",  function() use ($app) {
require "../src/services/User.php";
//TODO: check this later include_once dirname(__FILE__) . '../../include/Config.php';

//  verifyRequiredParams(array("loginname", "password", "deviceid", "ipaddress", "gpscoordinates"));    
//  $userID = $app->request->post("userid");

    //$request = Slim::getInstance()->request();
    $request = $app->request();

    $userData = json_decode($request->post('data'));    
    //$userData = json_decode($request->getBody());

    $userObj = new User( );
        
    $dataArray = array(
                        "email"=>$userData->email,
                        "password"=>$userData->password
                       );

    $response = $userObj->Authenticate( $dataArray );

    if ( ($response == null)  || ($response == FAILED) )
        handleErrorResponse($response);

    echoResponse(SUCCESS_CODE, $response);
            
});

//"/User/CheckEmailAvailability/123"
/*
 *            $dataArray = array(
                                "email"=>$this->email,
                                "accountType"=>$this->accountType,
                                "profileId"=>$profileId,
                                "userId"=>$userId
                            );
 
 */
$app->post("/User/CheckEmailAvailability/123",  function() use ($app) {
require "../src/services/User.php";
//TODO: check this later include_once dirname(__FILE__) . '../../include/Config.php';

//  verifyRequiredParams(array("loginname", "password", "deviceid", "ipaddress", "gpscoordinates"));    
//  $userID = $app->request->post("userid");

    //$request = Slim::getInstance()->request();
    $request = $app->request();
    error_log( 'CheckEmailAvailability Input Data : '. $request->post('data')  );

    $userData = json_decode($request->post('data'));    
    //$userData = json_decode($request->getBody());

    $userObj = new User( );
        
    $dataArray = array(
                        "email"=>$userData->email,
                        "accountType"=>$userData->accountType,
                        "profileId"=>$userData->profileId,
                        "userId"=>$userData->userId
                       );

    $response = $userObj->CheckEmailAvailability( $dataArray );

    if ( ($response == null)  || ($response == FAILED) )
        handleErrorResponse($response);

    echoResponse(SUCCESS_CODE, $response);
            
});


//"/User/CheckUsernameAvailability/123"
/*
 * 
 */
$app->post("/User/CheckUsernameAvailability/123",  function() use ($app) {
require "../src/services/User.php";
//TODO: check this later include_once dirname(__FILE__) . '../../include/Config.php';

//  verifyRequiredParams(array("loginname", "password", "deviceid", "ipaddress", "gpscoordinates"));    
//  $userID = $app->request->post("userid");

    //$request = Slim::getInstance()->request();
    $request = $app->request();
     error_log( 'CheckUsernameAvailability Input Data : '. $request->post('data')  );

    $userData = json_decode($request->post('data'));    
    //$userData = json_decode($request->getBody());

    $userObj = new User( );

    $dataArray = array(
                        "username"=>$userData->username,
                        "userId"=>$userData->userId
                      );

    $response = $userObj->CheckUsernameAvailability( $dataArray );

    if ( ($response == null)  || ($response == FAILED) )
        handleErrorResponse($response);

    echoResponse(SUCCESS_CODE, $response);
            
});



$app->post("/User/Add/123",  function() use ($app) {
require "../src/services/User.php";
//TODO: check this later include_once dirname(__FILE__) . '../../include/Config.php';

//  verifyRequiredParams(array("loginname", "password", "deviceid", "ipaddress", "gpscoordinates"));    
//  $userID = $app->request->post("userid");

    //$request = Slim::getInstance()->request();
    $request = $app->request();

    $userData = json_decode($request->post('data'));    
    //$userData = json_decode($request->getBody());

    $dataArray = array( "email"=>$userData->email,
                        "username"=>$userData->username,
                        "firstname"=>$userData->firstname,
                        "lastname"=>$userData->lastname,
                        "password"=>$userData->password,
                        "gender"=>$userData->gender,
                        "yearOfBirth"=>$userData->yearOfBirth,
                        "phone"=>$userData->phone,
                        "mobile"=>$userData->mobile,
                        "addressLine1"=>$userData->addressLine1,
                        "addressLine2"=>$userData->addressLine2,
                        "addressCity"=>$userData->addressCity,
                        "addressState"=>$userData->addressState,
                        "addressCountry"=>$userData->addressCountry,
                        "addressZipCode"=>$userData->addressZipCode,
                        "photo"=>$userData->photo,
                        "interests"=>$userData->interests,
                        "newsletters"=>$userData->newsletters,
                        "lastLoginTime"=>$userData->lastLoginTime,                        
                        "recordStatus" =>$userData->recordStatus,
                        "accountType"=>$userData->accountType,
                        "isAdmin"=>$userData->isAdmin,
                        "isDataAdmin" => $userData->isDataAdmin,
                        "facebookDetails" =>$userData->facebookDetails,
                        "twitterDetails" =>$userData->twitterDetails
                        //"registeredDate"=>$userData->registeredDate,
                        //"favoriteEvents"=>$userData->favoriteEvents,
                        //"ownedEvents"=>$userData->ownedEvents,
                        //"privileges"=>$userData->privileges,
                        //"openidDetails" =>$userData->openidDetails,                                                                        
                      );
    
    $userObj = new User( );
    
    $response = $userObj->Add( $dataArray );

    if ( ($response == null)  || ($response == FAILED) )
        handleErrorResponse($response);

    echoResponse(SUCCESS_CODE, $response);
            
});


$app->post("/User/Update/:id",  function() use ($app) {
require "../src/services/User.php";
//TODO: check this later include_once dirname(__FILE__) . '../../include/Config.php';

//  verifyRequiredParams(array("loginname", "password", "deviceid", "ipaddress", "gpscoordinates"));    
//  $userID = $app->request->post("userid");

    $request = $app->request();

    $userData = json_decode($request->post('data')); 
    $id = $userData->id;
    $data = $userData->data;

    $userObj = new User( );   
    $response = $userObj->Update( $id, $data );

    if ( ($response == null)  || ($response == FAILED) )
        handleErrorResponse($response);
    
    echoResponse(SUCCESS_CODE, $response);
            
});

//             
// ServiceAPIUtils::CallAPIService( $dataArray,"/User/Delete/123", "json" );

 
$app->post("/User/UpdateLoginTime/:id",  function() use ($app) {
require "../src/services/User.php";
//TODO: check this later include_once dirname(__FILE__) . '../../include/Config.php';

//  verifyRequiredParams(array("loginname", "password", "deviceid", "ipaddress", "gpscoordinates"));    
//  $userID = $app->request->post("userid");

    $request = $app->request();

    $userData = json_decode($request->post('data')); 
    $id = $userData->id;
    $data = $userData->data;

    $userObj = new User( );   
    $response = $userObj->Update( $id, $data );

    if ( ($response == null)  || ($response == FAILED) )
        handleErrorResponse($response);
    
    echoResponse(SUCCESS_CODE, $response);
            
});

            

$app->run();

?>


