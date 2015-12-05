<?php /* Smarty version 3.1.27, created on 2015-12-01 14:02:09
         compiled from "C:\wamp\www\NAO-BOX\sources\views\templates\controls.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:24828565d9a5174b980_38982428%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c676d0e7c8f2efbfb40b0a1c996339a8b0f2bb24' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\controls.tpl',
      1 => 1448968030,
      2 => 'file',
    ),
    '411bc5cda1779eea21833ddbda967a3563f8eced' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\layout.tpl',
      1 => 1448968029,
      2 => 'file',
    ),
    '0a8d6aea88db014fc8cd8b01bbb40670da883f22' => 
    array (
      0 => '0a8d6aea88db014fc8cd8b01bbb40670da883f22',
      1 => 0,
      2 => 'string',
    ),
    '214f7f9fd555287c48be676358523cf71e28a558' => 
    array (
      0 => '214f7f9fd555287c48be676358523cf71e28a558',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '24828565d9a5174b980_38982428',
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565d9a51933e75_77799729',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565d9a51933e75_77799729')) {
function content_565d9a51933e75_77799729 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '24828565d9a5174b980_38982428';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title><?php
$_smarty_tpl->properties['nocache_hash'] = '24828565d9a5174b980_38982428';
?>
NAOBOX - contrôles</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['bootstrap'];?>
" >
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['settings']->value['css'];?>
" media="screen">		
	</head>
	<body>	
		<section class="container">
			<section class="header-container">
				<?php echo $_smarty_tpl->getSubTemplate ("./header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			</section>
			<section class="page-container">
				<?php
$_smarty_tpl->properties['nocache_hash'] = '24828565d9a5174b980_38982428';
?>

	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1">
				<a href="controles1" alt="Contrôle par actions">
					<div class="content-blockTab_e">Contrôle par actions</div>
				</a>
			</div>
			<div  class="content-blockTab2">
				<a href="controles2" alt="Contrôle pas à pas">
					<div class="content-blockTab_d">Contrôle pas à pas</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage">
				<?php
$_from = $_smarty_tpl->tpl_vars['controls']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['control'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['control']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['control']->value) {
$_smarty_tpl->tpl_vars['control']->_loop = true;
$foreach_control_Sav = $_smarty_tpl->tpl_vars['control'];
?>
					<div id="content-blockControlActions" class="col-xs-12 col-sm-3">
						<div>
							<a href="<?php echo $_smarty_tpl->tpl_vars['control']->value['link'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['control']->value['desc'];?>
">
								<div><?php echo $_smarty_tpl->tpl_vars['control']->value['name'];?>
</div>
							</a>
						</div>
					</div>
				<?php
$_smarty_tpl->tpl_vars['control'] = $foreach_control_Sav;
}
?>
			</section>
		</div>
	</section>

			</section>
		</section>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['jquery'];?>
"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['functions'];?>
"><?php echo '</script'; ?>
>		
	</body>
</html><?php }
}
?>