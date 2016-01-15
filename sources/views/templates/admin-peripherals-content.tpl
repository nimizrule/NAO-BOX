{if $content == "list"}
	<section>
		<div class="table-responsive">
			<table class="table-bordered">
				<tr>	
					<th>NOM DU PERIPHERIQUE</th>
					<th>ADRESSE MAC</th>
					<th>ADRESSE IP</th>
					<th colspan="3">ACTIONS</th>
				</tr>
				{if $number > 0}
					{foreach from=$peripherals item=peripheral}
						<tr>
							<td>{$peripheral.name}</td>
							<td>{$peripheral.mac}</td>
							<td>{$peripheral.ip}</td>
							<td class="tableFormalism-action"><img src="{$settings.img}/buttons/list.jpg" class="adminPeripheralRender-descAction" alt="Description"/></td>
							<td class="tableFormalism-action">
								<a href="/admin/peripheriques/modifier/{$peripheral.id}#action" alt="Modifier le périphérique"><img src="{$settings.img}/buttons/pen.jpg" alt="Modifier"/></a>
							</td>
							<td class="tableFormalism-action">
								<a href="/admin/peripheriques/supprimer/{$peripheral.id}#action" alt="Supprimer le périphérique"><img src="{$settings.img}/buttons/trash.jpg" class="adminPeripheralRender-delAction" alt="Supprimer"/></a>
							</td>
						</tr>
						<tr style="display: none; height: 49px;">
							<td></td>
							<td colspan="4">{$peripheral.desc}</td>
						</tr>
					{/foreach}
				{else}
					<tr>
						<td colspan="5" style="text-align: center;">Aucune donnée à afficher</td>
					</tr>
				{/if}
			</table>
		</div>
	</section>
{else if $content == "add"}
	<section >
		<form method="post" action="/admin/peripheriques#creer">
			<table class="table-responsive" style="border: none;">
				<tr>
					<td><label for="name">Nom du périphérique</label></td>
					<td class="tableFormalism-data"><input type="text" id="name" name="name" value="{$peripheral.name}"/></td>
				</tr>
				<tr>
					<td><label for="mac">Adresse MAC</label></td>
					<td class="tableFormalism-data"><input type="text" id="mac" name="mac" value="{$peripheral.mac}"/></td>
				</tr>
				<tr>
					<td><label for="ip">Adresse IP</label></td>
					<td class="tableFormalism-data"><input type="text" id="ip" name="ip" value="{$peripheral.ip}"/></td>
				</tr>
				<tr>
					<td style="vertical-align: top;"><label for="description">Description du périphérique</label></td>
					<td class="tableFormalism-data"><textarea id="description" name="desc">{$peripheral.desc}</textarea></td>
				</tr>
				<tr>
					<td></td>
					<td class="tableFormalism-data"><input type="submit" name="addPeripheral" value="AJOUTER LE PERIPHERIQUE"/></td>
				</tr>
			</table>
		</form>
	</section>
{else if $content == "modify"}
	<section >
		<form method="post" action="/admin/peripheriques/modifier/{$peripheral.id}#action">
			<table class="table-responsive" style="border: none;">
				<tr>
					<td><label for="name">Nom du périphérique</label></td>
					<td class="tableFormalism-data"><input type="text" id="name" name="name" value="{$peripheral.name}"/></td>
				</tr>
				<tr>
					<td><label for="mac">Adresse MAC</label></td>
					<td class="tableFormalism-data"><input type="text" id="mac" name="mac" value="{$peripheral.mac}"/></td>
				</tr>
				<tr>
					<td><label for="ip">Adresse IP</label></td>
					<td class="tableFormalism-data"><input type="text" id="ip" name="ip" value="{$peripheral.ip}"/></td>
				</tr>
				<tr>
					<td style="vertical-align: top;"><label for="description">Description du périphérique</label></td>
					<td class="tableFormalism-data"><textarea id="description" name="desc">{$peripheral.desc}</textarea></td>
				</tr>
				<tr>
					<td></td>
					<td class="tableFormalism-data"><input type="submit" name="modifyPeripheral" value="MODIFIER LE PERIPHERIQUE"/></td>
				</tr>
			</table>
		</form>
	</section>
{else}
	
{/if}