{if $content == "list"}
	<section>
		<div class="table-responsive">
			<table class="table-bordered">
				<tr>	
					<th>NOM DE L'ACTION</th>
					<th>FICHIER RATTACHE</th>
					<th colspan="3">ACTIONS</th>
				</tr>
				{if $number > 0}
					{foreach from=$controls item=control}
						<tr>
							<td>{$control.name}</td>
							<td>{$control.file}</td>
							<td class="tableFormalism-action"><img src="{$settings.img}/buttons/list.jpg" class="adminControlRender-descAction" alt="Description"/></td>
							<td class="tableFormalism-action">
								<a href="/admin/controles/modifier/{$control.id}#action" alt="Modifier l'action"><img src="{$settings.img}/buttons/pen.jpg" alt="Modifier"/></a>
							</td>
							<td class="tableFormalism-action">
								<a href="/admin/controles/supprimer/{$control.id}#action" alt="Supprimer l'action"><img src="{$settings.img}/buttons/trash.jpg" class="adminControlRender-delAction" alt="Supprimer"/></a>
							</td>
						</tr>
						<tr style="display: none; height: 49px;">
							<td></td>
							<td colspan="4">{$control.desc}</td>
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
		<form method="post" action="/admin/controles#creer">
			<table class="table-responsive" style="border: none;">
				<tr>
					<td><label for="name">Nom de l'action</label></td>
					<td class="tableFormalism-data"><input type="text" id="name" name="name" value="{$controls.name}"/></td>
				</tr>
				<tr>
					<td><label for="file">Fichier rattaché à l'action</label></td>
					<td class="tableFormalism-data"><input type="file" id="file" name="file" value="{$controls.file}"/></td>
				</tr>
				<tr>
					<td style="vertical-align: top;"><label for="description">Description de l'action</label></td>
					<td class="tableFormalism-data"><textarea id="description" name="desc">{$controls.desc}</textarea></td>
				</tr>
				<tr>
					<td></td>
					<td class="tableFormalism-data"><input type="submit" name="addControl" value="CREER L'ACTION"/></td>
				</tr>
			</table>
		</form>
	</section>
{else if $content == "modify"}
	<section >
		<form method="post" action="/admin/controles/modifier/{$control.id}#action">
			<table class="table-responsive" style="border: none;">
				<tr>
					<td><label for="name">Nom de l'action</label></td>
					<td class="tableFormalism-data"><input type="text" id="name" name="name" value="{$control.name}"/></td>
				</tr>
				<tr>
					<td><label for="file">Fichier rattaché à l'action</label></td>
					<td class="tableFormalism-data">{$control.file}</td>
				</tr>
				<tr>
					<td style="vertical-align: top;"><label for="description">Description de l'action</label></td>
					<td class="tableFormalism-data"><textarea id="description" name="desc">{$control.desc}</textarea></td>
				</tr>
				<tr>
					<td></td>
					<td class="tableFormalism-data"><input type="submit" name="modifyControl" value="MODIFIER L'ACTION"/></td>
				</tr>
			</table>
		</form>
	</section>
{else}
	
{/if}