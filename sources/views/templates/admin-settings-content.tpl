{if $content == "password"}
	<section >
		<form>
			<table class="table-responsive" style="border: none;">
				<tr>
					<td><label for="oldPassword">Ancien mot de passe</label></td>
					<td class="tableFormalism-data"><input type="text" id="oldPaswword" name="oldPassword"/></td>
				</tr>
				<tr>
					<td><label for="newPassword">Nouveau mot de passe</label></td>
					<td class="tableFormalism-data"><input type="text" id="newPassword" name="newPassword"/></td>
				</tr>
				<tr>
					<td><label for="password">Répétition du mot de passe</label></td>
					<td class="tableFormalism-data"><input type="text" id="password" name="password"/></td>
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