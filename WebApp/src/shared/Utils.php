<?php

class Utils
{
 	/*
 	 * Convert XML to request object
 	 *
 	 * @param string $xml_string XML to be added as object
 	 * @param object $request object to which the xml is to be added
 	 *
 	 */
 	public static function Xml2Object( $xml, $object )
 	{
    	/* Add a condition to ignore root */
        foreach( $xml->children( ) as $child )
        {
        	$node_name = $child->getName( );

        	/* If the node is a leaf node */
            if( !$child->children( ) )
				$object->$node_name = trim( (string)( $child ) );
            else
            	$object->$node_name = Utils::GetChildrenAsArray( $child, $node_name );
        }

        return $object;
	}

	public static function GetChildrenAsArray( $xml, $parent_name, $arr = Array( ) )
	{
		foreach( $xml->children( ) as $child )
		{
			$node_name = $child->getName( );
			
			/*
			 * If the number of nodes of this type is more than 1 then treat it
			 * as an array
			 */
			$count = $xml->xpath( "/$node_name" );

			/* If the node is a leaf node */
			if( !$child->children( ) )
			{
				if( $count == 1 )
					$arr[$node_name] = trim( (string)( $child ) );
				else
					$arr[$node_name][] = trim( (string)( $child ) );
			}
			else
				$arr[$node_name] = Utils::GetChildrenAsArray( $child, $parent_name );
        }

        return $arr;
	}

    /**
    * Recursive version of glob
    *
    * @return array containing all pattern-matched files.
    *
    * @param string $sDir      Directory to start with.
    * @param string $sPattern  Pattern to glob for.
    * @param int $nFlags       Flags sent to glob.
    */
    public static function globr($sDir, $sPattern, $nFlags = NULL)
    {
        $sDir = escapeshellcmd($sDir);

        // Get the list of all matching files currently in the
        // directory.

        $aFiles = glob("$sDir/$sPattern", $nFlags);

        // Then get a list of all directories in this directory, and
        // run ourselves on the resulting array.  This is the
        // recursion step, which will not execute if there are no
        // directories.

        foreach (glob("$sDir/*", GLOB_ONLYDIR) as $sSubDir)
        {
            $aSubFiles = self::globr($sSubDir, $sPattern, $nFlags);
            $aFiles = array_merge($aFiles, $aSubFiles);
        }

        // The array we return contains the files we found, and the
        // files all of our children found.

        return $aFiles;
    }

    /*
     * Get photo path
    */
    public static function getPhoto( $id, $folder_name, $type )
    {
        $file_name = $folder_name.$type.$id;

        if( file_exists( $file_name.".gif" ) )
        {
            $file_name = $file_name.".gif";
        }
        else if( file_exists( $file_name.".jpg" ) )
        {
            $file_name = $file_name.".jpg";
        }
        else if( file_exists( $file_name.".png" ) )
        {
            $file_name = $file_name.".png";
        }
        else
        {
            $file_name = $folder_name."NoPhotoAvailable.jpg";
        }
        return $file_name;
    }

    public static function ResizeAndUploadImage($width, $height, $uploadedFilePath, $extension = "jpg", $saveImagePath)
    {
        //Create object of imaging
        $imaging = new Imaging();

        //Get image dimension
        $dimension = new Dimension( $width, $height );

        //Load image
        $imaging->loadImage( $uploadedFilePath );

        //resize image to the dimesion required
        $imaging->resizeImage( $dimension );

        //Set image path
        $imaging->setImagePath( $uploadedFilePath );

        //Save image
        $imaging->saveImage( $saveImagePath . "." . $extension );

        //Set output format
        $imaging->setOutputFormat( $extension );
    }
	public static function UploadFile( $formfield, $destination, $time = 0, $adjustfilename=true )
	{
		$max_size = 600000000;
        $file = $_FILES[$formfield];
        $target = $destination;
		$returnstring = "";

        if( empty( $file ) )
		{
			$returnstring = "File not found! Error A";
			$errorcode = 1;
        }
        else if ( $file['size'] <= 0 ){
            $returnstring = "File not found! Error B";
            $errorcode = 1;
        }
        else if ( $file['size'] > $max_size ){
            $returnstring = "The file is too big.";
            $errorcode = 2;
        }
        else {
			if( $adjustfilename ){
				$filename = strtolower( basename( $file['name'] ) );
				$filename = str_replace( " ", ".", $filename );
				$filename = str_replace( "_", ".", $filename );

			    if ( $time ) $filename = date("YmdHi") . $filename;
			}
            else
                $filename = basename( $file['name'] );

			if ( move_uploaded_file( $file['tmp_name'], $target.$filename ) || file_exists( $target.$filename ) )
			{
				$returnstring = "";
				$errorcode = "0";
			}
		}

		return array(
			'message' => $returnstring,
			'code' =>  $errorcode,
			'path' => $target.$filename
        );
    }
    
