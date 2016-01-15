<header class="row">
	<section id="header-title" class="col-xs-12 col-sm-6">
		<span>NAO BOX - PILOTAGE DU ROBOT NAO {block name=administration}{/block}</span>
	</section>
	<section id="header-controls" class="col-xs-12 col-sm-6">	
			<img src="{$settings.img}/header/battery_white.png" class="battery-item">
			<span class="battery">{$nao_battery}%</span>			
			<a href="#"style="margin-left:10px;">
				<img src="{$settings.img}/header/previous_white.png" style="width:32px;height:32px;">	
			</a>
			&nbsp;
			<a href="#"style="margin-left:10px;">
				<img src="{$settings.img}/header/stop_white.png" style="width:32px;height:32px;">			
			</a>		
			&nbsp;							
			<a href="/menu"style="margin-left:10px;">
				<img src="{$settings.img}/header/home_white.png" style="width:35px;height:35px;">
			</a>
			&nbsp;
			<a href="/eteindre" class="raspRender-shutdown" style="margin-left:10px;">
				<img src="{$settings.img}/header/shutdown.png" style="width:44px;height:44px;">
			</a>	
	</section>
</header>