<?php    
    class CommonValidations
    {
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
    }    
?>