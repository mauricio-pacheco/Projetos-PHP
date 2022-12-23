<?php
    function verifica_image9($img9)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img9["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image9($img9)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img9["name"], $ext9);
        return ($ext9[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image9($img9, $max_x9, $max_y9)
    {
        $dimensaoImage9 = getimagesize($img9["tmp_name"]);
        $dimensao9 = '';
        // Verifica largura
        if($dimensaoImage9[0] > $dimensaoImage9[1])
        {
            if($dimensaoImage9[0] > $max_x9)
            {
                $dimensao9 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage9[0] < $dimensaoImage9[1])
            {
                if($dimensaoImage9[1] > $max_x9)
                {
                    $dimensao9 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage9[0] == $dimensaoImage9[1])
                {
                    if($dimensaoImage9[0] > $max_x9)
                    {
                        $dimensao9 = 'largura';
                    }
                }
            }
        }
        return ($dimensao9);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem9($img9, $max_x9, $max_y9, $nome_foto9) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width9, $height9) = getimagesize($img9);
        $original_x9 = $width9;
        $original_y9 = $height9;
        // se a largura for maior que altura
        if($original_x9 > $original_y9) {
               $porcentagem9 = (100 * $max_x9) / $original_x9;      
        } 
        else {
               $porcentagem9 = (100 * $max_y9) / $original_y9;
        }
        $tamanho_x9 = $original_x9 * ($porcentagem9 / 100);
        $tamanho_y9 = $original_y9 * ($porcentagem9 / 100);
        $image_p9 = imagecreatetruecolor($tamanho_x9, $tamanho_y9);
        $image9   = imagecreatefromjpeg($img9);
        imagecopyresampled($image_p9, $image9, 0, 0, 0, 0, $tamanho_x9, $tamanho_y9, $width9, $height9);
        return imagejpeg($image_p9, $nome_foto9, 100);
    }//fim reduz_imagem
?>
