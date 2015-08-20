<?php
    class ActionHandler
    {
        public static function handleAction( $action )
        {
            $instance = self::getActionInstance( $action );
            
            $instance->init();
            
            $request =  (object) $_REQUEST;
            
            $instance->call( $request );
            
            return $instance;
        }

        private static function getActionInstance( $action )
        {
            $action_root = APP_ROOT . "/src/web";

            $actions = Utils::globr( "$action_root", "*.php" );
            
            foreach( $actions as $action1 )
            { 
                $action2 = preg_replace("/.*?(.*?).php/", "$1", $action1);

                if( strpos(  $action2, "/" ) >= 0 )
                {
                    $actions_array = explode( "/", $action2 );

                    $action2 = $actions_array[count($actions_array)-1];
                }
                if( strtolower( $action ) == strtolower( $action2 ) )
                {
                    $class = basename( $action1, ".php" );
                    include_once $action1;
                    break;
                }
            }
            
            if( !class_exists( $class, false ) )
            {
                try
                {
                    throw new ExceptionHandler( "No Handler found for action[$action]. " );
                }
                catch( ExceptionHandler $exp )
                {
                    $exp->type = ExceptionType::APPLICATION;
                    $exp->logError();
                    $exp->reportError();
                }
            }
            else
            {
                $instance = new $class;
            }
            return $instance;
        }

        public static function CheckSessionUser()
        {
            if( empty( $_SESSION['session_user_id'] ) )
            {
                header( "Location: Home" );
            }
        }
    }
?>
