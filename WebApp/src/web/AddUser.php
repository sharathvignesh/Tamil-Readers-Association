<?php
	class AddUser extends Action
    {
        public function init( )
        {
	    $this->template = "add_user";
            parent::init( );
        }
		
		public function execute( $request, $response )
        {
            //Initialise
            $showRegistrationForm = 1;
            
			/* If not submit, return */
            if( !( $this->getRequestParam( "submitUser" ) ) )
            {
                $this->setResponseParam( "showRegistrationForm",$showRegistrationForm );
                return;
            }
            
            $userSVC = new UserSVC();
            //Validate and populate the userSVC object
            if( $this->ValidateUserInput( $userSVC ) )
            {                 
				//Add the user to DB
				$userSVC->Add();
								
                error_log("AddUser UserSVC - " . print_r($userSVC,true));  
                
				$this->addMessage( "register_success", array($userSVC->email) );
				$showRegistrationForm = 0;
            }
			
            //Set response
            $this->setResponseParam( "userSVC",$userSVC );
            $this->setResponseParam( "showRegistrationForm",$showRegistrationForm );
        }
		
		//Validate and populate user input
        private function ValidateUserInput( UserSVC $userSVC )
        {
            //Verifying mandatory fields
            if( !Validator::validateNotEmpty( $this->getRequestParam( "email" ) ) )
                $this->addError( "email_required" );
			if( !Validator::validateNotEmpty( $this->getRequestParam( "username" ) ) )
                $this->addError( "username_required" );
				
			if( !($this->getRequestParam( "iAgree" )) )
			{
                $this->addError( "agree_to_terms" );
			}
			
            //Generate Password
            $mix = "ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjklmnpqrstuvwxyz23456789"; // Characters to use in the captcha I have taken out 0,O,1,l,I to avoid confusion
            $rand = substr(str_shuffle($mix), 0, 5); // Generate a random 5 character string from the $mix
            
            /* Populate object */
            $userSVC->email     = trim( $this->getRequestParam( "email" ) );
			$userSVC->username  = trim( $this->getRequestParam( "username" ) );
            $userSVC->firstname = trim( $this->getRequestParam( "firstname" ) );
            $userSVC->lastname  = trim( $this->getRequestParam( "lastname" ) );
            $userSVC->password  = trim($rand);
            $userSVC->gender    = "";
            $userSVC->yearOfBirth = "";
            $userSVC->phone     = "";
            $userSVC->mobile    = "";
            $userSVC->addressLine1 = "";
            $userSVC->addressLine2 = "";
            $userSVC->addressCity = "";
            $userSVC->addressState = "";
            $userSVC->addressCountry = ""; //array();
            $userSVC->addressZipCode = "";
            $userSVC->photo = "";
            $userSVC->interests = "";
            $userSVC->newsletters = 0;						
            $userSVC->lastLoginTime = strtotime( gmdate('Y-m-d H:i:s') ); // new MongoDate(0);
			$userSVC->recordStatus = 2;
            $userSVC->accountType = 1;            
            $userSVC->isAdmin = 0;
			$userSVC->isDataAdmin = 0;
            $userSVC->facebookDetails = array();
            $userSVC->twitterDetails = array();

            $userSVC->favoriteEvents = array( );
            $userSVC->ownedEvents = array( );

            $userSVC->openidDetails = array();            
            //Prepare default privileges array
            $defaultOrganization = array(
                                        "id"=>"mFirstWeb",
                                        "name"=>"mFirst",
                                        "webUrl"=>"mFirstWeb",
                                        );
            $privilegesArray[] = array( "organization"=>$defaultOrganization,"role"=>1,"approvalNeeded"=>1,"default"=>1 );
            $userSVC->privileges = $privilegesArray;            
            $userSVC->registeredDate = strtotime( gmdate('Y-m-d H:i:s') ); //FIXME new MongoDate(strtotime( gmdate('Y-m-d H:i:s') ) );
            
			//Check availability of the email entered
			$profileId=0;
			$userId=0;
			$checkAvailability = json_decode( $userSVC->CheckEmailAvailability( $profileId,$userId ), true );
			//if( $checkAvailability["response"]["responseArray"]["mFirstAccountExists"]==1 )
            if( $checkAvailability["data"]["content"][0]["mFirstAccountExists"]==1 )            
			{
				$this->addError( "email_duplicate" );
			}
			
			//Check if username already exists
			$checkAvailability = json_decode( $userSVC->CheckUsernameAvailability( $userId ), true );
			//if( $checkAvailability["response"]["responseArray"]["usernameExists"]==1 )
            if( $checkAvailability["data"]["content"][0]["usernameExists"]==1 )            
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