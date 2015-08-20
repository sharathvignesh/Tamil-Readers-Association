<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {has_access} function plugin
 *
 * Type:     function<br>
 * Name:     $page_url<br>
 * Purpose:  check whether a page is accessible by logged in user
 * @param string
 * @return string
 */

function smarty_function_has_access($params, $template)
{
    $session_user = Utils::GetSessionUser();
    $session_user_id = Utils::GetSessionUserId();

    if( !is_a( $session_user, "UserSVC" ) || !isset( $session_user ) || !isset( $session_user_id ) )
    {
        // Traslate the session_id to system session_id
        return $template->assign( $params['var'], GROUP_ACCESS_NONE );
    }
    
    $page_url = $params['page'];
    $accessRight = UserAccessRights::GetRights( $page_url );
    
    return  $template->assign( $params['var'], $accessRight );
}

?>