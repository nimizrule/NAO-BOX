<?php /* Smarty version 3.1.27, created on 2015-11-30 16:43:55
         compiled from "C:\wamp\www\NAO-BOX\sources\views\templates\sensors.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14224565c7ccb19b8e2_11959542%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a73144c015dfcc85d8efde741170afc243981554' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\sensors.tpl',
      1 => 1448832041,
      2 => 'file',
    ),
    '411bc5cda1779eea21833ddbda967a3563f8eced' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\layout.tpl',
      1 => 1448831051,
      2 => 'file',
    ),
    '22efda38b2b8b5f48230a412010ac198215265fa' => 
    array (
      0 => '22efda38b2b8b5f48230a412010ac198215265fa',
      1 => 0,
      2 => 'string',
    ),
    'a9e4b69372fae687892f988a302b6ff72570dcc2' => 
    array (
      0 => 'a9e4b69372fae687892f988a302b6ff72570dcc2',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '14224565c7ccb19b8e2_11959542',
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565c7ccb230005_43979395',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565c7ccb230005_43979395')) {
function content_565c7ccb230005_43979395 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14224565c7ccb19b8e2_11959542';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title><?php
$_smarty_tpl->properties['nocache_hash'] = '14224565c7ccb19b8e2_11959542';
?>
NAOBOX - capteurs</title>
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
$_smarty_tpl->properties['nocache_hash'] = '14224565c7ccb19b8e2_11959542';
?>

	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1" style="float: none;">
				<a href="capteurs" alt="Caméra">
					<div class="content-blockTab_e">Caméra</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage"></section>
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