<?php 	
/* session start est a mettre avant tout code ou html afin de pouvoir le récuperer*/
session_start();
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
	<title> Le Site Web de Neitsab </title>
	<meta name="description" content="Site de NAOBOX"/>
	<!-- Mots clé lisible par les robots -->
	<meta name="keyword" content="site web,NAOBOX"/>
	<!-- Indexer la page au moteur de recherche et ne pas parcourir les liens présent dans la page -->
	<meta name="robots" content="index,nofollow"/>
	<!-- Largeur d'affichage pour les appareils mobiles -->
	<!--<meta name="viewport" content="width=device-width" />-->
	<meta name="viewport" content="initial-scale=1.0" />
	<!-- Intégration du css tout écran -->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<!-- Intégration du css spécifique mobile -->
<!--
<link rel="stylesheet" type="text/css" href="mobile.css" media="screen and (max-width:640px)">
-->		
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>		
<script src="js/jquery.rotate.js"></script>
<script src="js/script.js"></script>
<!-- Pour la gestion des calendrier-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
<script src=""></script>

<!-- pour le format de la date-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<!-- Fin de la gestion des calendrier-->



<!--  Nécéssaire pour la balise google +-->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

</head>
<body>
	<header id="MenuSuperieur"> 
		<header id='logoSite'> 
		</header>		
		<div >
			<ul>
				<!--<li><a href="index.php?page=defaut"> Accueil</a></li>
				<li><a href="index.php?page=ViewControle">Controle</a></li>
				<li><a href="index.php?page=ViewCapteur">Capteur</a></li>
				<li><a href="index.php?page=ViewGuilde">Guide</a></li>
				<li><a href="index.php?page=ViewInformation">Informations</a></li>	 
				<li><a href="index.php?page=espacePro">Espace pro</a></li>
				<li><a href="index.php?page=ViewAdministration">Administration</a></li>
				-->
				<li> 
					<img id="imgHeader" src="images/textures/batterie.png">					
				</li>	
				<li>
					<a href="javascript:history.go(-1)">
						<img id="imgHeader" src="images/textures/BackPrecedentPage.png">			
					</a>											
				</li>	
				<li>
					<a href="#">
						<img id="imgHeader" src="images/textures/CarreStopAction.png">			
					</a>							
				</li>	
				<li>
					<a href="index.php?page=defaut">
						<img id="imgHeader" src="images/textures/Acceuil.png" >		
					</a>								
				</li>	
			</ul>	
		</div>						
	</header>



	<section class="clear"></section>
	<div  id="content">	
		<section>
			<?php
			$page = "defaut";
			// vérification si la variable existe
			if (isset($_GET['page'])){
				// Vérifie l'existance d'une page
				if (file_exists ('pages/'.$_GET['page'].'.php')){
					$page = $_GET['page'];
				}
			}
			include 'pages/'.$page.'.php';
			?>
		</section>
	</div>		
</body>
</html>