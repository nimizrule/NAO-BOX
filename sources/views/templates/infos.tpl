{extends file="./layout.tpl"}
{block name=title}NAOBOX - informations{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1" style="float: none;">
				<a href="#nao" alt="Informations de NAO" class="informationRender">
					<div class="content-blockTab_e" id="informationNAO">Informations de NAO</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage" class="informationTraitment">
				{include file="./infos-content.tpl"}
			</section>
		</div>
	</section>
{/block}