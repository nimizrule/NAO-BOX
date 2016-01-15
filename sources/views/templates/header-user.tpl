<header class="row">
	<section id="header-title" class="col-xs-12 col-sm-6">
		<span>NAO BOX - PILOTAGE DU ROBOT NAO {block name=administration}{/block}</span>
	</section>
	<section id="header-controls" class="col-xs-12 col-sm-6">	
			<img src="{$settings.img}/header/battery_white.png" class="battery-item">
			<span class="battery">{$nao_battery}%</span>
			<a href="#">
				<img src="{$settings.img}/header/previous_white.png" style="width:32px;height:32px;">	
			</a>
			<a href="#">
				<img src="{$settings.img}/header/stop_white.png" style="width:32px;height:32px;">			
			</a>									
			<a href="/menu">
				<img src="{$settings.img}/header/home_white.png" style="width:32px;height:32px;">
			</a>
			<a href="/eteindre" class="raspRender-shutdown">
				<img src="{$settings.img}/header/shutdown.png" style="width:32px;height:32px;">
			</a>	
	</section>
</header>