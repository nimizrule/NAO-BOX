{extends file="./layout.tpl"}
{block name=title}NAOBOX - menu{/block}
{block name=administration}- ADMINISTRATION{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockControls" class="col-xs-12 col-sm-4">
			<a href="controles" alt="Contrôles">
				<img src="{$settings.img}/buttons/action_e.jpg" alt="controls"/>
			</a>
		</div>
		<div id="content-blockPeripherals" class="col-xs-12 col-sm-4">
			<a href="peripheriques" alt="Péripheriques">
				<img src="{$settings.img}/buttons/device_e.jpg" alt="devices"/>
			</a>
		</div>
		<div id="content-blockInfos" class="col-xs-12 col-sm-4">
			<a href="informations" alt="Informations">
				<img src="{$settings.img}/buttons/info_e.jpg" alt="infos"/>
			</a>
		</div>
	</section>
	<section id="page-row2" class="row">
		<div id="content-blockManuals" class="col-xs-12 col-sm-4">
			<a href="guides" alt="Guides">
				<img src="{$settings.img}/buttons/manual_e.jpg" alt="manuals"/>
			</a>
		</div>
		<div class="col-xs-12 col-sm-4"></div>
		<div id="content-blockAdministrator" class="col-xs-12 col-sm-4">
			<a href="parametres" alt="Paramètres">
				<img src="{$settings.img}/buttons/adm_e.jpg" alt="administrator"/>
			</a>
		</div>
	</section>
{/block}