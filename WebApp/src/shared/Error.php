<?php

class Error {

	const COMPONENT_NOT_FOUND = 101;
	const TEMPLATE_NOT_FOUND  = 102;
	
	// Generic Service Errors
	const UNKNOWN_SVC_ERROR  = 201;
	const INVALID_SVC_INPUT  = 202;
	const SVC_DATA_NOT_FOUND = 203;

	// Database errors
	const DB_QUERY_ERROR     = 401;
	const DB_INSERT_ERROR    = 402;

	// User Service Errors
	const USER_DUPLICATE_LOGIN          = 1101;
	const USER_INVALID_USERNAME         = 1102;
	const USER_WRONG_PASSWORD	    = 1103;
	const USER_NOT_EXISTS    	    = 1110;
	const USER_ALREADY_ACTIVE	    = 1111;
	const USER_DIFF_PHONE_NO            = 1112;
	const USER_ACTIVATED                = 1113;
	const USER_MADE_INACTIVE            = 1114;
	const USER_NO_MOBILE_NUM            = 1115;
	const USER_ACT_CANCEL_FAILED        = 1116;
	const USER_TOO_MANY_ATTEMPTS        = 1119;
	const USER_INVALID_CODE             = 1120;
	const USER_INVALID_EMAIL_ADD        = 1121;
	const USER_NOT_ACTIVE               = 1122;
	const USER_USERNAME_INVALID_LENGTH  = 1123;
	const USER_USERNAME_INVALID_CHARS   = 1124;
}

?>