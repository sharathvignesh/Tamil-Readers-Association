<?php

class XmlHelper
{
    public static function array2xml($array)
	{
        ob_start();
        self::array2xml_loop($array, "");
        $xml = ob_get_contents();
        ob_end_clean();
        
        return $xml;
	}
    
    public static function objectToArray( $obj )
    {
        $content['res'] = $obj;
        foreach( $content['res'] as $key => $value )
        {
            if( is_object($value) )
            {
                $class_name = get_class($value);
                $reflection = new ReflectionUtil($class_name);
                $arr = $reflection->getPropertyNamesAndValuesAsArray($value);
                
                $content['response'][$key] = $arr;
            }
            else if( is_array( $value ) )
            {
                //$content['response'][$key] = $value;
            }
            else
            {
                $content['response'][$key] = $value;
            }
        }
        return $content;
    }

	public static function xml2array($xmlstr )
    {
        $xml = simplexml_load_string($xmlstr);
        return self::simplexml2array($xml);
    }

	public static function tidyxml($xmlstr)
    {
        $xml = simplexml_load_string($xmlstr);
        return $xml->asXML();
	}

	public static function simplexml2array($xml)
    {
        if (get_class($xml) == 'SimpleXMLElement')
        {
            $attributes = $xml->attributes();
            foreach($attributes as $k=>$v)
            {
                if ($v) $a[$k] = (string) $v;
            }
            $xml = get_object_vars($xml);
        }
        if (is_array($xml))
        {
            if (count($xml) == 0) return ""; 
            foreach($xml as $key=>$value)
            {
                $r[$key] = self::simplexml2array($value);
            }
            if (isset($a)) $r['@'] = $a;    // Attributes
            return $r;
        }
        return (string) $xml;
	}


	private static function array2xml_loop($array, $parent)
	{
		foreach( $array as $key => $value )
		{
			if( self::is_numeric_array($value) )
            {
			 	self::array2xml_loop($value, $key);
			}
			else
            {
				if($parent)
                {
                    // the parent is numeric array
				  	$key = $parent;
				}
                
		  		print "<$key>";
                
				if( is_array( $value ) )
                {
                    self::array2xml_loop($value, "");
				}
				else
                {
                    print htmlentities($value);
				}
				print "</$key>\n";
			}
		}
	}

	private static function is_numeric_array($arr)
	{
        if(!is_array($arr))
        { return FALSE; }
        
        foreach($arr as $key => $value)
        {
            if (is_integer($key))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        return FALSE;
	}
}
?>