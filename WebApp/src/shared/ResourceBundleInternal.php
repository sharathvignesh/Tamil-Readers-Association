<?php


class ResourceBundleInternal {

	private static $cached_bundles = array();

	private $items = array();

	// check if the given resource bundle is already loaded.
	// If not then load it from the file in the resources dir
	// TBD: Locale support

	function __construct($name="errors", $locale=""){
		if( count( self::$cached_bundles ) > 0 )
		{
			$this->items = self::$cached_bundles[$name];
		}
		if(!$this->items) {
			$resource_dir = RESOURCE_DIR;
			$filename =  "$resource_dir/${name}.properties";
			$this->items = $this->loadFile($filename);
			self::$cached_bundles[$name] = $this->items;
		}		
	}

	// load the list of name=value pairs from a file
	// Blank lines and lines starting with # are ignored

	private function loadFile($filename){
		$output = array();
		$content = file_get_contents($filename);
		$lines = explode("\n", $content);
		foreach($lines as $line) {
			$line = trim($line);
			if(!$line) continue;
			if(preg_match("/^#/", $line)) continue;
			preg_match("/(.*?)=(.*?)$/", $line, $matches);
			if($matches) {
				$output{$matches[1]} = $matches[2];
			}
		}
		return $output;
	}

	// returns the value for given key
	// If more arguments are passed to this function
	// then it will substitute {N} in the value with Nth argument.
	// e.g. '{1}' in the value will be replaced by first argument 
	
	function  getItem($key, $args=array()){
		//return $this->items{$key};
		array_unshift($args, $key);
        
        // Using callback to replace the following 
        return preg_replace_callback('/{(\w+)}/',
                                     function ($matches) use ($args) {
                                         $idx = intval($matches[1]);
                                         return "$args[$idx]";
                                     },
                                     $this->items{$key}
                                     );        
                                     
		//return preg_replace('/{(\w+)}/e', '$args[$1]' , $this->items{$key});		
	}
	
}


?>