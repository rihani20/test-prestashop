<?php
/* Smarty version 3.1.33, created on 2024-09-26 11:38:49
  from 'C:\wamp\www\demo-ps\themes\classic\templates\catalog\listing\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_66f539b9327446_64238171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e97173c989c0fcc07116f87c6a72101e06db921a' => 
    array (
      0 => 'C:\\wamp\\www\\demo-ps\\themes\\classic\\templates\\catalog\\listing\\category.tpl',
      1 => 1727346519,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:catalog/_partials/category-header.tpl' => 1,
  ),
),false)) {
function content_66f539b9327446_64238171 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_46101163766f539b930e7c1_73645828', 'product_list_header');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'catalog/listing/product-list.tpl');
}
/* {block 'product_list_header'} */
class Block_46101163766f539b930e7c1_73645828 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'product_list_header' => 
  array (
    0 => 'Block_46101163766f539b930e7c1_73645828',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender('file:catalog/_partials/category-header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('listing'=>$_smarty_tpl->tpl_vars['listing']->value,'category'=>$_smarty_tpl->tpl_vars['category']->value), 0, false);
?>

<?php if (isset($_smarty_tpl->tpl_vars['productsByColor']->value) && count($_smarty_tpl->tpl_vars['productsByColor']->value) > 0) {?>
    <div class="product-grid">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productsByColor']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
            <div class="product-item">
                <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_name'], ENT_QUOTES, 'UTF-8');?>
 <br> <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');?>
</span></p>
                <div id="color_product" style="height: 25px; width: 25px; background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['color_value'], ENT_QUOTES, 'UTF-8');?>
"></div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
<?php } else { ?>
    <p>No products found in this category.</p>
<?php }?>


<?php
}
}
/* {/block 'product_list_header'} */
}
