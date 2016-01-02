<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>{block name=title}NAOBOX{/block}</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="{$settings.bootstrap}" >
		<link rel="stylesheet" type="text/css" href="{$settings.css}" media="screen">	
		<script type="text/javascript" src="{$settings.jquery}"></script>	
	</head>
	<body>	
		<section class="container">
			<section class="header-container">
				{if $session == "user"}
					{include file="./header-user.tpl"}
				{else}
					{include file="./header-admin.tpl"}
				{/if}
			</section>
			<section class="page-container">
				{block name=content}{/block}
			</section>
		</section>
		<script type="text/javascript" src="{$settings.functions}"></script>		
	</body>
</html>