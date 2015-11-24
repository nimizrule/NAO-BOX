<h1>Guides</h1>
<p>
	Voici la liste des des evenements dans la base de données: 
</p>
<table>
	<!-- Bgcolor="red"-->								
	<caption> Tableau récapitulatif des informations </caption>
	<!-- centrage des textes -->
	<thead align="center">
		<!-- tr = ligne du tableau  -->
		<tr>
			<!-- th = colonnes de titres du tableau  -->				
			<th>Nom de l'événement</th>				
			<th>Information sur l'événement</th>	
			<th>Dates de événement</th>
		</tr>			
		<?php
// initialisation de la connexion
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "web";
		$con = mysqli_connect($servername, $username, $password, $dbname);
		if (mysqli_connect_errno($con)){
			echo 'Erreur de connexion:'.mysqli_connect_error();
		}

//Récupération d'information nécéssaire à l'ajout d'utilisateur;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {				
			if ( isset($_POST['nomEvenement']) && isset($_POST['informationComplementaire']) && isset($_POST['dateEvenement']) ){		
				ajouterEvenement($con,$_POST['nomEvenement'],$_POST['informationComplementaire'],$_POST['dateEvenement']);				
			}															
		}		

// de base les informations son en GET ( écris dans l'adresse internet)
		if (isset($_GET['action'])){	
			echo 'if action ';
			if ($_GET['action']=="supprimer") {
				echo 'supprimer delete ';
				supprimerEvenement ($con,$_GET['id']);
			}						
		}		


		function supprimerEvenement ($con,$id){
			$table="news";	
			$requete = "DELETE FROM ".$table." WHERE id=(".$id.");";
			//echo $requete;
			if (mysqli_query($con, $requete)) 
			{
//echo "Delete row successfully";		
			} 
			else 
			{
//echo "Error updating record: " . mysqli_error($con);						
//echo $requete;
			}		
		}

		function ajouterEvenement($con,$nomEvenement,$content,$date){
			$table="news";
			$champNomEvenement = "titre";
			$champContent= "contenu";
			$champDate= "date";
			$requete = "INSERT INTO ".$table." (".$champNomEvenement.",".$champContent.",".$champDate.") VALUES ('".$nomEvenement."','".$content."','".$date."');";
			//echo $requete;					
			if (mysqli_query($con, $requete)) 
			{
				//echo "Insert successfully";				
			} 
			else 
			{
				echo "Error updating record: " . mysqli_error($con);						
//echo $requete;
			}	
		}


		function afficheAll($con){
// variable pour la requête						
			$table="news";	
			$affiche="SELECT * FROM ".$table.";";	
// requête					
			$resultat = mysqli_query($con,$affiche);		

			while ($row = mysqli_fetch_array($resultat))
			{
//echo $row['nomEvenement'].' '. $row['prenom'].'<br/>';	
				echo "<tr> ";
				echo"<td>".$row['titre']."</td>";
				echo"<td>".$row['contenu']."</td>";
				echo"<td>".$row['date']."</td>";
				echo "<td> <a href='?page=evenement&action=supprimer&id=".$row['id']."' > Supprimer </a> </td>";							
				echo "</tr>";						
			}
		}

		afficheAll($con,"evenement");

// déconnexion
		mysqli_close($con);
		?>		

		<tr>
			<td colspan="5">Message dans tout le tableau.</td>	
		</tr>
	</thead>
</table>	

<script type="text/javascript">
// code pour la gestion de la date dans le formulaire
jQuery(function() 
{
//formattage de la date dans le format du la bdd		
jQuery('#dateEvenement').datepicker({ dateFormat: "yy-mm-dd"}).val();	
}
);
</script>
<!-- TODO modifier le calendrier afin qu'il soit en français->
<!--$.datepicker.regional["fr"]-->
<h3> Menu d'ajout ou suppression de l'evenement dans la base de donnée </h3>
<div id="texte">
	<form action="?page=evenement" method="post">
		<strong>Nom de l'evenement:</strong> </br>
		<input type="text" name="nomEvenement" value=""/></br>
		<strong>Date de l'évenement:</strong></br>					
		<input type="text" id="dateEvenement" name="dateEvenement" value=""/></br>
		<strong>Informations Complémentaire:</strong></br>					
		<input type="text" name="informationComplementaire" value="" size=100px/></br>
		<button type="submit" name="btEnvoyer">Ajouter un evenement</button></br>	
	</form>				
</div>
