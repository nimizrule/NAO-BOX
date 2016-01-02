{if $content == "list"}
	<div class="table-responsive">
		<table class="table-bordered">
			{foreach from=$controls item=control}
				<tr>
					<td>{$control.name}</td>
					<td>{$control.mac}</td>
					<td>{$control.ip}</td>
					<td class="tableFormalism-action"><img src="{$settings.img}/buttons/pen.jpg" alt="Modifier"/></td>
					<td class="tableFormalism-action"><img src="{$settings.img}/buttons/trash.jpg" alt="Supprimer"/></td>
				</tr>
			{/foreach}
		</table>
	</div>
{else if $content == "add"}
	<section >
		<form>
			<table class="table-responsive" style="border: none;">
				<tr>
					<td><label for="name">Nom du périphérique</label></td>
					<td class="tableFormalism-data"><input type="text" id="name" name="name"/></td>
				</tr>
				<tr>
					<td><label for="mac">Adresse MAC</label></td>
					<td class="tableFormalism-data"><input type="text" id="mac" name="mac"/></td>
				</tr>
				<tr>
					<td><label for="ip">Adresse IP</label></td>
					<td class="tableFormalism-data"><input type="text" id="ip" name="ip"/></td>
				</tr>
				<tr>
					<td></td>
					<td class="tableFormalism-data"><input type="submit" name="addPeripheral" value="AJOUTER LE PERIPHERIQUE"/></td>
				</tr>
			</table>
		</form>
	</section>
{else}
	
{/if}