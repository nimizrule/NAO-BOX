<?php /* Smarty version 3.1.27, created on 2015-12-01 14:02:17
         compiled from "C:\wamp\www\NAO-BOX\sources\views\templates\infos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5542565d9a593cae50_13679573%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43ff0f38f60c5a66a0a9f39ec8f13ae6cbae9c63' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\infos.tpl',
      1 => 1448968030,
      2 => 'file',
    ),
    '411bc5cda1779eea21833ddbda967a3563f8eced' => 
    array (
      0 => 'C:\\wamp\\www\\NAO-BOX\\sources\\views\\templates\\layout.tpl',
      1 => 1448968029,
      2 => 'file',
    ),
    '2e330d52d09edc08b31b366f46bd3c8f9dda7444' => 
    array (
      0 => '2e330d52d09edc08b31b366f46bd3c8f9dda7444',
      1 => 0,
      2 => 'string',
    ),
    '7f06b61bcecc8af4ca19c6d0eda238f2f3e843b2' => 
    array (
      0 => '7f06b61bcecc8af4ca19c6d0eda238f2f3e843b2',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '5542565d9a593cae50_13679573',
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565d9a594f7b18_43018764',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565d9a594f7b18_43018764')) {
function content_565d9a594f7b18_43018764 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5542565d9a593cae50_13679573';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title><?php
$_smarty_tpl->properties['nocache_hash'] = '5542565d9a593cae50_13679573';
?>
NAOBOX - informations</title>
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
$_smarty_tpl->properties['nocache_hash'] = '5542565d9a593cae50_13679573';
?>

	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1" style="float: none;">
				<a href="informations" alt="Informations de NAO">
					<div class="content-blockTab_e">Informations de NAO</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage">
				<div class="table-responsive">
					<table class="table-bordered table-striped">
						<tr>
							<th>Capteur</th>
							<th>Donnée</th>
						</tr>
						<tr>
							<td>Etat Capteur tactile tête</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat Caméra numéro 1</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat Caméra numéro 2</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat Emmeteur/recepteur infrarouge (led) pour les yeux</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat bouton ventre</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat sonar 1</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat sonar 2</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat sonar 3</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat sonar 4</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat main gauche</td>
							<td></td>
						</tr>	 
						<tr>
							<td>Etat main droite</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat bumper pied gauche</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat bumper pied droit</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat pied gauche</td>
							<td></td>
						</tr>
						<tr>
							<td>Etat pied droit</td>
							<td></td>
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