<?php /* Smarty version Smarty-3.0.6, created on 2015-03-14 06:39:38
         compiled from "C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/errorpage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12054a4fa9adfc1b9-26668883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d4fd076cb3d82f7dd492a59fbac54b85a4b8fe6' => 
    array (
      0 => 'C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/errorpage.tpl',
      1 => 1419855924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12054a4fa9adfc1b9-26668883',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Error page starts -->
<div class="list_content">
    
        <div class="right_col">
            &nbsp;
        </div>
        <div id="aboutPagesDiv" class="left_col">
			<a href=""><img src="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/error.gif" style="border:none; vertical-align:middle;" alt="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/error.gif" /> Error</a>
            <p align="left" style="height: 30px;">
                The page you requested could not be found. It is possible that the address is incorrect, or that the page no longer exists.
            </p>
            <p align="left" valign="top" style="height: 25px;font-size:18px;color:#554C4C;padding-left:0px;">
                Please try the following:
            </p>
            <p align="left" valign="top" >
                <img src="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/arrow.jpg" style=" vertical-align:middle;" alt="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/arrow.jpg" />&nbsp;Check if the spelling of the URL has been typed correctly.
            <br/>
                <img src="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/arrow.jpg" style=" vertical-align:middle;" alt="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/arrow.jpg" />&nbsp;Click on this link:
                <a href="<?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/SearchApps" class="underline"><?php echo $_smarty_tpl->getVariable('BASE_URL')->value;?>
/SearchApps</a>, it re-directs to Home page.
            <br/>
                <img src="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/arrow.jpg" style=" vertical-align:middle;" alt="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/arrow.jpg" />&nbsp;You can also click on the above menu links to find the relevant information.
            <br/>
                <img src="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/arrow.jpg" style=" vertical-align:middle;" alt="<?php echo $_smarty_tpl->getVariable('BASE_IMAGE_URL')->value;?>
/arrow.jpg" />&nbsp;Click on the browser 'Back' button to go back to your previous page.
            </p>
		</div>
</div> 
<!-- Error page ends -->