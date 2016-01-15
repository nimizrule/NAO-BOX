{extends file="./layout.tpl"}
{block name=title}NAOBOX - contrôles{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1">
				<a href="#liste" alt="Liste des actions" class="adminControlRender">
					<div class="content-blockTab_e" id="controlList">Liste des actions</div>
				</a>
			</div>
			<div  class="content-blockTab2">
				<a href="#creer" alt="Créer une action" class="adminControlRender">
					<div class="content-blockTab_d" id="controlAdd">Créer une action</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage" class="adminControlTraitment">
				{include file="./admin-controls-content.tpl"}
			</section>
		</div>
	</section>
{/block}