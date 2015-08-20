<?php /*%%SmartyHeaderCode:%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '870dedc1b27186895fb6c1cde6ba90c95efdc36a' => 
    array (
      0 => '.\\templates\\index_view.php',
      1 => 1292235612,
      2 => 'php',
    ),
  ),
  'nocache_hash' => '',
  'has_nocache_code' => false,
  'cache_lifetime' => 100,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!$no_render) {?>PHP file test
$foo is <?php echo '<?'; ?>=$foo<?php echo '?>'; ?>
<br> Test functions
<?php echo '<?'; ?> echo trim($foo,"'");<?php echo '?>'; ?>
<br>Test objects
<?php echo '<?'; ?>=$person->setName('Paul')->setAge(39)->introduce()<?php echo '?>'; ?>
<br>Test Arrays
<?php echo '<?'; ?>=$array['a']['aa']<?php echo '?>'; ?> <?php echo '<?'; ?>=$array['b']<?php echo '?>'; ?>
<br>function time 
<?php echo '<?'; ?> echo time();<?php echo '?>'; ?>
<br>nocache function time 
<?php echo '<?'; ?> echo '<?php echo '<?'; ?> echo time();<?php echo '?>'; ?>';<?php echo '?>'; ?>
<br>DONE
<?php } ?>