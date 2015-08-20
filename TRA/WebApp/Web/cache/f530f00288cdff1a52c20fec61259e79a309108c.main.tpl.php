<?php /*%%SmartyHeaderCode:3798550baddcb6ba94-66518261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f530f00288cdff1a52c20fec61259e79a309108c' => 
    array (
      0 => '.\\templates\\main.tpl',
      1 => 1426961879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3798550baddcb6ba94-66518261',
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_550e841362fd66_11183591',
  'has_nocache_code' => false,
  'cache_lifetime' => 5,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550e841362fd66_11183591')) {function content_550e841362fd66_11183591($_smarty_tpl) {?><!DOCTYPE html>
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
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/try.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
    <script>
     $(window).load(function() {
     $("#tra_head").effect("slide",1200);
          });  
    </script>

    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <div style="color : blue;">
      <br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined index: rows in C:\Program Files\wamp\www\naso1\templates_c\f530f00288cdff1a52c20fec61259e79a309108c.file.main.tpl.cache.php on line <i>124</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0004</td><td bgcolor='#eeeeec' align='right'>240352</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\Program Files\wamp\www\naso1\index.php' bgcolor='#eeeeec'>..\index.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0102</td><td bgcolor='#eeeeec' align='right'>1258328</td><td bgcolor='#eeeeec'>Smarty_Internal_TemplateBase->display(  )</td><td title='C:\Program Files\wamp\www\naso1\index.php' bgcolor='#eeeeec'>..\index.php<b>:</b>7</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.0102</td><td bgcolor='#eeeeec' align='right'>1262584</td><td bgcolor='#eeeeec'>Smarty_Internal_TemplateBase->fetch(  )</td><td title='C:\Program Files\wamp\www\naso1\Smarty\libs\sysplugins\smarty_internal_templatebase.php' bgcolor='#eeeeec'>..\smarty_internal_templatebase.php<b>:</b>394</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.0122</td><td bgcolor='#eeeeec' align='right'>1323304</td><td bgcolor='#eeeeec'>content_550baddcce3db5_27612049(  )</td><td title='C:\Program Files\wamp\www\naso1\Smarty\libs\sysplugins\smarty_internal_templatebase.php' bgcolor='#eeeeec'>..\smarty_internal_templatebase.php<b>:</b>188</td></tr>
</table></font>
<br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Trying to get property of non-object in C:\Program Files\wamp\www\naso1\templates_c\f530f00288cdff1a52c20fec61259e79a309108c.file.main.tpl.cache.php on line <i>124</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0004</td><td bgcolor='#eeeeec' align='right'>240352</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\Program Files\wamp\www\naso1\index.php' bgcolor='#eeeeec'>..\index.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0102</td><td bgcolor='#eeeeec' align='right'>1258328</td><td bgcolor='#eeeeec'>Smarty_Internal_TemplateBase->display(  )</td><td title='C:\Program Files\wamp\www\naso1\index.php' bgcolor='#eeeeec'>..\index.php<b>:</b>7</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.0102</td><td bgcolor='#eeeeec' align='right'>1262584</td><td bgcolor='#eeeeec'>Smarty_Internal_TemplateBase->fetch(  )</td><td title='C:\Program Files\wamp\www\naso1\Smarty\libs\sysplugins\smarty_internal_templatebase.php' bgcolor='#eeeeec'>..\smarty_internal_templatebase.php<b>:</b>394</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.0122</td><td bgcolor='#eeeeec' align='right'>1323304</td><td bgcolor='#eeeeec'>content_550baddcce3db5_27612049(  )</td><td title='C:\Program Files\wamp\www\naso1\Smarty\libs\sysplugins\smarty_internal_templatebase.php' bgcolor='#eeeeec'>..\smarty_internal_templatebase.php<b>:</b>188</td></tr>
</table></font>
  </div>  -->
  </body>
</html>
<?php }} ?>
