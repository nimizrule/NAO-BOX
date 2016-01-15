{extends file="./layout.tpl"}
{block name=title}NAOBOX - périphériques{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1">
				<a href="#liste" alt="Liste des périphériques" class="adminPeripheralRender">
					<div class="content-blockTab_e" id="peripheralList">Liste des périphériques</div>
				</a>
			</div>
			<div  class="content-blockTab2">
				<a href="#creer" alt="Ajouter un périphérique" class="adminPeripheralRender">
					<div class="content-blockTab_d" id="peripheralAdd">Ajouter un périphérique</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage" class="adminPeripheralTraitment">
				{include file="./admin-peripherals-content.tpl"}
			</section>
		</div>
	</section>
{/block}