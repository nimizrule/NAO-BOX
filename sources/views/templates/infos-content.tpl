{if $content == "nao"}
	<section>
		<div class="table-responsive">
			<table class="table-bordered">
				<tr>	
					<th>NOM DU  CAPTEUR</th>
					<th>VALEUR</th>
					<th>SEUIL D'ALERTE</th>
				</tr>
				{if $number > 0}
				{else}
					<tr>
						<td colspan="3" style="text-align: center;">Aucune donnée à afficher</td>
					</tr>
				{/if}
			</table>
		</div>
	</section>
{else}
	
{/if}

