<?php /* Smarty version 3.1.27, created on 2015-12-01 12:09:33
         compiled from "C:\wamp\www\NAO-BOX\sources\views\templates\header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6333565d7fed37ee17_62772179%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d30f30fef0f0b543d0ff7a222d26b6b859d36fc' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\header.tpl',
      1 => 1448968030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6333565d7fed37ee17_62772179',
  'variables' => 
  array (
    'settings' => 0,
    'nao_battery' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565d7fed3c5320_51185483',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565d7fed3c5320_51185483')) {
function content_565d7fed3c5320_51185483 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '6333565d7fed37ee17_62772179';
?>
<header class="row">
	<section id="header-title" class="col-xs-12 col-sm-6">
		<span>NAO BOX - PILOTAGE DU ROBOT NAO</span>
	</section>
	<section id="header-controls" class="col-xs-12 col-sm-6">	
			<img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['img'];?>
/header/battery.png" class="battery-item">
			<span class="battery"><?php echo $_smarty_tpl->tpl_vars['nao_battery']->value;?>
%</span>
			<a href="#">
				<img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['img'];?>
/header/previous.png" style="width:60px;height:20px;">	
			</a>
			<a href="#">
				<img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['img'];?>
/header/stop.png" style="width:15px;height:15px;">			
			</a>							
			<a href="menu">
				<img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['img'];?>
/header/home.png" style="width:30px;height:35px;">
			</a>
	</section>
</header><?php }
}
?>