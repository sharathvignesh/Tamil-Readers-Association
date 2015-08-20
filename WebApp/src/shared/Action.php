<?php
    include_once  APP_ROOT . '/libs/smarty/Smarty.class.php';

    abstract class Action
    {
        private $request 			= array();
        private $response 			= array();
        private $errors 			= array();
        private $messages 			= array();
    
        public $assert;
        public $accessRole;
        public $session;

        public  $template;
        private $smarty;

        public $layout;
        public $user_type;
        public $output_type;
        public $xml_call_back_function;

        public function init()
        {
            ini_set("session.gc_maxlifetime", 21600);
            ini_set("session.gc_divisor", "1");
            ini_set("session.gc_probability", "1");

            session_save_path( SESSION_SAVE_PATH );
            
            session_start( );
            
            $this->smarty = new Smarty( );
            
            $this->smarty->template_dir   = TEMPLATE_DIR;

            $this->smarty->compile_dir    = COMPILE_DIR;

            $this->smarty->assign( "BASE_URL", BASE_URL );
        }

        // Get the GET/POST parameters
        public function getRequestParam($name)
        {
            $val = "";
            if( isset( $name ) )
            {
                if( isset( $this->request->$name ) && is_array( $this->request->$name ) ) return  $this->request->$name;
            
                $val = ( isset( $this->request->$name ) && strlen( trim ( $this->request->$name ) ) >0 ) ? $this->request->$name : "";
                
                /* This is a check for Flash Dev's work */
                if( $val == "" )
                {
                    $param = "\$$name";
                    if( isset( $_REQUEST[$param] ) && $_REQUEST[$param] != "" )
                        $val = $_REQUEST[$param];
                }
            }
            return $val;
        }

        public function getRequest()
        {
            return $this->request;
        }

        public function getResponse()
        {
            return $this->response;
        }

        // Set the request parameter to be used later in the component
        // or to be passed to components that will be executed after this
        // component (Post Components)
        protected function setRequestParam($name, $value)
        {
            $this->request->$name = $value;
        }

        //
        protected function setErrorParam($name, $value)
        {
            $this->error->$name = $value;
        }

        // Set the response parameter to be used later in the component
        // or to be passed to components that will be executed after this
        // component (Post Components)
        protected function setResponseParam($name, $value, $isHtml=false)
        {
            if( !$isHtml )
            {
                $reflection = new ReflectionUtil( );

                $value = $reflection->htmlEscForResponseItem($value);
            }

            $this->response->$name = $value;
        }

        private function setTemplate( )
        {
            $output_type = $this->getRequestParam( 'output_type' );

            if( $this->layout == '' )
                $this->layout = 'main_layout';

            if( empty( $output_type ) && empty( $this->output_type ) )
            {
                $content = $this->smarty->fetch( TEMPLATE_DIR . "/".$this->template.".tpl" );
                
                $this->setParam( "MAIN_CONTENT", $content );

                $this->smarty->display( TEMPLATE_DIR . "/{$this->layout}.tpl" );
            }
        }

        /* Sets parameter for smarty */
        public function setParam( $param, $value )
        {
            $this->smarty->assign( $param, $value );
        }

        /* Function execute with request and response objects, this function will be implemented in child class */
        public function execute( $request, $response )
        {

        }

        /* Sets request object */
        protected function setRequest(Array $request)
        {
            $this->request = array_merge($this->request, $request);
        }

        /* Gets session parameter */
        protected function getSessionParam($name)
        {
            if( isset( $_SESSION[$name] ) )
                return $_SESSION[$name];
            return "";
        }

        /* Sets session parameter */
        protected function setSessionParam($name, $value){
            $_SESSION[$name] = $value;
        }

        /* Gets session user Id */
        public function getSessionUserId()
        {
            if( isset($_SESSION['session_user_id']) )
            return $_SESSION['session_user_id'];
        }

        /* Gets session user */
        public function getSessionUser()
        {
            return $_SESSION['session_user'];
        }

        public function call( $request, $response="", $error=array() )
        {
            if( !$response )
            {
                $response = new stdClass();
            }
            
            // Traslate the session_id to system session_id
            /*if(  $request->action !== 'Login' && !isset( $session_user_id ) && intval( $session_user_id ) <= 0 )
            {
                header( "Location: " . BASE_URL . "/Login" );
                exit;
            }*/

            $this->request = $request;
            $this->response = $response;
            $this->errors = $error;
            
            $this->setResponseParam( 'page_title', $this->request->action." - mFirst" );
            
            /* For navigation */
            $this->setResponseParam( 'page_id', trim($this->request->action) );
            
            //Check if user has logged in
            $session_user_id = $this->getSessionUserId();
            if( !isset( $session_user_id ) )
            {
                $this->setResponseParam( 'session_prompt_login', "1" );
            }
            else
            {
                $this->setResponseParam( 'session_prompt_login', "0" );
            }
            
            //Get location data from IP2Location
			$userIp = isset($_SERVER["REMOTE_ADDR"])?$_SERVER["REMOTE_ADDR"]:"";
			$defaultLocation = "";
			// if( $userIp!="" )
			// {
				// $defaultLocationArray = ServiceUtils::GetIp2LocationData( array("userIp"=>$userIp) );
				// $defaultLocation = (isset($defaultLocationArray["city"]) && $defaultLocationArray["city"]!="" && $defaultLocationArray["city"]!="-")?$defaultLocationArray["city"]:"";
				// $defaultLocation = (isset($defaultLocationArray["region"]) && $defaultLocationArray["region"]!="" && $defaultLocationArray["region"]!="-")?($defaultLocation.", ".$defaultLocationArray["region"]):$defaultLocation;
				// $defaultLocation = (isset($defaultLocationArray["countryLong"]) && $defaultLocationArray["countryLong"]!="")?$defaultLocation.", ".$defaultLocationArray["countryLong"]:$defaultLocation;
			// }
            $this->setResponseParam( "defaultLocation",trim(strtolower($defaultLocation)) );
            
            $this->execute( $request, $response );

            $this->setParam( 'response', $response );
            $this->setParam( 'request', $request );
            $this->setParam( 'errors', $this->errors );
            $this->setParam( 'messages', $this->messages );
            $this->setParam( 'request', $request );
            
            $this->setParam( 'APP_ROOT', APP_ROOT );
            $this->setParam( 'BASE_URL', BASE_URL );
            $this->setParam( 'BASE_JS_URL', BASE_JS_URL );
            $this->setParam( 'DATE_FORMAT', DATE_FORMAT );
            $this->setParam( 'BASE_IMAGE_URL', BASE_IMAGE_URL );
            $this->setParam( 'BASE_CSS_URL', BASE_CSS_URL );
            $this->setParam( 'BASE_FLASH_URL', BASE_FLASH_URL );
            $this->setParam( 'ENABLE_TEMPLATE_DEBUG', ENABLE_TEMPLATE_DEBUG );
            
            $this->setParam( "GROUP_ACCESS_NONE", GROUP_ACCESS_NONE );
            $this->setParam( "GROUP_ACCESS_READ", GROUP_ACCESS_READ );
            $this->setParam( "GROUP_ACCESS_ADD", GROUP_ACCESS_ADD );
            $this->setParam( "GROUP_ACCESS_READ_WRITE", GROUP_ACCESS_READ_WRITE );
            
            $this->setParam( "ENABLE_DATA_LOGGING", ENABLE_DATA_LOGGING );
            $this->setParam( "ENABLE_DATA_LOGGING_USING_ASYNC_CALLS", ENABLE_DATA_LOGGING_USING_ASYNC_CALLS );

            $this->setTemplate( );
            return $response;
        }

		/* Remove session parameter */
		public function UnsetSessionParam( $key )
		{
			if( isset( $_SESSION[$key] ) )
				unset( $_SESSION[$key] );
		}

        /* Checks whether an item is set in session or not */
        public function IsItemInSession($item)
        {
            $session_item = $this->getSessionParam( $item );
            return  ( empty( $session_item ) ) ? false : true;
        }
        
        public function addError($name, $args=array())
        {
            $error_bundle = new ResourceBundleInternal("errors");
            $value = $error_bundle->getItem($name, $args);
            if (!$value) $value = $name;
            $this->errors[$name] = $value;
        }
        
        public function addMessage($name, $args=array())
        {
            $error_bundle = new ResourceBundleInternal("messages");
            $value = $error_bundle->getItem($name, $args);
            if (!$value) $value = $name;
            $this->messages[$name] = $value;
        }
        
        public function hasErrors( )
        {
            return ( sizeof( $this->errors ) > 0 ) ? true : false;
        }
    }
?>
