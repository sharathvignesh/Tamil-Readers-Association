<?php
    class Login extends Action
    {
        public function init( )
        {
            $this->template = "login";
            
            parent::init( );
        }

        public function execute( $request, $response )
        {
			foreach($_SESSION as $name => $value)
				unset($_SESSION[$name]);
			
            //Display message if any
//            if( $this->getRequestParam('message')=="add_login_required" )
//            {
//                $this->addMessage( "add_login_required", array( "an event" ) );
//            }
//            if( $this->getRequestParam('message')=="view_login_required" )
//            {
//                $this->addMessage( "view_login_required", array( "your events" ) );
//            }
            
            //Authenticate if credentials are submitted
            if( $this->getRequestParam( 'loginSubmit' ) )
            {
                $userSVC = new UserSVC( );
                $userSVC->email    = $this->getRequestParam('loginEmail');
                $userSVC->password = md5($this->getRequestParam('loginPassword'));
                
                if( !$this->Authenticate( $userSVC ) )
                {
                    $this->setResponseParam( "userSVC",$userSVC );
                    //$this->addError( 'authentication_failed' );
                    
                    header( "Location: " . BASE_URL . "/ErrorPage" );
                    exit;
                    //return;
                }
                
//                header( "Location: " . BASE_URL . WEBAPP_HOME_PAGE );
                header( "Location: " . BASE_URL . "/EditUser" );
                exit;
            }
			
        }
        
        //
        // * Validates user inputs
        // *
        // * @param   {Object}    $userSVC    UserSVC object
        // * @return  {Boolean}   True if all inputs are successfully validated otherwise false
        // 

        private function ValidateUserInput( UserSVC $userSVC )
        {
//            if( !Validator::validateNotEmpty( $userSVC->email ) )
//				$this->addError( "email_required" );
//			if( !Validator::validateNotEmpty( $userSVC->password ) )
//				$this->addError( "password_required" );
//            
//            if( $this->hasErrors( ) )
//				return false;
            
            return true;
        }
         
        //
        // * Authenticates username and password
        // *
        // * @param   {Object}    $userSVC    UserSVC object
        // * @return  {Boolean}   True if user is authenticated otherwise false
        // 
        private function Authenticate( UserSVC $userSVC )
        {
            if( $this->ValidateUserInput( $userSVC ) )
            {
                $rawResponse  = json_decode( $userSVC->Authenticate( ), true );
				
                //$responseData = $rawResponse["response"]["responseArray"];
                $responseData = isset($rawResponse["data"]["content"][0])?$rawResponse["data"]["content"][0]:array();
                print "Response id " . $responseData["id"];
                
                //Check if authentication was successful
                //if ( isset($rawResponse["authentication"]) && $responseData["authentication"] == 1 )
                if ( isset($responseData["authentication"]) && $responseData["authentication"] == 1 )                
                {
                    
                    $userSVC->id = $responseData["id"];
					$userSVC->accountType = 1;
					$userSVC->username = $responseData["username"];
					$userSVC->email = $responseData["email"];
                    $userSVC->firstname = $responseData["firstname"];
                    $userSVC->lastname = $responseData["lastname"];
                    $userSVC->gender = $responseData["gender"];
                    $userSVC->yearOfBirth = $responseData["yearOfBirth"];
                    $userSVC->phone = $responseData["phone"];
                    $userSVC->mobile = $responseData["mobile"];
                    $userSVC->registeredDate = $responseData["registeredDate"];
                    $userSVC->addressLine1 = $responseData["addressLine1"];
                    $userSVC->addressLine2 = $responseData["addressLine2"];
                    $userSVC->addressCity = $responseData["addressCity"];
                    $userSVC->addressState = $responseData["addressState"];
                    $userSVC->addressCountry = $responseData["addressCountry"];
                    $userSVC->addressZipCode = $responseData["addressZipCode"];
                    $userSVC->recordStatus = $responseData["recordStatus"];
                    $userSVC->isAdmin = $responseData["isAdmin"];
                    $userSVC->lastLoginTime = $responseData["lastLoginTime"];
					$userSVC->privileges = isset($responseData["privileges"])?$responseData["privileges"]:array();
					$userSVC->interests = isset($responseData["interests"])?$responseData["interests"]:"";
					$userSVC->geoCoordinates = isset($responseData["geoCoordinates"])?$responseData["geoCoordinates"]:array();
					$userSVC->isDataAdmin = isset( $responseData["isDataAdmin"] ) ? $responseData["isDataAdmin"] : 0;                    

                    $this->setSessionParam("firstTimeLogin",0);
                    if( $userSVC->lastLoginTime == "" )
					{
                        $this->setSessionParam("firstTimeLogin",1);
					}
                    
                    //Update Login Time
                    //$this->UpdateLoginTime( $userSVC );
                }
                else
                {
                    return false;
                }

                
				$username = "";
				if( trim($userSVC->firstname)!="" )
				{
					//First try to get full name
					$username = ucfirst($userSVC->firstname);
					if($userSVC->lastname!="")
					{
						$username .= " ".ucfirst($userSVC->lastname);
					}
				}
				if( $username=="" )
				{
					//If full name is empty use username
					$username = $userSVC->username;
				}
				if( $username=="" )
				{
					//If username is empty use email
					$username = $userSVC->email;
				}
				
				//Priveleges
				$privilegesArray = $userSVC->privileges;
				$userOrganizations = array( );
				$powerUser = "n";
				$role = 1;
				$approvalNeeded ="y";
				$currentUserOrgId = "mFirstWeb";
				$accountDropdown = "";
				
				if( isset($privilegesArray) && is_array($privilegesArray) && count($privilegesArray)==1 )
				{
					foreach( $privilegesArray as $value )
					{
						if( $value["default"] == 1 )
						{
							$role = $value["role"];
							if( $value["approvalNeeded"]==0 )
							{
								$approvalNeeded ="n";
							}
							$currentUserOrgId = $value["organization"]["id"];
						}
						
						//Check if user is a PowerUser	
						if( $value["organization"]["id"] == "mFirstWeb")
						{
							if(  $value["approvalNeeded"]==0 )
							{
								$powerUser ="y";
							}
						}
					}
				}
				elseif( isset($privilegesArray) && is_array($privilegesArray) && count($privilegesArray)>1 )
				{
					if($username=="")
					{
						$accountDropdown .= ucfirst($userSVC->email)."&nbsp;&nbsp;";
					}
					else
					{
						$accountDropdown .= ucfirst($username)."&nbsp;&nbsp;";
					}
					
					$accountDropdown .= "<select id=\"accounts\" name=\"accounts\">";
					foreach( $privilegesArray as $value )
					{
						if( $value["default"] == 1 )
						{
							$role = $value["role"];
							if( $value["approvalNeeded"]==0 )
							{
								$approvalNeeded ="n";
							}
							$currentUserOrgId = $value["organization"]["id"];
							
							$accountDropdown .= "<option value=\"".$value["organization"]["id"]."\" SELECTED=\"SELECTED\">".ucfirst($value["organization"]["name"])."</option>";
						}
						else
						{
							$accountDropdown .= "<option value=\"".$value["organization"]["id"]."\">".ucfirst($value["organization"]["name"])."</option>";
						}
						
						//Check if user is a PowerUser	
						if( $value["organization"]["id"] == "mFirstWeb")
						{
							if(  $value["approvalNeeded"]==0 )
							{
								$powerUser ="y";
							}
						}
					}
					$accountDropdown .= "</select>";
				}
				
				//Check if user has admin privileges
				$adminPrivileges = 0;
				if( $userSVC->isAdmin == 1 || ( $role == 3 || $role == 2 ) || $userSVC->isDataAdmin == 1 )
				{
					$adminPrivileges = 1;
				}
				
				//Set session params
                $this->setSessionParam( 'session_user',$userSVC );
                $this->setSessionParam( 'session_user_id', $userSVC->id );
                $this->setSessionParam( 'session_user_is_admin', $userSVC->isAdmin );
				$this->setSessionParam( 'session_user_is_data_admin', $userSVC->isDataAdmin );
                $this->setSessionParam( 'session_user_email', $userSVC->email );
                $this->setSessionParam( 'session_user_name', $username );
				$this->setSessionParam( 'session_user_role', $role );
				$this->setSessionParam( 'session_approval_needed', $approvalNeeded );
                $this->setSessionParam( 'session_power_user', $powerUser );
				$this->setSessionParam( 'session_user_current_org_id', $currentUserOrgId );
				$this->setSessionParam( 'accountDropdown', $accountDropdown );
				$this->setSessionParam( 'adminPrivileges', $adminPrivileges );

 				
                return true;
            }
            
            return false;
        }
        
     }
?>