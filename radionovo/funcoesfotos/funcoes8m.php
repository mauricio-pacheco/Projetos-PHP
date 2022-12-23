<?php
    function verifica_image8m($img8m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img8m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image8m($img8m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img8m["name"], $ext8m);
        return ($ext8m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image8m($img8m, $max_x8m, $max_y8m)
    {
        $dimensaoImage8m = getimagesize($img8m["tmp_name"]);
        $dimensao8m = '';
        // Verifica largura
        if($dimensaoImage8m[0] > $dimensaoImage8m[1])
        {
            if($dimensaoImage8m[0] > $max_x8m)
            {
                $dimensao8m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage8m[0] < $dimensaoImage8m[1])
            {
                if($dimensaoImage8m[1] > $max_x8m)
                {
                    $dimensao8m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage8m[0] == $dimensaoImage8m[1])
                {
                    if($dimensaoImage8m[0] > $max_x8m)
                    {
                        $dimensao8m = 'largura';
                    }
                }
            }
        }
        return ($dimensao8m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem8m($img8m, $max_x8m, $max_y8m, $nome_foto8m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width8m, $height8m) = getimagesize($img8m);
        $original_x8m = $width8m;
        $original_y8m = $height8m;
        // se a largura for maior que altura
        if($original_x8m > $original_y8m) {
               $porcentagem8m = (100 * $max_x8m) / $original_x8m;      
        } 
        else {
               $porcentagem8m = (100 * $max_y8m) / $original_y8m;
        }
        $tamanho_x8m = $original_x8m * ($porcentagem8m / 100);
        $tamanho_y8m = $original_y8m * ($porcentagem8m / 100);
        $image_p8m = imagecreatetruecolor($tamanho_x8m, $tamanho_y8m);
        $image8m   = imagecreatefromjpeg($img8m);
        imagecopyresampled($image_p8m, $image8m, 0, 0, 0, 0, $tamanho_x8m, $tamanho_y8m, $width8m, $height8m);
        return imagejpeg($image_p8m, $nome_foto8m, 100);
    }//fim reduz_imagem
?>
