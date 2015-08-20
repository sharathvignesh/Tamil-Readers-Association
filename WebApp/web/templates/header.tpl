<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Header Starts -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>{if isset($response->page_title)}{$response->page_title}{else}mFirst{/if}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<link rel="shortcut icon" href="http://localhost:3000/images/isakha_favicon.ico">-->
		<link href="{$BASE_CSS_URL}/style.css" rel="stylesheet" type="text/css" />
		<link href="{$BASE_CSS_URL}/print.css" rel="stylesheet" type="text/css" media="print" />
		
        <script type="text/javascript" src="{$BASE_JS_URL}/?f=jquery"></script>
        <script type="text/javascript" src="{$BASE_JS_URL}/?f=date.format"></script>
		<script type="text/javascript" src="{$BASE_JS_URL}/common.js"></script>
		<script type="text/javascript" src="{$BASE_JS_URL}/?f=validator"></script>
		
		<script type="text/javascript">
            var base_url        = "{$BASE_URL}";
            var base_image_url  = "{$BASE_IMAGE_URL}";
			var base_js_url  = "{$BASE_JS_URL}";
            var action          = "{$request->action}";
            var date_format_type = 'm/d/Y';
			var enable_data_logging  = "{$ENABLE_DATA_LOGGING}";
			var enable_data_logging_using_async_calls = "{$ENABLE_DATA_LOGGING_USING_ASYNC_CALLS}";
			
			/* Common Pop up alerts */
			function ShowWebcastPopUp( )
			{
				alert("You should search for webcast events for this tab to be enabled");
			}			
			function ShowProfilePopUp( )
			{
				alert("You should be logged in to view your profile");
			}			
			function ShowMyAppsPopUp( )
			{
				alert("You should be logged in to view your events");
			}
        </script>
		
        <!--[if lt IE 7]>
        <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>        
        <![endif]-->
        <noscript>Your browser does not support JavaScript!</noscript>
</head>
	<!-- Header starts -->
<body>
<div id="main-container">
    <div id="header">
        <div id="logo">
			<a href="{$BASE_URL}/SearchApps"><img src="{$BASE_IMAGE_URL}/logo_small.gif" width="290" height="105" border="0" alt="mFirst" /></a>
		</div>
		
		<!-- Session Control -->
		<div id="userActions">
			{if $response->session_prompt_login}
				<a href="{$BASE_URL}/AddApp">Add App</a>
				<span class="pipe">|</span>
				<a href="{$BASE_URL}/Login">Sign In</a>
			{else}
				<span class="username">
					{if isset($smarty.session.accountDropdown) && $smarty.session.accountDropdown!=""}
						{$smarty.session.accountDropdown}
					{else}
						{if isset($smarty.session.session_user_name) && $smarty.session.session_user_name!=""}
							{$smarty.session.session_user_name}
						{elseif isset($smarty.session.session_user_email)}
							{$smarty.session.session_user_email}
						{/if}
					{/if}
				</span>
				<span class="pipe">|</span>
				<a href="{$BASE_URL}/AddApp">Add App</a>
				<span class="pipe">|</span>
				{if isset($smarty.session.adminPrivileges) && $smarty.session.adminPrivileges==1}
					<a href="{$BASE_URL}/AdminDashboard">Manage</a>
					<span class="pipe">|</span>
				{/if}
				<a href="{$BASE_URL}/Logout">Sign Out</a>
			{/if}
        </div>
		
		<!-- Navigation -->
		<div id="nav">
            <ul class="tabs">
				{if $response->page_id =="ListUpcomingApps"}
					<li {if $response->page_id =="ListUpcomingApps"} class="current"{/if}><a href="{$BASE_URL}/ListUpcomingApps" ><span>Apps</span></a></li>
				{elseif $response->page_id =="ListTagRelatedApps"}
					<li {if $response->page_id =="ListTagRelatedApps"} class="current"{/if}><a href="{$BASE_URL}/ListTagRelatedApps" ><span>Apps</span></a></li>
				{else}
					<li {if $response->page_id =="ListApps"} class="current"{/if}><a href="{$BASE_URL}/ListApps" ><span>Apps</span></a></li>
				{/if}
				
				{if isset($smarty.session.session_user_id)}
					<li {if $response->page_id =="ListMyApps"} class="current" {/if}><a href="{$BASE_URL}/ListMyEvents"><span>My Apps</span></a></li>
					<li {if $response->page_id =="EditUser"} class="current"{/if}><a href="{$BASE_URL}/EditUser"><span>My Profile</span></a></li>
				{/if}
            </ul>
        </div>
		
		<!-- Search Form -->
		{if $response->page_id !="SearchApps"}
			<div id="headerSearch">
			{if $response->session_prompt_login}					
				<form id="searchform" method="GET" action="ListApps">
					<div class="searchpage_form_row">
						<label for="what">Keyword</label>	
						<input type="text" maxlength="100" {if isset($smarty.session.what)}value="{$smarty.session.what}"{/if} placeholder="App, App, Content etc." id="what" name="what"/>
					</div>
					<div class="searchpage_form_row">
						<label for="where">Location</label>
						<input id="where" type="text" maxlength="100" {if isset($smarty.session.where)}value="{$smarty.session.where}"{/if} placeholder="{if isset($response->defaultLocation) && $response->defaultLocation!=""}{$response->defaultLocation}{else}City, state or zip{/if}" name="where"/>
					</div>
		
					<div class="searchpage_form_row">
						<input type="submit" value="Search" id="searchSubmit" name="searchSubmit" class="searchButton" />
					</div>
				</form>
			{/if}							
			</div>
		{/if}
	</div>
	<!-- END HEADER -->