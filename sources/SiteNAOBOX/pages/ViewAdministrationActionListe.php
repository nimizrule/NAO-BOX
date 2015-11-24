
<!--
	 *  Page affichant la liste des actions disponible pour le robot nao du nao
	 * 
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
-->

<h2>Administration</h2>	
		
<h3>Liste des périphérique</h3>
<table border="1">
	<tr>
		<td>
			<h2>
				<a href="index.php?page=ViewAdministrationActionListe">Liste des actions</a>
			</h2>
		</td>
		<td>
			<h2>
				<a href="index.php?page=ViewAdministrationAjouterAction">Creer une action</a>	
			</h2>
		</td>	
	</tr>	 
</table>


<table border="1" style="width:100%">
	<!-- centrage des textes -->
	<thead align="center">
		<!-- tr = ligne du tableau  -->
		<tr>
			<!-- th = colonnes de titres du tableau  -->
			<!--<th>ID</th>-->
			<th>Nom de l'action</th>
			<th>Nom du fichier</th>	
			<th>Information supplémentaire</th>	
			<th>Modifier l'action</th>	
			<th>Supprimer l'action</th>							
		</tr>		


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
			
// de base les informations son en GET ( écris dans l'adresse internet)
if (isset($_GET['action'])){	
	//echo 'if action ';
	if ($_GET['action']=="supprimer") {
//echo 'supprimer delete ';
		supprimerAction ($con,$_GET['cmd_id']);
	}						
}		

function supprimerAction ($con,$id){
	$table="nb_commands";	
	$requete = "DELETE FROM ".$table." WHERE cmd_id=(".$id.");";
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
	$champ_cmd_name = "cmd_name";
	$champ_cmd_file= "cmd_file";
	$champ_cmd_description= "cmd_description";
	$champ_cmd_package= "cmd_package_id";
	$requete = "INSERT INTO naobox ".$table." ('cmd_id ".$champ_cmd_name.",".$champ_cmd_file.") VALUES (NULL'".$nom."','".$file."','".$description."');";
//echo $requete;	
	if (mysqli_query($con, $requete)) {
//echo "Insert successfully";	
	} 
	else 
	{
//echo "Error updating record: " . mysqli_error($con);						
//echo $requete;
	}	
}

function afficheAll($con){					// variable pour la requête
	$affiche="SELECT * FROM nb_commands;";		
// requête					
	$resultat = mysqli_query($con,$affiche);		

	while ($row = mysqli_fetch_array($resultat))
	{
		echo "<tr>";								
		//echo"<td>".$row['cmd_id']."</td>";
		echo"<td>".$row['cmd_name']."</td>";
		echo"<td>".$row['cmd_file']."</td>";
		//echo"<td>".$row['cmd_description']."</td>";
		//echo"<td>".$row['cmd_package_id']."</td>";
		// Affchage d'une information détaillé de la commande-->
		echo"<td><img src='images/textures/ModifierAction.png' alt='' style=''width:20px;height:20px;'/></a></td>";
		// Modifier action
		echo"<td><img src='images/textures/EnregistrerPeriph.png' alt='' style=''width:20px;height:20px;'/></a></td>";
		// Supprimer action
		echo"<td><a href='?page=ViewAdministrationActionListe&action=supprimer&cmd_id=".$row['cmd_id']."' ><img src='images/textures/SuppPeriph.png' alt='' style=''width:20px;height:20px;'/></a></a></td>";
		
		//echo "<td> <a href='?page=ViewAdministrationAjouterPeripherique&action=supprimer&id=".$row['id']."' > Supprimer </a> </td>";							
		echo "</tr>";	
	}
}

afficheAll($con);

// déconnexion
mysqli_close($con);
?>
</table>

