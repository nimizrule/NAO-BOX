{extends file="./layout.tpl"}
{block name=title}NAOBOX - contrôles{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1">
				<a href="#action" alt="Contrôle par actions" class="controlRender">
					<div class="content-blockTab_e" id="controlFull">Contrôle par actions</div>
				</a>
			</div>
			<div  class="content-blockTab2">
				<a href="#pas" alt="Contrôle pas à pas" class="controlRender">
					<div class="content-blockTab_d" id="controlStep">Contrôle pas à pas</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage" class="controlTraitment">
				{include file="./controls-content.tpl"}
			</section>
		</div>
	</section>
{/block}