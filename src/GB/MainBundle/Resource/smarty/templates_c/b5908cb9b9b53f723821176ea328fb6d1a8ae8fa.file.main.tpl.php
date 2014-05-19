<?php /* Smarty version Smarty-3.1.18, created on 2014-05-19 10:31:52
         compiled from "/home/developer/WorkSpace/guestbook/src/GB/MainBundle/Resource/smarty/templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:167124286253761ae9a65f49-92014327%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5908cb9b9b53f723821176ea328fb6d1a8ae8fa' => 
    array (
      0 => '/home/developer/WorkSpace/guestbook/src/GB/MainBundle/Resource/smarty/templates/main.tpl',
      1 => 1400484681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167124286253761ae9a65f49-92014327',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53761ae9a69e59_81654003',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53761ae9a69e59_81654003')) {function content_53761ae9a69e59_81654003($_smarty_tpl) {?><h1>Guestbook</h1>
<div>
    <input type='button' value="Send Message" onclick="messageManagerPage.messageDialog.openDialog();">
</div>
<div>
    <table class="table table-condensed">
        <th>
            User Name
        </th>
        <th>
            Message
        </th>
    </table>
</div>
<div id="sendMessageContainer" title="Send Message" style="display:none;">Loading ...</div>	
<?php }} ?>
