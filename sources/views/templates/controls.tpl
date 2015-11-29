{extends file="./layout.tpl"}
{block name=title}NAOBOX - contrôles{/block}
{block name=content}
	<section id="page-row1" class="row">
		<div id="content-blockTabControl" class="col-xs-12">			
			<div class="content-blockTab1">
				<a href="controles1" alt="Contrôle par actions">
					<div class="content-blockTab_e">Contrôle par actions</div>
				</a>
			</div>
			<div  class="content-blockTab2">
				<a href="controles2" alt="Contrôle pas à pas">
					<div class="content-blockTab_d">Contrôle pas à pas</div>
				</a>
			</div>
			<hr />
			<section id="content-blockTabPage">
				{foreach from=$controls item=control}
					<div id="content-blockControlActions" class="col-xs-12 col-sm-3">
						<div>
							<a href="{$control.link}" alt="{$control.desc}">
								<div>{$control.name}</div>
							</a>
						</div>
					</div>
				{/foreach}
			</section>
		</div>
	</section>
{/block}