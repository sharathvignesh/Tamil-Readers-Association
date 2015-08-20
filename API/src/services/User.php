<?php
require "../src/dao/UserDAO.php";
require "../src/dao/IDInfoDAO.php";

class User
{
	public function Show( $id )
	{
            $userDAO = new UserDAO( );
            
            $results =  $userDAO->Show( $id );
            
            if ($results == null) {
                return null;
            }
                                
            if ($results == FAILED) {
                return FAILED;
            }       
    
            $response = array();

            $statusArray = array();
            $statusArray["statusCode"] = SUCCESS_CODE;
            $statusArray["message"] =  "Success - Data retrieved";

            $response["status"] = $statusArray;

            $dataArray = array();
            
            $infoArray = array();
            $infoArray["appName"] = "Asthma";
            $infoArray["dataVersion"] = 1.2;

            $dataArray["info"] = $infoArray;
            
            $contentArray = array();
            
            $responseArray = $results["responseArray"][0];
            
            if ($responseArray != null) {
                foreach ($responseArray as $value) {
                                    
                    $contentItemArray = array();
                    $contentItemArray["id"] = $value["id"];
                                      
                    $contentItemArray["email"] = $value["email"];
                    $contentItemArray["username"] = $value["username"];
                    $contentItemArray["firstname"] = $value["firstname"];
                    $contentItemArray["lastname"] = $value["lastname"];
                    $contentItemArray["password"] = $value["password"];
                    $contentItemArray["gender"] = $value["gender"];
                    $contentItemArray["yearOfBirth"] = $value["yearOfBirth"];
                    $contentItemArray["phone"] = $value["phone"];
                    $contentItemArray["mobile"] = $value["mobile"];
                    $contentItemArray["addressLine1"] = $value["addressLine1"];
                    $contentItemArray["addressLine2"] = $value["addressLine2"];
                    $contentItemArray["addressCity"] = $value["addressCity"];
                    $contentItemArray["addressState"] = $value["addressState"];
                    $contentItemArray["addressCountry"] = $value["addressCountry"];
                    $contentItemArray["addressZipCode"] = $value["addressZipCode"];
                    $contentItemArray["photo"] = $value["photo"];
                    $contentItemArray["interests"] = $value["interests"];
                    $contentItemArray["newsletters"] = $value["newsletters"];
                    $contentItemArray["lastLoginTime"] = $value["lastLoginTime"];
                    $contentItemArray["recordStatus"] = $value["recordStatus"];
                    $contentItemArray["accountType"] = $value["accountType"];
                    $contentItemArray["isAdmin"] = $value["isAdmin"];
                    $contentItemArray["isDataAdmin"] = $value["isDataAdmin"];
                    $contentItemArray["geoCoordinates"] = $value["geoCoordinates"];
                    $contentItemArray["facebookDetails"] = $value["facebookDetails"];
                    $contentItemArray["twitterDetails"] = $value["twitterDetails"];
                    $contentItemArray["action"] = $value["action"];
                    $contentItemArray["actionBy"] = $value["actionBy"];
                    $contentItemArray["createdAt"] = $value["createdAt"];
                    $contentItemArray["updatedAt"] = $value["updatedAt"];
                    
                    array_push($contentArray,$contentItemArray);
 
                }
            }

            $dataArray["content"] = $contentArray;
            
            $response["data"] = $dataArray;
            
            return $response;
	}

	
    public function Add( Array $dataArray )
    {
        $idInfoDAO = new IDInfoDAO( );
        
        $dataArray["id"] = $idInfoDAO->GetNextID("USERS");
        
        $userDAO = new UserDAO( );
        $results = $userDAO->Add( $dataArray );
                    
        if ($results == null) {
            return null;
        }
                                
        if ($results == FAILED) {
            return FAILED;
        }       
    
        if ($results["success"] == false) {
            return FAILED;
        }
    
        $response = array();

        $statusArray = array();
        $statusArray["statusCode"] = SUCCESS_CODE;
        $statusArray["message"] =  "Success - Data retrieved";

        $response["status"] = $statusArray;

        $dataArray = array();
            
        $infoArray = array();
        $infoArray["appName"] = "Musician";
        $infoArray["dataVersion"] = 1.2;

        $dataArray["info"] = $infoArray;
            
        $contentArray = array();
            
        $responseArray = $results["responseArray"][0];
            
        if ($responseArray != null) {
             foreach ($responseArray as $value) {
                                    
                 $contentItemArray = array();
                 $contentItemArray["id"] = $value["id"];
                 $contentItemArray["DBOperationsStatus"] = $value["DBOperationsStatus"];
                                                         
                 array_push($contentArray,$contentItemArray);
             }
        }

        $dataArray["content"] = $contentArray;
            
        $response["data"] = $dataArray;
            
        return $response;
    }
    
