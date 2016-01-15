<!--
	 *  Support
	 * 
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
-->

<?php	
//messageBienvenue();
//function gestionConnection(){
/* Récupération des information en post d'utilisateur et password afin de setter la session */	
if ($_SERVER["REQUEST_METHOD"] == "POST") {				
	if ( isset($_POST['utilisateur']) && isset($_POST['password'])){					
		$_SESSION['user'] = $_POST['utilisateur'];
		$_SESSION['password'] = $_POST['password'];
	}															
}	
//}


//function messageBienvenue() {
// Affiche un l'identifiant de la personne une fois qu'il est connecté
if (isset($_SESSION['user'])){
	echo " Bienvenue ".$_SESSION['user']."!<br>";
}
else {	
	echo "Bienvenu visiteur ! <br>";
}
//}


/* Gestion de la déconnection "*/
function gestionDeconnection(){
	if (isset($_SESSION['user'])){
		unset ($_SESSION['user']);
	}
}

?>


<h3> Menu de connexion d'un d'utilisateur</h3>
<div id="Connection">
	<form action="?page=espacePro" method="POST" onsubmit="gestionConnection()">
		<strong>Identifiant:</strong> </br>
		<input type="text" name="utilisateur" value=""></br>
		<strong>Mot de passe:</strong></br>					
		<input type="password" name="password" value=""></br>
		<button type="submit" name="btConnection">Connection</button></br>
	</form>	
</div>
<div id="Deconnection">
	<form action="?page=espacePro" method="POST" onsubmit="gestionDeconnection()">		
		<button type="submit" name="btDeconnection">Deconnection</button></br>
	</form>	
</div>



