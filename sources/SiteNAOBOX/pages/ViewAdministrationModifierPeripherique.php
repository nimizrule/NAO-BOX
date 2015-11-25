<!--
	 *  Page permerttant la modification d'un périphérique
	 * 
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
-->


<h2>Administration</h2>	


<table border="1">
	<tr>
		<td>
			<h2>
				<a href="index.php?page=ViewAdministrationAjouterPeripherique">Ajouter un périphérique</a>
			</h2>
		</td>
		<td>
			<h2>
				<a href="index.php?page=ViewAdministrationListePeripherique">Liste des périphérique autorisé</a>	
			</h2>
		</td>	
	</tr>	 
</table>

<script> // côté client
// Fonction permettant d'empecher l'ajout d'entrée dans la table
function gestionSubmit() {
	if (document.getElementsByTagName("NomPeripherique") == "" 
		&&  document.getElementsByTagName("adresseMac") == ""
		&&  document.getElementsByTagName("adresseIP") == "")
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

// récupération de l'if
$GLOBALS['valeurDeID'] =null;
if (isset($_GET['prl_id'])){		
	$GLOBALS['valeurDeID'] = $_GET['prl_id'];		
	afficheUnPeripherique($con,$GLOBALS['valeurDeID']);
} 

//Récupération d'information nécéssaire à l'ajout de l'action
if ($_SERVER["REQUEST_METHOD"] == "POST") {				
	if ( isset($_POST['NomPeripherique']) 
		&& isset($_POST['adresseMac'])
		 && isset($_POST['adresseIP'])
		 && isset($_POST['description'])){		
		ModifierPheripherique($con,$_POST['NomPeripherique'],$_POST['adresseMac'],$_POST['adresseIP'],$_POST['description'],$_POST['IDAction']);					
	}	// affichage des informations au l'id de l'action
	
}			

function recupererPeripheriqueInformation($con,$id){
	$table="nb_peripherals";
	$champ_prl_id = "prl_id";
	$champ_prl_name = "prl_name";
	$champ_prl_mac_adress= "prl_mac_adress";
	$champ_prl_ip_adress= "prl_ip_adress";
	$champ_prl_description= "prl_description";
	$requete = "SELECT * FROM `naobox`.`".$table."` WHERE `".$champ_prl_id."` = ".$id.";";
  
    // echo $requete;
	if (mysqli_query($con, $requete)) {
    // echo "Insert successfully";			
	} 
	else 
	{
	// echo "Error updating record: " . mysqli_error($con);						
	// echo $requete;
	}	

	return $requete;
}



function ModifierPheripherique($con,$name,$adresseMac,$ipAdresse,$description,$id){
	$table="nb_peripherals";
	$champ_prl_id = "prl_id";
	$champ_prl_name = "prl_name";
	$champ_prl_mac_adress= "prl_mac_adress";
	$champ_prl_ip_adress= "prl_ip_adress";
	$champ_prl_description= "prl_description";
	$requete = "UPDATE `naobox"."`.`".$table."` SET `".$champ_prl_name."` = '".$name."', `".$champ_prl_mac_adress."` = '".$adresseMac."', `".$champ_prl_ip_adress."` = '".$ipAdresse."', `".$champ_prl_description."` = '".$description."' "." WHERE `".$table."`.`".$champ_prl_id."` = ".$id.";";
	  
	if (mysqli_query($con, $requete)) {
       echo "Insert successfully";	
	} 
	else 
	{
        echo "Error updating record: " . mysqli_error($con);						
        echo $requete;
	}	
}

function afficheUnPeripherique($con,$id){					
	$affiche=recupererPeripheriqueInformation($con,$id);		

    // requête					
	$resultat = mysqli_query($con,$affiche);	
	
	while ($row = mysqli_fetch_array($resultat))
	{			
	echo	"<div id='formulaire'>";
	echo		"<form action='?page=ViewAdministrationModifierPeripherique' method='post' onsubmit='gestionSubmit()'>";
	echo		"<strong>Nom du périphérique : </strong> </br>";
	echo		"<input type='text' name='NomPeripherique' value='".$row['prl_name']."'/></br>";
	echo		"<strong> Adresse mac : </strong></br>";			
	echo		"<input type='text' name='adresseMac' value='".$row['prl_mac_adress']."'/></br>";
	echo		"<strong> Adresse IP : </strong></br>";					
	echo		"<input type='text' name='adresseIP' value='".$row['prl_ip_adress']."'/></br>";
	echo		"<strong> Description succinte du périphérique :  </strong></br>";					
	echo		"<input type='text' name='description' value='".$row['prl_description']."'/></br>";
	echo		"<input type='text' style='visibility:hidden' name='IDAction' value='".$row['prl_id']."'/></br>";
	echo		"<button type='submit' name='btModifierPeripherique'>Modifier l'action</button></br>";
	echo	"</form>";			
    echo   "</div>";

	}
}


// déconnexion
mysqli_close($con);
?>

<!--
<div id="formulaire">
	<form action="?page=ViewAdministrationModifierPeripherique" method="post" onsubmit="gestionSubmit()">
		<strong>Nom du périphérique : </strong> </br>
		<input type="text" name="NomPeripherique" value=""/></br>
		<strong>Adresse mac : </strong></br>					
		<input type="text" name="adresseMac" value=""/></br>
		<strong>Adresse IP : </strong></br>					
		<input type="text" name="adresseIP" value=""/></br>
		<strong>Description succinte du périphérique : </strong></br>					
		<input type="text" name="description" value=""/></br>
		<button type="submit" name="btModifierPeripherique">Modifier le périphérique</button></br>
	</form>			
</div>
-->
