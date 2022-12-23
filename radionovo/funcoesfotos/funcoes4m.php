<?php
    function verifica_image4m($img4m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img4m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image4m($img4m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img4m["name"], $ext4m);
        return ($ext4m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image4m($img4m, $max_x4m, $max_y4m)
    {
        $dimensaoImage4m = getimagesize($img4m["tmp_name"]);
        $dimensao4m = '';
        // Verifica largura
        if($dimensaoImage4m[0] > $dimensaoImage4m[1])
        {
            if($dimensaoImage4m[0] > $max_x4m)
            {
                $dimensao4m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage4m[0] < $dimensaoImage4m[1])
            {
                if($dimensaoImage4m[1] > $max_x4m)
                {
                    $dimensao4m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage4m[0] == $dimensaoImage4m[1])
                {
                    if($dimensaoImage4m[0] > $max_x4m)
                    {
                        $dimensao4m = 'largura';
                    }
                }
            }
        }
        return ($dimensao4m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem4m($img4m, $max_x4m, $max_y4m, $nome_foto4m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width4m, $height4m) = getimagesize($img4m);
        $original_x4m = $width4m;
        $original_y4m = $height4m;
        // se a largura for maior que altura
        if($original_x4m > $original_y4m) {
               $porcentagem4m = (100 * $max_x4m) / $original_x4m;      
        } 
        else {
               $porcentagem4m = (100 * $max_y4m) / $original_y4m;
        }
        $tamanho_x4m = $original_x4m * ($porcentagem4m / 100);
        $tamanho_y4m = $original_y4m * ($porcentagem4m / 100);
        $image_p4m = imagecreatetruecolor($tamanho_x4m, $tamanho_y4m);
        $image4m   = imagecreatefromjpeg($img4m);
        imagecopyresampled($image_p4m, $image4m, 0, 0, 0, 0, $tamanho_x4m, $tamanho_y4m, $width4m, $height4m);
        return imagejpeg($image_p4m, $nome_foto4m, 100);
    }//fim reduz_imagem
?>
