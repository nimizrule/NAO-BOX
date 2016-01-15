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
			&nbsp;
			<a href="#">
				<img src="{$settings.img}/header/stop_white.png" style="width:32px;height:32px;">			
			</a>	
			&nbsp;								
			<a href="/admin/menu">
				<img src="{$settings.img}/header/home_white.png" style="width:35px;height:35px;">
			</a>
			&nbsp;
			<a href="/admin/deconnexion">
				<img src="{$settings.img}/header/logout_white.png" style="width:40px;height:40px;">
			</a>
			&nbsp;
			<a href="/admin/eteindre" class="adminRaspRender-shutdown">
				<img src="{$settings.img}/header/shutdown.png" style="width:40px;height:40px;">
			</a>	
	</section>
</header>