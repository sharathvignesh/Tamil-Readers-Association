<?php
    class UserSVC
    {
        private $id;
        private $email;
        private $username;        
        private $firstname;
        private $lastname;
        private $password;
        private $gender;
        private $yearOfBirth;
        private $phone;
        private $mobile;
        private $addressLine1;
        private $addressLine2;
        private $addressCity;
        private $addressState;
        private $addressCountry;
        private $addressZipCode;
        private $photo;
        private $accountType=1;        
        private $recordStatus;
        private $lastLoginTime;
        private $isAdmin;
        private $isDataAdmin;
        private $interests;
        private $newsletters;
        private $facebookDetails;
        private $twitterDetails;
        private $openidDetails;
        private $activationKey;
		private $favoriteApps;
		private $ownedApps;
		private $pageNumber;
		private $pageSize;
		private $privileges;
        private $registeredDate;

		
        /* Default Get Method */
        public function __get( $name )
        {
			if( property_exists( "UserSVC", $name ) )
				return $this->$name;
			
			return null;
        }
        
        /* Default Set Method */
        public function __set( $name, $value )
        {
			if( property_exists( "UserSVC", $name ) )
				$this->$name = $value;
        }
        
        /*
		 * Add user details to database
		 *
		 * @return
		*/
		public function Add( )
        {
			$password = "";
			if( $this->password!="" )
			{
				$password = md5($this->password);
			}
			
            $dataArray = array( "email"=>$this->email,
						        "username"=>$this->username,
                                "firstname"=>$this->firstname,
                                "lastname"=>$this->lastname,
                                "password"=>$password,
                                "gender"=>$this->gender,
                                "yearOfBirth"=>$this->yearOfBirth,
                                "phone"=>$this->phone,
                                "mobile"=>$this->mobile,
                                "addressLine1"=>$this->addressLine1,
                                "addressLine2"=>$this->addressLine2,
                                "addressCity"=>$this->addressCity,
                                "addressState"=>$this->addressState,
                                "addressCountry"=>$this->addressCountry,
                                "addressZipCode"=>$this->addressZipCode,
                                "photo"=>$this->photo,
                                "interests"=>$this->interests,
								"newsletters"=>intval($this->newsletters),
                                "recordStatus" =>$this->recordStatus,
                                "lastLoginTime"=>$this->lastLoginTime,
                                "accountType"=>$this->accountType,
                                "isAdmin"=>$this->isAdmin,
								"isDataAdmin" => $this->isDataAdmin,
                                "facebookDetails" =>$this->facebookDetails,
                                "twitterDetails" =>$this->twitterDetails,
                                "favoriteApps"=>$this->favoriteApps,
                                "openidDetails" =>$this->openidDetails,                                
                                "ownedApps"=>$this->ownedApps,								
                                "registeredDate"=>$this->registeredDate,
                                "privileges"=>$this->privileges							
                            );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/Add/123", "json" );
            
            return $response;
        }
        
        /*
		 * update given user details
		 *
		 * @return
		*/
		public function Update( )
        {
			$password = "";
			if( $this->password!="" )
			{
				$password = $this->password;
			}
			
            $dataArray = array( "userInfo" =>array( "email"=>$this->email,
												    "username"=>$this->username,
                                                    "firstname"=>$this->firstname,
                                                    "lastname"=>$this->lastname,
                                                    "password"=>$password,
                                                    "gender"=>$this->gender,
                                                    "yearOfBirth"=>$this->yearOfBirth,
                                                    "phone"=>$this->phone,
                                                    "mobile"=>$this->mobile,
                                                    "addressLine1"=>$this->addressLine1,
                                                    "addressLine2"=>$this->addressLine2,
                                                    "addressCity"=>$this->addressCity,
                                                    "addressState"=>$this->addressState,
                                                    "addressCountry"=>$this->addressCountry,
                                                    "addressZipCode"=>$this->addressZipCode,
                                                    "interests"=>$this->interests,
													"newsletters"=>intval($this->newsletters)
                                                 )
                            );
			//Check if isAdmin exists
			if( isset($this->isAdmin) )
			{
				$tempArray = array("isAdmin"=>intval($this->isAdmin));				
				$dataArray = array_merge($dataArray,$tempArray);
			}
			
			//Check if recordStatus exists
			if( isset( $this->recordStatus ) )
			{
				$tempArray = array("recordStatus"=>intval($this->recordStatus));
				$dataArray = array_merge($dataArray,$tempArray);
			}
			//Check if facebook details are provided for update
			if( isset( $this->facebookDetails ) )
			{
				$tempArray = array("facebookDetails"=>$this->facebookDetails);
				$dataArray = array_merge($dataArray,$tempArray);
			}
			//Check if twitter details are provided for update
			if( isset( $this->twitterDetails ) )
			{
				$tempArray = array("twitterDetails"=>$this->twitterDetails);
				$dataArray = array_merge($dataArray,$tempArray);
			}
			
			//Check if isDataAdmin field is set
			if( isset( $this->isDataAdmin ) )
			{
				$tempArray = array("isDataAdmin"=> $this->isDataAdmin );				
				$dataArray = array_merge( $dataArray, $tempArray );
			}
			
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/Update/".$this->id, "json" );
            
            return $response;
        }
        
        /*
		 * Get requested user details
		 *
		 * @return
		*/
		public function Show( )
        {
            $dataArray = array(
                                "id"=>$this->id
                            );
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/Show/".$this->id, "json" );
            
            return $response;
        }
        
        /*
		 * Get all user details
		 *
		 * @return
		*/
		public function ShowAll( )
        {
            $dataArray = array(
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/ShowAll/123", "json" );
            
            return $response;
        }
        
        /*
		 * Delete given user details
		 *
		 * @return
		*/
		public function Delete( Array $idArray,$type="soft" )
        {
            $dataArray = array(
                                "idArray"=>$idArray,
								"type"=>$type
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/Delete/123", "json" );
            
            return $response;
        }
        
        /*
		 * Check uniqueness of email provided
		 *
		 * @return boolean true if available else false
		*/
        public function CheckEmailAvailability( $profileId=0,$userId=0 )
        {
            $dataArray = array(
                                "email"=>$this->email,
								"accountType"=>$this->accountType,
								"profileId"=>$profileId,
								"userId"=>$userId
                            );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/CheckEmailAvailability/123", "json" );
            
            return $response;
        }
        
        /*
		 * Authenticates username and password
		 *
		 * @return 	json object
		*/
		public function Authenticate( )
		{
			$dataArray = array(
                                "email"=>$this->email,
                                "password"=>$this->password
                            );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/Authenticate/123", "json" );
            
            return $response;
		}
        
        /*
		 * Check Activation Key Exists
		 *
		 * @return 	json object
		*/
		public function CheckActivationKeyExists( )
		{
			$dataArray = array(
                                "activationKey"=>$this->activationKey
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/CheckActivationKeyExists/123", "json" );
            
            return $response;
		}
        
        /*
		 * Confirm Registration
		 *
		 * @return 	json object
		*/
		public function ConfirmRegistration( )
		{
			$dataArray = array( "recordStatus" =>1,
                                "activationKey"=>$this->activationKey
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/ConfirmRegistration/123", "json" );
            
            return $response;
		}
        
        public function UpdateLoginTime( )
        {
            $dataArray = array(
                               "lastLoginTime"=>$this->lastLoginTime
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/UpdateLoginTime/".$this->id, "json" );
        }
		
		/* Update Apps associated with the user */
		public function UpdateAppsAssociation( $updateField="", $action="" )
        {
			if( $updateField=="favorite" )
			{
				$dataArray = array("favoriteApps"=>$this->favoriteApps, "updateField"=>$updateField, "action"=>$action);
			}
			elseif( $updateField=="owned" )
			{
				$dataArray = array("ownedApps"=>$this->ownedApps, "updateField"=>$updateField, "action"=>$action);
			}
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/UpdateAppsAssociation/".$this->id, "json" );
        }
		
		/* Reset the password */
		public function ResetPassword( )
        {
			$dataArray = array("email"=>$this->email, "password"=>$this->password );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/ResetPassword/123", "json" );
			
			return $response;
        }
		
		/*
		 * Get all users based on search criteria
		 *
		 * @return
		*/
		public function ShowListForAdminAction( Array $searchCriteria )
        {
            $dataArray = array(
							   "searchCriteria"=>$searchCriteria,
							   "pageNumber"=>$this->pageNumber,
							   "pageSize"=>$this->pageSize
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/ShowListForAdminAction/123", "json" );
            
            return $response;
        }
		
		/*
		 * Suspend given users
		 *
		 * @return
		*/
		public function Approve( Array $idArray )
        {
			$dataArray = array(
                                "idArray"=>$idArray
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/Approve/123", "json" );
            
            return $response;
        }
		
		/*
		 * Suspend given users
		 *
		 * @return
		*/
		public function Suspend( Array $idArray )
        {
			$dataArray = array(
                                "idArray"=>$idArray
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/Suspend/123", "json" );
            
            return $response;
        }
		
		//Update the user's privileges
		public function UpdatePrivileges( )
        {
			$dataArray = array(
                                "privileges"=>$this->privileges
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/UpdatePrivileges/".$this->id, "json" );
            
            return $response;
        }
		
		public function RemovePrivilege( $orgId="" )
        {
			$dataArray = array(
                                "orgId"=>$orgId
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/RemovePrivilege/".$this->id, "json" );
            
            return $response;
        }
		
		//Get Apps associated with the user
		public function ShowAssociatedApps( $associationKey="" )
        {
			$dataArray = array(
                                "associationKey"=>$associationKey
                               );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/ShowAssociatedApps/".$this->id, "json" );
            
            return $response;
        }
		
		/*
		 * Check uniqueness of username provided
		 *
		 * @return 1 if already exists else 0
		*/
        public function CheckUsernameAvailability( $userId=0 )
        {
            $dataArray = array(
                                "username"=>$this->username,
								"userId"=>$userId
                            );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/CheckUsernameAvailability/123", "json" );
            
            return $response;
        }
		
		
		/*
		 * Merge given accounts
		 *
		 * @return
		*/
        public function UpdateSocialMediaField( $updateFieldType=0 )
        {
            $dataArray = array(
                                "updateFieldType"=>$updateFieldType,
								"facebookDetails"=>$this->facebookDetails,
								"twitterDetails"=>$this->twitterDetails
                            );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/UpdateSocialMediaField/".$this->id, "json" );
            
            return $response;
        }
		
		/*
		 * Authenticate social media login
		 *
		 * @return
		*/
        public function AuthenticateSocialMediaLogin( $profileId=0,$accountType )
        {
            $dataArray = array(
								"profileId"=>$profileId,
								"accountType"=>$accountType
                            );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/AuthenticateSocialMediaLogin/123", "json" );
            
            return $response;
        }
		
		/*
		 * Merge two accounts
		 *
		 * @return
		*/
        public function MergeAccounts( $mFirstAccountId,$socialAccountId,$mergingFieldsArray )
        {
            $dataArray = array(
								"mFirstAccountId"=>$mFirstAccountId,
								"socialAccountId"=>$socialAccountId,
								"mergingFieldsArray"=>$mergingFieldsArray
                            );
            
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/User/MergeAccounts/123", "json" );
            
            return $response;
        }
    }
?>