<?php

//	$app_root = realpath(__FILE__);
//    $app_root = dirname($app_root);
//    $app_root = preg_replace('@\\\@', '/', $app_root);
//    define('APP_ROOT', $app_root);
//
//	define ('HOST_DIR',"");
//	$src_dir = "$app_root/src";
//	$dao_dir = "$app_root/src/dao";		
//	$shared_dir = "$app_root/shared";
//
//	$paths = array();
//   $paths[] = ini_get( "include_path" );	
//    $paths[] = $src_dir;
//    $paths[] = $dao_dir;
//    $paths[] = $shared_dir;
//    
//	$paths[] = implode(PATH_SEPARATOR, glob("$src_dir/*", GLOB_ONLYDIR));
//	$paths[] = implode(PATH_SEPARATOR, glob("$dao_dir/*", GLOB_ONLYDIR));	
//	$paths[] = implode(PATH_SEPARATOR, glob("$shared_dir/*", GLOB_ONLYDIR));
//	
//	ini_set("include_path", implode(PATH_SEPARATOR, $paths));
//	
//	// define( 'DB_HOST_NAME', 'localhost' );
//    // define( 'DB_USER_NAME', 'root' );
//    // define( 'DB_PASSWORD', '' );
//    // define( 'DB_DATABASE', 'mfirst' );
//	
//	$restful_api_auth = array(
//			"123456789" => array( "userName" => "mfirst", "password" => "mfirst" ),
//							  "123451" => array( "userName" => "radical", "password" => "r@d1c@l" ),
//							  "123452" => array( "userName" => "android", "password" => "@ndroid"),
//							  "123453" => array( "userName" => "wp7", "password" => "w!ndows"),
//							  "123454" => array( "userName" => "iphone", "password" => "!phone"),
//							  "123455" => array( "userName" => "blackberry", "password" => "bl@ckberry")				
//		);
//	
//	define( 'RESTFUL_API_SERVICE_CREDENTIALS', serialize( $restful_api_auth ) );
//	
//	require_once("../shared/UUID.php");
	
//	function __autoload($class_name)
//    {
//        //$class_name = preg_replace('/_/', '/' , $class_name);
//
//        if(!class_exists($class_name))
//        {
//            require_once "${class_name}.php";
//        }
//    }

//	spl_autoload_register(function ($class_name) {
//       if(strcmp(substr($class_name, -3, -3), "DAO") == 0)
//        {
//    		include '../src/dao/' . $class_name . '.php';
//			echoResponse("DDDDDDAAAAAOOOOOO    " . realpath(__FILE__)  . "    " . '../src/dao/' . $class_name . '.php');
//        }
//	});
    