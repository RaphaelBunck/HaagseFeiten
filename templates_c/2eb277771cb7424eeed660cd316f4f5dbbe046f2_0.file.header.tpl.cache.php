<?php
/* Smarty version 3.1.30, created on 2016-10-12 17:31:23
  from "/home/quinten/Desktop/hf/templates/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57fe574ba15778_50299945',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2eb277771cb7424eeed660cd316f4f5dbbe046f2' => 
    array (
      0 => '/home/quinten/Desktop/hf/templates/header.tpl',
      1 => 1476286078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57fe574ba15778_50299945 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '100137406457fe574ba01525_74560252';
?>
<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</TITLE>
<link rel="stylesheet" type="text/css" href='css/index.css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"><?php echo '</script'; ?>
>
</head>
</HEAD>
<BODY bgcolor="#ffffff">
  <nav class='navbar navbar-default'>
        <div class='container-fluid'>
          <div class='navbar-header'>
            <a class='navbar-brand' href='#'>Haagse Feiten</a>
          </div>
          <ul class='nav navbar-nav'>
            <li class='active'><a href='#'>Home</a></li>
          <li><a href='#'>Page 1</a></li>
          <li><a href='#'>Contact</a></li>
          <li><a href='#'>Page 3</a></li>
        </ul>
      </div>
    </nav>
<?php }
}
