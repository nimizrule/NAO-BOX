{extends file="./layout.tpl"}
{block name=title}NAOBOX - capteurs{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1">
				<a href="#camera-haute" alt="Caméra haute" class="sensorRender">
					<div class="content-blockTab_e" id="sensorCameraT">Caméra haute</div>
				</a>
			</div>
			<div class="content-blockTab2">
				<a href="#camera-basse" alt="Caméra basse" class="sensorRender">
					<div class="content-blockTab_d" id="sensorCameraB">Caméra basse</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage" class="sensorTraitment">
				{include file="./sensors-content.tpl"}
			</section>
		</div>
	</section>
{/block}