<?php
/* Smarty version 3.1.33, created on 2024-09-19 19:19:27
  from 'C:\wamp\www\demo-ps\admin632bv9cda\themes\new-theme\template\components\layout\confirmation_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_66ec6b2f518e57_82110297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4ff5216f4bd338be1a99cf66297b4a1123380fb' => 
    array (
      0 => 'C:\\wamp\\www\\demo-ps\\admin632bv9cda\\themes\\new-theme\\template\\components\\layout\\confirmation_messages.tpl',
      1 => 1726683206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66ec6b2f518e57_82110297 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['confirmations']->value) && count($_smarty_tpl->tpl_vars['confirmations']->value) && $_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['confirmations']->value, 'conf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
<?php }
}
}
