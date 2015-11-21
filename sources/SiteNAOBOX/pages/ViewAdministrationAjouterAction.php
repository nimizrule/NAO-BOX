
<h2>Administration</h2>	

<table>
	<!-- Bgcolor="red"-->								
	<caption> Tableau récapitulatif des informations </caption>
	<!-- centrage des textes -->
	<thead align="center">
		<!-- tr = ligne du tableau  -->
		<tr>
			<!-- th = colonnes de titres du tableau  -->
			<th>ID</th>
			<th>Nom de l'action</th>
			<th>Fichier de l'ancement</th>	
			<th>Affichage d'information supplémentaire</th>	
			<th>Modification de l'action</th>	
			<th>Supprimer de l'action</th>							
		</tr>			

<script> // côté client
// Fonction permettant d'empecher l'ajout d'entrée dans la table

function gestionSubmit() {
	if (document.getElementsByTagName("nom") == "" &&  document.getElementsByTagName("prenom") == "")
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

//Récupération d'information nécéssaire à l'ajout d'utilisateur;
if ($_SERVER["REQUEST_METHOD"] == "POST") {				
	if ( isset($_POST['nom']) && isset($_POST['prenom'])){		
		ajouterAction($con,$_POST['nom'],$_POST['prenom']);				
	}															
}				
// de base les informations son en GET ( écris dans l'adresse internet)
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
	$champ_cmd_name = "cmd_name";
	$champ_cmd_file= "cmd_file";
	$champ_cmd_description= "cmd_description";
	$champ_cmd_package= "cmd_package_id";
	$requete = "INSERT INTO naobox ".$table." (cmd_id ".$champ_cmd_name.",".$champ_cmd_file.") VALUES (NULL'".$nom."','".$file."','".$description."');";
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
//echo $row['nom'].' '. $row['prenom'].'<br/>';	
		echo "<tr> ";								
		echo"<td>".$row['cmd_id']."</td>";
		echo"<td>".$row['cmd_name']."</td>";
		echo"<td>".$row['cmd_file']."</td>";
		echo"<td>".$row['cmd_description']."</td>";
		echo"<td>".$row['cmd_package_id']."</td>";
		//echo "<td> <a href='?page=ViewAdministrationAjouterPeripherique&action=supprimer&id=".$row['id']."' > Supprimer </a> </td>";							
		echo "</tr>";						
	}
}

afficheAll($con);

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
	<form action="?page=ViewAdministration" method="post" onsubmit="gestionSubmit()">
		<strong>Nom de l'action </strong> </br>
		<input type="text" name="NomAction" value=""/></br>
		<strong>Fichier rattaché à l'action : </strong></br>					
		<input type="file" name="NomFichier" value=""/></br>
		<strong>Description de l'action: </strong></br>					
		<input type="text" name="DescriptionAction" value=""/></br>
		<button type="submit" name="btAjouterAction">Créer l'action</button></br>
	</form>			
</div>

