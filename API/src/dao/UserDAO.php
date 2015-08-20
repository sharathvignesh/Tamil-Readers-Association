<?php
require_once "MySQLDatabase.php";

	class UserDAO extends MySQLDatabase
	{
		/* Setup the default constructor */
		public function __construct()
		{
			parent::__construct( );
		}
		
        /*
		 * Get requested user details
		 *
		 * @return
		*/
		public function Show( $id )
		{
            $returnArray = array( );
                                    
            $query = "select * from users where id = :id;";
            $parameters = array(
                ':id' =>$id
                );     

            $stmt = runQuery(DB_SERVER, DB_PORT, DB_USERNAME, DB_USERPASSWORD, DB_NAME, $query, $parameters);
        
            if($stmt == QUERY_FAILED){
                return FAILED;
            }
                                
            $row = fetchNextRow($stmt['statement']);
            
            $responseArray = array( );
            
		                
            if($row != null){
                $tmp=array();

                try
                {
                    while ($row != null ) {
                        
                        $tmmp=array();
                        
                        //User data
                        $tmmp["id"] = getValue($row, "id");
                        $tmmp["email"] = getValue($row, "email");
                        $tmmp["username"] = getValue($row, "username");
                        $tmmp["firstname"] = getValue($row, "firstname");
                        $tmmp["lastname"] = getValue($row, "lastname");
                        $tmmp["password"] = getValue($row, "password");
                        $tmmp["gender"] = getValue($row, "gender");
                        $tmmp["yearOfBirth"] = getValue($row, "yearOfBirth");
                        $tmmp["phone"] = getValue($row, "phone");
                        $tmmp["mobile"] = getValue($row, "mobile");
                        $tmmp["addressLine1"] = getValue($row, "addressLine1");
                        $tmmp["addressLine2"] = getValue($row, "addressLine2");
                        $tmmp["addressCity"] = getValue($row, "addressCity");
                        $tmmp["addressState"] = getValue($row, "addressState");
                        $tmmp["addressCountry"] = getValue($row, "addressCountry");
                        $tmmp["addressZipCode"] = getValue($row, "addressZipCode");
                        $tmmp["photo"] = getValue($row, "photo");       
                        $tmmp["interests"] = getValue($row, "interests");
                        $tmmp["newsletters"] = getValue($row, "newsletters");
                        $tmmp["lastLoginTime"] = getValue($row,"lastLoginTime");
                        $tmmp["recordStatus"] = getValue($row,"recordStatus");
                        $tmmp["accountType"] = getValue($row,"accountType");
                        $tmmp["isAdmin"] = getValue($row,"isAdmin");
                        $tmmp["isDataAdmin"] = getValue($row,"isDataAdmin");
                        $tmmp["geoCoordinates"] = getValue($row, "geoCoordinates");
                        $tmmp["facebookDetails"] = getValue($row,"facebookDetails");
                        $tmmp["twitterDetails"] = getValue($row,"twitterDetails");
                        $tmmp["action"] = getValue($row, "action");
                        $tmmp["actionBy"] = getValue($row, "actionBy");
                        $tmmp["createdAt"] = getValue($row, "createdAt");
                        $tmmp["updatedAt"] = getValue($row, "updatedAt");
                     
                        array_push($tmp,$tmmp);
                        
                        $row = fetchNextRow($stmt['statement']);
                    }
            
                    array_push($responseArray, $tmp);
                    $returnArray["success"] = true;
                }
                catch( Exception $e )
                {
                    error_log( 'Error: '. $e->getMessage() );
                
                    $returnArray["success"] = false;
                }
            
            }
            
            $returnArray["responseArray"] = $responseArray;
                        
            return $returnArray;
		}


       /*
         * Add user details to database
         *
         * @return
        */
        public function Add( Array $data )
        {
            $returnArray = array( );            
            $responseArray = array( );
            $parameters = array( );
            
            //$geoCoordinates = $this->GetGeoCode( $data );
            $geoCoordinates = "";
                                             
            //Insert into DB
            try
            {
                $query = "INSERT INTO users (
                         id,
                         email,
                         username,
                         firstname,
                         lastname,
                         password,
                         gender,
                         yearOfBirth,
                         phone,
                         mobile,
                         addressLine1,
                         addressLine2,
                         addressCity,
                         addressState,
                         addressCountry,
                         addressZipCode,
                         photo,
                         interests,
                         newsletters,
                         lastLoginTime,
                         recordStatus,
                         accountType,
                         isAdmin,
                         isDataAdmin,
                         geoCoordinates,
                         facebookDetails,
                         twitterDetails,
                         action,
                         actionBy,
                         createdAt,
                         updatedAt
                         )                
                         VALUES (
                         :id,
                         :email,
                         :username,
                         :firstname,
                         :lastname,
                         :password,
                         :gender,
                         :yearOfBirth,
                         :phone,
                         :mobile,
                         :addressLine1,
                         :addressLine2,
                         :addressCity,
                         :addressState,
                         :addressCountry,
                         :addressZipCode,
                         :photo,
                         :interests,
                         :newsletters,
                         :lastLoginTime,
                         :recordStatus,
                         :accountType,
                         :isAdmin,
                         :isDataAdmin,
                         :geoCoordinates,
                         :facebookDetails,
                         :twitterDetails,
                         :action,
                         :actionBy,
                         :createdAt,
                         :updatedAt                         
                        );";
                        
                date_default_timezone_set('UTC');
                $parameters = array(
                    ':id' =>isset( $data["id"] ) ? $data["id"] : 0,
                    ':email'=>$data["email"],
                    ':username'=>$data["username"],
                    ':firstname'=>$data["firstname"],
                    ':lastname'=>$data["lastname"],
                    ':password'=>$data["password"],
                    ':gender'=>$data["gender"],
                    ':yearOfBirth'=>$data["yearOfBirth"],
                    ':phone'=>$data["phone"],
                    ':mobile'=>$data["mobile"],
                    ':addressLine1'=>$data["addressLine1"],
                    ':addressLine2'=>$data["addressLine2"],
                    ':addressCity'=>$data["addressCity"],
                    ':addressState'=>$data["addressState"],
                    ':addressCountry'=>$data["addressCountry"],
                    ':addressZipCode'=>$data["addressZipCode"],
                    ':photo'=>$data["photo"],                    
                    ':interests'=>$data["interests"],
                    ':newsletters'=>$data["newsletters"],
                    ':lastLoginTime'=> date("Y-m-d H:i:s", $data["lastLoginTime"]),
                    ':recordStatus'=>$data["recordStatus"],
                    ':accountType'=>intval($data["accountType"]),
                    ':isAdmin'=>$data["isAdmin"],
                    ':isDataAdmin'=>isset( $data["isDataAdmin"] ) ? intval( $data["isDataAdmin"] ) : 0,
                    ':geoCoordinates'=>$geoCoordinates,                    
                    ':facebookDetails'=>"", //isset( $data["facebookDetails"] ) ? implode(",", $data["facebookDetails"]) : "", //,
                    ':twitterDetails'=>"",  //isset( $data["twitterDetails"] ) ? implode(",", $data["twitterDetails"]) : "", //implode(",", $data["twitterDetails"]),
                    ':action'=>"add",
                    ':actionBy'=>"nasoadmin",
                    ':createdAt'=>"2010-08-28 00:00:00",
                    ':updatedAt'=>"2010-08-28 00:00:00"                    
                    );
                    

                $stmt = runQuery(DB_SERVER, DB_PORT, DB_USERNAME, DB_USERPASSWORD, DB_NAME, $query, $parameters);

                $tmp=array();
                $tmmp=array();

                if($stmt == QUERY_FAILED){
                    $tmmp['id'] = 0; 
                    $tmmp['DBOperationsStatus'] = "QUERY FAILED";

                    array_push($tmp,$tmmp);
                    array_push($responseArray, $tmp);
                    $returnArray["responseArray"] = $responseArray;
                    $returnArray["success"] = false;
                    error_log( "Error " . $tmmp['DBOperationsStatus']);                             
                    return $returnArray;
                    //FAILED;
                }

                // lastIndexId
                // $id = $stmt['lastIndexId']);
                $tmmp['id'] = isset( $data["id"] ) ? $data["id"] : 0;
                $tmmp['DBOperationsStatus'] = "QUERY SUCCESS";                
                array_push($tmp,$tmmp);
                array_push($responseArray, $tmp);
                $returnArray["responseArray"] = $responseArray;
                $returnArray["success"] = true;
                error_log( "Success " . $tmmp['DBOperationsStatus'] );         
                return $returnArray;
            }
            catch( Exception $e )
            {
                //error_log( 'Error: '. $e->getMessage() );                
                //error_log( $e->getTraceAsString() );
                               
                $tmp=array();
                $tmmp=array();
                
                $tmmp['id'] = 0; //$addArray['_id'];      
                //$tmmp['DBOperationsStatus'] = "QUERY EXCEPTION" . $e->getMessage() . "   " . $e->getTrace();
                $tmmp['DBOperationsStatus'] = "QUERY EXCEPTION" . $e->getMessage() . "   " . $e->getTraceAsString() . "  ";
                array_push($tmp,$tmmp);
                array_push($responseArray, $tmp);

                $returnArray["responseArray"] = $responseArray;                                                    
                $returnArray["success"] = false;
                error_log( "Exception Handler:" . $tmmp['DBOperationsStatus']);
            }
            
            return $returnArray;
        }
        
        /*
         * update given user details
         *
         * @return
        */
        public function Update( $id, Array $data  )
        {
            $returnArray = array( );
            
            $geoCoordinates = $this->GetGeoCode( $data );
            
            //Update Array
            $updateArray = array(   "userInfo.email"=>$data["email"],
                                    "userInfo.username"=>$data["username"],
                                    "userInfo.firstname"=>$data["firstname"],
                                    "userInfo.lastname"=>$data["lastname"],
                                    "userInfo.password"=>$data["password"],
                                    "userInfo.gender"=>$data["gender"],
                                    "userInfo.yearOfBirth"=>$data["yearOfBirth"],
                                    "userInfo.phone"=>$data["phone"],
                                    "userInfo.mobile"=>$data["mobile"],
                                    "userInfo.addressLine1"=>$data["addressLine1"],
                                    "userInfo.addressLine2"=>$data["addressLine2"],
                                    "userInfo.addressCity"=>$data["addressCity"],
                                    "userInfo.addressState"=>$data["addressState"],
                                    "userInfo.addressCountry"=>$data["addressCountry"],
                                    "userInfo.addressZipCode"=>$data["addressZipCode"],
                                    "userInfo.interests"=>$data["interests"],
                                    "userInfo.newsletters"=>$data["newsletters"],
                                    "geoCoordinates"=>$geoCoordinates
                                 );
            
            //Check if isAdmin exists
            if( array_key_exists( "isAdmin",$data ) )
            {
                $tempArray = array("isAdmin"=>$data["isAdmin"]);    
                $updateArray = array_merge($updateArray,$tempArray);
            }
            
            //Check if recordStatus exists
            if( array_key_exists( "recordStatus",$data ) )
            {
                $tempArray = array("recordStatus"=>$data["recordStatus"]);
                $updateArray = array_merge($updateArray,$tempArray);
            }
            
            //Check if facebookdetails exists
            if( array_key_exists( "facebookDetails",$data ) )
            {
                $tempArray = array("facebookDetails"=>$data["facebookDetails"]);
                $updateArray = array_merge($updateArray,$tempArray);
            }
            //Check if twitter details exists
            if( array_key_exists( "twitterDetails",$data ) )
            {
                $tempArray = array("twitterDetails"=>$data["twitterDetails"]);
                $updateArray = array_merge($updateArray,$tempArray);
            }
            
            //Check if isDataAdmin field is set
            if( array_key_exists( "isDataAdmin",$data ) )
            {
                $tempArray = array( "isDataAdmin" => intval( $data["isDataAdmin"] ) );              
                $updateArray = array_merge( $updateArray, $tempArray );
            }
            
            error_log( print_r( $updateArray, true ) );
            
            // The string is converted to a MongoID object
            //$mongo_id = new MongoID($id);
            
            //Update the DB
            try
            {
                //$this->db->users->update( array("_id"=>$mongo_id),array('$set' =>$updateArray ) );
                
                $returnArray["success"] = true;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        /*
         * Delete given user details
         *
         * @return
        */
        public function Delete( Array $data )
        {
            $returnArray = array( );
            $idArray = $data["idArray"];
            $type = isset($data["type"])?$data["type"]:"soft";
            
            try
            {
                foreach( $idArray as $id )
                {
                    // The string is converted to a MongoID object
                    $mongo_id = new MongoID($id);
                    
                    if( $type=="soft" )
                    {
                        $this->db->users->update( array("_id"=>$mongo_id),array('$set' => array("recordStatus" => 0)) );
                    }
                    elseif( $type=="hard" )
                    {
                        $this->db->users->remove( array("_id"=>$mongo_id) );
                    }
                }
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        /*
         * Get all user details
         *
         * @return
        */
        public function ShowAll( Array $data )
        {
            $returnArray = array( );
            $responseArray = array( );
            
            //$data = $this->db->users->find( array("recordStatus"=>2) )->sort(array("userInfo.firstname"=>1));                        
            $query = "select * from users;";
            $parameters = array();     

            $stmt = runQuery(DB_SERVER, DB_PORT, DB_USERNAME, DB_USERPASSWORD, DB_NAME, $query, $parameters);
        
            if($stmt == QUERY_FAILED){
                return FAILED;
            }
                                
            $row = fetchNextRow($stmt['statement']);
            
            $responseArray = array( );
            
                        
            if($row != null){
                $tmp=array();

                try
                {
                    while ($row != null ) {
                        
                        $tmmp=array();
                        
                        //User data
                        $tmmp["id"] = getValue($row, "id");
                        $tmmp["email"] = getValue($row, "email");
                        $tmmp["username"] = getValue($row, "username");
                        $tmmp["firstname"] = getValue($row, "firstname");
                        $tmmp["lastname"] = getValue($row, "lastname");
                        $tmmp["password"] = getValue($row, "password");
                        $tmmp["gender"] = getValue($row, "gender");
                        $tmmp["yearOfBirth"] = getValue($row, "yearOfBirth");
                        $tmmp["phone"] = getValue($row, "phone");
                        $tmmp["mobile"] = getValue($row, "mobile");
                        $tmmp["addressLine1"] = getValue($row, "addressLine1");
                        $tmmp["addressLine2"] = getValue($row, "addressLine2");
                        $tmmp["addressCity"] = getValue($row, "addressCity");
                        $tmmp["addressState"] = getValue($row, "addressState");
                        $tmmp["addressCountry"] = getValue($row, "addressCountry");
                        $tmmp["addressZipCode"] = getValue($row, "addressZipCode");
                        $tmmp["photo"] = getValue($row, "photo");       
                        $tmmp["interests"] = getValue($row, "interests");
                        $tmmp["newsletters"] = getValue($row, "newsletters");
                        $tmmp["lastLoginTime"] = getValue($row,"lastLoginTime");
                        $tmmp["recordStatus"] = getValue($row,"recordStatus");
                        $tmmp["accountType"] = getValue($row,"accountType");
                        $tmmp["isAdmin"] = getValue($row,"isAdmin");
                        $tmmp["isDataAdmin"] = getValue($row,"isDataAdmin");
                        $tmmp["geoCoordinates"] = getValue($row, "geoCoordinates");
                        $tmmp["facebookDetails"] = getValue($row,"facebookDetails");
                        $tmmp["twitterDetails"] = getValue($row,"twitterDetails");
                        $tmmp["action"] = getValue($row, "action");
                        $tmmp["actionBy"] = getValue($row, "actionBy");
                        $tmmp["createdAt"] = getValue($row, "createdAt");
                        $tmmp["updatedAt"] = getValue($row, "updatedAt");
                     
                        array_push($tmp,$tmmp);
                        
                        $row = fetchNextRow($stmt['statement']);
                    }
            
                    array_push($responseArray, $tmp);
                    $returnArray["success"] = true;
                }
                catch( Exception $e )
                {
                    error_log( 'Error: '. $e->getMessage() );
                
                    $returnArray["success"] = false;
                }
            
            }
            
            $returnArray["responseArray"] = $responseArray;
                        
            return $returnArray;



        }
        
        /*
         * Check uniqueness of email provided
         *
         * @return boolean true if yes else false
         * 
            //Search in DB collection
            //if( $data["userId"]==0 )
            //{
            //      //Check if ukoot account exists
            //      $data = $this->db->users->find(array("userInfo.email"=>$email,"accountType"=>1));
            //}
            //else
            //{
            //      //Check if ukoot account exists
            //      $data = $this->db->users->find(array("userInfo.email"=>$email,"_id"=>array('$ne'=>$userId),"accountType"=>1));
            //}
            //foreach( $data as $value )
            //{
            //     $responseArray["ukootAccountExists"] = 1;
            //     $responseArray["userInfo"] = $value["userInfo"];
            //     $responseArray["facebookDetails"] = isset($value["facebookDetails"])?$value["facebookDetails"]:array();
            //     $responseArray["twitterDetails"] = isset($value["v"])?$value["twitterDetails"]:array();
            //     $responseArray["ukootId"] = $value["_id"];
            // }
            //    
            //    //Check if facebook account exists
            // $data = $this->db->users->find(array("facebookDetails.profileId"=>$profileId,"accountType"=>2));
            // foreach( $data as $value )
            // {
            //      $responseArray["facebookAccountExists"] = 1;
            //      $responseArray["userInfo"] = $value["userInfo"];
            //      $responseArray["facebookAccountId"] = $value["_id"];
            //  }
                
            //    //Check if twitter account exists
            //  $data = $this->db->users->find(array("twitterDetails.profileId"=>$profileId,"accountType"=>3));
            //  foreach( $data as $value )
            //  {
            //      $responseArray["twitterAccountExists"] = 1;
            //      $responseArray["userInfo"] = $value["userInfo"];
            //      $responseArray["twitterAccountId"] = $value["_id"];
            //  }
         * 
        */
        public function CheckEmailAvailability( Array $dataArray )
        {
            $returnArray = array( );
            $responseArray = array( );
            
            $responseArray["ukootAccountExists"] = 0;
            $responseArray["facebookAccountExists"] = 0;
            $responseArray["twitterAccountExists"] = 0;
            
            //Get email
            $email = trim($dataArray["email"]);
            $accountType = intval($dataArray["accountType"]);
            $profileId = trim($dataArray["profileId"]);
            $userId =  $dataArray["userId"];
                        
            $query = "";
            $parameters = "";
            
            if ( $userId == 0 )
            {
                 //Check if ukoot account exists
                 //$data = $this->db->users->find(array("userInfo.email"=>$email,"accountType"=>1));
                 $query = "select * from users where email = :email and accountType = 1;";
                 $parameters = array(
                                    ':email' => $email                                
                                   );                      
            }
            else
            {
                 //Check if ukoot account exists
                 //$data = $this->db->users->find(array("userInfo.email"=>$email,"_id"=>array('$ne'=>$userId),"accountType"=>1));
                 $query = "select * from users where  email = :email and id <> :userId and accountType = 1; ";
                 $parameters = array(
                                    ':userId' => $userId,
                                    ':email' => $email                                
                                   );     
            }
                                                                            
            $stmt = runQuery(DB_SERVER, DB_PORT, DB_USERNAME, DB_USERPASSWORD, DB_NAME, $query, $parameters);
        
            if ($stmt == QUERY_FAILED) {
                error_log( 'Error: runQuery returned QUERY_FAILED ');
                return FAILED;
            }
                                
            $row = fetchNextRow($stmt['statement']);
            
            
            if ($row != null) {
                $tmp=array();

                try
                {
                    while ($row != null ) {
                        
                        $tmmp=array();
                        
                        $tmmp["mFirstAccountExists"] = 1;
                        $tmmp["facebookAccountExists"] = 0;
                        $tmmp["twitterAccountExists"] = 0;
                        $tmmp["mFirstId"] = getValue($row, "id");
                        
                        //$responseArray["userInfo"] = $value["userInfo"];                      
                        //User data
                        $tmmp["id"] = getValue($row, "id");
                        $tmmp["email"] = getValue($row, "email");
                        $tmmp["username"] = getValue($row, "username");
                        $tmmp["firstname"] = getValue($row, "firstname");
                        $tmmp["lastname"] = getValue($row, "lastname");
                        $tmmp["password"] = getValue($row, "password");
                        $tmmp["gender"] = getValue($row, "gender");
                        $tmmp["yearOfBirth"] = getValue($row, "yearOfBirth");
                        $tmmp["phone"] = getValue($row, "phone");
                        $tmmp["mobile"] = getValue($row, "mobile");
                        $tmmp["addressLine1"] = getValue($row, "addressLine1");
                        $tmmp["addressLine2"] = getValue($row, "addressLine2");
                        $tmmp["addressCity"] = getValue($row, "addressCity");
                        $tmmp["addressState"] = getValue($row, "addressState");
                        $tmmp["addressCountry"] = getValue($row, "addressCountry");
                        $tmmp["addressZipCode"] = getValue($row, "addressZipCode");
                        $tmmp["photo"] = getValue($row, "photo");       
                        $tmmp["interests"] = getValue($row, "interests");
                        $tmmp["newsletters"] = getValue($row, "newsletters");
                        $tmmp["lastLoginTime"] = getValue($row,"lastLoginTime");
                        $tmmp["recordStatus"] = getValue($row,"recordStatus");
                        $tmmp["accountType"] = getValue($row,"accountType");
                        $tmmp["isAdmin"] = getValue($row,"isAdmin");
                        $tmmp["isDataAdmin"] = getValue($row,"isDataAdmin");
                        $tmmp["geoCoordinates"] = getValue($row, "geoCoordinates");
                        $tmmp["facebookDetails"] = getValue($row,"facebookDetails");
                        $tmmp["twitterDetails"] = getValue($row,"twitterDetails");
                        $tmmp["action"] = getValue($row, "action");
                        $tmmp["actionBy"] = getValue($row, "actionBy");
                        $tmmp["createdAt"] = getValue($row, "createdAt");
                        $tmmp["updatedAt"] = getValue($row, "updatedAt");
                     
                        array_push($tmp,$tmmp);
                        
                        $row = fetchNextRow($stmt['statement']);
                    }
            
                    array_push($responseArray, $tmp);
                    $returnArray["success"] = true;
                }
                catch( Exception $e )
                {
                    error_log( 'Error: '. $e->getMessage() );
                    $returnArray["success"] = false;
                }
            
            } else {
                error_log( 'UserDAO: No rows selected');
                $tmp=array();
                $tmmp=array();
                $tmmp["mFirstAccountExists"] = 0;
                $tmmp["facebookAccountExists"] = 0;
                $tmmp["twitterAccountExists"] = 0;                
                
                array_push($tmp,$tmmp);
                array_push($responseArray, $tmp);                                                                
                $returnArray["success"] = false;
            }
            
            $returnArray["responseArray"] = $responseArray;                        
            return $returnArray;            
        }
        
        /*
         * Authenticate email and password
         *
         * @return json with key value pair
        */
        public function Authenticate( Array $data )
        {
            $returnArray = array( );
            $authSuccess = 0;
            
            //Get email
            $email = trim($data["email"]);
            $password = trim($data["password"]);
            
            //Search in DB collection
            try
            {
                //$data = $this->db->users->find( array( '$or'=> array( array("userInfo.email"=>$email),array("userInfo.username"=>$email) ),"userInfo.password"=>$password,"recordStatus"=>array( '$in'=> array(2) ) ) );
               $query = "select * from users where email = :email and password = :password;";
               
               $parameters = array(
                ':email' =>$email,
                ':password' =>$password
                );     

               $stmt = runQuery(DB_SERVER, DB_PORT, DB_USERNAME, DB_USERPASSWORD, DB_NAME, $query, $parameters);
        
               if ($stmt == QUERY_FAILED) {
                    return FAILED;
                }
                                
                $row = fetchNextRow($stmt['statement']);
            
                $responseArray = array( );
   
                if ($row != null) {
                    $tmp=array();

                    while ($row != null ) {
                        
                        $tmmp=array();
                        $authSuccess=1;
                                        
                            //User data
                        $tmmp["authentication"] = 1;                            
                        $tmmp["id"] = getValue($row, "id");
                        $tmmp["email"] = getValue($row, "email");
                        $tmmp["username"] = getValue($row, "username");
                        $tmmp["firstname"] = getValue($row, "firstname");
                        $tmmp["lastname"] = getValue($row, "lastname");
                        $tmmp["password"] = getValue($row, "password");
                        $tmmp["gender"] = getValue($row, "gender");
                        $tmmp["yearOfBirth"] = getValue($row, "yearOfBirth");
                        $tmmp["phone"] = getValue($row, "phone");
                        $tmmp["mobile"] = getValue($row, "mobile");
                        $tmmp["addressLine1"] = getValue($row, "addressLine1");
                        $tmmp["addressLine2"] = getValue($row, "addressLine2");
                        $tmmp["addressCity"] = getValue($row, "addressCity");
                        $tmmp["addressState"] = getValue($row, "addressState");
                        $tmmp["addressCountry"] = getValue($row, "addressCountry");
                        $tmmp["addressZipCode"] = getValue($row, "addressZipCode");
                        $tmmp["photo"] = getValue($row, "photo");       
                        $tmmp["interests"] = getValue($row, "interests");
                        $tmmp["newsletters"] = getValue($row, "newsletters");
                        $tmmp["lastLoginTime"] = getValue($row,"lastLoginTime");
                        $tmmp["recordStatus"] = getValue($row,"recordStatus");
                        $tmmp["accountType"] = getValue($row,"accountType");
                        $tmmp["isAdmin"] = getValue($row,"isAdmin");
                        $tmmp["isDataAdmin"] = getValue($row,"isDataAdmin");
                        $tmmp["geoCoordinates"] = getValue($row, "geoCoordinates");
                        $tmmp["facebookDetails"] = getValue($row,"facebookDetails");
                        $tmmp["twitterDetails"] = getValue($row,"twitterDetails");
                        $tmmp["action"] = getValue($row, "action");
                        $tmmp["actionBy"] = getValue($row, "actionBy");
                        $tmmp["createdAt"] = getValue($row, "createdAt");
                        $tmmp["updatedAt"] = getValue($row, "updatedAt");
                     
                        array_push($tmp,$tmmp);
                        
                        $row = fetchNextRow($stmt['statement']);
                     }
            
                     array_push($responseArray, $tmp);
                    $returnArray["success"] = true;
                }
            
                if( $authSuccess != 1 )
                {
                    $responseArray = array( "authentication"=>0 );
                }
                
                $returnArray["responseArray"] = $responseArray;
                $returnArray["success"] = true;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            $returnArray["responseArray"] = $responseArray;
                        
            return $returnArray;            
        }
        
        /*
         * Check Activation Key Exists for a user
         *
         * @return 0 in response array if user does not exist else 1
        */
        public function CheckActivationKeyExists( Array $data )
        {
            $returnArray = array( );
            $userExists=0;
            
            //Get email
            $activationKey = trim($data["activationKey"]);
            
            //Search in DB collection
            try
            {
                $data = $this->db->users->find( array("activationKey"=>$activationKey, "recordStatus"=>0 ) );
                
                foreach( $data as $value )
                {
                    $userExists=1;
                }
                
                if( $userExists != 1 )
                {
                    $returnArray["responseArray"] = 0;
                }
                else
                {
                    $returnArray["responseArray"] = 1;
                }
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        /*
         * Confirm Registration of a user
         *
         * @return
        */
        public function ConfirmRegistration( Array $data )
        {
            $returnArray = array( );
            
            //Update the DB
            try
            {
                $this->db->users->update( array("activationKey"=>$data["activationKey"], "recordStatus"=>0),array('$set' =>$data ) );
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        //Update Latest login time
        public function UpdateLoginTime( $id, Array $data )
        {
            $returnArray = array( );
            
            // The string is converted to a MongoID object
            $mongo_id = new MongoID($id);
            
            //Update Data
            $updateData = array( "lastLoginTime"=>$data["lastLoginTime"]);
            
            //Update the DB
            try
            {
                $this->db->users->update( array("_id"=>$mongo_id),array('$set' =>$updateData ) );
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        //Update Events association
        public function UpdateEventsAssociation( $id, Array $data )
        {
            $returnArray = array( );
            
            if( $data["updateField"] == "favorite" )
            {
                $updateArray = $data["favoriteEvents"];
            }
            elseif( $data["updateField"] == "owned" )
            {
                $updateArray = $data["ownedEvents"];
            }
            
            // The string is converted to a MongoID object
            $mongo_id = new MongoID($id);
            
            //Update the DB
            try
            {
                foreach( $updateArray as $eventId )
                {
                    if( strtolower($data["action"]) == "add" )
                    {
                        if( $data["updateField"] == "favorite" )
                        {
                            $this->db->users->update( array("_id"=>$mongo_id),array('$addToSet' =>array("userInfo.favoriteEvents"=>$eventId ) ) );
                        }
                        elseif( $data["updateField"] == "owned" )
                        {
                            $this->db->users->update( array("_id"=>$mongo_id),array('$addToSet' =>array("userInfo.ownedEvents"=>$eventId ) ) );
                        }
                    }
                    elseif( strtolower($data["action"]) == "remove" )
                    {
                        if( $data["updateField"] == "favorite" )
                        {
                            $this->db->users->update( array("_id"=>$mongo_id),array('$pull' =>array("userInfo.favoriteEvents"=>$eventId ) ) );
                        }
                        elseif( $data["updateField"] == "owned" )
                        {
                            $this->db->users->update( array("_id"=>$mongo_id),array('$addToSet' =>array("userInfo.ownedEvents"=>$eventId ) ) );
                        }
                    }
                }
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        //Update Events association
        public function ResetPassword( Array $data )
        {
            $returnArray = array( );
            
            $email = $data["email"];
            $newPassword = "";
            if( $data["password"]!="" )
            {
                $newPassword = md5($data["password"]);
            }
            
            try
            {
                $updateArray = array("userInfo.password"=>$newPassword);
                
                $this->db->users->update( array("userInfo.email"=>$email), array('$set'=>$updateArray ) );
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        /*
         * Get all user details based on search criteria
         *
         * @return
        */
        public function ShowListForAdminAction( Array $data )
        {
            $returnArray = array( );
            $responseArray = array( );
            
            //Pagination
            $pageNumber = 1;
            if( array_key_exists( "pageNumber",$data) )
            {
                if( $data["pageNumber"] != 0 )
                {
                    $pageNumber = $data["pageNumber"];
                }
            }
            
            $pageSize = 5;
            if( array_key_exists( "pageSize",$data) )
            {
                if( $data["pageSize"] != 0 && $data["pageSize"] != "" )
                {
                    $pageSize = $data["pageSize"];
                }
            }
            
            //Build Search Criteria
            $searchCriteria = $data["searchCriteria"];
            
            $newSearchArray = array( "recordStatus"=>1 );
            if( $searchCriteria["firstname"] != "" )
            {
                $firstname = trim( strtolower($searchCriteria["firstname"]) );
                $tempSearchArray = array( "userInfo.firstname"=>new MongoRegex("/".$firstname."/i") );
                $newSearchArray = array_merge($newSearchArray,$tempSearchArray);
            }
            if( $searchCriteria["lastname"] != "" )
            {
                $lastname = trim( strtolower($searchCriteria["lastname"]) );
                $tempSearchArray = array( "userInfo.lastname"=>new MongoRegex("/".$lastname."/i") );
                $newSearchArray = array_merge($newSearchArray,$tempSearchArray);
            }
            if( $searchCriteria["email"] != "" )
            {
                $email = trim( strtolower($searchCriteria["email"]) );
                $tempSearchArray = array( "userInfo.email"=>new MongoRegex("/".$email."/i") );
                $newSearchArray = array_merge($newSearchArray,$tempSearchArray);
            }
            if( $searchCriteria["status"] != "" )
            {
                $tempSearchArray = array( "recordStatus"=>intval($searchCriteria["status"]) );
                $newSearchArray = array_merge($newSearchArray,$tempSearchArray);
            }
            if( $searchCriteria["currentUserOrgId"]!="" && $searchCriteria["currentUserOrgId"]!="ukootWeb" )
            {   
                if( $searchCriteria["userRole"]!=3 )
                {
                    $tempSearchArray = array( "userInfo.privileges"=>array('$elemMatch'=>array("organization.id"=>$searchCriteria["currentUserOrgId"],"role"=>array( '$in'=> array(1,2)) ) ) );
                    $newSearchArray = array_merge($newSearchArray,$tempSearchArray);
                }
                else
                {
                    $tempSearchArray = array( "userInfo.privileges"=>array('$elemMatch'=>array("organization.id"=>$searchCriteria["currentUserOrgId"] ) ) );
                    $newSearchArray = array_merge($newSearchArray,$tempSearchArray);
                }
            }
            if( isset( $searchCriteria["accountType"] ) && $searchCriteria["accountType"] != 0 )
            {
                $tempSearchArray = array( "accountType" => intval( $searchCriteria["accountType"] ) );
                $newSearchArray = array_merge($newSearchArray,$tempSearchArray);
            }
            if( isset( $searchCriteria["registeredDate"] ) && $searchCriteria["registeredDate"] != "" )
            {
                $tempSearchArray = array( "userInfo.registeredDate.sec" => array( '$gte'=> $searchCriteria["registeredDate"] ) );
                $newSearchArray = array_merge($newSearchArray,$tempSearchArray);
            }
            if( isset( $searchCriteria["userGroup"] ) )
            {
                if( intval( $searchCriteria["userGroup"] ) == 1 )
                {
                    $tempSearchArray = array( "isAdmin" => 1 );
                    $newSearchArray = array_merge( $newSearchArray,$tempSearchArray );
                }
                elseif( intval( $searchCriteria["userGroup"] ) == 2 )
                {
                    $tempSearchArray = array( "isDataAdmin" => 1 );
                    $newSearchArray = array_merge( $newSearchArray,$tempSearchArray );
                }
                elseif( intval( $searchCriteria["userGroup"] ) == 3 )
                {
                    $tempSearchArray = array( '$and' => array( array( 'isAdmin' => 0 ), array( 'isDataAdmin' => 0 ) ) );
                    $newSearchArray = array_merge( $newSearchArray,$tempSearchArray );
                }
            }
            
            //Search in DB collection
            try
            {
                $data = $this->db->users->find( $newSearchArray )->sort(array('userInfo.email' => 1))->skip(($pageNumber-1)*$pageSize)->limit($pageSize);
                
                foreach( $data as $value )
                {
                    $responseArray[] =  array(  "id"=>$value["_id"],
                                                "userInfo"=>$value["userInfo"],
                                                "recordStatus"=>$value["recordStatus"],
                                                "isAdmin"=>$value["isAdmin"],
                                                "isDataAdmin"=> isset( $value["isDataAdmin"] ) ? $value["isDataAdmin"] : 0
                                        );
                }
                
                $returnArray["responseArray"] = $responseArray;
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        /*
         * Approve given user
         *
         * @return
        */
        public function Approve( Array $data )
        {
            $returnArray = array( );
            $idArray = $data["idArray"];
            try
            {
                foreach( $idArray as $id )
                {
                    // The string is converted to a MongoID object
                    $mongo_id = new MongoID($id);
            
                    $this->db->users->update( array("_id"=>$mongo_id),array('$set' => array("recordStatus" =>2)) );
                }
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        /*
         * Suspend given user
         *
         * @return
        */
        public function Suspend( Array $data )
        {
            $returnArray = array( );
            $idArray = $data["idArray"];
            try
            {
                foreach( $idArray as $id )
                {
                    // The string is converted to a MongoID object
                    $mongo_id = new MongoID($id);
            
                    $this->db->users->update( array("_id"=>$mongo_id),array('$set' => array("recordStatus" =>3)) );
                }
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        //update the privileges
        public function UpdatePrivileges( $id,Array $data )
        {
            $returnArray = array( );
            $privilegesArray = $data["privileges"];
            
            // The string is converted to a MongoID object
            $mongo_id = new MongoID($id);
            
            try
            {
                if( isset($privilegesArray) && is_array($privilegesArray) && count($privilegesArray)>0 )
                {
                    foreach( $privilegesArray as $value )
                    {
                        if( $value["organization"]["id"] == "ukootWeb")
                        {
                            //Pull default org
                            $this->db->users->update( array("_id"=>$mongo_id),array( '$pull' => array ( "userInfo.privileges" => array ( "organization.id" => "ukootWeb" ) ) ) );
                            
                            //Push updated default org
                            $this->db->users->update( array("_id"=>$mongo_id),array('$push' =>array("userInfo.privileges"=>$value ) ) );
                        }
                        elseif( ( $value["organization"]["id"]!="" ) )
                        {
                            //Pull this organization's existing details
                            $this->db->users->update( array("_id"=>$mongo_id),array('$pull' =>array("userInfo.privileges"=>array("organization.id"=>$value["organization"]["id"] ) ) ) );
                            
                            //Push the new org details
                            $this->db->users->update( array("_id"=>$mongo_id),array('$push' =>array("userInfo.privileges"=>$value ) ) );
                        }
                    }
                }
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        //update the privileges
        public function RemovePrivilege( $id,Array $data )
        {
            $returnArray = array( );
            $orgId = $data["orgId"];
            
            // The string is converted to a MongoID object
            $mongo_id = new MongoID($id);
            
            try
            {
                if( isset($orgId) && $orgId!="" )
                {
                    //Pull this organization's existing details
                    $this->db->users->update( array("_id"=>$mongo_id),array('$pull' =>array("userInfo.privileges"=>array("organization.id"=>$orgId ) ) ) );
                }
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        /*
         * Authenticate email and password for mobile,tablet and others
         *
         * @return json with key value pair
        */
        public function AuthenticateUserForPublic( Array $data )
        {
            $returnArray = array( );
            $authSuccess=0;
            
            //Get email
            $email = trim($data["email"]);
            $password = md5(trim($data["password"]));
            
            //Search in DB collection
            try
            {
                //$data = $this->db->users->find( array("userInfo.email"=>$email,"userInfo.password"=>$password, "recordStatus"=>1 ), array("userInfo"=>1,"recordStatus"=>1,"facebookDetails"=>1,"twitterDetails"=>1,"openidDetails"=>1 ) );
                $data = $this->db->users->find( array("userInfo.email"=>$email,"userInfo.password"=>$password, "recordStatus"=>array( '$in'=> array(1,2) ) ) );
                foreach( $data as $value )
                {
                    $authSuccess=1;
                    $id = $value["_id"];
                    //$id=$id->{'$id'};
                    $responseArray = array(
                                           "id"=>$id
                                           );
                }
                
                if( $authSuccess != 1 )
                {
                    
                    $responseArray = array( "id"=>array('$id'=>-1));
                }
                
                $returnArray["responseArray"] = $responseArray;
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        /*
         * Get all events associated with the user
         *
        */
        public function ShowAssociatedEvents( $id,Array $data )
        {
            $returnArray = array( );
            $responseArray = array();
            
            //Get email
            $id = trim($id);
            $associationKey = trim($data["associationKey"]);
            
            //Search in DB collection
            try
            {
                // The string is converted to a MongoID object
                $mongo_id = new MongoID($id);
                
                //$obj will be an array of data if the _id exists in the collection
                $obj = $this->db->users->findOne(array('_id'=>$mongo_id));
                
                if( $associationKey=="favorite" )
                {
                    //User data
                    $responseArray["eventIds"] = isset($obj["userInfo"]["favoriteEvents"])?$obj["userInfo"]["favoriteEvents"]:array();
                }
                elseif( $associationKey=="owned" )
                {
                    //User data
                    $responseArray["eventIds"] = isset($obj["userInfo"]["ownedEvents"])?$obj["userInfo"]["ownedEvents"]:array();
                }
                
                $returnArray['responseArray'] = $responseArray;
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        /* Get longitude and latitude from API*/
        public function GetGeoCode( $data )
        {
            //Get long-lat based on location given ( Geocoding )
            $location = isset($data["addressLine1"])?$data["addressLine1"]:"";
            $location = isset($data["addressLine2"])?($location.", ".$data["addressLine2"]):$location;
            $location = isset($data["addressCity"])?($location.", ".$data["addressCity"]):$location;
            $location = isset($data["addressState"])?($location.", ".$data["addressState"]):$location;
            $location = isset($data["addressCountry"])?($location.", ".$data["addressCountry"]):$location;
            $location = isset($data["addressZipCode"])?($location.", ".$data["addressZipCode"]):$location;
            
            //Call Geo-coding function
            $eventGeoCoordinates = array();
            if( trim($location)!="" )
            {
                //Replace spaces with "+"
                $location = str_replace( " ","+",trim($location));
                
                $API_URL = "http://maps.googleapis.com/maps/api/geocode/json?address=".$location."&sensor=false";
                //error_log( $API_URL );
                $ch = curl_init( );
                
                curl_setopt( $ch, CURLOPT_URL, $API_URL );
                curl_setopt( $ch, CURLOPT_VERBOSE, 1 );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
                
                $geoCodeJsonResponse = curl_exec( $ch );
                
                curl_close( $ch );
                
                $geoCodeArray = array("status"=>"");
                $geoCodeObject = json_decode( $geoCodeJsonResponse );
                
                if( $geoCodeObject->status == "OK")
                {
                    $eventGeoCoordinates = array( "long"=>$geoCodeObject->results[0]->geometry->location->lng,
                                                  "lat"=>$geoCodeObject->results[0]->geometry->location->lat
                                                );
                }
            }
            
            return $eventGeoCoordinates;
        }
        
        /*
         * Check uniqueness of username provided
         *
         * @return 1 if already exists else 0
         * 
            //Search in DB collection
                if( $data["userId"]==0 )
                {
                    //Check if ukoot account exists
                    $data = $this->db->users->find(array("userInfo.username"=>$username));
                }
                else
                {
                    //Check if ukoot account exists
                    $data = $this->db->users->find(array("userInfo.username"=>$username,"_id"=>array('$ne'=>$userId)));
                }
                
                foreach( $data as $value )
                {
                    $responseArray["usernameExists"] = 1;
                }               
         * 
         * 
        */
        public function CheckUsernameAvailability( Array $dataArray )
        {                       
            $returnArray = array( );
            $responseArray = array( );

            $responseArray["usernameExists"] = 0;
            
            //Get email
            $username = trim($dataArray["username"]);
            $userId =  $dataArray["userId"];
                        
            $query = "";
            $parameters = "";
            
            if ( $userId == 0 )
            {
                 //Check if mFirst account exists
                 //$data = $this->db->users->find(array("userInfo.username"=>$username));
                 $query = "select * from users where username = :username;";
                 $parameters = array(
                                    ':username' => $username                                
                                   );                      
            }
            else
            {
                 //Check if mFirst account exists
                 //$data = $this->db->users->find(array("userInfo.username"=>$username,"_id"=>array('$ne'=>$userId)));
                 $query = "select * from users where username = :username and id <> :userId; ";
                 $parameters = array(
                                    ':userId' => $userId,
                                    ':username' => $username
                                   );     
            }
                                                                            
            $stmt = runQuery(DB_SERVER, DB_PORT, DB_USERNAME, DB_USERPASSWORD, DB_NAME, $query, $parameters);
        
            if ($stmt == QUERY_FAILED) {
                error_log( 'Error: runQuery returned QUERY_FAILED ');
                return FAILED;
            }
                                
            $row = fetchNextRow($stmt['statement']);
            
            if ($row != null) {
                $tmp=array();

                try
                {
                    while ($row != null ) {
                        
                        $tmmp=array();
                        
                        $tmmp["usernameExists"] = 1;
                     
                        array_push($tmp,$tmmp);
                        
                        $row = fetchNextRow($stmt['statement']);
                    }
            
                    array_push($responseArray, $tmp);
                    $returnArray["success"] = true;
                }
                catch( Exception $e )
                {
                    error_log( 'Error: '. $e->getMessage() );
                    $returnArray["success"] = false;
                }
            
            } else {
                error_log( 'UserDAO: No rows selected');
                $tmp=array();
                $tmmp=array();
                
                $tmmp["usernameExists"] = 0;
                                        
                array_push($tmp,$tmmp);
                array_push($responseArray, $tmp);                                                                
                $returnArray["success"] = false;
            }
            
            $returnArray["responseArray"] = $responseArray;                        
            return $returnArray;
        }
        
        /*
         * Merge accounts
         *
         * @return
        */
        public function UpdateSocialMediaField( $id,Array $data )
        {
            $returnArray = array( );
            $responseArray=array();
            
            //Get email
            $updateFieldType = trim($data["updateFieldType"]);
            $id = new MongoID($id);
            
            if( $updateFieldType==2 )
            {
                $updateArray = array("facebookDetails"=>$data["facebookDetails"]);
            }
            elseif( $updateFieldType==3 )
            {
                $updateArray = array("twitterDetails"=>$data["twitterDetails"]);
            }
            
            //Search in DB collection
            try
            {
                if( $updateFieldType!=0 )
                {
                    //Check if ukoot account exists
                    $this->db->users->update( array("_id"=>$id),array('$set'=>$updateArray ) );
                }
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        //Autheticate social media login by searching for the profile id
        public function AuthenticateSocialMediaLogin( Array $data )
        {
            $returnArray = array( );
            $responseArray["profileExists"] = 0;
            
            //Get email
            $profileId = trim($data["profileId"]);
            $accountType = intval($data["accountType"]);
            //Search in DB collection
            try
            {
                if( $accountType==2 )
                {
                    //Check if ukoot account association exists
                    $data = $this->db->users->find(array("facebookDetails.profileId"=>$profileId,"accountType"=>1));    
                }
                elseif( $accountType==3 )
                {
                    //Check if ukoot account association exists
                    $data = $this->db->users->find(array("twitterDetails.profileId"=>$profileId,"accountType"=>1)); 
                }
                
                foreach( $data as $value )
                {
                    $responseArray["profileExists"] = 1;
                    $responseArray["id"] = $value["_id"];
                }
                
                $returnArray["responseArray"] = $responseArray;
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }
        
        //Merge two accounts
        public function MergeAccounts( Array $data )
        {
            $returnArray = array( );
            
            $ukootAccountId = $data["ukootAccountId"];
            $socialAccountId = $data["socialAccountId"];
            $mergingFieldsArray = $data["mergingFieldsArray"];
            
            $mongoId = new MongoID($ukootAccountId);
            
            try
            {
                //Get Social account details
                $socialAccountDetails = $this->Show( $socialAccountId );
                $accountType = intval($socialAccountDetails["responseArray"]["accountType"]);
                $favoriteEvents = $socialAccountDetails["responseArray"]["userInfo"]["favoriteEvents"];
                $ownedEvents = $socialAccountDetails["responseArray"]["userInfo"]["ownedEvents"];
                
                $updateArray = array();
                if( $accountType==2 )
                {
                    //If facebook account type
                    $updateArray = array( "facebookDetails"=>$socialAccountDetails["responseArray"]["facebookDetails"] );
                }
                elseif( $accountType==3 )
                {
                    //If twitter account type
                    $updateArray = array( "twitterDetails"=>$socialAccountDetails["responseArray"]["twitterDetails"] );
                }
                
                //update ukoot account
                $this->db->users->update( array("_id"=>$mongoId),array('$set'=>$updateArray ) );
                
                //Check which other fields needs to be updated
                if( in_array("favoriteEvents",$mergingFieldsArray) && count($favoriteEvents)>0 )
                {
                    $dataArray = array("favoriteEvents"=>$favoriteEvents, "updateField"=>"favorite", "action"=>"add");
                    $this->UpdateEventsAssociation( $ukootAccountId,$dataArray );
                }
                if( in_array("ownedEvents",$mergingFieldsArray) && count($ownedEvents)>0 )
                {
                    $dataArray = array("ownedEvents"=>$ownedEvents, "updateField"=>"owned", "action"=>"add");
                    $this->UpdateEventsAssociation( $ukootAccountId,$dataArray );
                }
                
                //Delete the social account
                $dataArray = array("idArray"=>array($socialAccountId),"type"=>"hard");
                $this->Delete($dataArray);
                
                $returnArray["success"] = true;
            }
            catch( MongoCursorException $e )
            {
                error_log('Mongo Cursor Exception: ' . $e->getMessage());
                
                $returnArray["success"] = false;
            }
            catch( Exception $e )
            {
                error_log( 'Error: '. $e->getMessage() );
                
                $returnArray["success"] = false;
            }
            
            return $returnArray;
        }

		
 	}
?>