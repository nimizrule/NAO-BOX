{if $content == "full"}
	{foreach from=$controls item=control}
		<div id="content-blockControlActions" class="col-xs-12 col-sm-3">
			<div>
				<a href="{$control.link}" alt="{$control.desc}">
					<div><p>{$control.name}</p></div>
				</a>
			</div>
		</div>
	{/foreach}
{else}
erreur 404
	<div class="table-responsive">
		<table id="controls-step" style="border: none;">
		
		</table>
	</div>
{/if}