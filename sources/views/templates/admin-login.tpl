{extends file="./layout.tpl"}
{block name=title}NAOBOX - connexion{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div style="width: 50%; max-width: 400px; background-color: #f9f9f9; margin: auto; margin-top: 40px;">
			<a href="#"style="margin-left:10px;">
					<img src="{$settings.img}/textures/btn_administration_enb.jpg">	
			</a>
			<form method="post" action="/admin/connexion">
				<strong>Espace administration</strong>
				<p>Vous devez vous authentifier poour administrer l'application</p>
				<label for="login" style="margin-left:-150px;">Utilisateur :</label>
				<input type="text" name="login" id="login" value="{$login.user}"/></br>
				<label for="pwd" style="margin-left:-125px;">Mot de passe : </label>					
				<input type="password" name="password" value="{$login.password}"/></br>
				<button type="submit" name="connexion">ADMINISTRER L'APPLICATION</button></br>
			</form>
		</div>
	</section>
{/block}