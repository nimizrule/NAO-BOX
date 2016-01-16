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
	<div class="table-responsive">
		<table id="controls-step" style="border: none;">
			<tr>
				<td>
					<a href="">
						<img src="{$settings.img}/steps/arrow-tl.png" alt="top left arrow"/>
					</a>
				</td>
				<td>
					<a href="">
						<img src="{$settings.img}/steps/arrow-t.png" alt="top arrow"/>
					</a>
				</td>
				<td>
					<a href="">
						<img src="{$settings.img}/steps/arrow-tr.png" alt="top right arrow"/>
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="">
						<img src="{$settings.img}/steps/arrow-l.png" alt="left arrow"/>
					</a>
				</td>
				<td></td>
				<td>
					<a href="">
						<img src="{$settings.img}/steps/arrow-r.png" alt="right arrow"/>
					</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="">
						<img src="{$settings.img}/steps/arrow-bl.png" alt="bottom left arrow"/>
					</a>
				</td>
				<td>
					<a href="">
						<img src="{$settings.img}/steps/arrow-b.png" alt="bottom arrow"/>
					</a>
				</td>
				<td>
					<a href="">
						<img src="{$settings.img}/steps/arrow-br.png" alt="bottom right arrow"/>
					</a>
				</td>
			</tr>
		</table>
	</div>
{/if}