<?php /* Smarty version 3.1.27, created on 2015-11-30 17:47:00
         compiled from "C:\wamp\www\NAO-BOX\sources\views\templates\manuals.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5742565c8b94179c58_83811724%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '075d076525fe3f6b22904f6b1f31af85ceff24ca' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\manuals.tpl',
      1 => 1448905618,
      2 => 'file',
    ),
    '411bc5cda1779eea21833ddbda967a3563f8eced' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\layout.tpl',
      1 => 1448831051,
      2 => 'file',
    ),
    '092c62c47c0be53bcf7c672d55beb386be2fe5ba' => 
    array (
      0 => '092c62c47c0be53bcf7c672d55beb386be2fe5ba',
      1 => 0,
      2 => 'string',
    ),
    '4ba989c6d4b2ae1a1db0dde246f2ddb5a8c1ada2' => 
    array (
      0 => '4ba989c6d4b2ae1a1db0dde246f2ddb5a8c1ada2',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '5742565c8b94179c58_83811724',
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565c8b942121f0_90175505',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565c8b942121f0_90175505')) {
function content_565c8b942121f0_90175505 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5742565c8b94179c58_83811724';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title><?php
$_smarty_tpl->properties['nocache_hash'] = '5742565c8b94179c58_83811724';
?>
NAOBOX - guides</title>
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
$_smarty_tpl->properties['nocache_hash'] = '5742565c8b94179c58_83811724';
?>

	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1" style="float: none;">
				<a href="guides" alt="Guides">
					<div class="content-blockTab_e">Guides</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage">
				<div class="table-responsive">
					<table class="table-bordered table-striped">
						<tr>
							<th>Utilisation du Raspberry Pi</th>
						</tr>
						<tr>
							<td>
								<a href="" target="_blank">Manuel d'utilisation</a>
							</td>
						</tr>
					</table>
				</div>
				<div class="table-responsive">
					<table class="table-bordered table-striped">
						<tr>
							<th>Utilisation de l'application</th>
						</tr>
						<tr>
							<td>
								<a href="" target="_blank">Manuel d'utilisation</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="" target="_blank">test</a>
							</td>
						</tr>
					</table>
				</div>
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