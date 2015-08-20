<<<<<<< .mine
<?php /* Smarty version Smarty-3.0.6, created on 2015-01-07 14:24:56
=======
<?php /* Smarty version Smarty-3.0.6, created on 2015-02-25 03:12:04
>>>>>>> .r29
         compiled from "C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:908054ad41b84646d9-10015085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f09b97d52cf0f1caa4140ceee065f21277832cb0' => 
    array (
      0 => 'C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates\\header.tpl',
<<<<<<< .mine
      1 => 1419855299,
=======
      1 => 1419855924,
>>>>>>> .r29
      2 => 'file',
    ),
  ),
  'nocache_hash' => '908054ad41b84646d9-10015085',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Header Starts -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title><?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->page_title)){?><?php echo $_smarty_tpl->getVariable('response')->value->page_title;?>
<?php }else{ ?>mFirst<?php }?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<link rel="shortcut icon" href="http://localhost:3000/images/isakha_favicon.ico">-->
		<link href="<?php echo $_smarty_tpl->getVariable('BASE_CSS_URL')->value;?>
/style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $_smarty_tpl->getVariable('BASE_CSS_URL')->value;?>
/print.css" rel="stylesheet" type="text/css" media="print" />
		
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/?f=jquery"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/?f=date.format"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/common.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
/?f=validator"></script>
		
		<script type="text/javascript">
            var base_url        = "<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
";
            var base_image_url  = "<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
";
			var base_js_url  = "<?php echo $_smarty_tpl->getVariable('BASE_JS_URL')->value;?>
";
            var action          = "<?php echo $_smarty_tpl->getVariable('request')->value->action;?>
";
            var date_format_type = 'm/d/Y';
			var enable_data_logging  = "<?php echo $_smarty_tpl->getVariable('ENABLE_DATA_LOGGING')->value;?>
";
			var enable_data_logging_using_async_calls = "<?php echo $_smarty_tpl->getVariable('ENABLE_DATA_LOGGING_USING_ASYNC_CALLS')->value;?>
";
			
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
			<a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/SearchApps"><img src="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/logo_small.gif" width="290" height="105" border="0" alt="mFirst" /></a>
		</div>
		
		<!-- Session Control -->
		<div id="userActions">
			<?php if ($_smarty_tpl->getVariable('response')->value->session_prompt_login){?>
				<a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/AddApp">Add App</a>
				<span class="pipe">|</span>
				<a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/Login">Sign In</a>
			<?php }else{ ?>
				<span class="username">
					<?php if (isset($_SESSION['accountDropdown'])&&$_SESSION['accountDropdown']!=''){?>
						<?php echo $_SESSION['accountDropdown'];?>

					<?php }else{ ?>
						<?php if (isset($_SESSION['session_user_name'])&&$_SESSION['session_user_name']!=''){?>
							<?php echo $_SESSION['session_user_name'];?>

						<?php }elseif(isset($_SESSION['session_user_email'])){?>
							<?php echo $_SESSION['session_user_email'];?>

						<?php }?>
					<?php }?>
				</span>
				<span class="pipe">|</span>
				<a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/AddApp">Add App</a>
				<span class="pipe">|</span>
				<?php if (isset($_SESSION['adminPrivileges'])&&$_SESSION['adminPrivileges']==1){?>
					<a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/AdminDashboard">Manage</a>
					<span class="pipe">|</span>
				<?php }?>
				<a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/Logout">Sign Out</a>
			<?php }?>
        </div>
		
		<!-- Navigation -->
		<div id="nav">
            <ul class="tabs">
				<?php if ($_smarty_tpl->getVariable('response')->value->page_id=="ListUpcomingApps"){?>
					<li <?php if ($_smarty_tpl->getVariable('response')->value->page_id=="ListUpcomingApps"){?> class="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/ListUpcomingApps" ><span>Apps</span></a></li>
				<?php }elseif($_smarty_tpl->getVariable('response')->value->page_id=="ListTagRelatedApps"){?>
					<li <?php if ($_smarty_tpl->getVariable('response')->value->page_id=="ListTagRelatedApps"){?> class="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/ListTagRelatedApps" ><span>Apps</span></a></li>
				<?php }else{ ?>
					<li <?php if ($_smarty_tpl->getVariable('response')->value->page_id=="ListApps"){?> class="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/ListApps" ><span>Apps</span></a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['session_user_id'])){?>
					<li <?php if ($_smarty_tpl->getVariable('response')->value->page_id=="ListMyApps"){?> class="current" <?php }?>><a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/ListMyEvents"><span>My Apps</span></a></li>
					<li <?php if ($_smarty_tpl->getVariable('response')->value->page_id=="EditUser"){?> class="current"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/EditUser"><span>My Profile</span></a></li>
				<?php }?>
            </ul>
        </div>
		
		<!-- Search Form -->
		<?php if ($_smarty_tpl->getVariable('response')->value->page_id!="SearchApps"){?>
			<div id="headerSearch">
			<?php if ($_smarty_tpl->getVariable('response')->value->session_prompt_login){?>					
				<form id="searchform" method="GET" action="ListApps">
					<div class="searchpage_form_row">
						<label for="what">Keyword</label>	
						<input type="text" maxlength="100" <?php if (isset($_SESSION['what'])){?>value="<?php echo $_SESSION['what'];?>
"<?php }?> placeholder="App, App, Content etc." id="what" name="what"/>
					</div>
					<div class="searchpage_form_row">
						<label for="where">Location</label>
						<input id="where" type="text" maxlength="100" <?php if (isset($_SESSION['where'])){?>value="<?php echo $_SESSION['where'];?>
"<?php }?> placeholder="<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->defaultLocation)&&$_smarty_tpl->getVariable('response')->value->defaultLocation!=''){?><?php echo $_smarty_tpl->getVariable('response')->value->defaultLocation;?>
<?php }else{ ?>City, state or zip<?php }?>" name="where"/>
					</div>
		
					<div class="searchpage_form_row">
						<input type="submit" value="Search" id="searchSubmit" name="searchSubmit" class="searchButton" />
					</div>
				</form>
			<?php }?>							
			</div>
		<?php }?>
	</div>
	<!-- END HEADER -->