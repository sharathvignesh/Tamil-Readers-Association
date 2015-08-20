<!-- Left menu starts -->
{if isset($smarty.session.session_user_id) && $smarty.session.session_user_id > 0}
<table cellspacing="0" cellpadding="0" border="0" style="margin-top: 4px;">
    <tr>
        <td align="left">
            <table border="0" cellpadding="5" cellspacing="6">
                <tbody>
                    <tr>
                        <td colspan="1" align="left">
                            Welcome {$smarty.session.session_user->userName|ucfirst},
                        </td>
                        {has_access var=access page='Users'}		    
                        {if $access eq $GROUP_ACCESS_READ_WRITE || $access eq $GROUP_ACCESS_READ || $access eq $GROUP_ACCESS_ADD}
                        <td>&nbsp;|&nbsp;</td>
                        <td colspan="1" align="left">
                            <a href="{$BASE_URL}/Users">Users</a>
                        </td>
                        {/if}
                        
                        {has_access var=access page='Groups'}		    
                        {if $access eq $GROUP_ACCESS_READ_WRITE || $access eq $GROUP_ACCESS_READ || $access eq $GROUP_ACCESS_ADD}
                        <td>&nbsp;|&nbsp;</td>
                        <td colspan="1" align="left">
                            <a href="{$BASE_URL}/Groups">Groups</a>
                        </td>
                        {/if}
                        
                        {has_access var=access page='GroupUsers'}			    
                        {if $access eq $GROUP_ACCESS_READ_WRITE || $access eq $GROUP_ACCESS_READ || $access eq $GROUP_ACCESS_ADD}
                        <td>&nbsp;|&nbsp;</td>
                        <td colspan="1" align="left">
                            <a href="{$BASE_URL}/GroupUsers">Group Users</a>
                        </td>
                        {/if}
                        
                        {has_access var=access page='Tabs'}	    
                        {if $access eq $GROUP_ACCESS_READ_WRITE || $access eq $GROUP_ACCESS_READ || $access eq $GROUP_ACCESS_ADD}
                        <td>&nbsp;|&nbsp;</td>
                        <td colspan="1" align="left">
                            <a href="{$BASE_URL}/Tabs">Tabs</a>
                        </td>
                        {/if}
                        
                        {has_access var=access page='SubTabs'}		    
                        {if $access eq $GROUP_ACCESS_READ_WRITE || $access eq $GROUP_ACCESS_READ || $access eq $GROUP_ACCESS_ADD}
                        <td>&nbsp;|&nbsp;</td>
                        <td colspan="1" align="left">
                            <a href="{$BASE_URL}/SubTabs">Sub Tabs</a>
                        </td>
                        {/if}
                        
                        {has_access var=access page='GroupAccess'}		    
                        {if $access eq $GROUP_ACCESS_READ_WRITE || $access eq $GROUP_ACCESS_READ || $access eq $GROUP_ACCESS_ADD}
                        <td>&nbsp;|&nbsp;</td>
                        <td colspan="1" align="left">
                            <a href="{$BASE_URL}/GroupAccess">Group Access</a>
                        </td>
                        <td>&nbsp;|&nbsp;</td>
                        {/if}
                        
                        <td colspan="1" align="left">
                            <a href="{$BASE_URL}/Logout">Logout</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
{/if}
<!-- Left menu ends -->
