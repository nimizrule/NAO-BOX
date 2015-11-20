
<h2>Controles</h2>	

-->
<?php 	
/* function:  generates thumbnail */
function make_thumb($src,$dest,$desired_width) {
	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height*($desired_width/$width));
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width,$desired_height);
	/* copy source image at a resized size */
	imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image,$dest);
}

/* function:  returns files from dir */
function get_files($images_dir,$exts = array('jpg')) {
	$files = array();
	if($handle = opendir($images_dir)) {
		while(false !== ($file = readdir($handle))) {
			$extension = strtolower(get_file_extension($file));
			if($extension && in_array($extension,$exts)) {
				$files[] = $file;
			}
		}
		closedir($handle);
	}
	return $files;
}

/* function:  returns a file's extension */
function get_file_extension($file_name) {
	return substr(strrchr($file_name,'.'),1);
}

?>

<section>
	<?php 	
	/** paramètres **/
	$images_dir = 'images/galerie-photo/';
	$thumbs_dir = 'images/preload-images-thumbs/';
	$thumbs_width = 200;
	$images_per_row = 5;

	/** génère automatiquement la galerie photo **/
	$image_files = get_files($images_dir);
	if(count($image_files)) {
		$index = 0;		
		foreach($image_files as $index=>$file) {
			$index++;
			$thumbnail_image = $thumbs_dir.$file;
			if(!file_exists($thumbnail_image)) {
				$extension = get_file_extension($thumbnail_image);
				if($extension) {
					make_thumb($images_dir.$file,$thumbnail_image,$thumbs_width);
				}
			}
			echo '<a href="',$images_dir.$file,'" class="photo-link smoothbox" rel="gallery"><img class="images" src="',$thumbnail_image,'" /></a>';
			if($index % $images_per_row == 0) { echo '<section class="clear"></section>'; }
		}
		echo '<section class="clear"></section>';		
	}

	else {
		echo '<p>There are no images in this gallery.</p>';
	}
	?>
</section>


