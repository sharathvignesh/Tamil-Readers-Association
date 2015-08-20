<?php
require_once "MySQLDatabase.php";

 //if( array_key_exists( "pageSize",$data) )
 
	class IDInfoDAO extends MySQLDatabase
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
		public function GetNextID( $serviceName )
		{
            $returnArray = array( );
            $responseArray = array( );
            
            $nextID = 0;
            
            $selectQuery = "select id from idinfo where servicename = :servicename;";

            $parameters = array(
                ':servicename' =>trim($serviceName)
            );     

            $stmt = runQuery(DB_SERVER, DB_PORT, DB_USERNAME, DB_USERPASSWORD, DB_NAME, $selectQuery, $parameters);
        
            if($stmt == QUERY_FAILED){
                return FAILED;
            }
                                
            $row = fetchNextRow($stmt['statement']);
            
            if ($row != null) {
                
                try
                {                        
                    $nextID = getValue($row, "id");
                    $nextID = $nextID + 1;
                }
                catch( Exception $e )
                {
                    error_log( 'Database Error: '. $e->getMessage() );
                    return FAILED;
                }
            
            }

            $updateQuery = "UPDATE idinfo SET id = :id  WHERE servicename = :servicename;";
            
            $parameters = array(
                ':id' => $nextID,
                ':servicename' => trim($serviceName)
            );     

            $stmt = runQuery(DB_SERVER, DB_PORT, DB_USERNAME, DB_USERPASSWORD, DB_NAME, $updateQuery, $parameters);

            if ($stmt == QUERY_FAILED) {
                error_log( 'Database Error: '. $e->getMessage() );                
                return FAILED;
            }
                 
            return $nextID;
		}


 	}
?>