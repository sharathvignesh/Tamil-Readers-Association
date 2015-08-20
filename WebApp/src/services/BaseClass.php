<?php
    class BaseClass
    {
        /* Variables used in pager */
        public $currentPage;
        public $pageSize;
        public $sortColumn;
        public $sortOrder;
        public $nextPage;
		public $totalNumberOfRows;
        public $excludeArray;
        public $id;
		public $insertTimeStamp;
        public $updateTimeStamp;
		public $recordStatus;
		
        /* Default initializations */
        public function __construct( )
        {
            $this->pageSize                        	 	    = LIST_PAGE_SIZE;
            $this->sortColumn                      	 		= 0;
            $this->sortOrder                       	 		= "ASC";

            $this->excludeArray                    	 	    = Array( );
            $this->excludeArray["currentPage"]    	 		= "currentPage";
            $this->excludeArray["pageSize"]       	 	    = "pageSize";
            $this->excludeArray["sortColumn"]     	 		= "sortColumn";
            $this->excludeArray["sortOrder"]      	 		= "sortOrder";
            $this->excludeArray["nextPage"]       	 	    = "nextPage";
			$this->excludeArray["totalNumberOfRows"] 		= "totalNumberOfRows";
            $this->excludeArray["excludeArray"]   	 	    = "excludeArray";
        }
    }
?>