    /* Returns User object stored in session */
    public static function GetSessionUser()
    {
        return $_SESSION['session_user'];
    }
    
    /* Returns User id stored in session */
    public static function GetSessionUserId()
    {
        return $_SESSION['session_user_id'];
    }
    
    /* Returns all the subtabs stored in session */
    public static function GetSessionSubTabs()
    {
        return $_SESSION['session_sub_tabs'];
    }
    
    /* Returns User group access stored in session */
    public static function GetSessionUserGroupAccess()
    {
        return $_SESSION['session_group_access'];
    }
    /* Function to convert date in the form of yyyy-mm-dd
		* Arguments :  date
		* Returns   : <string>hyphen seperated date in the form of yyyy-mm-dd</string>
	  */
	public static function to_database( $date, $format )
	{
		if( $date )
		{
			switch( $format )
			{
				case "%m/%d/%Y" :
					$temp = explode( '/', $date );
					$date = $temp[2] . '-' . $temp[0] . '-' . $temp[1];
					break;
				case "%d/%m/%Y" :
					$temp = explode( '/', $date );
					$date = $temp[2] . '-' . $temp[1] . '-' . $temp[0];
					break;
			}
		}
		
		return $date;
	}
	
	/* Function to get numbers dropdown
		* Arguments :  from , to
		* Returns   : dropdown of numbers
	  */
	public static function GetNumbersDropdown( $rangeFrom=0,$rangeTo=99, $selected="",$order="" )
	{
		$dropdown = "";
		if( $order=="DESC" )
		{
			for( $i=$rangeTo; $i>=$rangeFrom; $i-- )
			{
				if( $i<=9 )
				{
					if( $i==$selected && $selected!="" )
					{
						$dropdown .= "<option value=".$i." SELECTED>0".$i."</option>";
					}
					else
					{
						$dropdown .= "<option value=".$i.">0".$i."</option>";
					}
				}
				else
				{
					if( $i==$selected && $selected!="" )
					{
						$dropdown .= "<option value=".$i." SELECTED>".$i."</option>";
					}
					else
					{
						$dropdown .= "<option value=".$i.">".$i."</option>";
					}
				}
			}
		}
		else
		{
			for( $i=$rangeFrom; $i<=$rangeTo; $i++ )
			{
				if( $i<=9 )
				{
					if( $i==$selected && $selected!="" )
					{
						$dropdown .= "<option value=".$i." SELECTED>0".$i."</option>";
					}
					else
					{
						$dropdown .= "<option value=".$i.">0".$i."</option>";
					}
				}
				else
				{
					if( $i==$selected && $selected!="" )
					{
						$dropdown .= "<option value=".$i." SELECTED>".$i."</option>";
					}
					else
					{
						$dropdown .= "<option value=".$i.">".$i."</option>";
					}
				}
			}
		}
		
		return $dropdown;
	}
	
	/*
	Prepare a mailer object
	*/
	public static function GetNewMailerObject( )
    {
        $mail = new PHPMailer( );
    
        $mail->IsSMTP( );                                   //send via SMTP
        $mail->Host     = "localhost";               //SMTP servers
        $mail->SMTPAuth = false;                             //turn on SMTP authentication
        $mail->Username = "";        //SMTP username
        $mail->Password = "";                        //SMTP password
        
        $mail->From     = "donotreply@nasotech.com";
        $mail->FromName = "Nasotech";
        
        return $mail;
    }
	
