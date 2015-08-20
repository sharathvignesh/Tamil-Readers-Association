<?php
    class ErrorPage extends Action
    {
        public function init( )
        {
            //$this->layout = 'login_layout';
            $this->template = "errorpage";
            parent::init();
        }
        
        public function execute( $request, $response )
        {
            $this->setResponseParam( 'errorPage', "ErrorPage" );
        }
    }

?>
