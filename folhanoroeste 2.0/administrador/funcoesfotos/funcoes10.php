<?php
    function verifica_image10($img10)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img10["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image10($img10)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img10["name"], $ext10);
        return ($ext10[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image10($img10, $max_x10, $max_y10)
    {
        $dimensaoImage10 = getimagesize($img10["tmp_name"]);
        $dimensao10 = '';
        // Verifica largura
        if($dimensaoImage10[0] > $dimensaoImage10[1])
        {
            if($dimensaoImage10[0] > $max_x10)
            {
                $dimensao10 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage10[0] < $dimensaoImage10[1])
            {
                if($dimensaoImage10[1] > $max_x10)
                {
                    $dimensao10 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage10[0] == $dimensaoImage10[1])
                {
                    if($dimensaoImage10[0] > $max_x10)
                    {
                        $dimensao10 = 'largura';
                    }
                }
            }
        }
        return ($dimensao10);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem10($img10, $max_x10, $max_y10, $nome_foto10) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width10, $height10) = getimagesize($img10);
        $original_x10 = $width10;
        $original_y10 = $height10;
        // se a largura for maior que altura
        if($original_x10 > $original_y10) {
               $porcentagem10 = (100 * $max_x10) / $original_x10;      
        } 
        else {
               $porcentagem10 = (100 * $max_y10) / $original_y10;
        }
        $tamanho_x10 = $original_x10 * ($porcentagem10 / 100);
        $tamanho_y10 = $original_y10 * ($porcentagem10 / 100);
        $image_p10 = imagecreatetruecolor($tamanho_x10, $tamanho_y10);
        $image10   = imagecreatefromjpeg($img10);
        imagecopyresampled($image_p10, $image10, 0, 0, 0, 0, $tamanho_x10, $tamanho_y10, $width10, $height10);
        return imagejpeg($image_p10, $nome_foto10, 100);
    }//fim reduz_imagem
?>