	/*
	* Populate timezones dropdown
	*/
	public static function GetTimeZoneDropdown( $selected="" )
	{
		//Initialise
		$dropdown = "";
		$timeZoneArray = array( );
		
		//Get Time Zones from Server Database
		$timeZoneArray = ServiceUtils::GetAllTimeZones( );
		if( count($timeZoneArray)>0 )
		{
			foreach( $timeZoneArray as $value )
			{
				if( $selected == $value["name"] )
				{
					$dropdown .= "<option value=".$value["name"]." SELECTED>".$value["description"]." (".$value["relativeToGMT"].")</option>";
				}
				else
				{
					$dropdown .= "<option value=".$value["name"].">".$value["description"]." (".$value["relativeToGMT"].")</option>";
				}
			}
		}
		
		return $dropdown;
	}
	
	/*
	*Convert given time to GMT time
	*
	*/
	public static function GetGMTDateTime( $dateTime, $timeZone )
	{
		$response = "";
		if( $dateTime != "" )
		{
			if( $timeZone != "" )
			{
				//Get relative GMT time difference from given time zone
				$timeZoneArray = ServiceUtils::GetTimeZone( $timeZone );
				$utcOffset = $timeZoneArray["utcOffset"];
				
				/*$relativeToGMT = substr($relativeToGMT,3);
				$method = substr($relativeToGMT,0,1);
				$time = substr($relativeToGMT,1);
				$timeArray = explode( ":",$time);
				$hours = $timeArray[0];
				$mins = $timeArray[1];
				
				$totalTimeInSeconds = ($hours*60*60)+($mins*60);*/
				
				//Calculated GMT Time
				$response = ($dateTime->sec)-($utcOffset);
			}
		}
		
		return $response;
	}
	
	/*
	*Get Time Zone Name based on offset
	*
	*/
	public static function GetTimeZoneName( $utcOffset )
	{
		$response = "";
		if( $utcOffset=="" || $utcOffset==0 )
		{
			$response = "GMT";
		}
		else
		{
			//Get timezone name
			$response = ServiceUtils::GetTimeZoneName( $utcOffset );
		}
		
		return $response;
	}
	
	//Calculate Remaining Time and return the same
	public static function CalculateRemainingTime( $startTimeInSecFromEpoch, $endTimeInSecFromEpoch )
	{
		//Get Starting time
		$remainingTime = "";
		$presentDateTime = strtotime( gmdate( 'Y-m-d H:i:s' ) );
		$difference = $startTimeInSecFromEpoch["sec"]-$presentDateTime;
		$noOfDays = floor($difference/86400);
		$endTimeInSecFromEpoch = isset($endTimeInSecFromEpoch["sec"])?$endTimeInSecFromEpoch["sec"]:0;
		
		if( $noOfDays<0 )
		{
			$remainingTime = "Event Over";
			
			if( $endTimeInSecFromEpoch==0 )
			{
				$endTimeInSecFromEpoch = $startTimeInSecFromEpoch["sec"]+28800;
			}
			if( $endTimeInSecFromEpoch>$presentDateTime )
			{
				$remainingTime = "Event Running";
			}
		}
		elseif( $noOfDays<1 )
		{
			$difference = $difference%86400;
			
			if( floor($difference / 3600)<1 )
			{
				$remainingTime = floor(($difference % 3600) / 60) ." Minutes Away";
			}
			else
			{
				$remainingTime = $difference < 0 ? 'Event Over' : ( floor($difference / 3600) );
				if( $remainingTime==1 )
				{
					$remainingTime = "1 Hour Away";
				}
				else
				{
					$remainingTime .= " Hours Away";
				}
			}
		}
		elseif( $noOfDays>=1 && $noOfDays<=7 )
		{
			$remainingTime = $noOfDays;
			
			if($remainingTime==1)
			{
				$remainingTime.= " Day Away";
			}
			else
			{
				$remainingTime.= " Days Away";
			}
		}
		elseif( $noOfDays>7 && $noOfDays<=30 )
		{
			$remainingTime = floor($noOfDays/7);
			
			if($remainingTime==1)
			{
				$remainingTime.= " Week Away";
			}
			else
			{
				$remainingTime.= " Weeks Away";
			}
		}
		elseif( $noOfDays>30 && $noOfDays<=365 )
		{
			$remainingTime = floor($noOfDays/30);
			
			if($remainingTime==1)
			{
				$remainingTime.= " Month Away";
			}
			else
			{
				$remainingTime.= " Months Away";
			}
		}
		elseif( $noOfDays>365 )
		{
			$remainingTime = floor($noOfDays/365);
			
			if($remainingTime==1)
			{
				$remainingTime.= " Year Away";
			}
			else
			{
				$remainingTime.= " Years Away";
			}
		}
		
		return $remainingTime;
	}
	
