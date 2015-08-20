<?php
//Setting Application response as JSON objects
// For Dreamhost only
//header('Content-Type: text/json');

//date_default_timezone_set('UTC');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define("DUMP_ARRAYS_ON_ERROR", false);

// Constants that are independent of platform. 
// database constants are used for general differentiation and PDO connections
define("MYSQL", "mysql");
define("MSSQL", "sqlsrv"); // should be one of sqlsrv, mssql, sybase, or dblib
define("POSTGRESQL", "pgsql");

define("RECORD_DELIMITER", "<br>");
define("FIELD_DELIMITER", "***");
// if the result passed to the media server contains this, there is definitely an error
define("ERROR_MARKER", "ERROR");
// if operation succeeds, the PHP interface returns this string to the media server
define("SUCCESS", "Success");

define("NOT_VERIFIED_ADMIN", "Could not verify admin credentials");

//We define all the constants here in configuration-file mode.

// MySQL
define ("DB_TYPE", MYSQL); //switch to MS-SQL for Microsoft SQL Server
define ("DB_SERVER", '127.0.0.1');
define ("DB_PORT", '3306'); // MySQL uses 3306

// MySQL Dev Server
define ("DB_NAME", 'mfirst');
define ("DB_SCHEMA", 'mfirst');
define ("DB_USERNAME", 'root');
define ("DB_USERPASSWORD", '');


// roles
define("ADMIN", "Admin");
define("USER", "User");
define("MONITOR", "Monitor");
define("CONSOLE", "Console");
define("RESPONDER", "Responder");

// second integer value is exponent for number of times to hash
if (version_compare(PHP_VERSION, '5.3.7', '>=')){
	define("BLOWFISH_PREFIX", "$2y$07$"); // newer versions have corrected a potential security problem
}
else{
	define("BLOWFISH_PREFIX", "$2a$07$"); // older versions of PHP need older prefix
}	
	

// Blowfish accepts these characters for salts.
define("BASE64_CHARS","ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789./");
define("SALT_LENGTH",22);

//Responses
define('USER_CREATED_SUCCESSFULLY', 0);
define('USER_CREATE_FAILED', 1);
define('USER_ALREADY_EXISTED', 2);

//constants used for session expiry
define("SESSION_TIMEOUT","900");      //session expires after 15 minutes
define("PRESENT_TIME",time());

//password length
define("MIN_PASSWORD_LENGTH",6);
define("PASSWORD_LENGTH", 20);

define("LUCHARACTERS_AND_SAPCES", "[^a-z,^A-Z,^ ]"); //Lower and Upper case characters
define("LUCHARACTERS_NUMERIC", "[^a-z, ^A-Z, ^0-9]");
define("LCHARACTERS_NUMERIC_AND_HYPHEN", "[^0-9, ^-]");
define("LUCHARACTERS_NUMERIC_AND_SAPCES", "[^a-z,^A-Z,^0-9,^ ]"); //it will use for city, state, etc..
define("LUCHARACTERS_NUMERIC_UNDERSCORE_AND_DOT", "[^a-z,^A-Z,^0-9,^_,^.]");
define("NUMERIC", "[^0-9]");
define("NUMERIC_AND_PERIOD", "[^0-9, ^.]");

