{if $content == "list"}
	<div class="table-responsive">
		<table class="table-bordered">
			{foreach from=$controls item=control}
				<tr>
					<td>{$control.name}</td>
					<td>{$control.file}</td>
					<td class="tableFormalism-action"><img src="{$settings.img}/buttons/list.jpg" class="adminControlRender-descAction" alt="Description"/></td>
					<td class="tableFormalism-action"><img src="{$settings.img}/buttons/pen.jpg" alt="Modifier"/></td>
					<td class="tableFormalism-action"><img src="{$settings.img}/buttons/trash.jpg" alt="Supprimer"/></td>
				</tr>
				<tr style="display: none; height: 49px;">
					<td></td>
					<td colspan="4">{$control.desc}</td>
				</tr>
			{/foreach}
		</table>
	</div>
{else if $content == "add"}
	<section >
		<form>
			<table class="table-responsive" style="border: none;">
				<tr>
					<td><label for="name">Nom de l'action</label></td>
					<td class="tableFormalism-data"><input type="text" id="name" name="name"/></td>
				</tr>
				<tr>
					<td><label for="file">Fichier rattaché à l'action</label></td>
					<td class="tableFormalism-data"><input type="file" id="file" name="file"/></td>
				</tr>
				<tr>
					<td style="vertical-align: top;"><label for="description">Description de l'action</label></td>
					<td class="tableFormalism-data"><textarea id="description" name="description"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td class="tableFormalism-data"><input type="submit" name="addControl" value="CREER L'ACTION"/></td>
				</tr>
			</table>
		</form>
	</section>
{else}
	
{/if}