{extends file="./layout.tpl"}
{block name=title}NAOBOX - menu{/block}
{block name=administration}..{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockControls" class="col-xs-12 col-sm-4">
			<a href="controles#action" alt="Contrôles">
				<img src="{$settings.img}/buttons/control_e.jpg" alt="controls"/>
			</a>
		</div>
		<div id="content-blockSensors" class="col-xs-12 col-sm-4">
			<a href="capteurs#camera-haute" alt="Capteurs">
				<img src="{$settings.img}/buttons/sensor_e.jpg" alt="sensors"/>
			</a>
		</div>
		<div id="content-blockInfos" class="col-xs-12 col-sm-4">
			<a href="informations#nao" alt="Informations">
				<img src="{$settings.img}/buttons/info_e.jpg" alt="infos"/>
			</a>
		</div>
	</section>
	<section id="page-row2" class="row">
		<div id="content-blockManuals" class="col-xs-12 col-sm-4">
			<a href="guides#utilisation" alt="Guides">
				<img src="{$settings.img}/buttons/manual_e.jpg" alt="manuals"/>
			</a>
		</div>
		<div class="col-xs-12 col-sm-4"></div>
		<div id="content-blockAdministrator" class="col-xs-12 col-sm-4">
			<a href="admin/connexion" alt="Connexion">
				<img src="{$settings.img}/buttons/adm_e.jpg" alt="administrator"/>
			</a>
		</div>
	</section>
{/block}