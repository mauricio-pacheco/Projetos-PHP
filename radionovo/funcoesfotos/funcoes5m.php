<?php
    function verifica_image5m($img5m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img5m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image5m($img5m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img5m["name"], $ext5m);
        return ($ext5m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image5m($img5m, $max_x5m, $max_y5m)
    {
        $dimensaoImage5m = getimagesize($img5m["tmp_name"]);
        $dimensao5m = '';
        // Verifica largura
        if($dimensaoImage5m[0] > $dimensaoImage5m[1])
        {
            if($dimensaoImage5m[0] > $max_x5m)
            {
                $dimensao5m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage5m[0] < $dimensaoImage5m[1])
            {
                if($dimensaoImage5m[1] > $max_x5m)
                {
                    $dimensao5m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage5m[0] == $dimensaoImage5m[1])
                {
                    if($dimensaoImage5m[0] > $max_x5m)
                    {
                        $dimensao5m = 'largura';
                    }
                }
            }
        }
        return ($dimensao5m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem5m($img5m, $max_x5m, $max_y5m, $nome_foto5m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width5m, $height5m) = getimagesize($img5m);
        $original_x5m = $width5m;
        $original_y5m = $height5m;
        // se a largura for maior que altura
        if($original_x5m > $original_y5m) {
               $porcentagem5m = (100 * $max_x5m) / $original_x5m;      
        } 
        else {
               $porcentagem5m = (100 * $max_y5m) / $original_y5m;
        }
        $tamanho_x5m = $original_x5m * ($porcentagem5m / 100);
        $tamanho_y5m = $original_y5m * ($porcentagem5m / 100);
        $image_p5m = imagecreatetruecolor($tamanho_x5m, $tamanho_y5m);
        $image5m   = imagecreatefromjpeg($img5m);
        imagecopyresampled($image_p5m, $image5m, 0, 0, 0, 0, $tamanho_x5m, $tamanho_y5m, $width5m, $height5m);
        return imagejpeg($image_p5m, $nome_foto5m, 100);
    }//fim reduz_imagem
?>
