<?php
   define( 'ADMIN_EMAIL_ADDRESS', "shiva@nasotech.com"); 
   define( 'ADMIN_EMAIL_NAME', "mFirst");
   define( 'USER_REGISTRATION_CONFIRMATION_MAIL', "shiva@nasotech.com");
   define( 'NEW_USER_ADMIN_ALERT_MAIL', "shiva@nasotech.com");
   
    define( 'WEBAPP_HOME_PAGE',"/SearchApps");
    
	date_default_timezone_set('UTC');
	$app_root = realpath(__FILE__);
    $app_root = dirname($app_root);
    $app_root = preg_replace('@\\\@', '/', $app_root);
    define('APP_ROOT', $app_root);
    
    $server = "http://" . $_SERVER['HTTP_HOST'];
    define( "HTTP_SITE_ROOT", $server );
    define( 'BASE_URL',HTTP_SITE_ROOT);
    define( 'TEMPLATE_DIR', APP_ROOT . "/web/templates" );
    define( 'COMPILE_DIR', APP_ROOT . "/web/templates_c" );
    define( 'BASE_CSS_URL', BASE_URL . "/css");
    define( 'BASE_IMAGE_URL', BASE_URL . "/images");
    define( 'BASE_JS_URL', BASE_URL . "/js");
    define( 'BASE_FLASH_URL', BASE_URL . "/flash");
    define( 'RESOURCE_DIR', APP_ROOT . "/resources" );

    define( 'MEDIA_IMAGE_UPLOAD_PATH', APP_ROOT . "/media/images" );
    define( 'MEDIA_IMAGE_URL', BASE_URL ."/media/images" );

    define( 'MEDIA_VIDEO_UPLOAD_PATH', APP_ROOT . "/media/video" );
    define( 'MEDIA_VIDEO_URL', BASE_URL ."/media/video" );

    define( 'SESSION_SAVE_PATH', APP_ROOT . "/sessions" );

    $services_dir = "$app_root/src/services";
    $frontend_dir = "$app_root/src/web";
    $dao_dir      = "$app_root/src/dao";
    $sql_dir      = "$app_root/src/sql";
    $model_dir    = "$app_root/src/model";
    $smarty_dir   = "$app_root/libs/smarty";

    $paths = array();
    $paths[] = APP_ROOT . "/libs";
    $paths[] = APP_ROOT . "/libs/smarty";
    $paths[] = ini_get( "include_path" );
    $paths[] = APP_ROOT . "/libs/pear";
    $paths[] = APP_ROOT . "/libs/Util";
    $paths[] = APP_ROOT . "/libs/Excel";
    $paths[] = APP_ROOT . "/libs/Mailer";
    $paths[] = APP_ROOT . "/src";
    $paths[] = APP_ROOT . "/src/shared";
    $paths[] = APP_ROOT . "/src/services";
    $paths[] = APP_ROOT . "/src/dao";
    $paths[] = APP_ROOT . "/src/sql";
    $paths[] = APP_ROOT . "/src/web";
    $paths[] = implode(PATH_SEPARATOR, glob("$frontend_dir/*", GLOB_ONLYDIR));
    $paths[] = implode(PATH_SEPARATOR, glob("$services_dir/*", GLOB_ONLYDIR));
    $paths[] = implode(PATH_SEPARATOR, glob("$sql_dir/*", GLOB_ONLYDIR));
    $paths[] = implode(PATH_SEPARATOR, glob("$dao_dir/*", GLOB_ONLYDIR));
    $paths[] = implode(PATH_SEPARATOR, glob("$model_dir/*", GLOB_ONLYDIR));
    $paths[] = implode(PATH_SEPARATOR, glob("$smarty_dir/*", GLOB_ONLYDIR));

    ini_set( "include_path", implode(PATH_SEPARATOR, $paths) );

    define( 'DB_HOST_NAME', 'localhost' );
    define( 'DB_USER_NAME', 'root' );
    define( 'DB_PASSWORD', '' );
    define( 'DB_DATABASE', 'mfirst' );

    define( 'MYSQL', 'mysql' );
    define( 'MSSSQL', 'mssql' );
    define( 'DB_TYPE', MYSQL );

    define( "ADMINGROUPID", 1 );
    define( "MEMBERGROUPID", 2 );
    define( "SUPER_USER_ID", 0 );

    /* Super admin group and user */
    define( "SUPER_ADMIN_GROUP_NAME", 'Super User' );
    define( "SUPER_ADMIN_USERNAME", 'sakhaadmin' );

    /** Debugging options **/
    define( "ENABLE_DB_DEBUG", true );
    define( "ENABLE_TEMPLATE_DEBUG", 1 );

    define( 'LIST_PAGE_SIZE', 2 );
    define( 'PAGER_ROWS_PER_PAGE', 5 );
    define( 'NUMBER_OF_PAGE_LINKS', 5 );
    define( 'PAGE_LINKS_ALIGN', 'footer' );
    define( 'SHOW_ADODB_PAGER_LINKS', true );

    define('DATE_FORMAT', '%m/%d/%Y');

    define( 'RESTFUL_API_URL_END_POINT', 'http://127.0.0.1:8081/v1/index.php' );
    define( 'RESTFUL_API_KEY', "123456789" );
    define( 'RESTFUL_API_USERNAME', 'mfirst' );
    define( 'RESTFUL_API_PASSWORD', 'mfirst' );

  
    /* Exception handling */
    /* true -> enable, false to disable */
    define( "ENABLE_EXCEPTION_DEBUG", false );
    define( "ENABLE_EXCEPTION_LOG", false );
    define( "ENABLE_EXCEPTION_REPORT", true );
    //define( "EXCEPTION_REPORT_EMAIL", "" );
    //define( "EXCEPTION_REPORTER", "" );

    /* Group access right constants */
    define( "GROUP_ACCESS_NONE",        "n" );
    define( "GROUP_ACCESS_READ",        "r" );
    define( "GROUP_ACCESS_ADD",         "a" );
    define( "GROUP_ACCESS_READ_WRITE",  "w" );
    
    /*Enable/disable data logging for analytics*/
    define( "ENABLE_DATA_LOGGING",1 );
    define( "ENABLE_DATA_LOGGING_USING_ASYNC_CALLS",1 );
    
    /*Names of Ad Types*/
    define( "TYPE_1","Home_280_60");
    define( "TYPE_2","List_320_180");
    
 
    function __autoload($class_name)
    {
        //$class_name = preg_replace('/_/', '/' , $class_name);

        if(!class_exists($class_name))
        {
        	//print "TTTTTTTTTTTTTTTTTTT  " . ${class_name} . "TTTTTTTTTTTTTTTTTTTTTTTTTT" ;
            require_once "${class_name}.php";
        }
    }
?>
