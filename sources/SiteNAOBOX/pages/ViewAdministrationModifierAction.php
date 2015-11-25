<!--
	 *  Page gerant la modificiation d'une action du nao
	 * 
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
-->


<h2>Administration</h2>	
	
<script> // côté client
// Fonction permettant d'empecher l'ajout d'entrée dans la table

function gestionSubmit() {
	if (document.getElementsByTagName("NomFichier") == "" 
		&&  document.getElementsByTagName("NomAction") == ""
		&&  document.getElementsByTagName("DescriptionAction") == "")
	{
		return false;						
	}					
	else
	{
		return true;
	};
}			
</script>

<table border="1">
	<tr>
		<td>
			<h2>
				<a href="index.php?page=ViewAdministrationActionListe">Liste des actions</a>
			</h2>
		</td>
		<td>
			<h2>
				<a href="index.php?page=ViewAdministrationAjouterAction">Créer une action</a>	
			</h2>
		</td>	
	</tr>	 
</table>


<?php // côté serveur
// initialisation de la connexion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "naobox";
$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno($con)){
	echo 'Erreur de connexion:'.mysqli_connect_error();
}

// récupération de l'if
$GLOBALS['valeurDeID'] =null;
if (isset($_GET['cmd_id'])){		
	$GLOBALS['valeurDeID'] = $_GET['cmd_id'];		
	afficheUneAction($con,$GLOBALS['valeurDeID']);
} 

//Récupération d'information nécéssaire à l'ajout de l'action
if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	// gestion de la modification des informations
	if (isset($_POST['NomFichier']) && isset($_POST['NomAction']) && isset($_POST['DescriptionAction'])){	
		modifierAction($con,$_POST['NomAction'],$_POST['NomFichier'],$_POST['DescriptionAction'],$_POST['IDAction']);				
	} 																
}			

// recupère tout les informations du champs en fonction de l'ic
function recupererActionInformation($con,$id){
	$table="nb_commands";
	$champ_cmd_id = "cmd_id";
	$champ_cmd_name = "cmd_name";
	$champ_cmd_file= "cmd_file";
	$champ_cmd_description= "cmd_description";
	$champ_cmd_package= "cmd_package_id";
	$requete = "SELECT * FROM naobox.".$table." WHERE `".$champ_cmd_id."` = ".$id.";";
//echo $requete; 	
   if (mysqli_query($con, $requete)) {
//echo "Insert successfully";	
	} 
	else 
	{
//echo "Error updating record: " . mysqli_error($con);						
//echo $requete;
	}
	return $requete;
}
	
function modifierAction($con,$name,$file,$description,$id){
	$table="nb_commands";
	$champ_cmd_id = "cmd_id";
	$champ_cmd_name = "cmd_name";
	$champ_cmd_file= "cmd_file";
	$champ_cmd_description= "cmd_description";
	$champ_cmd_package= "cmd_package_id";
	$requete = "UPDATE `naobox"."`.`".$table."` SET `".$champ_cmd_name."` = '".$name."', `".$champ_cmd_file."` = '".$file."', `".$champ_cmd_description."` = '".$description."' "." WHERE `".$table."`.`".$champ_cmd_id."` = ".$id.";";
	if (mysqli_query($con, $requete)) {
    //echo "Insert successfully";	
	} 
	else 
	{
    //echo "Error updating record: " . mysqli_error($con);						
    // echo $requete;
	}	
}

function afficheUneAction($con,$id){					
	$affiche=recupererActionInformation($con,$id);		
    // requête					
	$resultat = mysqli_query($con,$affiche);	
	while ($row = mysqli_fetch_array($resultat))
	{			
	echo	"<div id='formulaire'>";
	echo		"<form action='?page=ViewAdministrationModifierAction' method='post' onsubmit='gestionSubmit()'>";
	echo		"<strong>Nom de l action </strong> </br>";
	echo		"<input type='text' name='NomAction' value='".$row['cmd_name']."'/></br>";
	echo		"<strong>Fichier rattaché à l action : </strong></br>";			
	echo		"<input type='file' name='NomFichier' value='".$row['cmd_file']."'/></br>";
	echo		"<strong>Description de l action: </strong></br>";					
	echo		"<input type='text' name='DescriptionAction' value='".$row['cmd_description']."'/></br>";
	echo		"<input type='text' style='visibility:hidden' name='IDAction' value='".$row['cmd_id']."'/></br>";
	echo		"<button type='submit' name='btModifierAction'>Modifier l'action</button></br>";
	echo	"</form>";			
    echo   "</div>";

	}
}


function afficheFormulaire(){			// variable pour la requête			
	echo	"<div id='formulaire'>";
	echo		"<form action='?page=ViewAdministrationModifierAction' method='post' onsubmit='gestionSubmit()'>";
	echo		"<strong>Nom de l action </strong> </br>";
	echo		"<input type='text' name='NomAction' value=''/></br>";
	echo		"<strong>Fichier rattaché à l action : </strong></br>";			
	echo		"<input type='file' name='NomFichier' value=''/></br>";
	echo		"<strong>Description de l action: </strong></br>";					
	echo		"<input type='text' name='DescriptionAction' value=''/></br>";
	echo		"<button type='submit' name='btModifierAction'>Modifier l'action</button></br>";
	echo	"</form>";			
    echo   "</div>";
}


function afficheAll($con){					// variable pour la requête
	$affiche="SELECT * FROM nb_commands;";		
// requête					
	$resultat = mysqli_query($con,$affiche);		

	while ($row = mysqli_fetch_array($resultat))
	{	
		
	echo	"<div id='formulaire'>";
	echo		"<form action='?page=ViewAdministrationModifierAction' method='post' onsubmit='gestionSubmit()'>";
	echo		"<strong>Nom de l action </strong> </br>";
	echo		"<input type='text' name='NomAction' value='".$row['cmd_name']."'/></br>";
	echo		"<strong>Fichier rattaché à l action : </strong></br>";			
	echo		"<input type='file' name='NomFichier' value='".$row['cmd_file']."'/></br>";
	echo		"<strong>Description de l action: </strong></br>";					
	echo		"<input type='text' name='DescriptionAction' value='".$row['cmd_description']."'/></br>";
	echo		"<button type='submit' name='btModifierAction'>Modifier l'action</button></br>";
	echo	"</form>";			
    echo   "</div>";

	}
}

//afficheAll($con);	

// déconnexion
mysqli_close($con);
?>
		

<!--
<div id='formulaire'>
	<form action='?page=ViewAdministrationModifierAction' method='post' onsubmit='gestionSubmit()'>
		<strong>Nom de l'action </strong> </br>
		<input type='text' name='NomAction' value=''/></br>
		<strong>Fichier rattaché à l'action : </strong></br>					
		<input type='file' name='NomFichier' value=''/></br>
		<strong>Description de l'action: </strong></br>					
		<input type='text' name='DescriptionAction' value=""/></br>
		<button type='submit' name='btModifierAction'>Modifier l'action</button></br>
	</form>			
</div>
-->
