<?php /* Smarty version Smarty-3.1.18, created on 2014-05-19 09:49:16
         compiled from "/home/developer/WorkSpace/guestbook/src/GB/MainBundle/Resource/smarty/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89335193353760d6c6db0b7-98171793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa28690c6d31f03aa52d5685f8e80e2b7aa5d17c' => 
    array (
      0 => '/home/developer/WorkSpace/guestbook/src/GB/MainBundle/Resource/smarty/templates/index.tpl',
      1 => 1400482149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89335193353760d6c6db0b7-98171793',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53760d6c98ea11_94866541',
  'variables' => 
  array (
    'title' => 0,
    'jsSources' => 0,
    'jsSource' => 0,
    'cssSources' => 0,
    'cssSource' => 0,
    'tpl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53760d6c98ea11_94866541')) {function content_53760d6c98ea11_94866541($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <?php  $_smarty_tpl->tpl_vars['jsSource'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jsSource']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jsSources']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jsSource']->key => $_smarty_tpl->tpl_vars['jsSource']->value) {
$_smarty_tpl->tpl_vars['jsSource']->_loop = true;
?>
            <script type="text/javascript" src="../src/GB/MainBundle/Resource/js/<?php echo $_smarty_tpl->tpl_vars['jsSource']->value;?>
"></script>
        <?php } ?>

        <?php  $_smarty_tpl->tpl_vars['cssSource'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cssSource']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cssSources']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cssSource']->key => $_smarty_tpl->tpl_vars['cssSource']->value) {
$_smarty_tpl->tpl_vars['cssSource']->_loop = true;
?>
            <link href="../src/GB/MainBundle/Resource/css/<?php echo $_smarty_tpl->tpl_vars['cssSource']->value;?>
" rel="stylesheet" type="text/css"/>
        <?php } ?>
    </head>
    <body>
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['tpl']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </body>
</html>
<?php }} ?>
