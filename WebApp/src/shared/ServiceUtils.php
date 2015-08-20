<?php
    class ServiceUtils
    {
        /*
        * Get all timezones from Server DB
        */
        public static function GetAllTimeZones( )
        {
            $responseArray = array();
            
            $dataArray = array( );
            $response = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetAllTimeZones/123", "json" ),true );
            
            $responseArray = $response["response"]["responseArray"];
            
            return $responseArray;
        }
        
        /*
        * Get given time zone info
        **/
        public static function GetTimeZone( $timeZone )
        {
            $responseArray = array();
            
            $dataArray = array( "timeZone"=>$timeZone );
            $response = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetTimeZone/123", "json" ), true );
            
            $responseArray = $response["response"]["responseArray"];
            
            return $responseArray;
        }
        
        /*Get Time zone name based on utc offset
        */
        public static function GetTimeZoneName( $utcOffset )
        {
            $response = "";
            
            $dataArray = array( "utcOffset"=>$utcOffset );
            $response = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetTimeZoneName/123", "json" ), true );
            
            $response = $response["response"]["responseArray"]["name"];
            
            return $response;
        }
        
        /*
        *Sort the tags cloud based on no of tags in future events and save it in a collection
        *
        */
        public static function SortTagCloud( $control="" )
        {   
            $logsArray  =   array(
                                "Control" => $control,
                                "Host" => isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : "",
                                "Server" => isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : "",
                                "IP" => isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : "",
                                "HTTP_USER_AGENT" => isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : "",
                                "TIME" => strtotime("now")
                            );
            
            $dataArray = array( "control"=>$control, "logs" => $logsArray );
            $response = ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/SortTagCloud/123", "json" );
            
            return true;
        }
        
        /*
        Get Sorted Cloud Tag of given collection
        */
        public static function GetSortedTagCloud( $collectionName="", $limit=0 )
        {
            $responseArray = array();
            
            $dataArray = array( "collectionName"=>$collectionName,"limit"=>$limit );
            $response = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetSortedTagCloud/123", "json" ), true );
            
            $responseArray = $response["response"]["responseArray"];
            
            return $responseArray;
        }
        
        /*Get all countries */
        public static function GetAllCountries( )
        {
            $responseArray = array();
            
            $dataArray = array( );
            $response = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetAllCountries/123", "json" ), true );
            
            $responseArray = $response["response"]["responseArray"];
            
            return $responseArray;
        }
        
        /*Get selected countyr details*/
        public static function GetSelectedCountryDetails( $searchKey="",$searchValue="" )
        {
            $responseArray = array();
            
            $dataArray = array( "searchKey"=>$searchKey,"searchValue"=>$searchValue );
            $response = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetSelectedCountryDetails/123", "json" ), true );
            
            $responseArray = $response["response"]["responseArray"];
            
            return $responseArray;
        }
        
        /* Add new inquiry */
        public static function AddInquiry( $inquiryType, $inquiryData )
        {
            $responseArray = array();
            
            $dataArray = array( "inquiryType"=>$inquiryType,"inquiryData"=>$inquiryData );
            $responseArray = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/AddInquiry/123", "json" ), true );
            
            $response = $responseArray["response"]["success"];
            
            return $response;
        }
        
        /*Get all inquiries */
        public static function GetAllInquiries( $searchCriteria )
        {
            $responseArray = array();
            
            $dataArray = array( "searchCriteria"=>$searchCriteria );
            $response = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetAllInquiries/123", "json" ), true );
            
            $responseArray = $response["response"]["responseArray"];
            
            return $responseArray;
        }
        
        /*Update the inquiry status */
        public static function UpdateInquiryStatus( $idArray,$status )
        {
            $responseArray = array();
            
            $dataArray = array( "idArray"=>$idArray, "status"=>$status );
            $response = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/UpdateInquiryStatus/123", "json" ), true );
            
            $responseArray = $response["response"]["success"];
            
            return $responseArray;
        }
        
        public static function GetSelectedInquiry( $searchKey,$searchValue )
        {
            $responseArray = array();
            
            $dataArray = array( "searchKey"=>$searchKey,"searchValue"=>$searchValue );
            $response = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetSelectedInquiry/123", "json" ), true );
            
            $responseArray = $response["response"]["responseArray"];
            
            return $responseArray;
        }
        
        public function DestroySession( $sessionId )
        {   
            $dataArray = array( "sessionId"=>$sessionId);
            $responseArray = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/DestroySession/123", "json" ), true );
            
            $response = $responseArray["response"]["success"];
            
            return $response;
        }
        
        public function GetReports( )
        {
            $dataArray = array();
            $rawResponseArray = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetReports/123", "json" ), true );
            $response = isset($rawResponseArray["response"]["responseArray"])?$rawResponseArray["response"]["responseArray"]:array();
            
            return $response;
        }
        
        public function GetIp2LocationData( $dataArray )
        {
            $rawResponseArray = json_decode( ServiceAPIUtils::CallAPIService( $dataArray,"/Utils/GetIp2LocationData/123", "json" ), true );
            $response = isset($rawResponseArray["response"]["responseArray"])?$rawResponseArray["response"]["responseArray"]:array();
            
            return $response;
        }
    }
?>