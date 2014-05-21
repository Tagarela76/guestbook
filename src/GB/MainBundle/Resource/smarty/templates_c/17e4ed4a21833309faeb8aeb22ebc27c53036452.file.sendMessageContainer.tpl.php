<?php /* Smarty version Smarty-3.1.18, created on 2014-05-21 16:32:40
         compiled from "D:\WorkSpace\xampp\htdocs\guestbook\src\GB\MainBundle\Resource\smarty\templates\sendMessageContainer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2610537a73e4754d45-09519306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17e4ed4a21833309faeb8aeb22ebc27c53036452' => 
    array (
      0 => 'D:\\WorkSpace\\xampp\\htdocs\\guestbook\\src\\GB\\MainBundle\\Resource\\smarty\\templates\\sendMessageContainer.tpl',
      1 => 1400682528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2610537a73e4754d45-09519306',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537a73e47b0629_63659816',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537a73e47b0629_63659816')) {function content_537a73e47b0629_63659816($_smarty_tpl) {?><div>
    <div>
        <input type='text' value="" placeholder="User Name" id='messageDialogUserName'>

        <div id="userNameError" class="validation-error"></div>
    </div>
    <div>
        <input type='text' value="" placeholder="Email" id='messageDialogEmail'>

        <div id="emailError" class="validation-error"></div>
    </div>
    <div>
        <input type='text' value="" placeholder="Homepage" id='messageDialogHomePage'>

        <div id="homePageError" class="validation-error"></div>
    </div>
    <div>
        <input type='text' value="" placeholder="Text" id='messageDialogText'>

        <div id="textError" class="validation-error"></div>
    </div>
</div><?php }} ?>
