
<h2>Controles Action</h2>	

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
	$images_dir = 'images/galerie-Action/';
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

