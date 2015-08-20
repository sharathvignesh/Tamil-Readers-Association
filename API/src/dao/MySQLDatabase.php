<?php
    class MySQLDatabase
    {
        public $dbcon = null;
        public $db = null;
        
		/* Setup the default constructor */
        /**
         * Establishing database connection
         * @return database connection handler
        */
				
		public function __construct()
		{
			try
			{
				include_once dirname(__FILE__) . '/../../include/Config.php';
								
        		// Connecting to mysql database
				//$this->dbcon = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);				
				$this->dbcon = new mysqli(DB_SERVER, DB_USERNAME, DB_USERPASSWORD, DB_NAME);
								
        		// Check for database connection error
        		if (mysqli_connect_errno()) {
           			echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
								
			}
			// catch( MongoConnectionException $e )
			// {
			// //die('Error connecting to MongoDB server');
			// error_log('Error connecting to MongoDB server');
			// }
			catch( Exception $e )
			{
				error_log( 'xxxxxxxxxx Error in MySQL Database Class -----======-----===-- ');
				error_log( 'Error: '.$e->getMessage() );
			}
			
			//Select a database
            //$this->db = $this->dbcon->mfirst;
            $this->db = $this->dbcon;
		}
    }
?>




