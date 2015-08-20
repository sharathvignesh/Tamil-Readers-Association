<?php
class ReflectionUtil
{
	private $reflectedClass;

	public function __construct($name="")
	{
        if( $name != "" )
            $this->reflectedClass = new ReflectionClass(new $name);
	}

	public function populateObjectFromArray(&$object, $row)
	{
		if (!empty($row))
        {
			foreach($row as $key => $value)
			{
				if($this->reflectedClass->hasProperty($key))
					$object->$key = $value;
			}
        }
	}

	public function populateObjectFromJSON(&$object, $jsonObject)
	{
		foreach($jsonObject as $property => $value)
		{
			if($this->reflectedClass->hasProperty($property))
				$object->$property = $value;
		}
	}

	public function getPropertyNames($arr_exclude=array())
	{
		$properties = $this->reflectedClass->getProperties();
		$names = array();
		foreach ($properties as $property)
		{
			$name = $property->getName();
			if( !array_key_exists($name, $arr_exclude))
				$names[] = $name;
		}
		return $names;
	}

    public function getPropertyNamesAndValuesAsArray($object)
    {
        $properties = $this->reflectedClass->getProperties();
        $arr = array();
        foreach ($properties as $property)
		{
			$name = $property->getName();
            if( is_object($object->$name) )
            {
                $arr[$name] = $this->getPropertyNamesAndValuesAsArray($object->$name);
            }
            else
                $arr[$name] = $object->$name;
		}

        return $arr;
    }
    public function getPropertyNamesAndValuesAsArrayEx($object, $arr_exclude=array())
    {
        $properties = $this->reflectedClass->getProperties();
        $arr = array();
        foreach ($properties as $property)
	{
	    $name = $property->getName();
            if( is_object($object->$name) )
            {
		if( !array_key_exists($name, $arr_exclude))
                  $arr[$name] = $this->getPropertyNamesAndValuesAsArray($object->$name);
            }
            else
            {
		if( !array_key_exists($name, $arr_exclude))
                    $arr[$name] = $object->$name;
	    }
	}

        return $arr;
    }

	public function getPropertyNamesAndValues($object, $arr_exclude=array())
	{
		$properties = $this->reflectedClass->getProperties();
		$arr_exclude = $object->excludeArray;
		
		foreach ($properties as $property)
		{
			$name = $property->getName();
			if (!array_key_exists($name, $arr_exclude))
			{
				if (!isset($fields))
				{
                    if( stripos( $object->$name, 'now(' ) )
                    {
                        $fields = $name;
                        $values = "".$object->$name."";
                    }
                    else
                    {
                        $fields = $name;
                        $values = "".$object->$name."";
                    }
				}
				else
				{
                    if( stripos( $object->$name, 'now(' ) )
                    {
                        $fields .= ",".$name;
                        $values .= "<%$$%>".$object->$name."";
                    }
                    else
                    {
                        $fields .= ",".$name;
                        $values .= "<%$$%>".$object->$name."";
                    }
				}
			}
		}

		return array('fields' => $fields, 'values' => $values);
	}

	public function getNamesAndValuesForUpdate($object, $arr_exclude=array())
	{
		$properties = $this->reflectedClass->getProperties();
		$values = array();
		$arr_exclude = $object->excludeArray;
		foreach ($properties as $property)
		{
			$name = $property->getName();
			if (!array_key_exists($name, $arr_exclude))
			{
				if (!isset($fields))
				{
					$fields = $name ." = ? ";
				}
				else
				{
					$fields .= ",".$name ." = ? ";
				}
				$values[] = $object->$name;
			}
		}
		return array( 'fields' => $fields, 'values' => $values );
	}
    
    /*
     * Add htmlspecialchars for response item
     * @param     $object       response item to escape html special characters
     *
     * @return     Response item
    */
    public function htmlEscForResponseItem( $object )
    {
        if( empty( $object ) )
            return null;
        if( is_object( $object ) )
        {
            $class_name = get_class($object);
            $reflection = new ReflectionUtil($class_name);
            
            $properties = $reflection->reflectedClass->getProperties( );
            
            foreach ( $properties as $property )
            {
                $name = $property->getName();
                
                if( is_object($object->$name) )
                {
                    $object->$name = $reflection->htmlEscForResponseItem($object->$name);
                }
		else if( is_array( $object->$name ) )
			$object->$name = $object->$name;
                else                    
                    $object->$name = htmlspecialchars( $object->$name );
            }
        }
        else if( is_array( $object ) )
        {
            $object = $this->htmlEscForArrays( $object );
        }
        else
        {
            $object = htmlspecialchars( $object );
        }
        return $object;
    }
    
    /*
     * Add htmlspecial chars for arrays
     * @param   $_input         Array to escape
     * @param   $_esc_keys      key values to be escaped or not
    */
    public function htmlEscForArrays( $_input = null, $_esc_keys = false )
    {
        if( ( $_input != null ) && ( is_array( $_input ) ) )
        {
            foreach( $_input as $key => $value )
            {
                if($_esc_keys)
                {
                    $_return[htmlspecialchars($key)] = $this->htmlEscForArrays( $value, $_esc_keys );
                }
                else
                {
                    $_return[$key] = $this->htmlEscForArrays( $value );
                }
            }
            return $_return;
        }
        else if( $_input != null )
        {
            return htmlspecialchars( $_input );
        }
        else
        {
            return null;
        }
    }
}
?>