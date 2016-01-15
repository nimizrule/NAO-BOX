<header class="row">
	<section id="header-title" class="col-xs-12 col-sm-6">
		<span>NAO BOX - PILOTAGE DU ROBOT NAO {block name=administration}{/block}</span>
	</section>
	<section id="header-controls" class="col-xs-12 col-sm-6">	
			<img src="{$settings.img}/header/battery.png" class="battery-item">
			<span class="battery">{$nao_battery}%</span>
			<a href="#">
				<img src="{$settings.img}/header/previous.png" style="width:60px;height:20px;">	
			</a>
			<a href="#">
				<img src="{$settings.img}/header/stop.png" style="width:15px;height:15px;">			
			</a>
			<a href="/eteindre" class="raspRender-shutdown">
				<img src="{$settings.img}/header/home.png" style="width:32px;height:32px;">
			</a>							
			<a href="/menu">
				<img src="{$settings.img}/header/home.png" style="width:32px;height:32px;">
			</a>
	</section>
</header>