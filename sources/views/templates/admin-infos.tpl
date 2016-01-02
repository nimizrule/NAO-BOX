{extends file="./layout.tpl"}
{block name=title}NAOBOX - informations{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1">
				<a href="#nao" alt="Informations de NAO" class="adminInformationRender">
					<div class="content-blockTab_e" id="informationNAO">Informations de NAO</div>
				</a>
			</div>
			<div  class="content-blockTab2">
				<a href="#admin" alt="Informations d'administration" class="adminInformationRender">
					<div class="content-blockTab_d" id="informationAdmin">Informations d'administration</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage" class="adminInformationTraitment">
				{include file="./admin-infos-content.tpl"}
			</section>
		</div>
	</section>
{/block}