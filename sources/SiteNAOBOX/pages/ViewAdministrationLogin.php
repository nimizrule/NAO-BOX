<!--
	 *  Page permettant à l'adminstrateur ou un utilisateur de se connecter
	 * 
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
-->

<h2>Administration</h2>	

<?php	
//messageBienvenue();
function gestionConnection(){
/* Récupération des information en post d'utilisateur et password afin de setter la session */	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {				
		if ( isset($_POST['utilisateur']) && isset($_POST['password'])){					
			$_SESSION['user'] = $_POST['utilisateur'];
			$_SESSION['password'] = $_POST['password'];
		}															
	}	
}
function messageBienvenue() {
	// Affiche un l'identifiant de la personne une fois qu'il est connecté
	if (isset($_SESSION['user'])){
		echo " Bienvenue ".$_SESSION['user']."!<br>";
	}
	else {	
		echo "Bienvenu visiteur ! <br>";
	}
}


/* Gestion de la déconnection "*/
function gestionDeconnection(){
	if (isset($_SESSION['user'])){
		unset ($_SESSION['user']);
	}
}
?>



		
<h3>Pour administrer l'application vous devez vous authentifier </h3>
<div id="formulaire">
	<form action="?page=ViewAdministration" method="post" onsubmit="gestionConnection()">
		<strong>Utilisateur:</strong> </br>
		<input type="text" name="utilisateur" value=""/></br>
		<strong>Mot de passe:</strong></br>					
		<input type="password" name="password" value=""/></br>
		<button type="submit" name="btConnexion">Administrer l'application</button></br>
	</form>			
</div>
<div id="Deconnection">
	<form action="?page=ViewAdministrationLogin" method="POST" onsubmit="gestionDeconnection()">		
		<button type="submit" name="btDeconnection">Deconnection</button></br>
	</form>	
</div>