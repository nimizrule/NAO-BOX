<?php /* Smarty version 3.1.27, created on 2015-12-01 12:09:32
         compiled from "C:\wamp\www\NAO-BOX\sources\views\templates\menu.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:30246565d7fecee4ca1_91030512%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bc96d6f2d18765289feb4162bcd31d0e7b9ff96' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\menu.tpl',
      1 => 1448968029,
      2 => 'file',
    ),
    '411bc5cda1779eea21833ddbda967a3563f8eced' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\layout.tpl',
      1 => 1448968029,
      2 => 'file',
    ),
    '7e087158ec24ee1f7617101977b586f5a656ab0f' => 
    array (
      0 => '7e087158ec24ee1f7617101977b586f5a656ab0f',
      1 => 0,
      2 => 'string',
    ),
    '640c9bffb7be887f05d341a1a3dd010c2ef00503' => 
    array (
      0 => '640c9bffb7be887f05d341a1a3dd010c2ef00503',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '30246565d7fecee4ca1_91030512',
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565d7fed309af2_14920582',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565d7fed309af2_14920582')) {
function content_565d7fed309af2_14920582 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '30246565d7fecee4ca1_91030512';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title><?php
$_smarty_tpl->properties['nocache_hash'] = '30246565d7fecee4ca1_91030512';
?>
NAOBOX - menu</title>
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
$_smarty_tpl->properties['nocache_hash'] = '30246565d7fecee4ca1_91030512';
?>

	<section id="page-row1" class="row">
		<div id="content-blockControl" class="col-xs-12 col-sm-4">
			<a href="controles" alt="Contrôles">
				<img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['img'];?>
/buttons/control_e.jpg"/>
			</a>
		</div>
		<div id="content-blockSensors" class="col-xs-12 col-sm-4">
			<a href="capteurs" alt="Capteurs">
				<img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['img'];?>
/buttons/sensor_e.jpg"/>
			</a>
		</div>
		<div id="content-blockInfos" class="col-xs-12 col-sm-4">
			<a href="informations" alt="Informations">
				<img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['img'];?>
/buttons/info_e.jpg"/>
			</a>
		</div>
	</section>
	<section id="page-row2" class="row">
		<div id="content-blockManuals" class="col-xs-12 col-sm-4">
			<a href="guides" alt="Guides">
				<img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['img'];?>
/buttons/manual_e.jpg"/>
			</a>
		</div>
		<div class="col-xs-12 col-sm-4"></div>
		<div id="content-blockAdministrator" class="col-xs-12 col-sm-4">
			<a href="index.php?page=ViewAdministration" alt="Administration">
				<img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['img'];?>
/buttons/adm_e.jpg"/>
			</a>
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