    public function Update( $id, $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->Update( $id, $data );
    }
    
    public function Delete( $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->Delete( $data );
    }
    
    public function ShowAll( $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->ShowAll( $data );
    }
    
    public function CheckEmailAvailability( Array $dataArray )
    {
        $userDAO = new UserDAO( );        
        $results =  $userDAO->CheckEmailAvailability( $dataArray );

        if ($results == null) {
            return null;
        }
                                
        if ($results == FAILED) {
            return FAILED;
        }       
    
        // if  (!isset($results["success"]) || ($results["success"] == false) ) {
            // error_log( 'Error: CheckEmailAvailability fails ');            
            // return FAILED;
        // }
        
        $response = array();

        $statusArray = array();
        $statusArray["statusCode"] = SUCCESS_CODE;
        $statusArray["message"] =  "Success - Data retrieved";

        $response["status"] = $statusArray;

        $dataArray = array();
            
        $infoArray = array();
        $infoArray["appName"] = "Asthma";
        $infoArray["dataVersion"] = 1.2;

        $dataArray["info"] = $infoArray;
            
        $contentArray = array();
            
        $responseArray = $results["responseArray"][0];
            
        if ($responseArray != null) {
            foreach ($responseArray as $value) {
                                    
                $contentItemArray = array();
                
                $isUserInfoAvailable = FALSE;
                
                
                if (isset($value["mFirstAccountExists"]) && ($value["mFirstAccountExists"] == 1)) {
                    //$contentItemArray["mFirstAccountExists"] = $value["mFirstAccountExists"];
                    //$contentItemArray["id"] = $responseArray["userInfo"];
                    //$contentItemArray["facebookDetails"] = $responseArray["facebookDetails"];
                    //$contentItemArray["twitterDetails"] = $responseArray["twitterDetails"];
                    $contentItemArray["id"] = $value["mFirstId"];
                    $isUserInfoAvailable = TRUE;
                }

                if (isset($value["facebookAccountExists"]) && ($value["facebookAccountExists"] == 1)) {                    
                    //$contentItemArray["facebookAccountExists"] = $value["facebookAccountExists"];
                    //$contentItemArray["id"] = $value["userInfo"];
                    $contentItemArray["id"] = $value["facebookAccountId"];
                    $isUserInfoAvailable = TRUE;
                } 
                
                if (isset($value["twitterAccountExists"]) && ($value["twitterAccountExists"] == 1)) {
                    //$contentItemArray["twitterAccountExists"] =  $value["twitterAccountExists"];
                    //$contentItemArray["id"] =     $value["userInfo"];
                    $contentItemArray["id"] =     $value["twitterAccountId"];
                    $isUserInfoAvailable = TRUE;
                }
                
                $contentItemArray["mFirstAccountExists"]   = $value["mFirstAccountExists"];
                $contentItemArray["facebookAccountExists"] = $value["facebookAccountExists"];
                $contentItemArray["twitterAccountExists"]  = $value["twitterAccountExists"];
                
                if ($isUserInfoAvailable == TRUE) {
                    // //$contentItemArray["id"] = $value["id"];                                      
                    $contentItemArray["email"] = $value["email"];
                    $contentItemArray["username"] = $value["username"];
                    $contentItemArray["firstname"] = $value["firstname"];
                    $contentItemArray["lastname"] = $value["lastname"];
                    $contentItemArray["password"] = $value["password"];
                    $contentItemArray["gender"] = $value["gender"];
                    $contentItemArray["yearOfBirth"] = $value["yearOfBirth"];
                    $contentItemArray["phone"] = $value["phone"];
                    $contentItemArray["mobile"] = $value["mobile"];
                    $contentItemArray["addressLine1"] = $value["addressLine1"];
                    $contentItemArray["addressLine2"] = $value["addressLine2"];
                    $contentItemArray["addressCity"] = $value["addressCity"];
                    $contentItemArray["addressState"] = $value["addressState"];
                    $contentItemArray["addressCountry"] = $value["addressCountry"];
                    $contentItemArray["addressZipCode"] = $value["addressZipCode"];
                    $contentItemArray["photo"] = $value["photo"];
                    $contentItemArray["interests"] = $value["interests"];
                    $contentItemArray["newsletters"] = $value["newsletters"];
                    $contentItemArray["lastLoginTime"] = $value["lastLoginTime"];
                    $contentItemArray["recordStatus"] = $value["recordStatus"];
                    $contentItemArray["accountType"] = $value["accountType"];
                    $contentItemArray["isAdmin"] = $value["isAdmin"];
                    $contentItemArray["isDataAdmin"] = $value["isDataAdmin"];
                    $contentItemArray["geoCoordinates"] = $value["geoCoordinates"];
                    $contentItemArray["facebookDetails"] = $value["facebookDetails"];
                    $contentItemArray["twitterDetails"] = $value["twitterDetails"];
                    $contentItemArray["action"] = $value["action"];
                    $contentItemArray["actionBy"] = $value["actionBy"];
                    $contentItemArray["createdAt"] = $value["createdAt"];
                    $contentItemArray["updatedAt"] = $value["updatedAt"];
                }
                
                array_push($contentArray,$contentItemArray);
            }
        }

        $dataArray["content"] = $contentArray;
            
        $response["data"] = $dataArray;
            
        return $response;        
    }
    
