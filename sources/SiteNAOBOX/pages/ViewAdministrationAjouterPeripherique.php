
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

<div id="formulaire">
	<form action="?page=ViewAdministration" method="post" onsubmit="gestionSubmit()">
		<strong>Nom du périphérique : </strong> </br>
		<input type="text" name="NomPeripherique" value=""/></br>
		<strong>Adresse mac : </strong></br>					
		<input type="text" name="adresseMac" value=""/></br>
		<strong>Adresse IP : </strong></br>					
		<input type="text" name="adresseIP" value=""/></br>
		<button type="submit" name="btAjouterPeripherique">Ajouter le périphérique</button></br>
	</form>			
</div>

