<?php

class Validator {

	public static function validateNotEmpty($v)
	{
        if(is_object($v))
            return true;        
		if(trim($v) == "")
			return false;
		return true;		
	}
    
	public static function validateEmail($v) 
	{
		if (!preg_match("/^([a-z0-9\\_\\.\\-]+)@([a-z0-9\\_\\.\\-]+)\\.([a-z]{2,4})$/i", $v)) 
		{
			return false;
		}
		return true;
	}	
	public static function ValidateUSPhoneNum($v) 
	{
		$v = preg_replace( "/[^0-9]/", "", $v); // Strip out non-numerics
		if (!is_numeric($v)) {
			return false;
		}
		$len = strlen($v);	
		if($len != 10) {			
			return false;			
		}
		return true;		
	}
    
    function validateUSAZip($zip_code)
    {
        if(preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$zip_code))
            return true;
        else
            return false;
    }
    
    public static function validateNumber($v)
    {
        $v1 = trim($v);
        if($v1 == "")
          return false;
        
        if(preg_match('/^\d+$/', $v))
        {
                return true;
        }
        else
        {
                return false;
        }
    }
    
    public static function validateDecimal($v)
    {
        if(preg_match('/^\d+(\.\d+)?$/', $v))
                return true;
        
        return false;
    }
    
    public static function validUsername($v)
    {
        $v1 = trim($v);
        
        if($v1 == "")
          return false;
       
        if( preg_match( "/[^a-zA-Z|_]/", $v1 ) )
        {
            return false;
        }
        
        return true;
    }
    
    //Validates $v is valid Alphabetic or not
    //Returns if valid Alphabetic else false
    public static function validAlphabetic($v)
    {
        $v1 = trim($v);
        
        if($v1 == "")
          return false;
       
        if( eregi( "[^a-z A-Z]", $v1 ) )
        {
            return false;
        }
        
        return true;
    }
    
    //Validates $v is valid Alphabeticnumeric or not
    //Returns if valid Alphabeticnumeric else false
    public static function validAlphabeticNumeric($v)
    {
        $v1 = trim($v);
        
        if($v1 == "")
          return false;
       
        if( eregi( "[^a-zA-Z0-9]", $v1 ) )
        {
            return false;
        }
        
        return true;
    }
    
    //Validates credit card number
    //Returns true if valid credit card number else false
    public static function validCreditCardNum($v)
    {
        if( !self::validateNotEmpty($v) )
            return false;
        
        if( strlen( $v ) < 16 )
            return false;
        
        if( !self::validateNumber($v) )
            return false;
        
        return true;
    }
    
    public static function checkBlank( $value, $label )
    {
        if( trim( $value ) == "" )
            return "$label cannot be empty";
    }
    
    public static function isNumeric( $value, $label )
    {
        if ( !preg_match( "/^[0-9]+$/", $value ) )
            return "$label can accept only numeric values";
    }
    
    public static function isDecimal( $value, $label )
    {
        if ( !preg_match( "/^(-)?\d+(\.\d+)?$/", $value ) )
            return "$label can accept only numeric or decimal values";
    }
    
    public static function isAlphaNumeric( $value, $label )
    {
        if ( !preg_match( "/^[0-9a-z]+$/i", $value ) )
            return "$label can accept only alpha numeric values";
    }
    
    public static function isEmail( $value, $label )
    {
        if ( !preg_match( "/^[\w\d][\w\d\.\-_]*\@[\w\d\-]+\.[\w\d\.\-_]+$/", $value ) )
            return "$label's value is not a proper email id";
    }
    
    public static function isUrl( $value, $label )
    {
        if ( !preg_match( "^(http(s?)|ftp)+://+((www\.)?)+[A-Za-z0-9-]+\.+(com|org|in|net|.*)+(/?)$", $value ) )
            return "$label's value is not a proper URL";
    }
    
    public static function isSpaceInBetween( $value, $label )
    {
        if ( preg_match( "/\s/", $value ) )
            return "$label cannot contain a space";
    }
    
    public static function checkMinOrMaxLength( $value, $label, $min=0, $max=0 )
    {
        if( $min > 0 )
        {
            if( strlen( $value ) < $min )
                return "$label's minimum length is $min";
        }
        
        if( $max > 0 )
        {
            if( strlen( $value ) > $max )
                return "$label's maximum length is $max";
        }
    }
    
    public static function dateComparision( $date1, $date2, $compare_type, $date_format )
    {
        if( $date_format == "dd/mm/yyyy" || $date_format == "dd-mm-yyyy" )
        {
            $date1_array = explode( "/", $date1 );
            $date1 = $date1_array[2]."/".$date1_array[1]."/".$date1_array[0];
        }
        if( $date_format == "mm/dd/yyyy" || $date_format == "mm-dd-yyyy" )
        {
            $date1_array = explode( "/", $date1 );
            $date1 = $date1_array[2]."/".$date1_array[0]."/".$date1_array[1];
        }
        
        $date1_str_to_time = strtotime( $date1 );
        $date2_str_to_time = strtotime( $date2 );
        
        switch( strtolower( $compare_type ) )
        {
            case "equal":
                        if( $date1_str_to_time == $date2_str_to_time )
                            return 1;
                        else
                            return 0;
            case "lessthan":
                        if( $date1_str_to_time < $date2_str_to_time )
                            return 1;
                        else
                            return 0;
            case "greaterthan":
                        if( $date1_str_to_time > $date2_str_to_time )
                            return 1;
                        else
                            return 0;
            default :
                        return 0;
        }
    }
	
	public static function validateURL( $url )
	{
		$urlregex = "^(https?|ftp)\:\/\/([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*(\:[0-9]{2,5})?(\/([a-z0-9+\$_-]\.?)+)*\/?(\?[a-z+&\$_.-][a-z0-9;:@/&%=+\$_.-]*)?(#[a-z_.-][a-z0-9+\$_.-]*)?\$";
		if(eregi($urlregex, $url))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>