	/*
	* Populate Countries dropdown
	*/
	public static function GetCountriesDropdown( )
	{
		//Initialise
		$dropdown = "";
		
		//Get countries from Server collection
		$countriesArrayTemp = ServiceUtils::GetAllCountries( );
		
		if( count($countriesArrayTemp)>0 )
		{
			foreach( $countriesArrayTemp as $value )
			{
				$countriesArray[] = array(
										  "id"=>$value["id"]['$id'],
										  "name"=>$value["name"],
										  "code"=>$value["code"],
										  "alias"=>$value["alias"]
										  );
			}
		}
		
		return $countriesArray;
	}
	
	//Get All User organizations for preparing a dropdown
	public static function GetUserOrganizationsDropdown( $organizationSelectedId="",$userId="",$sessionUserRole="" )
	{
		//Initialise
		$dropdown = "";
		$userOrganizationArray = array( );
		
		$userOrganizationSVC = new UserOrganizationSVC( );
		$userOrganizationSVC->registered = 1;
		$userOrganizationResponse = json_decode( $userOrganizationSVC->ShowAll( $userId,$sessionUserRole ),true );
		$userOrganizationArray = $userOrganizationResponse["response"]["responseArray"];
		
		if( count($userOrganizationArray)>0 )
		{
			foreach( $userOrganizationArray as $value )
			{
				if( $organizationSelectedId == $value["id"]['$id'] )
				{
					$dropdown .= "<option value=".$value["id"]['$id']." SELECTED>".$value["name"]."</option>";
				}
				else
				{
					$dropdown .= "<option value=".$value["id"]['$id'].">".$value["name"]."</option>";
				}
			}
		}
		
		return $dropdown;
	}
	
	//Get given User details
	public static function GetUserOrganizationDetails( $organizationSelectedId )
	{
		//Initialise
		$returnArray = array( );
		
		if( $organizationSelectedId != "")
		{
			$userOrganizationSVC = new UserOrganizationSVC( );
			$userOrganizationSVC->id = $organizationSelectedId;
			$userOrganizationResponse = json_decode( $userOrganizationSVC->Show( ),true );
			$userOrganizationArray = $userOrganizationResponse["response"]["responseArray"];			
			if( is_array($userOrganizationArray) && count($userOrganizationArray)>0 )
			{
				$returnArray = array(
									"id"=>$organizationSelectedId,
									"name"=>$userOrganizationArray["name"],
									"webUrl"=>$userOrganizationArray["webUrl"]
									);
			}	
		}
		
		return $returnArray;
	}
	
	//Get All Users for preparing a dropdown
	public static function GetUsersDropdown( $selectedUserId )
	{
		//Initialise
		$dropdown = "";
		$usersArray = array( );
		
		$userSVC = new UserSVC( );
		$userResponse = json_decode( $userSVC->ShowAll( ),true );
		$usersArray = $userResponse["response"]["responseArray"];
		
		if( count($usersArray)>0 )
		{
			foreach( $usersArray as $value )
			{
				$name = "";
				if( $value["data"]["firstname"] != "" )
				{
					$name .= ucfirst($value["data"]["firstname"]);
				}
				if( $value["data"]["lastname"] != "" )
				{
					$name .= " ".ucfirst($value["data"]["lastname"]);
				}
				if( $value["data"]["email"] != "" )
				{
					if( trim($name)=="" )
					{
						$name .= $value["data"]["email"];	
					}
					else
					{
						$name .= " - ".$value["data"]["email"];
					}
				}
				
				if( $selectedUserId == $value["id"]['$id'] )
				{
					$dropdown .= "<option value=".$value["id"]['$id']." SELECTED>".$name."</option>";
				}
				else
				{
					$dropdown .= "<option value=".$value["id"]['$id'].">".$name."</option>";
				}
			}
		}
		
		return $dropdown;
	}
	
