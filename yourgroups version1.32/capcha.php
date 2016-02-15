<?php
session_start();


/*fonction qui génère un mot au hasard, mais qui peut se prononcer*/
function motHasard($n)
{
	$mot = '';
			
	$voyelles = array('a', 'e', 'i', 'o', 'u', 'ou', 'io','ou','ai');
	$consonnes = array('b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm','n', 'p', 'r', 's', 't', 'v', 'w',
		'br','bl', 'cr','ch', 'dr', 'fr', 'dr', 'fr', 'fl', 'gr','gl','pr','pl','ps','st','tr','vr');
                            
	$nbrVoyelles = count($voyelles);
	$nbrConsonnes = count($consonnes);
			
	for ($i = 0; $i<round($n/2) ; $i++)
	{
		$mot .= $consonnes[mt_rand(0,$nbrConsonnes)];
		$mot .= $voyelles[mt_rand(0,$nbrVoyelles)]; 
	}
	return substr($mot,0,$n);
}
		
/*fonction qui créé l'image qui sera utilisé pour le captcha, le mot est rentré en paramêtre*/
function image($mot)
{
	$size = 40;
	$marge = 5;
	
	$box = imagettfbbox($size, 0, 'police/actionj.ttf', $mot);
	$largeur = $box[2] - $box[0]; 
	$hauteur = $box[1] - $box[7];
	$largeur_lettre = round($largeur/strlen($mot));
	$font = 'police/actionj.ttf';
	
	// Flou Gaussien
	$matrix_blur = array(
		array(1,1,1),
		array(1,1,1),
		array(1,1,1));

	
	$img = imagecreate($largeur+$marge*2, $hauteur+$marge*2);
	$blanc = imagecolorallocate($img, 255, 255, 255); 
	$noir = imagecolorallocate($img, 0, 0, 0);
	$special_couleur = array (
								imagecolorallocate($img, 30, 140, 130),
								imagecolorallocate($img, 200, 14, 130),
								imagecolorallocate($img, 30, 140, 13),
								imagecolorallocate($img, 0, 140, 208),
								imagecolorallocate($img, 80, 180, 130),
								imagecolorallocate($img, 30, 255, 0));
	
	for($i = 0; $i < strlen($mot);$i++)
	{
		$l = $mot[$i];
		$angle = mt_rand(-35,35);//On génère un angle entre -35 et 35 degrés
		//On écrit et on place le texte dans l'image 
		imagettftext($img,$size,$angle,($i*$largeur_lettre)+$marge, $hauteur+mt_rand(0,$marge/2),$special_couleur[array_rand($special_couleur)], $font, $l);	
	}

	imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);//On réalise des barres aléatoires
	imageline($img, 2,mt_rand(2,$hauteur), $largeur+$marge, mt_rand(2,$hauteur), $noir);
	
	imageconvolution($img, $matrix_blur,9,0); // On applique la matrice, avec un diviseur 9
	imageconvolution($img, $matrix_blur,9,0);
	
    imagepng($img); //affiche l'image au format png
    imagedestroy($img); //libère toute la mémoire associé à l'image
}


function captcha()
{
    $mot = motHasard(6);
    $_SESSION['capcha'] = $mot;
    image($mot);
}

header("Content-type: image/png");
captcha();
?>