<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-22 10:59:54
         compiled from ".\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17942550e929ac2f608-08375487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd5ee60955e743a1423d92805a1e2f7144fa8df8' => 
    array (
      0 => '.\\templates\\main.tpl',
      1 => 1426970876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17942550e929ac2f608-08375487',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
    'asdf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_550e929ad58451_60721426',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e929ad58451_60721426')) {function content_550e929ad58451_60721426($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/photo.jpg">


    <title>Nasotech  Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><?php echo '<script'; ?>
 src="../../assets/js/ie8-responsive-file-warning.js"><?php echo '</script'; ?>
><![endif]-->
    <?php echo '<script'; ?>
 src="js/ie-emulation-modes-warning.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/try.js"><?php echo '</script'; ?>
>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  </head>

  <body>

    <div class="container">
        <div class="row">
          <div class="col-lg-3">
          <img id="logo" src="img/photo.jpg" style="height:100px;"/>
          </div>
          <div class="col-lg-9 col-lg-push-1">
          <h1 id="tra_head" style="color:whitesmoke;">Tamil Readers Association</h1>
          </div>
        </div>
      <div class="row" style="margin-top:141px">
          
          <div class="col-md-12">
      <form class="form-signin" action="authenticate.php" method="post">
        
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label style="color:whitesmoke;">
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <div class="row">
        <div class="col-md-6">
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #1abc9c; border-color:#9099A2;">Sign in</button>
        </div>                    
            <div class="col-md-6">
              <a href="signup.php" class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #1abc9c; border-color:#9099A2;">Sign up</a>
        </div>
          </div>
      </form>
        </div>
      </div>

    </div> <!-- /container -->
    <?php echo '<script'; ?>
>
     $(window).load(function() {
     $("#tra_head").effect("slide",1200);
          });  
    <?php echo '</script'; ?>
>

    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <?php echo '<script'; ?>
 src="js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
    <div style="color : blue;">
      <?php  $_smarty_tpl->tpl_vars['asdf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['asdf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['asdf']->key => $_smarty_tpl->tpl_vars['asdf']->value) {
$_smarty_tpl->tpl_vars['asdf']->_loop = true;
?>
    <h1><?php echo $_smarty_tpl->tpl_vars['asdf']->value['first_name'];?>
</h1>
    <!--<?php echo $_smarty_tpl->tpl_vars['asdf']->value['id'];?>

    <?php } ?>
  </div>  -->
  </body>
</html>
<?php }} ?>
