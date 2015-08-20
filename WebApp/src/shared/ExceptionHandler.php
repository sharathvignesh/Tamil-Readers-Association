<?php

class ExceptionType
{
    const DATABASE = 'DATABASE';
    const SERVICE = 'SERVICE';
    const APPLICATION = 'APPLICATION';
    const QUERY = 'QUERY';
}

class ExceptionHandler extends Exception
{
    public $message;
    public $type;
    public $redirect=true;
    
    public function getErrorMessage()
    {
        return $this->message;
    }
    
    public function getBackTrace()
    {
        $trace = "<br/><br/>---------------------<br/>";
        $trace .= "Stack Trace:\n" . $this->getTraceAsString(). "\n";
        $trace .= "---------------------<br/><br/>"; 
        return $trace;
    }
    
    public function logError()
    {
        if( ENABLE_EXCEPTION_DEBUG )
            echo "Exception : ".$this->message." <br/><br/>File : ".$this->getFile()." on line ".$this->getLine().$this->getBackTrace();
        if( ENABLE_EXCEPTION_LOG )  
            error_log("EXCEPTION:".$this->getErrorMessage().":".$this->getBackTrace());
    }
    
    public function reportError()
    {
        if( ENABLE_EXCEPTION_REPORT )
        {
            $subject = "Error Report";
            
            switch( $this->type )
            {
                case ExceptionType::APPLICATION :
                    $subject .= " : Application Error" ;
                    break;
                
                case ExceptionType::DATABASE :
                    $subject .= " : Database Error" ;
                    break;
                
                case ExceptionType::SERVICE :
                    $subject .= " : Service Error" ;
                    break;
                
                case ExceptionType::QUERY :
                    $subject .= " : Query Error" ;
                    break;
            }
			
            /*$selected_campaign = $_SESSION['selected_campaign'];
			$search_term = $_SESSION['user_campaigns'][$selected_campaign]['searchTerm'];
			$name = $_SESSION['user_campaigns'][$selected_campaign]['name'];
            $sendMail = new SendMailToUser();
            $sendMail->setSubject( $subject );
            $stack_trace = "Exception : ".$this->message." <br/><br/>File : ".$this->getFile()." on line ".$this->getLine().$this->getBackTrace();
			$stack_trace .= "<br /><br />User ID:".$_SESSION["session_user_id"]."<br /><br />User Name : ".$_SESSION['session_user']->firstName." ".$_SESSION['session_user']->lastName."<br /><br />Email : ".$_SESSION['session_user']->email."<br /><br />IP address:".$_SERVER['REMOTE_ADDR'];
			$stack_trace .= "<br /><br />Campaign ID: ".$selected_campaign."<br /><br />Campaign Name: ".$name."<br /><br />Search Term: ".$search_term;
			$stack_trace .= "<br /><br />Request URI: ".$_SERVER['REQUEST_URI'];
            $sendMail->setDescription( $stack_trace );		
            $sendMail->setEmailAddress( EXCEPTION_REPORT_EMAIL, EXCEPTION_REPORTER );
			
			if( stripos("localhost" , strtolower( $_SERVER['HTTP_HOST'] ) ) < 0 )
			{
				$sendMail->AddCC( "harsh@buzzgain.com", "Harsh Nikumbh" ); 
				$sendMail->AddCC( "prakash@buzzgain.com", "Prakash Anand" ); 			
			}

            $sendMail->sendMail( );
            */
            /*ob_start();
            ob_clean();
            header( "Location : " . BASE_URL . "/ErrorPage" );*/
            if($this->redirect)
            {
				echo "heeei";
                echo '<script>window.location = "' . BASE_URL . '/ErrorPage";</script>';
                exit;
            }
            else
                return;
        }
    }
}

?>