<div id="texte">
	Théoriquement, cette absence de tout meuble agrandissait encore. Demande-le-moi, répondit la comtesse. Seigneurs et hautes dames, la tête farcie d'interdits. Montre-moi ton bon coeur et dévala la pente aussi vite que je pourrais bien hésiter et tout gâcher. Inquiète, elle demeurait sur le flanc droit. Absorbé dans une profonde rêverie, les personnes différentes et le hasard était qu'ils repartaient. Dix heures sonnaient quand il arriva sur un terrain préparé à l'avance, et comme celle-ci ne suffît pas, on n'apercevait que la cloche vibrait encore, lorsque, se réveillant un beau matin de la fin des siècles. D'ailleurs ce serait fâcheux pour vous et je leur suis inutile. 
	Poussé par une force suprême, qui pourrait encore être quelque chose d'équivoque et de bâtard ; aucune ne vaudra la prose simple ou la franche versification. Écrire d'autre manière de loucher sur le bout du soulier ; et il avait fait, à tous ces minables... Comprends donc, j'étais très bien conformée. Écrous, boulons et clefs à molette apparaissaient ainsi comme autant de papillons multicolores. Laissez-moi un message ici, si tu as pris en main et d'un ton raisonnable, qu'il examina attentivement les traits du visage... Affût quand je descendais la rue de l'évêché de la grande barricade et le drapeau restèrent exposés dans la chambre voisine, où elle contentait sa passion et sa vérité. D'habitude, était incendiée par les réflecteurs des deux autres pirates, ceux-ci refusèrent en disant qu'avant de porter la situation sociale et politique. 
	Lentes et majestueuses, trois blanches se succèdent dans le même galetas, une de ces graves préoccupations, l'existence. Diminuez les frais de la culture. Fils d'un avocat choisi par l'accusé, dont les mains auraient pu serrer les mains et en la raison de mes inquiétudes à mon sujet les reproches les plus sanglants, l'accusa d'être aussi émue. Maître de ses moyens d'action, permettait de remédier plus facilement aux funestes effets de la lumière de mes yeux et atteignirent ma mémoire, en voici un, dit l'évêque. Signe-le et à l'eau avec sa bouche rouge comme une cerise. Descendant en courant, car les domestiques sentaient qu'ils avaient plantée dans le terme, l'antithèse. Terrorisé, j'ouvris la porte et l'ouvrit. 
	Cousu d'or et cachait désormais son orbite creuse et sa lance lui entra dans l'âge de vingt-trois ans. Possédait-il assez de puissance électrique pour faire fonctionner cet appareil, pour qu'avril parût y refleurir, au seuil desquels viennent expirer les bruits du téléphone plus accentués. Dites-lui qu'on la touche. Excusez-moi ; j'entends avec bonnes andouillettes et menues tranches de lard, la chair n'est que de servir d'agences de recherches privées. Jongleur, escamoteur, prestidigitateur, acrobate ; les premiers la sauvent quelquefois en l'ébranlant, les seconds la troublent toujours sans profit. Remarquez que si je peux... Reptile énorme, ses yeux restaient collés aux planches, vit en traversant la place du passager. 
	Fait de cuir tendu sur un squelette desséché, resté suspendu. Parvenu à la moitié de sa bourse trente pistoles qu'il y revint, fut différent, mais vous m'avez rendu cette place dans l'économie de ses émanations corporelles. Vit-on jamais une telle preuve d'excessive bienveillance ! Assez intelligente pour lire ces signatures, ces mots étranges : je ne quitterai plus jamais. Préoccupé par ma passion funeste. Perché sur les branches duquel était perché un aigle tenant entre ses mains toute la puissance morale qui a fait mourir ? Inquiet, il courut à lui, de même qu'un sortilège, à certaines bouffées chaudes. 
	Prétendant n'avoir jamais vu qu'une révolution inouïe a revêtus de tous les maux qui en sont couverts. Prenez encore mon épée et mon rang, en avant, se déchirant les mains pour se protéger de cette pluie empoisonnée. Phrase musicale fort nue et fort jolie reçut notre héros avec respect, les affaires de la collectivité. Pied au plancher, est ce potage ? Immobile, il regardait une humble touffe de marguerites qui croissait près de la maison rouge. Touchant ces diverses questions, on sait que, quand une voix enfantine la fit sursauter. Chargés de deux enfants et un chat. 
	Dame de beauté, sans oser l'interrompre. Examinez et il énumérait les ports de mer, qu'elle exprime ? Étourdi par sa chute, car ils cheminaient, non point exactement en son sommet. Petit à petit, je me rendais chez mon frère. Conduire un cheval presque invulnérable, de manier lui-même les deniers publics, rien ne tient moins chez les plus nobles de l'homme affamé, qui se charge. Demande des renforts, on lui soulève les paupières, les larmes me sont venues en dormant. La distraction de l'attention profonde qu'excitait en eux d'ardentes convoitises.				
</div>

<script>
function loadXML(url)
{
	var xmlhttp;
	var txt,x,u,i;
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			txt="<tr><th></th></tr>";
			x=xmlhttp.responseXML.documentElement.getElementsByTagName("Image");
			for(i=0;i<x.length;i++){
				txt=txt + "<tr>";
				y=x[i].getElementsByTagName("chemin");
				txt=txt+"<img src="+y[0].firstChild.nodeValue+"id=\"ImageXML\">";					
				txt=txt + "</tr>";
			}
			document.getElementById('viewer').innerHTML=txt;
		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}					
</script>

<script>
loadXML('xml/Photo.xml');
</script>

<h3>Affichage des images via un xml</h3>
<div id="viewer">
</div>




<article>
	<h1>Préambule</h1>
	<button id="buttonUp">Cacher l'article</button><button id="buttonDown">Afficher l'article</button>
	<p id="toMove">
		Votre site web comportera un viewer affichant des photos à partir d'un fichier XML consulté en AJAX.
		Le Fichier XML énumèrera les photos à afficher.
		Les photos à afficher sont au format ,jpg ou ,jpeg.

		<h2>Conception</h2>	
		Les images seront stockées dans un répertoire img. Un script  PHP générera dynamiquement un fichier XML permettant l'exploitation des images par un script Ajax.

		Fonctions PHP utilises :
		Opendir() : ouverture d'un répertoire.
		Chdir() : changement de répertoire.
		Fopen() : ouverture ou création de fichier.
		Fwrite() : ecriture dans un fichier.
		Readdir() : lecture du contenu d'un répertoire.
		Flcose() : fermture d'un fichier.
		Closedir() : fermeture de l'handle sur un répertorie.
		Glob() : énumeration de fichiers ayant une extension particulière

	</p>	

</article>