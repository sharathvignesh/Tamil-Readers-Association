<?php
	include_once '../common.php';
	include_once '../libs/Util/XmlHelper.php';
	
	if 	( !isset( $_REQUEST['action']  ) || ( isset( $_REQUEST['action'] ) && trim( $_REQUEST['action'] ) == "" ) ) {
		// Set as default action		
		 $_REQUEST['action'] = "Login";		
	} else {
	   // do nothing	
	}
    
	$action = $_REQUEST['action'];
	$output_type = ( isset( $_REQUEST['output_type'] ) && trim( $_REQUEST['output_type'] ) ) != "" ? $_REQUEST['output_type'] : "";

	try
	{
		$obj = ActionHandler::handleAction($action);

		if( $output_type == "xml" )
		{
			header('Content-Type: text/xml');
			print '<?xml version="1.0" encoding="utf-8"?>';
			print "<response><status>SUCCESS</status>";
			print "</response>";
		}
		elseif( $output_type == "json" )
		{
			include_once '../libs/json/JSON.php';
			$json = new Services_JSON();

			$content = array();
			$content['request']  = $obj->getRequest();
			$content['res'] = $obj->getResponse();
			foreach($content['res'] as $key => $value )
			{
				if( is_object($value) )
				{
					$class_name = get_class($value);
					$reflection = new ReflectionUtil($class_name);
					$arr = $reflection->getPropertyNamesAndValuesAsArray($value);
					$content['response'][$key] = $arr;
				}
				else
				{
					$content['response'][$key] = $value;
				}
			}

			unset($content['res']);

			$output = $json->encode($content);

			print_r( $output );

			exit;
		}
		elseif( $output_type == "query_string" )
		{
			$content['res'] = $obj->getResponse();
			foreach($content['res'] as $key => $value )
			{
				echo "&$key=$value";
			}
		}
		else
		{
		}
	}
	catch(ServiceException $e) {
		Logger::exception($e);
		if( $output_type == "xml" )
		{
			header('Content-Type: text/xml');
			print "<error>";
			$ec = new ReflectionClass("Error");
			$constants = $ec->getConstants();
			$constants = array_flip($constants);
			$code = $constants[$e->getCode()];
			$message = $e->getMessage();
			if(!$message) $message = $code;
			print "<code>$code</code>";
			print "<message>$message</message>";
			print "</error>";
		}
	}
	catch(Exception $e) {
		Logger::exception($e);
		if( $output_type == "xml" )
		{
			header('Content-Type: text/xml');
			print "<error>";
			print "<code>UNEXPECTED_ERROR</code>";
			print "<message>" . $e->getMessage() . "</message>";
			print "</error>";
		}
		else
		{
			$_REQUEST['error_message'] = $e->getMessage();
			$obj = ActionHandler::handleAction("ErrorPage");
		}
	}
?>
