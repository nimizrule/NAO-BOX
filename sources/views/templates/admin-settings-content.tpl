{if $content == "password"}
	<section >
		<form method="post" action="/admin/parametres#changer-mot-de-passe">
			<table class="table-responsive" style="border: none;">
				<tr>
					<td colspan="2">Après avoir cliqué sur le bouton "CHANGER LE MOT DE PASSE", vous serez déconnecté de la partie administration de l'application</td>
				</tr>
				<tr>
					<td><label for="oldPassword">Ancien mot de passe</label></td>
					<td class="tableFormalism-data"><input type="password" id="oldPassword" name="oldPassword" value="{$pwd.old}"/></td>
				</tr>
				<tr>
					<td><label for="newPassword">Nouveau mot de passe</label></td>
					<td class="tableFormalism-data"><input type="password" id="newPassword" name="newPassword" value="{$pwd.new}"/></td>
				</tr>
				<tr>
					<td><label for="password">Répétition du mot de passe</label></td>
					<td class="tableFormalism-data"><input type="password" id="password" name="password" value="{$pwd.rep}"/></td>
				</tr>
				<tr>
					<td></td>
					<td class="tableFormalism-data"><input type="submit" name="changePassword" value="CHANGER LE MOT DE PASSE"/></td>
				</tr>
			</table>
		</form>
	</section>
{else if $content == "level"}

{else}
	
{/if}