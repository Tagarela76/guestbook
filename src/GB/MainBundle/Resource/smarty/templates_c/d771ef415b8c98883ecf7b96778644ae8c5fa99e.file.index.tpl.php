<?php /* Smarty version Smarty-3.1.18, created on 2014-05-19 23:12:42
         compiled from "D:\WorkSpace\xampp\htdocs\guestbook\src\GB\MainBundle\Resource\smarty\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19821537a73ca9a04b1-67717818%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd771ef415b8c98883ecf7b96778644ae8c5fa99e' => 
    array (
      0 => 'D:\\WorkSpace\\xampp\\htdocs\\guestbook\\src\\GB\\MainBundle\\Resource\\smarty\\templates\\index.tpl',
      1 => 1400529348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19821537a73ca9a04b1-67717818',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537a73caac6064_65606948',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537a73caac6064_65606948')) {function content_537a73caac6064_65606948($_smarty_tpl) {?><html>
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
