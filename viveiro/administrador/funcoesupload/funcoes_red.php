<?php
//########################  Funчуo para imagem JPG ###########################
    function reduz_imagem_jpg($img, $max_x, $max_y, $nome_foto) {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width, $height) = getimagesize($img);
        
        $original_x = $width;
        $original_y = $height;
        
        // se a largura for maior que altura
        if($original_x > $original_y) {
            $porcentagem = (100 * $max_x) / $original_x;
            } else {
                $porcentagem = (100 * $max_y) / $original_y;
        }
        
        $tamanho_x = $original_x * ($porcentagem / 100);
        $tamanho_y = $original_y * ($porcentagem / 100);
        
        $image_p = imagecreatetruecolor($tamanho_x, $tamanho_y);
        $image   = imagecreatefromjpeg($img);
        
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $tamanho_x, $tamanho_y, $width, $height);
        
        return imagejpeg($image_p, $nome_foto, 100);
    }
    

//########################  Funчуo para imagem GIF ###########################
    
    function reduz_imagem_gif($img, $max_x, $max_y, $nome_foto) {
        
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width, $height) = getimagesize($img);
        
        $original_x = $width;
        $original_y = $height;
        
        // se a largura for maior que altura
        if($original_x > $original_y) {
            $porcentagem = (100 * $max_x) / $original_x;
            } else {
                $porcentagem = (100 * $max_y) / $original_y;
        }
        
        $tamanho_x = $original_x * ($porcentagem / 100);
        $tamanho_y = $original_y * ($porcentagem / 100);
        
        $image_p = imagecreatetruecolor($tamanho_x, $tamanho_y);
        $image   = imagecreatefromgif($img);
        
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $tamanho_x, $tamanho_y, $width, $height);
        
        return imagegif($image_p, $nome_foto, 100);
    }
    
    

//########################  Funчуo para imagem PNG ###########################
    
	function reduz_imagem_png($img, $max_x, $max_y, $nome_foto) {
	list($width, $height) = getimagesize($img);
		$original_x = $width;
		$original_y = $height;
	
		if($original_x > $original_y) {
			$porcentagem = (100 * $max_x) / $original_x;
		} else {
			$porcentagem = (100 * $max_y) / $original_y;
		}
		$tamanho_x = $original_x * ($porcentagem / 100);
		$tamanho_y = $original_y * ($porcentagem / 100);
	
		$image_p = imagecreatetruecolor($tamanho_x, $tamanho_y);
	
		imagesavealpha($image_p, true);
	
		$tranparente = imagecolorallocatealpha($image_p, 0, 0, 0, 127);
		imagefill($image_p, 0, 0, $tranparente);
	
		$image   = imagecreatefrompng($img);
	
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $tamanho_x, $tamanho_y, $width, $height);

 	    return imagepng($image_p, $nome_foto, 9);
	}
?>