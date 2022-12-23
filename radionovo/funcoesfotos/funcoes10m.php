<?php
    function verifica_image10m($img10m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img10m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image10m($img10m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img10m["name"], $ext10m);
        return ($ext10m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image10m($img10m, $max_x10m, $max_y10m)
    {
        $dimensaoImage10m = getimagesize($img10m["tmp_name"]);
        $dimensao10m = '';
        // Verifica largura
        if($dimensaoImage10m[0] > $dimensaoImage10m[1])
        {
            if($dimensaoImage10m[0] > $max_x10m)
            {
                $dimensao10m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage10m[0] < $dimensaoImage10m[1])
            {
                if($dimensaoImage10m[1] > $max_x10m)
                {
                    $dimensao10m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage10m[0] == $dimensaoImage10m[1])
                {
                    if($dimensaoImage10m[0] > $max_x10m)
                    {
                        $dimensao10m = 'largura';
                    }
                }
            }
        }
        return ($dimensao10m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem10m($img10m, $max_x10m, $max_y10m, $nome_foto10m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width10m, $height10m) = getimagesize($img10m);
        $original_x10m = $width10m;
        $original_y10m = $height10m;
        // se a largura for maior que altura
        if($original_x10m > $original_y10m) {
               $porcentagem10m = (100 * $max_x10m) / $original_x10m;      
        } 
        else {
               $porcentagem10m = (100 * $max_y10m) / $original_y10m;
        }
        $tamanho_x10m = $original_x10m * ($porcentagem10m / 100);
        $tamanho_y10m = $original_y10m * ($porcentagem10m / 100);
        $image_p10m = imagecreatetruecolor($tamanho_x10m, $tamanho_y10m);
        $image10m   = imagecreatefromjpeg($img10m);
        imagecopyresampled($image_p10m, $image10m, 0, 0, 0, 0, $tamanho_x10m, $tamanho_y10m, $width10m, $height10m);
        return imagejpeg($image_p10m, $nome_foto10m, 100);
    }//fim reduz_imagem
?>
