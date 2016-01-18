{extends file="./layout.tpl"}
{block name=title}NAOBOX - Erreur 500{/block}
{block name=content}

	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">
			<section id="content-blockTabPage" class="manualTraitment">
				<a href="#"style="margin-left:10px;">
					<img src="{$settings.img}/errors/404.png">	
				</a>
				 <strong>Erreur 500</strong>
				 </br>
		    	La page que vous avez demandé est momentanément indisponible.	
			</section>
		</div>
	</section>
	
{/block}