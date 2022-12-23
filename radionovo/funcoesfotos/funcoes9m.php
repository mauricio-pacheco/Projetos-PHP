<?php
    function verifica_image9m($img9m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img9m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image9m($img9m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img9m["name"], $ext9m);
        return ($ext9m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image9m($img9m, $max_x9m, $max_y9m)
    {
        $dimensaoImage9m = getimagesize($img9m["tmp_name"]);
        $dimensao9m = '';
        // Verifica largura
        if($dimensaoImage9m[0] > $dimensaoImage9m[1])
        {
            if($dimensaoImage9m[0] > $max_x9m)
            {
                $dimensao9m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage9m[0] < $dimensaoImage9m[1])
            {
                if($dimensaoImage9m[1] > $max_x9m)
                {
                    $dimensao9m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage9m[0] == $dimensaoImage9m[1])
                {
                    if($dimensaoImage9m[0] > $max_x9m)
                    {
                        $dimensao9m = 'largura';
                    }
                }
            }
        }
        return ($dimensao9m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem9m($img9m, $max_x9m, $max_y9m, $nome_foto9m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width9m, $height9m) = getimagesize($img9m);
        $original_x9m = $width9m;
        $original_y9m = $height9m;
        // se a largura for maior que altura
        if($original_x9m > $original_y9m) {
               $porcentagem9m = (100 * $max_x9m) / $original_x9m;      
        } 
        else {
               $porcentagem9m = (100 * $max_y9m) / $original_y9m;
        }
        $tamanho_x9m = $original_x9m * ($porcentagem9m / 100);
        $tamanho_y9m = $original_y9m * ($porcentagem9m / 100);
        $image_p9m = imagecreatetruecolor($tamanho_x9m, $tamanho_y9m);
        $image9m   = imagecreatefromjpeg($img9m);
        imagecopyresampled($image_p9m, $image9m, 0, 0, 0, 0, $tamanho_x9m, $tamanho_y9m, $width9m, $height9m);
        return imagejpeg($image_p9m, $nome_foto9m, 100);
    }//fim reduz_imagem
?>
