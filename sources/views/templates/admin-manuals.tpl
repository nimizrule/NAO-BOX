{extends file="./layout.tpl"}
{block name=title}NAOBOX - guides{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1">
				<a href="#utilisation" alt="Guides d'utilisation" class="adminManualRender">
					<div class="content-blockTab_d" id="manualUtilisation">Guides d'utilisation</div>
				</a>
			</div>
			<div class="content-blockTab2" style="float: left; margin-left: 2px;">
				<a href="#administration" alt="Guides d'administration" class="adminManualRender">
					<div class="content-blockTab_e" id="manualAdministration">Guides d'administration</div>
				</a>
			</div>
			<div class="content-blockTab3">
				<a href="#installation" alt="Guides d'installation" class="adminManualRender">
					<div class="content-blockTab_d" id="manualInstallation">Guides d'installation</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage" class="adminManualTraitment">
				{include file="./admin-manuals-content.tpl"}
			</section>
		</div>
	</section>
{/block}