<!--
	 *  Page permettant de changer le mot de passe d'un utilisateur
	 * 
	 * @author Bastien VAUTIER
	 * @version 0.0.1
	 * @copyright 2015 3iL
-->

<h2>Administration</h2>	
		
<h3>Changement du mot de passe</h3>
<div id="formulaire">
	<form action="?page=ViewAdministration" method="post" onsubmit="gestionSubmit()">
		<strong>Ancien mot de passe :</strong> </br>
		<input type="password" name="oldPassword" value=""/></br>
		<strong>Nouveau mot de passe : </strong></br>					
		<input type="password" name="newPassword" value=""/></br>
		<strong>Répétition du mot de passe : </strong></br>					
		<input type="password" name="newPasswordcheck" value=""/></br>
		<button type="submit" name="btModifierMotDePasse">Valider le changement de paramètre</button></br>
	</form>			
</div>

