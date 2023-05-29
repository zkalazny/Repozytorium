<?php
/* Smarty version 4.3.1, created on 2023-05-23 02:02:37
  from 'C:\xampp\htdocs\php_09\app\views\PersonListFullPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_646c029db91280_88827636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8b7c9a31780a3b7f976c555969bbfdd3754171a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_09\\app\\views\\PersonListFullPage.tpl',
      1 => 1684799317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:PersonListTable.tpl' => 1,
  ),
),false)) {
function content_646c029db91280_88827636 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2091803844646c029db27289_77044847', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_328647190646c029db2bb68_39847293', 'bottom');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_2091803844646c029db27289_77044847 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_2091803844646c029db27289_77044847',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personListPart','table'); return false;">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwisko" name="sf_surname" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->surname;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_328647190646c029db2bb68_39847293 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_328647190646c029db2bb68_39847293',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personNew">+ Nowa osoba</a>
</div>	

<div id="table">
<?php $_smarty_tpl->_subTemplateRender("file:PersonListTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php
}
}
/* {/block 'bottom'} */
}
