{extends file="./layout.tpl"}
{block name=title}NAOBOX - paramètres{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1">
				<a href="#changer-mot-de-passe" alt="Changement du mot de passe" class="adminSettingRender">
					<div class="content-blockTab_e" id="settingPassword">Changement du mot de passe</div>
				</a>
			</div>
			<div class="content-blockTab2">
				<a href="#administrer-seuils" alt="Administrer les seuils" class="adminSettingRender">
					<div class="content-blockTab_d" id="settingLevel">Administrer les seuils</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage" class="adminSettingTraitment">
				{include file="./admin-settings-content.tpl"}
			</section>
		</div>
	</section>
{/block}