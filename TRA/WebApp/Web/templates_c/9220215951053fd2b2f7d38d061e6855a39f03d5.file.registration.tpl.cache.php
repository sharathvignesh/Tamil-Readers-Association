<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-22 15:25:11
         compiled from ".\templates\registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18047550ed0c7d72098-67176501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9220215951053fd2b2f7d38d061e6855a39f03d5' => 
    array (
      0 => '.\\templates\\registration.tpl',
      1 => 1427031237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18047550ed0c7d72098-67176501',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_550ed0c7e60550_81529769',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550ed0c7e60550_81529769')) {function content_550ed0c7e60550_81529769($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../img/photo.jpg">

    <title><?php echo $_smarty_tpl->tpl_vars['role']->value;?>
 Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
      <link href="css/registration.css" rel="stylesheet">
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
    <?php echo '<script'; ?>
 src="js/registration.js"><?php echo '</script'; ?>
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
          <div class="col-lg-8 col-xs-12 heading" style="margin-left: 294px;">
           <h1 class="admin_heading" style="color:rgb(83, 145, 153); font-size: 50px; font-weight: 800;"><?php echo $_smarty_tpl->tpl_vars['role']->value;?>
 Registration Page</h1>
          </div>
         </div>
            <br>
            <form action="store.php" method="post">
            <div class="row" style="margin-top: 88px;">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;">First Name           </pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="firstname" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;"> Last Name           </pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="lastname" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;">User Name</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="username" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;">  Password</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="password" name="password" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;">   Address</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="address" required="required" placeholder="" class="form-control" style="width:43%; height:100px;">
            </div>
            </div>
            <br>
            <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;">      Phone Number</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="phone" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-3">
             <pre style="font-size:22px;">  Email-id</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" name="email" required="required" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
            <div class="row">
             <div class="col-lg-3 col-lg-push-2">
             <pre style="font-size:22px;">    Account Status</pre>
             </div>
            <div class="col-lg-6 col-lg-push-3">    
            <input type="text" placeholder="" class="form-control" style="width:43%;">
            </div>
            </div>
                
            <div class="row" style="margin-top: 36px;">
                <div class="col-md-6 col-md-push-5">
                 <button type="submit" class="btn btn-info">SAVE</button>
                </div>
                <div class="col-md-6">
                <a href="index.php"><button type="button" class="btn btn-info">CANCEL</button></a>
                </div>
            </div>
            </form>    
        </div>
 

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo '<script'; ?>
 src="js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }} ?>
