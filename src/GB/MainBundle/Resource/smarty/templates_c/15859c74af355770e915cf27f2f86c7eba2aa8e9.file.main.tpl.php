<?php /* Smarty version Smarty-3.1.18, created on 2014-05-21 19:38:49
         compiled from "D:\WorkSpace\xampp\htdocs\guestbook\src\GB\MainBundle\Resource\smarty\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23970537a73cab7d211-43084512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15859c74af355770e915cf27f2f86c7eba2aa8e9' => 
    array (
      0 => 'D:\\WorkSpace\\xampp\\htdocs\\guestbook\\src\\GB\\MainBundle\\Resource\\smarty\\templates\\main.tpl',
      1 => 1400693926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23970537a73cab7d211-43084512',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537a73cab84c21_45607039',
  'variables' => 
  array (
    'currentPage' => 0,
    'order' => 0,
    'messageArray' => 0,
    'message' => 0,
    'pages' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537a73cab84c21_45607039')) {function content_537a73cab84c21_45607039($_smarty_tpl) {?><h1>Guestbook</h1>
<div>
    <input type='button' value="Send Message" onclick="messageManagerPage.messageDialog.openDialog();">
</div>
<div>
    <table class="table table-condensed" id="messageTable">
        <tr id="messageTableHead">
            <th>
                <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
&sort=id&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
">Id</a>
            </th>
            <th>
                <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
&sort=userName&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
">User Name</a>
            </th>
            <th>
                <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
&sort=email&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
">User Email</a>
            </th>
            <th>
                Home Page
            </th>
            <th>
                Message
            </th>
            <th>
                <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
&sort=creationDate&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
">Creation Date</a>
            </th>
        <tr>
        <?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messageArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
            <tr>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['message']->value->getId();?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['message']->value->getUserName();?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['message']->value->getEmail();?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['message']->value->getHomePage();?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['message']->value->getText();?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['message']->value->getFormatCreationDate();?>

                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div id="sendMessageContainer" title="Send Message" style="display:none;">Loading ...</div>


<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value==false) {?>
        <a href="#">current</a>
    <?php } else { ?>
        <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>
    <?php }?>
<?php } ?><?php }} ?>
