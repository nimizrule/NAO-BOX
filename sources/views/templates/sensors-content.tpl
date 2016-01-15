{if $content == "cameraT"}
	{foreach from=$controls item=control}
		<div id="content-blockControlActions" class="col-xs-12 col-sm-3">
			<div>
				<a href="{$control.link}" alt="{$control.desc}">
					<div>{$control.name}</div>
				</a>
			</div>
		</div>
	{/foreach}
{else}
	
{/if}