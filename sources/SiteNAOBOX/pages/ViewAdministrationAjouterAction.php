<!--
	 *  Page gerant l'ajout d'une action du nao
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

//Récupération d'information nécéssaire à l'ajout de l'action
if ($_SERVER["REQUEST_METHOD"] == "POST") {				
	if ( isset($_POST['NomFichier']) && isset($_POST['NomAction']) && isset($_POST['DescriptionAction'])){		
		ajouterAction($con,$_POST['NomAction'],$_POST['NomFichier'],$_POST['DescriptionAction']);				
	}															
}			

if (isset($_GET['action'])){	
	echo 'if action ';
	if ($_GET['action']=="supprimer") {
//echo 'supprimer delete ';
		supprimerAction ($con,$_GET['id']);
	}						
}		

function supprimerAction ($con,$id){
	$table="nb_commands";	
	$requete = "DELETE FROM ".$table." WHERE id=(".$id.");";
//echo $requete;
	if (mysqli_query($con, $requete)) {
//echo "Delete row successfully";		
	}
	else 
	{
		echo "Error updating record: " . mysqli_error($con);						
//echo $requete;
	}		
}

function ajouterAction($con,$name,$file,$description){
	$table="nb_commands";
	$champ_cmd_id = "cmd_id";
	$champ_cmd_name = "cmd_name";
	$champ_cmd_file= "cmd_file";
	$champ_cmd_description= "cmd_description";
	$champ_cmd_package= "cmd_package_id";
	$requete = "INSERT INTO `naobox"."`.`".$table."` (`".$champ_cmd_id."`,`".$champ_cmd_name."`,`".$champ_cmd_file."`,`".$champ_cmd_description."`,`".$champ_cmd_package."`) VALUES (NULL,'".$name."','".$file."','".$description."',NULL);";
//echo $requete;
//INSERT INTO `naobox`.`nb_commands` (`cmd_id`, `cmd_name`, `cmd_file`, `cmd_description`, `cmd_package_id`) VALUES (NULL, 'BellyToBellySuplex', 'Belly.ngp', 'Fait une prise de catch', NULL);	
	if (mysqli_query($con, $requete)) {
//echo "Insert successfully";	
	} 
	else 
	{
//echo "Error updating record: " . mysqli_error($con);						
//echo $requete;
	}	
}
	

// déconnexion
mysqli_close($con);
?>
		
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

<div id="formulaire">
	<form action="?page=ViewAdministrationAjouterAction" method="post" onsubmit="gestionSubmit()">
		<strong>Nom de l'action </strong> </br>
		<input type="text" name="NomAction" value=""/></br>
		<strong>Fichier rattaché à l'action : </strong></br>					
		<input type="file" name="NomFichier" value=""/></br>
		<strong>Description de l'action: </strong></br>					
		<input type="text" name="DescriptionAction" value=""/></br>
		<button type="submit" name="btAjouterAction">Créer l'action</button></br>
	</form>			
</div>

