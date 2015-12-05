{extends file="./layout.tpl"}
{block name=title}NAOBOX - menu{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockControl" class="col-xs-12 col-sm-4">
			<a href="controles" alt="Contrôles">
				<img src="{$settings.img}/buttons/control_e.jpg"/>
			</a>
		</div>
		<div id="content-blockSensors" class="col-xs-12 col-sm-4">
			<a href="capteurs" alt="Capteurs">
				<img src="{$settings.img}/buttons/sensor_e.jpg"/>
			</a>
		</div>
		<div id="content-blockInfos" class="col-xs-12 col-sm-4">
			<a href="informations" alt="Informations">
				<img src="{$settings.img}/buttons/info_e.jpg"/>
			</a>
		</div>
	</section>
	<section id="page-row2" class="row">
		<div id="content-blockManuals" class="col-xs-12 col-sm-4">
			<a href="guides" alt="Guides">
				<img src="{$settings.img}/buttons/manual_e.jpg"/>
			</a>
		</div>
		<div class="col-xs-12 col-sm-4"></div>
		<div id="content-blockAdministrator" class="col-xs-12 col-sm-4">
			<a href="index.php?page=ViewAdministration" alt="Administration">
				<img src="{$settings.img}/buttons/adm_e.jpg"/>
			</a>
		</div>
	</section>
{/block}