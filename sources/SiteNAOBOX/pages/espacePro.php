<h1> Le Site Web de Neitsab</h1>
<h2>Espace Pro</h2>		

<?php	
//messageBienvenue();
//function gestionConnection(){
/* Récupération des information en post d'utilisateur et password afin de setter la session */	
if ($_SERVER["REQUEST_METHOD"] == "POST") {				
	if ( isset($_POST['utilisateur']) && isset($_POST['password'])){					
		$_SESSION['user'] = $_POST['utilisateur'];
		$_SESSION['password'] = $_POST['password'];
	}															
}	
//}


//function messageBienvenue() {
// Affiche un l'identifiant de la personne une fois qu'il est connecté
if (isset($_SESSION['user'])){
	echo " Bienvenue ".$_SESSION['user']."!<br>";
}
else {	
	echo "Bienvenu visiteur ! <br>";
}
//}


/* Gestion de la déconnection "*/
function gestionDeconnection(){
	if (isset($_SESSION['user'])){
		unset ($_SESSION['user']);
	}
}

?>


<h3> Menu de connexion d'un d'utilisateur</h3>
<div id="Connection">
	<form action="?page=espacePro" method="POST" onsubmit="gestionConnection()">
		<strong>Identifiant:</strong> </br>
		<input type="text" name="utilisateur" value=""></br>
		<strong>Mot de passe:</strong></br>					
		<input type="password" name="password" value=""></br>
		<button type="submit" name="btConnection">Connection</button></br>
	</form>	
</div>
<div id="Deconnection">
	<form action="?page=espacePro" method="POST" onsubmit="gestionDeconnection()">		
		<button type="submit" name="btDeconnection">Deconnection</button></br>
	</form>	
</div>




<button id="buttonUp">Cacher le texte</button><button id="buttonDown">Afficher le texte</button>
<div id="toMove">
	4 Rubrique espace pro</br>

	La partie Espace pro proposera la saisie d'un login et mot de passe afin de se loger sur un espace administrateur qui permettra : </br>
	La gestion des photos,</br>
	La gestion du texte de la page d'accueil,</br>
	La gestion des événements,</br>
	La gestion des médias  audio ou vidéo.</br> 


	Soit :
	<h3>Préambule</h3>
	La partie 'Espace pro' permet l'administration du site. </br>
	Elle débute par une page de connexion demandant un login et un mot de passe. </br>
	Une fois la connexion validée, l'administrateur pourra :</br>
	Modifier le texte de sa page d'accueil (BDD ou fichier texte), </br>
	Saisir ou supprimer un événement ou news ou blog, </br>
	Uploader ou supprimer des photos à afficher dans l'album photo</br>

	<h4>Développement</h4>
	Le développement de cette partie du site sera réalisée en php. </br>
	Les paramètres de connexion seront stockés en BDD, un utilisateur sera reconnu à chaque connexion après s'être connecté une fois la durée de la session.</br>
	Le texte de la page d'accueil sera stocké dans un fichier ou en BDD selon votre choix.</br>
	Les événements, news, blog seront stockés en BDD.</br>
	Les photos seront stockées dans un répertoire 'Photos'.</br>


</div>



<div id="toMove">
	At nunc si ad aliquem bene nummatum tumentemque ideo honestus advena salutatum introieris, primitus tamquam exoptatus suscipieris et interrogatus multa coactusque mentiri, miraberis numquam antea visus summatem virum tenuem te sic enixius observantem, ut paeniteat ob haec bona tamquam praecipua non vidisse ante decennium Romam.

	Sed (saepe enim redeo ad Scipionem, cuius omnis sermo erat de amicitia) querebatur, quod omnibus in rebus homines diligentiores essent; capras et oves quot quisque haberet, dicere posse, amicos quot haberet, non posse dicere et in illis quidem parandis adhibere curam, in amicis eligendis neglegentis esse nec habere quasi signa quaedam et notas, quibus eos qui ad amicitias essent idonei, iudicarent. Sunt igitur firmi et stabiles et constantes eligendi; cuius generis est magna penuria. Et iudicare difficile est sane nisi expertum; experiendum autem est in ipsa amicitia. Ita praecurrit amicitia iudicium tollitque experiendi potestatem.

	Accedebant enim eius asperitati, ubi inminuta vel laesa amplitudo imperii dicebatur, et iracundae suspicionum quantitati proximorum cruentae blanditiae exaggerantium incidentia et dolere inpendio simulantium, si principis periclitetur vita, a cuius salute velut filo pendere statum orbis terrarum fictis vocibus exclamabant.

</div>

