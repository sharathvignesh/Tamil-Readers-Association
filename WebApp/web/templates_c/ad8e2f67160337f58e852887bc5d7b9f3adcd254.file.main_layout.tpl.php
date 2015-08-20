<<<<<<< .mine
<?php /* Smarty version Smarty-3.0.6, created on 2015-01-07 14:24:56
=======
<?php /* Smarty version Smarty-3.0.6, created on 2015-02-25 03:12:05
>>>>>>> .r29
         compiled from "C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/main_layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1967554ad41b83f66c1-95135274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad8e2f67160337f58e852887bc5d7b9f3adcd254' => 
    array (
      0 => 'C:/nasoindiadev/nexenuiserverdev/WebApp/web/templates/main_layout.tpl',
<<<<<<< .mine
      1 => 1419855299,
=======
      1 => 1419855924,
>>>>>>> .r29
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1967554ad41b83f66c1-95135274',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\nasoindiadev\nexenuiserverdev\WebApp\libs\smarty\plugins\modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<?php if (isset($_smarty_tpl->getVariable('response',null,true,false)->value->redirectedNoResults)&&$_smarty_tpl->getVariable('response')->value->redirectedNoResults==1){?>
    <div style="text-align:center;margin-top:10px;" align="center">
        <font style="color:red;"><b>No results found for your search criteria. These are upcoming events</b></font>
    </div>
    <div id="main-content-with-error">
<?php }else{ ?>
    <div id="main-content">
<?php }?>

    <?php echo $_smarty_tpl->getVariable('MAIN_CONTENT')->value;?>

</div>
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
