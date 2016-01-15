{extends file="./layout.tpl"}
{block name=title}NAOBOX - connexion{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div style="width: 50%; max-width: 400px; background-color: #f9f9f9; margin: auto; margin-top: 40px;">
			<form method="post" action="/admin/connexion">
				<p>Pour administrer l'application vous devez vous authentifier</p>
				<label for="login">UTILISATEUR</label>
				<input type="text" name="login" id="login" value="{$login.user}"/></br>
				<label for="pwd">MOT DE PASSE</label>					
				<input type="password" name="password" value="{$login.password}"/></br>
				<button type="submit" name="connexion">ADMINISTRER L'APPLICATION</button></br>
			</form>
		</div>
	</section>
{/block}