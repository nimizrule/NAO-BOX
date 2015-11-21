
<h2>Administration</h2>	
		
<h3>Liste des périphérique</h3>
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

<table border="1" style="width:100%">
	<!-- centrage des textes -->
	<thead align="center">
		<!-- tr = ligne du tableau  -->
		<tr>
			<!-- th = colonnes de titres du tableau  -->
			<th>ID</th>
			<th>Nom du périphérique</th>
			<th>Adresse mac</th>	
			<th>Adresse IP</th>	
			<th>Modification de l'action</th>	
			<th>Supprimer de l'action</th>							
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

function ajouterAction($con,$name,$adresseMac,$adresseIP,$description){
	$table="nb_peripherals";
	$champ_prl_name = "prl_name";
	$champ_prl_mac_adress= "prl_mac_adress";
	$champ_prl_ip_adress= "prl_ip_adress";
	$champ_prl_description= "prl_description";
	$requete = "INSERT INTO naobox ".$table." (cmd_id ".$champ_prl_name.",".$prl_mac_adress.",".$prl_ip_adress.",".$prl_description.") VALUES (NULL'".$name."','".$adresseMac."','".$adresseIP."','".$description."');";
  //INSERT INTO `naobox`.`nb_peripherals` (`prl_id`, `prl_name`, `prl_mac_adress`, `prl_ip_adress`, `prl_description`) VALUES (NULL, 'le nom', 'l''adresse max', '10.3.3.2', 'SA Description');
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
	$affiche="SELECT * FROM nb_peripherals;";		
// requête					
	$resultat = mysqli_query($con,$affiche);		

	while ($row = mysqli_fetch_array($resultat))
	{
		echo "<tr>";								
		echo"<td>".$row['prl_id']."</td>";
		echo"<td>".$row['prl_name']."</td>";
		echo"<td>".$row['prl_mac_adress']."</td>";
		echo"<td>".$row['prl_ip_adress']."</td>";
		//echo"<td>".$row['prl_description']."</td>";
		//echo "<td> <a href='?page=ViewAdministrationAjouterPeripherique&action=supprimer&id=".$row['id']."' > Supprimer </a> </td>";							
		// Modifier action
		echo"<td><img src='images/textures/EnregistrerPeriph.png' alt='' style=''width:20px;height:20px;'/></a></td>";
		// Supprimer action
		echo"<td><img src='images/textures/SuppPeriph.png' alt='' style=''width:20px;height:20px;'/></a></td>";
		echo "</tr>";	
	}
}

afficheAll($con);

// déconnexion
mysqli_close($con);
?>
</table>

<!--
<table border="1" style="width:100%">	 
	    <tr>
	    <td>
	    	 <p>Nom du périphérique</p>
		</td>
	    <td>
	    	<p>Adresse mac </p>
		</td>	
	    <td>
	  		<p>Addresse IP</p>
	  	</td>
	  	<td>
	  		<p>
	  			<a href="#" class="bordered-feature-image"><img src="images/textures//EnregistrerPeriph.png" alt="" style="width:20px;height:20px;"/></a>			
	   		</p>
	    </td>	
	    <td>
	  		<p>	  		
	  			<a href="#" class="bordered-feature-image"><img src="images/textures//SuppPeriph.png" alt="" style="width:20px;height:20px;"/></a>			
	   		 </p>
	    </td>	
	  </tr>	 	
	    <tr>
	    <td>
	    	 <p>Nom du périphérique</p>
		</td>
	    <td>
	    	<p>Adresse mac </p>
		</td>	
	    <td>
	  		<p>Addresse IP</p>
	  	</td>
	  	<td>
	  		<p>
	  			<a href="#" class="bordered-feature-image"><img src="images/textures//EnregistrerPeriph.png" alt="" style="width:20px;height:20px;"/></a>			
	   		</p>
	    </td>	
	    <td> 
	  		<p>	  		
	  			<a href="#" class="bordered-feature-image"><img src="images/textures//SuppPeriph.png" alt="" style="width:20px;height:20px;"/></a>			
	   		 </p>
	    </td>	
	  </tr>	 	
</table>
-->