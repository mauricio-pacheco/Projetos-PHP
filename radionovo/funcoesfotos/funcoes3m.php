<?php
    function verifica_image3m($img3m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img3m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image3m($img3m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img3m["name"], $ext3m);
        return ($ext3m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image3m($img3m, $max_x3m, $max_y3m)
    {
        $dimensaoImage3m = getimagesize($img3m["tmp_name"]);
        $dimensao3m = '';
        // Verifica largura
        if($dimensaoImage3m[0] > $dimensaoImage3m[1])
        {
            if($dimensaoImage3m[0] > $max_x3m)
            {
                $dimensao3m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage3m[0] < $dimensaoImage3m[1])
            {
                if($dimensaoImage3m[1] > $max_x3m)
                {
                    $dimensao3m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage3m[0] == $dimensaoImage3m[1])
                {
                    if($dimensaoImage3m[0] > $max_x3m)
                    {
                        $dimensao3m = 'largura';
                    }
                }
            }
        }
        return ($dimensao3m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem3m($img3m, $max_x3m, $max_y3m, $nome_foto3m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width3m, $height3m) = getimagesize($img3m);
        $original_x3m = $width3m;
        $original_y3m = $height3m;
        // se a largura for maior que altura
        if($original_x3m > $original_y3m) {
               $porcentagem3m = (100 * $max_x3m) / $original_x3m;      
        } 
        else {
               $porcentagem3m = (100 * $max_y3m) / $original_y3m;
        }
        $tamanho_x3m = $original_x3m * ($porcentagem3m / 100);
        $tamanho_y3m = $original_y3m * ($porcentagem3m / 100);
        $image_p3m = imagecreatetruecolor($tamanho_x3m, $tamanho_y3m);
        $image3m   = imagecreatefromjpeg($img3m);
        imagecopyresampled($image_p3m, $image3m, 0, 0, 0, 0, $tamanho_x3m, $tamanho_y3m, $width3m, $height3m);
        return imagejpeg($image_p3m, $nome_foto3m, 100);
    }//fim reduz_imagem
?>
