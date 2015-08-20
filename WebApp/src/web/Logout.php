<?php
    class Logout extends Action
    {
        public function init( )
        {
            parent::init( );
        }

        public function execute( $request, $response )
        {
            //Destroy corresponding session in API
            ServiceUtils::DestroySession( session_id() );
            
            /* Clear all session variables */
            foreach( $_SESSION as $key => $session_item )
            {
                unset($_SESSION[$key]);
            }
            session_unset( );
            session_destroy( );
            
//            header("Location: " . BASE_URL . WEBAPP_HOME_PAGE );
            header("Location: " . BASE_URL . "/EditUser" );            
            exit;
        }
    }
?>