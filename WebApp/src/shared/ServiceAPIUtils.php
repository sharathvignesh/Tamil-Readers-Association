<?php

class ServiceAPIUtils
{
    /*
     * Call restful api to perform action based on method
     *
     * @param       Array       $data       Array of user inputs for api to perform add/edit/delete/show/showall actions
     * @param       String      $apiMethod  Method type to be called
     * @param       String      $outputType Expected response type from api call ( can be xml or json )
     *
     * @return      Returns xml/json object based on given output type
    */
    public static function CallAPIService( Array $data, $apiMethod, $outputType="json" )
    {
        $data["api_key"] = RESTFUL_API_KEY;
        $data["api_username"] = base64_encode( RESTFUL_API_USERNAME );
        $data["api_password"] = base64_encode( RESTFUL_API_PASSWORD );
        $requestData = self::FormatRequestData( $data, $outputType );
        
        $postFields = array(
            'data' => $requestData
        );
        error_log("REST - REQUEST DATA - " . $requestData);
        $ch = curl_init( );
        
        //Shiva $API_URL = RESTFUL_API_URL_END_POINT . $apiMethod . "." . $outputType;
        $API_URL = RESTFUL_API_URL_END_POINT . $apiMethod;		
        
        curl_setopt( $ch, CURLOPT_URL, $API_URL );
        curl_setopt( $ch, CURLOPT_VERBOSE, 1 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        
        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $postFields );
        /* commeting the following 2 lines of code to enable user name and pasword to be sent across as a post parameter*/
        //curl_setopt( $ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
        //curl_setopt( $ch, CURLOPT_USERPWD, ''.base64_encode( RESTFUL_API_USERNAME ).':'.base64_encode( RESTFUL_API_PASSWORD ).'' ); 
        
        $response = curl_exec( $ch );
        //error_log(curl_error($ch));
        $_SESSION["apiResponseTime"] = curl_getinfo($ch,CURLINFO_TOTAL_TIME);
        
        error_log("REST - RESPONSE DATA - " . json_encode($response,JSON_PRETTY_PRINT));  
        error_log( print_r( json_decode( $response, true ), true ) );
        curl_close( $ch );
        
        return $response;
    }
    /*
     * @param       Array       $data       Array of user inputs for api to perform add/edit/delete/show/showall actions
     * @param       String      $outputType Expected output type from api call ( can be xml or json )
     *
     * @return      Returns user inputs in the form of string
    */
    public static function FormatRequestData( Array $data, $outputType )
    {
        $requestData = "";
        
        switch( $outputType )
        {
            case "xml" :
                $requestData = urlencode( '<?xml version="1.0" encoding="UTF-8"?><request>' . XmlHelper::array2xml( $data ) . '</request>' );
                break;
            
            case "json" :
                $requestData = json_encode( $data );
                break;
        }
        
        return $requestData;
    }
}

?>