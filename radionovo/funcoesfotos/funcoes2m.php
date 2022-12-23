<?php
    function verifica_image2m($img2m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img2m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image2m($img2m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img2m["name"], $ext2m);
        return ($ext2m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image2m($img2m, $max_x2m, $max_y2m)
    {
        $dimensaoImage2m = getimagesize($img2m["tmp_name"]);
        $dimensao2m = '';
        // Verifica largura
        if($dimensaoImage2m[0] > $dimensaoImage2m[1])
        {
            if($dimensaoImage2m[0] > $max_x2m)
            {
                $dimensao2m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage2m[0] < $dimensaoImage2m[1])
            {
                if($dimensaoImage2m[1] > $max_x2m)
                {
                    $dimensao2m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage2m[0] == $dimensaoImage2m[1])
                {
                    if($dimensaoImage2m[0] > $max_x2m)
                    {
                        $dimensao2m = 'largura';
                    }
                }
            }
        }
        return ($dimensao2m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem2m($img2m, $max_x2m, $max_y2m, $nome_foto2m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width2m, $height2m) = getimagesize($img2m);
        $original_x2m = $width2m;
        $original_y2m = $height2m;
        // se a largura for maior que altura
        if($original_x2m > $original_y2m) {
               $porcentagem2m = (100 * $max_x2m) / $original_x2m;      
        } 
        else {
               $porcentagem2m = (100 * $max_y2m) / $original_y2m;
        }
        $tamanho_x2m = $original_x2m * ($porcentagem2m / 100);
        $tamanho_y2m = $original_y2m * ($porcentagem2m / 100);
        $image_p2m = imagecreatetruecolor($tamanho_x2m, $tamanho_y2m);
        $image2m   = imagecreatefromjpeg($img2m);
        imagecopyresampled($image_p2m, $image2m, 0, 0, 0, 0, $tamanho_x2m, $tamanho_y2m, $width2m, $height2m);
        return imagejpeg($image_p2m, $nome_foto2m, 100);
    }//fim reduz_imagem
?>
