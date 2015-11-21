
<h2>Administration</h2>	
		
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

