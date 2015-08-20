<?php
	class EditUserPopUp extends Action
    {
        public function init( )
        {
			$this->template = "edit_user_pop_up";
            $this->layout = "plain_layout";
            
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
            
            /* If not submit, return */
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
					
					$this->setResponseParam( "message","Update was successfull" );
                }
                else
                {
                    $this->setResponseParam( "message","Update failure!! Please try again" );
                }
            }
            
            //Show User Details
            $rawResponse  = json_decode( $userSVC->Show( ), true );
            $responseData = $rawResponse["response"]["responseArray"];
        
			$userSVC->email = $responseData["userInfo"]["email"];
			$userSVC->username = $responseData["userInfo"]["username"];
            $userSVC->firstname = $responseData["userInfo"]["firstname"];
            $userSVC->lastname = $responseData["userInfo"]["lastname"];
            $userSVC->gender = $responseData["userInfo"]["gender"];
            $userSVC->yearOfBirth = $responseData["userInfo"]["yearOfBirth"];
            $userSVC->phone = $responseData["userInfo"]["phone"];
            $userSVC->mobile = $responseData["userInfo"]["mobile"];
            $userSVC->registeredDate = $responseData["userInfo"]["registeredDate"];
            $userSVC->addressLine1 = $responseData["userInfo"]["addressLine1"];
            $userSVC->addressLine2 = $responseData["userInfo"]["addressLine2"];
            $userSVC->addressCity = $responseData["userInfo"]["addressCity"];
            $userSVC->addressState = $responseData["userInfo"]["addressState"];
            //$userSVC->addressCountry = $responseData["userInfo"]["addressCountry"];
            $userSVC->addressZipCode = $responseData["userInfo"]["addressZipCode"];
            $userSVC->recordStatus = $responseData["recordStatus"];
            $userSVC->lastLoginTime = $responseData["lastLoginTime"];
            $userSVC->interests = $responseData["userInfo"]["interests"];
			$userSVC->newsletters = isset($responseData["userInfo"]["newsletters"])?$responseData["userInfo"]["newsletters"]:0;
			$userSVC->accountType = isset($responseData["accountType"])?$responseData["accountType"]:1;
			
			//Countries dropdown
			$response->countriesDropdown = Utils::GetCountriesDropdown( );
			$frequentlyUsedCountriesCode = array(
												  "USA",
												  "GBR",
												  "BEL",
												  "FRA",
												  "CAN",
												  "AUS",
												  "DEU"
												);
			$countrySelectedId = isset( $responseData["userInfo"]["addressCountry"]["id"] )?trim($responseData["userInfo"]["addressCountry"]["id"]):"";
			
            //Set response
            $this->setResponseParam( "userSVC",$userSVC );
            $response->yearOfBirthDropdown = Utils::GetNumbersDropdown( 1930, date('Y'), $userSVC->yearOfBirth );
			$this->setResponseParam( "countrySelectedId",$countrySelectedId );
			$this->setResponseParam( "frequentlyUsedCountriesCode",$frequentlyUsedCountriesCode );
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
			if(  intval(trim($this->getRequestParam( "accountType" )))==1 )
			{
				//Password Change
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
						$this->addError( "old_password_required" );
					}
					else
					{
						$password = $sessionUser->password;
					}
				}
			}
			
			//Prepare selected country array
			$addressCountryArray = array();
			$selectedCountryId = $this->getRequestParam( "addressCountry" );
			$countryResponse = MongoUtils::GetSelectedCountryDetails( "id",$selectedCountryId );			
			if( is_array($countryResponse) && count($countryResponse)>0 )
			{
				$addressCountryArray = array( "id"=>$countryResponse["id"]['$id'], "name"=>$countryResponse["name"], "code"=>$countryResponse["code"], "alias"=>$countryResponse["alias"] );
			}
            
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
            $userSVC->addressCountry = $addressCountryArray;
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