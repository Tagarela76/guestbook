<?php /* Smarty version Smarty-3.1.18, created on 2014-05-22 23:07:38
         compiled from "D:\WorkSpace\xampp\htdocs\guestbook\src\GB\MainBundle\Resource\smarty\templates\sendMessageContainer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25574537e36fc773599-38778028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17e4ed4a21833309faeb8aeb22ebc27c53036452' => 
    array (
      0 => 'D:\\WorkSpace\\xampp\\htdocs\\guestbook\\src\\GB\\MainBundle\\Resource\\smarty\\templates\\sendMessageContainer.tpl',
      1 => 1400792830,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25574537e36fc773599-38778028',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537e36fc7f50c1_28592749',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537e36fc7f50c1_28592749')) {function content_537e36fc7f50c1_28592749($_smarty_tpl) {?><script src='../src/GB/MainBundle/Resource/js/jquery.MultiFile.js' type="text/javascript" language="javascript"></script>

<div>
    <div class="container">
        <input type='text' value="" placeholder="User Name" id='messageDialogUserName'>

        <div id="userNameError" class="validation-error"></div>
    </div>
    <div class="container">
        <input type='text' value="" placeholder="Email" id='messageDialogEmail'>

        <div id="emailError" class="validation-error"></div>
    </div>
    <div class="container">
        <input type='text' value="" placeholder="Homepage" id='messageDialogHomePage'>

        <div id="homePageError" class="validation-error"></div>
    </div>
    <div class="container">
        <textarea type='text' value="" placeholder="Text" id='messageDialogText' class="message-dialog-text"></textarea>

        <div id="textError" class="validation-error"></div>
    </div>
    <div>
        <form action="#" enctype="multipart/form-data" method="post" id="ololo">
            <label for="file_upload">File:</label>
            <input type="file" name="file_upload" id="file_upload" multiple class="multi">
        </form>
    </div>
</div>
<?php }} ?>
