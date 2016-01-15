<!--
	 *  Page permerttant l'ajout d'un périphérique
	 * 
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
-->


<h2>Administration</h2>	

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

//Récupération d'information nécéssaire à l'ajout de l'action
if ($_SERVER["REQUEST_METHOD"] == "POST") {				
	if ( isset($_POST['NomPeripherique']) 
		&& isset($_POST['adresseMac'])
		 && isset($_POST['adresseIP'])
		 && isset($_POST['description'])){		
		ajouterPheripherique($con,$_POST['NomPeripherique'],$_POST['adresseMac'],$_POST['adresseIP'],$_POST['description']);				
	}															
}			

if (isset($_GET['action'])){	
	echo 'if action ';
	if ($_GET['action']=="supprimer") {
//echo 'supprimer delete ';
		supprimerPeripherique ($con,$_GET['id']);
	}						
}		

function supprimerAction ($con,$id){
	$table="nb_peripherals";	
	$requete = "DELETE FROM ".$table." WHERE prl_id=(".$id.");";
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

function ajouterPheripherique($con,$name,$adresseMac,$ipAdresse,$description){
	$table="nb_peripherals";
	$champ_prl_id = "prl_id";
	$champ_prl_name = "prl_name";
	$champ_prl_mac_adress= "prl_mac_adress";
	$champ_prl_ip_adress= "prl_ip_adress";
	$champ_prl_description= "prl_description";
	$requete = "INSERT INTO `naobox`.`".$table."` (`".$champ_prl_id."`,`".$champ_prl_name."`,`".$champ_prl_mac_adress."`,`".$champ_prl_ip_adress."`,`".$champ_prl_description."`) VALUES (NULL,'".$name."','".$adresseMac."','".$ipAdresse."','".$description."');";
   //          INSERT INTO `naobox`.`nb_peripherals` (`prl_id`, `prl_name`, `prl_mac_adress`, `prl_ip_adress`, `prl_description`) VALUES (NULL, 'leNAME', 'leMAC', 'leIP', 'leDESCRPTION');
	//echo $requete;   
//echo "Insert successfully";	
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

<div id="formulaire">
	<form action="?page=ViewAdministrationAjouterPeripherique" method="post" onsubmit="gestionSubmit()">
		<strong>Nom du périphérique : </strong> </br>
		<input type="text" name="NomPeripherique" value=""/></br>
		<strong>Adresse mac : </strong></br>					
		<input type="text" name="adresseMac" value=""/></br>
		<strong>Adresse IP : </strong></br>					
		<input type="text" name="adresseIP" value=""/></br>
		<strong>Description succinte du périphérique : </strong></br>					
		<input type="text" name="description" value=""/></br>
		<button type="submit" name="btAjouterPeripherique">Ajouter le périphérique</button></br>
	</form>			
</div>

