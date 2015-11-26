<!--
	 *  Page d'affcher un pdf en locale. 
	 * 
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
-->
<head>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
</head>
<script type='text/javascript'>
	// On attend que la page soit chargée 
	jQuery(document).ready(function()
	{
	   // On cache la zone de texte
	   jQuery('#toggle').hide();
	   // toggle() lorsque le lien avec l'ID #toggler est cliqué
	   jQuery('a#toggler').click(function()
	  {
	      jQuery('#toggle').toggle(400);
	      return false;
	   });
	});
</script>

<h3>Guide d'utilisation</h3>
	
<a href="#" id="toggler">Afficher le guide d'utilisation</a>.
<div id="toggle" style="display:none;">
	<object data="pdf/GuideUtlisation.pdf" type="application/pdf" width="100%" height="500"></object>
</div>
