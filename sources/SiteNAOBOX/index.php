<?php 	
/* session start est a mettre avant tout code ou html afin de pouvoir le récuperer*/
session_start();
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
	<title>NAOBOX</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">		
</head>
<body>
	<header>
		<section id="header-title">
			NAO BOX - PILOTAGE DU ROBOT NAO
			<img src="images/textures/batterie.png" class="battery">
		</section>
		<section id="header-controls">
			<div>
				<img src="images/textures//CarreStopAction.png" style="width:15px;height:15px;">
			</div>
			<div>
				<img src="images/textures//Acceuil.png" style="width:30px;height:35px;">
			</div>		
					<img src="images/textures/batterie.png" style="width:60px;height:20px;">					
					<a href="#">
						<img src="images/textures//CarreStopAction.png" style="width:15px;height:15px;">			
					</a>							
					<a href="index.php?page=defaut">
						<img src="images/textures//Acceuil.png" style="width:30px;height:35px;">		
		</section>
	</header>
	<section id="content">
		<div id="content-blockControl">
			<a href="" alt="Contrôles">
				<img src="images/textures/btn_controles_enb.jpg"/>
			</a>
		</div>
		<div id="content-blockSensors">
			<a href="" alt="Capteurs">
				<img src="images/textures/btn_capteurs_enb.jpg"/>
			</a>
		</div>
		<div id="content-blockInfos">
			<a href="" alt="Informations">
				<img src="images/textures/btn_informations_enb.jpg"/>
			</a>
		</div>
		<div id="content-blockManuals">
			<a href="" alt="Guides">
				<img src="images/textures/btn_guides_enb.jpg"/>
			</a>
		</div>
		<div id="content-blockAdministrator">
			<a href="" alt="Administration">
				<img src="images/textures/btn_administration_enb.jpg"/>
			</a>
		</div>
	</section>
		<div id="MenuSuperieur">
			<ul style="list-style-type:none">
				<!--<li><a href="index.php?page=defaut"> Accueil</a></li>
				<li><a href="index.php?page=ViewControle">Controle</a></li>
				<li><a href="index.php?page=ViewCapteur">Capteur</a></li>
				<li><a href="index.php?page=ViewGuilde">Guide</a></li>
				<li><a href="index.php?page=ViewInformation">Informations</a></li>	 
				<li><a href="index.php?page=espacePro">Espace pro</a></li>
				<li><a href="index.php?page=ViewAdministration">Administration</a></li>
				-->
							
				
			</ul>	
		</div>						
	<div  id="content">	
		<section>
			<?php
//Déclaration d'une variable
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