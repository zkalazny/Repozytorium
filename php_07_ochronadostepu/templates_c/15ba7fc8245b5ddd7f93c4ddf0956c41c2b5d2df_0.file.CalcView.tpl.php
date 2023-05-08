<?php
/* Smarty version 3.1.30, created on 2023-05-08 16:56:48
  from "C:\xampp\htdocs\php_07_role\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_64590db062a898_92505396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15ba7fc8245b5ddd7f93c4ddf0956c41c2b5d2df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_07_role\\app\\views\\CalcView.tpl',
      1 => 1683556067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_64590db062a898_92505396 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_104911005764590db062a1a3_71887182', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_104911005764590db062a1a3_71887182 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_x">Kwota: </label>
			<input id="id_x" type="text" name="x" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->x;?>
" />
		</div>
        <div class="pure-control-group">
			<label for="id_op">Oprocentowanie(%):  </label>
	<select name="op">
		<option value="5">5%</option>
		<option value="10">10%</option>
		<option value="15">15%</option>
		<?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
		<option value="20">20%</option>
		<?php }?>
	</select>
		</div>
        <div class="pure-control-group">
			<label for="id_y">Ilość lat: </label>
			<input id="id_y" type="text" name="y" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->y;?>
" />
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
<div class="messages inf">
	Wynik: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

</div>
<?php }?>

<?php
}
}
/* {/block 'content'} */
}
