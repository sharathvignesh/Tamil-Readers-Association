<?php
	
	class EditUser extends Action
    {
        public function init( )
        {
			$this->template = "edit_user";
            
            parent::init( );
        }
		
		public function execute( $request, $response )
        {
            //Check if user has logged in
            $sessionUserId = $this->getSessionUserId();
            if( !isset( $sessionUserId ) )
            {
                //Redirect to Login page
                header( "Location: " . BASE_URL . "/Login?message=view_login_required" );
                exit;
            }
			
			
            //Initialise
            $userSVC = new UserSVC();
            $yearOfBirth = "";
            
            //Show Existing Details of the user
            $userSVC->id = $sessionUserId;
            
            /* If not submit */
            if( ( $this->getRequestParam( "submitUser" ) ) )
            {
                //Validate and populate the userSVC object
                if( $this->ValidateUserInput( $userSVC ) )
                {
					//Edit the user account
					$userSVC->Update();
					
					//Update Session Params
					$username = $userSVC->username;
					if( trim($username)=="" )
					{
						//if username is not givem, use name as the substitute
						$username = ucfirst($userSVC->firstname);
						if($userSVC->lastname!="")
						{
							$username .= " ".ucfirst($userSVC->lastname);
						}
					}
					
					$this->setSessionParam( 'session_user', $userSVC );
					//$this->setSessionParam( 'session_user_is_admin', $userSVC->isAdmin );
					$this->setSessionParam( 'session_user_email', $userSVC->email );
					$this->setSessionParam( 'session_user_name', $username );
				
					$this->addMessage( "update_success", array("User Information") );
                }
                else
                {
                    $this->addMessage( "update_failure", array( "User Information" ) );
                }
            }
            
			
			//Show User Details
			$rawResponse  = json_decode( $userSVC->Show( ), true );
			//$responseData = $rawResponse["response"]["responseArray"];
			$responseData = $rawResponse["data"]["content"][0];
                     
			$userSVC->email = $responseData["email"];
			$userSVC->username = $responseData["username"];
			$userSVC->firstname = $responseData["firstname"];
			$userSVC->lastname = $responseData["lastname"];
			$userSVC->gender = $responseData["gender"];
			$userSVC->yearOfBirth = isset($responseData["yearOfBirth"])?$responseData["yearOfBirth"]:"";
			$userSVC->phone = $responseData["phone"];
			$userSVC->mobile = $responseData["mobile"];
			//$userSVC->registeredDate = $responseData["registeredDate"];
			$userSVC->addressLine1 = $responseData["addressLine1"];
			$userSVC->addressLine2 = $responseData["addressLine2"];
			$userSVC->addressCity = $responseData["addressCity"];
			$userSVC->addressState = $responseData["addressState"];
			$userSVC->addressCountry = $responseData["addressCountry"];
			$userSVC->addressZipCode = $responseData["addressZipCode"];
			$userSVC->recordStatus = $responseData["recordStatus"];
			$userSVC->lastLoginTime = $responseData["lastLoginTime"];
			$userSVC->interests = isset($responseData["interests"])?$responseData["interests"]:"";
			$userSVC->newsletters = isset($responseData["newsletters"])?$responseData["newsletters"]:0;
			$userSVC->accountType = isset($responseData["accountType"])?$responseData["accountType"]:1;
			$userSVC->facebookDetails = isset($responseData["facebookDetails"])?$responseData["facebookDetails"]:array();
			$userSVC->twitterDetails = isset($responseData["twitterDetails"])?$responseData["twitterDetails"]:array();
						
			$currentOrgId = $this->getSessionParam("session_user_current_org_id")?$this->getSessionParam("session_user_current_org_id"):"";
				
            //Set response
            $this->setResponseParam( "userSVC",$userSVC );
        }
		
		//Validate and populate user input
        private function ValidateUserInput( UserSVC $userSVC )
        {
            //Verifying mandatory fields
			if( !Validator::validateNotEmpty( $this->getRequestParam( "username" ) ) )
                $this->addError( "username_required" );
			
			//Check email only for mFirst accounts
			if(  intval(trim($this->getRequestParam( "accountType" )))==1 )
			{
				if( !Validator::validateNotEmpty( $this->getRequestParam( "email" ) ) )
					$this->addError( "email_required" );
			}
                
            //Get Session User details
            $sessionUser = $this->getSessionParam( "session_user" );
			
            $password = "";
            //Password Change
			if(  intval(trim($this->getRequestParam( "accountType" )))==1 )
			{
				if( trim($this->getRequestParam( "password" )) != "" )
				{
					if( md5($this->getRequestParam( "password" )) == $sessionUser->password )
					{
						if( !Validator::validateNotEmpty( $this->getRequestParam( "newPassword" ) ) )
							$this->addError( "new_password_required" );
						if( !Validator::validateNotEmpty( $this->getRequestParam( "confirmPassword" ) ) )
							$this->addError( "confirm_password_required" );
					
						if( trim($this->getRequestParam( "newPassword" )) == trim($this->getRequestParam( "confirmPassword" )) )
						{
							$password = md5(trim($this->getRequestParam( "newPassword" )));
						}
						else
						{
							$this->addError( "password_mismatch" );
						}
					}
					else
					{
						$this->addError( "password_incorrect" );
					}
				}
				else
				{
					if( trim($this->getRequestParam( "newPassword" )) != "" || trim($this->getRequestParam( "confirmPassword" ))!="" )
					{
						//If attempt is made to change password but not given the old password, throw error
						$this->addError( "old_password_required" );
					}
					else
					{
						$password = $sessionUser->password;
					}
				}
			}
			
			//Prepare selected country array
			//$addressCountryArray = array();
			//$selectedCountryId = $this->getRequestParam( "addressCountry" );
			//$countryResponse = MongoUtils::GetSelectedCountryDetails( "id",$selectedCountryId );			
			//if( is_array($countryResponse) && count($countryResponse)>0 )
			//{
			//	$addressCountryArray = array( "id"=>$countryResponse["id"]['$id'], "name"=>$countryResponse["name"], "code"=>$countryResponse["code"], "alias"=>$countryResponse["alias"] );
			//}
            
            /* Populate object */
            $userSVC->email = trim( $this->getRequestParam( "email" ) );
			$userSVC->username = trim( $this->getRequestParam( "username" ) );
            $userSVC->password  = $password;
            $userSVC->firstname = trim( $this->getRequestParam( "firstname" ) );
            $userSVC->lastname = trim( $this->getRequestParam( "lastname" ) );
            $userSVC->gender    = trim( $this->getRequestParam( "gender" ) );
            $userSVC->yearOfBirth = trim( $this->getRequestParam( "yearOfBirth" ) );
            $userSVC->phone     = trim( $this->getRequestParam( "phoneNo" ) );
            $userSVC->mobile    = trim( $this->getRequestParam( "mobile" ) );
            $userSVC->addressLine1 = trim( $this->getRequestParam( "addressLine1" ) );
            $userSVC->addressLine2 = trim( $this->getRequestParam( "addressLine2" ) );
            $userSVC->addressCity = trim( $this->getRequestParam( "addressCity" ) );
            $userSVC->addressState = trim( $this->getRequestParam( "addressState" ) );
            $userSVC->addressCountry = trim( $this->getRequestParam( "addressCountry" ) ); //$addressCountryArray;
            $userSVC->addressZipCode = trim( $this->getRequestParam( "addressZipCode" ) );
            $userSVC->interests = trim( $this->getRequestParam( "interests" ) );
			$userSVC->newsletters = $this->getRequestParam( "newsletters" )?$this->getRequestParam( "newsletters" ):0;
            
			//Check availability of the email entered
			$profileId=0;
			$userId=$userSVC->id;
			$checkAvailability = json_decode( $userSVC->CheckEmailAvailability( $profileId,$userId ), true );
			if( $checkAvailability["response"]["responseArray"]["mFirstAccountExists"]==1 )
			{
				$this->addError( "email_duplicate" );
			}
			
			//Check if username already exists
			$checkAvailability = json_decode( $userSVC->CheckUsernameAvailability( $userSVC->id ), true );
			if( $checkAvailability["response"]["responseArray"]["usernameExists"]==1 )
			{
				$this->addError( "username_exists" );
			}
			
            if( $this->hasErrors( ) )
                return false;
            else
                return true;
        }
				
    }
?>