//String pattern for user allowed characters to insert username
define("COUNTRY_CODE_ALLOWED_CHARACTERS", NUMERIC);
define("PHONE_NUMBER_ALLOWED_CHARACTERS", LCHARACTERS_NUMERIC_AND_HYPHEN);
define("USER_NAME_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC_AND_SAPCES);
define("SERVICE_PROVIDER_NAME_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC_AND_SAPCES);
define("LOGIN_NAME_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC_UNDERSCORE_AND_DOT);
define("CITY_ALLOWED_CHARACTERS", LUCHARACTERS_AND_SAPCES);
define("STATE_ALLOWED_CHARACTERS", LUCHARACTERS_AND_SAPCES);
define("DIAGNOSIS_NAME_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC_AND_SAPCES);
define("MEDICATION_NAME_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC_AND_SAPCES);
define("MEDICATION_COLOR_ALLOWED_CHARACTERS", LUCHARACTERS_AND_SAPCES);
define("SUBSTANCE_ABUSE_NAME_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC_AND_SAPCES);
define("INTERVIEW_NAME_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC_AND_SAPCES);
define("PATIENT_NAME_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC_AND_SAPCES);
define("DEVICE_NAME_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC_AND_SAPCES);
define("ZIP_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC);
define("IMEI_ALLOWED_CHARACTERS", NUMERIC);
define("HEIGHT_ALLOWED_CHARACTERS", NUMERIC_AND_PERIOD);
define("VERSION_ALLOWED_CHARACTERS", NUMERIC_AND_PERIOD);
define("SERIAL_NUMBER_ALLOWED_CHARACTERS", LUCHARACTERS_NUMERIC);


// define("PHONE_NUMBER_ALLOWED_CHARACTERS", NUMERIC);

define("SERVICE_PROVIDER_NAME_LENGTH", 100);
define("NOT_VALID_USER_NAME","Not a valid user name");

//Data field constrains
define("FIRST_NAME_LENGTH" , 50);
define("LAST_NAME_LENGTH" , 50);
define("STD_CODE", 5);
define("HEIGHT_LENGTH", 5);
define("WEIGHT_LENGTH", 5);
define("VERSION_LENGTH", 10);
//define("SUBSTANCE_ABUSE_NAME_LENGTH", 50);
define("OS_VERSION_LENGTH", 15);
define("ZIP_LENGTH", 15);
define("USER_NAME_LENGTH", 15);
define("OS_LENGTH", 50);
define("DOSAGE_LENGTH", 20);
define("SERIAL_LENGTH", 50);
define("DEVICE_PHONE_LENGTH", 25);
define("MAKE_LENGTH", 50);
define("PHONE_LENGTH", 12);
define("MINUMUM_PHONE_LENGTH", 10);
define("MODEL_LENGTH", 50);
define("NAME_LENGTH", 50);
define("STREET_LENGTH", 100);
define("DEVICE_NAME_LENGTH", 50);
define("SERVICE_PROVIDER_NAME", 100);
define("DIAGNOSIS_NAME_LENGTH", 100);
define("MEDICATION_NAME_LENGTH", 100);
define("SUBSTANCE_ABUSE_NAME_LENGTH", 100);
define("MANUFACTURER_LENGTH", 50);
define("INTERVIEW_NAME_LENGTH", 100);
define("COUNTRY_LENGTH", 50);
define("STATE_LENGTH", 50);
define("CITY_LENGTH", 50);
define("EMAIL_LENGTH", 50);
define("FILE_SIZE", 20000);
define("COLOR_LENGTH", 25);
define("IMEI_LENGTH", 100);
define("SUBSTANCE_ABUSE_CODE_LENGTH", 255);

define("LOGIN_NAME_LENGTH", 50);
define("DESCRIPTION_LENGTH", 1024);

define("DELIMITER", '3,7');

//Alert message constants
define("DATE_ALERT", "Date of Birth field cannot be blank");
define("DEVICE_NAME_ALERT", "Name field cannot be blank");
define("SERVICE_PROVIDER_NAME_ALERT", "Service Provider Name field cannot be blank");
define("DIAGNOSIS_NAME_ALERT", "Diagnosis Name field cannot be blank");
define("SUBSTANCE_ABUSE_NAME_ALERT", "Name field cannot be blank");
define("MEDICATION_NAME_ALERT", "Name field cannot be blank");
define("INTERVIEW_NAME_ALERT", "Interview Name field cannot be blank");
define("NAME_ALERT", "Name field cannot be blank");
define("FIRST_NAME_ALERT", "First Name field cannot be blank");
define("LAST_NAME_ALERT", "Last Name field cannot be blank");
define("DESCRIPTION_ALERT", "Description field cannot be blank");
define("ADDRESS_ALERT", "Address field cannot be blank");
define("CITY_ALERT", "City field cannot be blank");
define("STATE_ALERT", "State field cannot be blank");
define("ZIP_ALERT", "Zip field cannot be blank");
define("COUNTRY_ALERT", "County field cannot be blank");
define("WORK_ALERT", "Work field cannot be blank");
define("COUNTRY_CODE_ALERT", "Country/STD Code field cannot be blank");
define("ALTERNATE_ALERT", "Alternate field cannot be blank");
define("FAX_ALERT", "Fax field cannot be blank");
define("MANUFACTURER_ALERT", "Manufacturer field cannot be blank");
define("DOSAGE_ALERT", "Dosage field cannot be blank");
define("FREQUENCY_ALERT", "Frequency field cannot be blank");
define("COLOR_ALERT", "Color field cannot be blank");
define("PASSWORD_ALERT", "Password field cannot be blank");
define("CONFIRM_PASSWORD_ALERT", "Password and confirm password field should be same");
define("LOGIN_ALERT", "Login Name field cannot be blank");
define("SERIAL_ALERT", "Serial number field cannot be blank");
define("OS_ALERT", "OS field cannot be blank");
define("MAKE_ALERT", "Make field cannot be blank");
define("MODEL_ALERT", "Model field cannot be blank");
define("OS_VERSION_ALERT", "OS Version field cannot be blank");
define("DEVICE_PHONE_ALERT", "Device phone number field cannot be blank");
define("VERSION_ALERT", "Mpathy Version field cannot be blank");
define("HEIGHT_ALERT", "Height field cannot be blank");
define("WEIGHT_ALERT", "Weight field cannot be blank");
define("EMAIL_ALERT", "Email field cannot be blank");
define("MOBILE_ALERT", "Mobile field cannot be blank");
define("ICE_ALERT", "ICE field cannot be blank");
define("USER_NAME_ALERT", "Username field cannot be blank");
define("STD_CODE_ALERT", "Std code cannot be blank");
define("IMEI_ALERT", "IMEI Number cannot be blank");
define("ROLE_ALERT", "Role cannot be blank");
define("SUBSTANCE_ABUSE_CODE_ALERT", "Code cannot be blank");

define("URL", "http://www.nasotech.com/");
define("COMPANY_NAME", "Nasotech LLC");
define("COPYRIGHT", "Copyright 2014");
define("RIGHTS", "All rights reserved.");

define("PATH", "medicineImage/");
define("DEFAULT_IMAGE_PATH", "medicineImage/noImage.jpg");
define("IMAGE_LOGO_PATH", "images/company-logo.png");

//api 
define("SUCCESS_CODE", 200);
define("FAILURE_CODE", 401);
define("SUCCESS_MESSAGE", "OK");
define("INVALID_INPUT", "Your input data is not valid");
define("UNAUTHORIZED", "Unauthorized");
define("DUPLICATION", "Duplication Not Allowed");
define("ADDED_SUCCESSFULLY", "Your Added Successfully");
define("DELETED_SUCCESSFULLY", "Your Deleted successfully");
define("QUERY_FAILED","queryFailed");
define("FAILED","failed");
define("DATA_TYPE","cache");
define("CASE_MANAGER","Case Manager");
// provide the query functions anywhere this file is included
//include("query.php");
?>