    public function Authenticate( $dataArray )
    {

        $userDAO = new UserDAO( );
            
        $results =  $userDAO->Authenticate( $dataArray );
            
        if ($results == null) {
            return null;
        }
                                
        if ($results == FAILED) {
            return FAILED;
        }       
    
        $response = array();

        $statusArray = array();
        $statusArray["statusCode"] = SUCCESS_CODE;
        $statusArray["message"] =  "Success - Data retrieved";

        $response["status"] = $statusArray;

        $dataArray = array();
            
        $infoArray = array();
        $infoArray["appName"] = "Musician";
        $infoArray["dataVersion"] = 1.2;

        $dataArray["info"] = $infoArray;
            
        $contentArray = array();
            
        $responseArray = $results["responseArray"][0];
            
        if ($responseArray != null) {
            foreach ($responseArray as $value) {
                                    
                $contentItemArray = array();
                
                $contentItemArray["authentication"] = $value["authentication"];                
                
                $contentItemArray["id"] = $value["id"];                                      
                $contentItemArray["email"] = $value["email"];
                $contentItemArray["username"] = $value["username"];
                $contentItemArray["firstname"] = $value["firstname"];
                $contentItemArray["lastname"] = $value["lastname"];
                $contentItemArray["password"] = $value["password"];
                $contentItemArray["gender"] = $value["gender"];
                $contentItemArray["yearOfBirth"] = $value["yearOfBirth"];
                $contentItemArray["phone"] = $value["phone"];
                $contentItemArray["mobile"] = $value["mobile"];
                $contentItemArray["addressLine1"] = $value["addressLine1"];
                $contentItemArray["addressLine2"] = $value["addressLine2"];
                $contentItemArray["addressCity"] = $value["addressCity"];
                $contentItemArray["addressState"] = $value["addressState"];
                $contentItemArray["addressCountry"] = $value["addressCountry"];
                $contentItemArray["addressZipCode"] = $value["addressZipCode"];
                $contentItemArray["photo"] = $value["photo"];
                $contentItemArray["interests"] = $value["interests"];
                $contentItemArray["newsletters"] = $value["newsletters"];
                $contentItemArray["lastLoginTime"] = $value["lastLoginTime"];
                $contentItemArray["recordStatus"] = $value["recordStatus"];
                $contentItemArray["accountType"] = $value["accountType"];
                $contentItemArray["isAdmin"] = $value["isAdmin"];
                $contentItemArray["isDataAdmin"] = $value["isDataAdmin"];
                $contentItemArray["geoCoordinates"] = $value["geoCoordinates"];
                $contentItemArray["facebookDetails"] = $value["facebookDetails"];
                $contentItemArray["twitterDetails"] = $value["twitterDetails"];
                $contentItemArray["action"] = $value["action"];
                $contentItemArray["actionBy"] = $value["actionBy"];
                $contentItemArray["createdAt"] = $value["createdAt"];
                $contentItemArray["updatedAt"] = $value["updatedAt"];
                    
                array_push($contentArray,$contentItemArray);
 
            }
        }

        $dataArray["content"] = $contentArray;
            
        $response["data"] = $dataArray;
            
        return $response;
    }
    
