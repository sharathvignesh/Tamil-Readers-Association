<?php
class UserAccessRights 
{
    //Getting the access right and setting the session_tab_id session
    public static function GetRights( $currentSubTab )
    {
        $subTabs = Utils::GetSessionSubTabs();
        
        $rights = Utils::GetSessionUserGroupAccess( );
        
        $pageRight = GROUP_ACCESS_NONE;
        $pageId = "";
        $currentTabId = 0;
        
        if( sizeof( $subTabs ) > 0  )
        {
            foreach( $subTabs as $subTab )
            {
                if( $currentSubTab  == $subTab['url'])
                {
                    $pageId = $subTab['id'];
                    
                    $currentTabId = $subTab['tabId'];
                    
                    break;
                }
            }
        }
        
        $_SESSION["session_tab_id"]     = $currentTabId;
        $_SESSION["session_sub_tab_id"] = $pageId;
        
        if( count( $rights ) > 0 )
        {
            foreach( $rights as $key => $right )
            {
                if ($pageId  == $right['subTabId'])
                {
                    $pageRight = $right['accessRight'];
                    
                    break;
                }
           }
        }
        
        if( SUPER_USER_ID == Utils::GetSessionUserId() )
            $pageRight = GROUP_ACCESS_READ_WRITE;
        
        return $pageRight;
    }
    
    public static function AccesDeniedRedirect()
    {
        $errormsg = "Access Denied !";      
        $url = BASE_URL."/".$_SESSION["session_default_url"];  
        print_r("<script Language='javascript' type='text/javascript'>alert('".$errormsg."');
                window.location='".$url."';</script>" );
    }
}
?>