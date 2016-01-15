{extends file="./layout.tpl"}
{block name=title}NAOBOX - guides{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1" style="float: none;">
				<a href="#utilisation" alt="Guides d'utilisation" class="manualRender">
					<div class="content-blockTab_e" id="manualUtilisation">Guides d'utilisation</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage" class="manualTraitment">
				{include file="./manuals-content.tpl"}
			</section>
		</div>
	</section>
{/block}