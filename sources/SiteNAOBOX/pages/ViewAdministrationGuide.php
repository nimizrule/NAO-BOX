
<!--
	 *  Page affichant les pdf administratif. 
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
	   // 1 
	   // On cache la zone de texte
	   jQuery('#toggle_1').hide();
	   // toggle() lorsque le lien avec l'ID #toggler est cliqué
	   jQuery('a#toggler_1').click(function()
	  {
	      jQuery('#toggle_1').toggle(400);
	      return false;
	   });

	   // 2
	   // On cache la zone de texte
	   jQuery('#toggle_2').hide();
	   // toggle() lorsque le lien avec l'ID #toggler est cliqué
	   jQuery('a#toggler_2').click(function()
	  {
	      jQuery('#toggle_2').toggle(400);
	      return false;
	   });

	   // 3
	   // On cache la zone de texte
	   jQuery('#toggle_3').hide();
	   // toggle() lorsque le lien avec l'ID #toggler est cliqué
	   jQuery('a#toggler_3').click(function()
	  {
	      jQuery('#toggle_3').toggle(400);
	      return false;
	   });

	    // 4
	   // On cache la zone de texte
	   jQuery('#toggle_4').hide();
	   // toggle() lorsque le lien avec l'ID #toggler est cliqué
	   jQuery('a#toggler_4').click(function()
	  {
	      jQuery('#toggle_4').toggle(400);
	      return false;
	   });

	});
</script>


<h3>Installation & Sauvagarde image Raspberry</h3>

<a href="#" id="toggler_2">Afficher le guide Installation & Sauvagarde image Raspberry</a>.
<div id="toggle_2" style="display:none;">
	<object data="pdf/Installation & Sauvagarde image Raspberry.pdf" type="application/pdf" width="100%" height="500"></object>
</div>


<h3>Installer et Configurer le Hotspot Wifi</h3>

<a href="#" id="toggler_3">Afficher le guide Installer et Configurer le Hotspot Wifi</a>.
<div id="toggle_3" style="display:none;">
	<object data="pdf/Installer et Configurer le Hotspot Wifi.pdf" type="application/pdf" width="100%" height="500"></object>
</div>


<h3>Installer le serveur Apache</h3>

<a href="#" id="toggler_4">Afficher le guide Installer le serveur Apach</a>.
<div id="toggle_4" style="display:none;">
	<object data="pdf/Installer le serveur Apache.pdf" type="application/pdf" width="100%" height="500"></object>
</div>