    public function CheckActivationKeyExists( $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->CheckActivationKeyExists( $data );
    }
    
    public function ConfirmRegistration( $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->ConfirmRegistration( $data );
    }
    
    public function UpdateLoginTime( $id,$data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->UpdateLoginTime( $id,$data );
    }
    
    public function UpdateEventsAssociation( $id,$data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->UpdateEventsAssociation( $id,$data );
    }
    
    public function ResetPassword( $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->ResetPassword( $data );
    }
    
    public function ShowListForAdminAction( $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->ShowListForAdminAction( $data );
    }
    
    public function Approve( $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->Approve( $data );
    }
    
    public function Suspend( $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->Suspend( $data );
    }
    
    public function UpdatePrivileges( $id,$data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->UpdatePrivileges( $id,$data );
    }
    
    public function RemovePrivilege( $id,$data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->RemovePrivilege( $id,$data );
    }
    
    public function AuthenticateUserForPublic( $data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->AuthenticateUserForPublic( $data );
    }
    
    public function ShowAssociatedEvents( $id,$data )
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->ShowAssociatedEvents( $id,$data );
    }
    
    public function CheckUsernameAvailability( $data )
    {
        $userDAO = new UserDAO( );    
        $results = $userDAO->CheckUsernameAvailability( $data );
        
        if (($results == null) || ($results == FAILED)){
            return $results;
        }       
            
        $response = array();

        $statusArray = array();
        $statusArray["statusCode"] = SUCCESS_CODE;
        $statusArray["message"] =  "Success - Data retrieved";
        $response["status"] = $statusArray;

        $dataArray = array();            
        $infoArray = array();
        $infoArray["appName"] = "Asthma";
        $infoArray["dataVersion"] = 1.2;
        $dataArray["info"] = $infoArray;
            
        $contentArray = array();            
        $responseArray = $results["responseArray"][0];
            
        if ($responseArray != null) {
            foreach ($responseArray as $value) {
                                    
                $contentItemArray = array();
                                
                if (isset($value["usernameExists"])) {
                    $contentItemArray["usernameExists"] = $value["usernameExists"];
                }
                   
                array_push($contentArray,$contentItemArray);
            }
        }

        $dataArray["content"] = $contentArray;
        $response["data"] = $dataArray;

        return $response;        
    }
    
    public function UpdateSocialMediaField( $id,$data)
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->UpdateSocialMediaField( $id,$data );
    }
    
    public function AuthenticateSocialMediaLogin( $data)
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->AuthenticateSocialMediaLogin( $data );
    }
    
    public function MergeAccounts( $data)
    {
        $userDAO = new UserDAO( );
        
        return $userDAO->MergeAccounts( $data );
    }	
		
}