	//Get given User details
	public static function GetUserDetails( $selectedUserId )
	{
		//Initialise
		$adminUserArray = array( );
		
		if( $selectedUserId != "")
		{
			$userSVC = new UserSVC( );
			$userSVC->id = $selectedUserId;
			$userResponse = json_decode( $userSVC->Show( ),true );
			$usersArray = $userResponse["response"]["responseArray"];			
			if( is_array($usersArray) && count($usersArray)>0 )
			{
				$adminUserArray = array(
										"id"=>$selectedUserId,
										"firstname"=>$usersArray["userInfo"]["firstname"],
										"lastname"=>$usersArray["userInfo"]["lastname"],
										"email"=>$usersArray["userInfo"]["email"]
										);
			}	
		}
		
		return $adminUserArray;
	}
	
	/*Send mail
		 *
		 *
		*/
	public static function SendMail( $template, $mailSubjectVarArray, $mailMessageVarArray, $mailTo )
	{
	    //FIXME
	    return false;
        
		$mailTemplateSVC = new MailTemplateSVC( );
		
		//Build Search criteria array and fetch results
		$searchCriteria = 	array(
								"template"=> $template,
								"status"=> 2
							);
		
		//Get mail template response
		$response = json_decode( $mailTemplateSVC->ShowAll( $searchCriteria ), true );
		$listArray = isset( $response["response"]["responseArray"] ) ? $response["response"]["responseArray"] : array();
		
		$emailFor = isset( $listArray[0]["emailFor"] ) ? $listArray[0]["emailFor"] : "";
		$subscribe = isset( $listArray[0]["subscribe"] ) ? $listArray[0]["subscribe"] : "";
		$subject = isset( $listArray[0]["subject"] ) ? $listArray[0]["subject"] : "";
		$message = isset( $listArray[0]["message"] ) ? $listArray[0]["message"] : "";
		$fromEmail = isset( $listArray[0]["fromEmail"] ) ? $listArray[0]["fromEmail"] : "";
		$fromName = isset( $listArray[0]["fromName"] ) ? $listArray[0]["fromName"] : "";
		
		//If Email is for admin, check if this mail is subscribed
		$send = true;
		if( $emailFor == "admin" && $subscribe == "2" )
		{
			$send = false;
		}
		
		if( $send )
		{
			//Replace pre-determined strings in subject with corresponding values
			foreach( $mailSubjectVarArray as $key => $value )
			{
				//Replace the key string which appears in the $message with the corresponding value
				$subject = str_replace( "<<".$key.">>", $value, $subject );
			}
			
			//Replace new line by break
			$message = str_replace( "\n", "<br/>", $message );
			
			//Replace pre-determined strings in message with corresponding values
			foreach( $mailMessageVarArray as $key => $value )
			{
				//Replace the key string which appears in the $message with the corresponding value
				$message = str_replace( "<<".$key.">>", $value, $message);
			}
			
			//Send Email for activation
			$mail = Utils::GetNewMailerObject( );
			
			$mail->IsHTML(true);                               // send as HTML
			
			//Mail from address
			$mail->From     = $fromEmail;
			$mail->FromName = $fromName;
			
			//Mail To addresses
			foreach( $mailTo as $to )
			{
				$mail->AddAddress( $to["email"], $to["name"] );
			}
			
			//$mail->AddBCC( "sunil.bk@sakhatech.com", "Sunil" );
            $mail->AddBCC( "shiva@nasotech.com", "Shiva" );			
			
			$mail->Subject  =  $subject;
			$mail->Body  =  $message;
			
			if( !$mail->send( ) )
			{
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
			
			$logArray = array(
							"template" => $template,
							"recipientType" => $emailFor,
							"from" => $fromEmail,
							"to" => $mailTo,
							//"loggedOn" => new MongoDate( strtotime(gmdate('Y-m-d H:i:s')) )
							"loggedOn" =>  strtotime(gmdate('Y-m-d H:i:s'))
						);
				
			$dataLogging = new DataLoggingSVC( );
			$dataLogging->AddEmailLogs( $logArray );
			
			return true;
		}
		
		return true;
	}
}
?>