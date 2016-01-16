{extends file="./layout.tpl"}
{block name=title}NAOBOX - menu{/block}
{block name=administration}- ADMINISTRATION{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockControls" class="col-xs-12 col-sm-4">
			<a href="controles#liste" alt="Contrôles">
				<img src="{$settings.img}/buttons/actions.jpg"/>
			</a>
		</div>
		<div id="content-blockPeripherals" class="col-xs-12 col-sm-4">
			<a href="peripheriques#liste" alt="Péripheriques">
				<img src="{$settings.img}/buttons/device.jpg"/>
			</a>
		</div>
		<div id="content-blockInfos" class="col-xs-12 col-sm-4">
			<a href="informations#nao" alt="Informations">
				<img src="{$settings.img}/buttons/info.jpg"/>
			</a>
		</div>
	</section>
	<section id="page-row2" class="row">
		<div id="content-blockManuals" class="col-xs-12 col-sm-4">
			<a href="guides#administration" alt="Guides">
				<img src="{$settings.img}/buttons/manual.jpg"/>
			</a>
		</div>
		<div class="col-xs-12 col-sm-4"></div>
		<div id="content-blockAdministrator" class="col-xs-12 col-sm-4">
			<a href="parametres#changer-mot-de-passe" alt="Paramètres">
				<img src="{$settings.img}/buttons/adm.jpg"/>
			</a>
		</div>
	</section>
{/block}