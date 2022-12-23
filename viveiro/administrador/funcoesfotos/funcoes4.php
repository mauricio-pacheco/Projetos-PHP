<?php
    function verifica_image4($img4)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img4["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image4($img4)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img4["name"], $ext4);
        return ($ext4[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image4($img4, $max_x4, $max_y4)
    {
        $dimensaoImage4 = getimagesize($img4["tmp_name"]);
        $dimensao4 = '';
        // Verifica largura
        if($dimensaoImage4[0] > $dimensaoImage4[1])
        {
            if($dimensaoImage4[0] > $max_x4)
            {
                $dimensao4 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage4[0] < $dimensaoImage4[1])
            {
                if($dimensaoImage4[1] > $max_x4)
                {
                    $dimensao4 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage4[0] == $dimensaoImage4[1])
                {
                    if($dimensaoImage4[0] > $max_x4)
                    {
                        $dimensao4 = 'largura';
                    }
                }
            }
        }
        return ($dimensao4);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem4($img4, $max_x4, $max_y4, $nome_foto4) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width4, $height4) = getimagesize($img4);
        $original_x4 = $width4;
        $original_y4 = $height4;
        // se a largura for maior que altura
        if($original_x4 > $original_y4) {
               $porcentagem4 = (100 * $max_x4) / $original_x4;      
        } 
        else {
               $porcentagem4 = (100 * $max_y4) / $original_y4;
        }
        $tamanho_x4 = $original_x4 * ($porcentagem4 / 100);
        $tamanho_y4 = $original_y4 * ($porcentagem4 / 100);
        $image_p4 = imagecreatetruecolor($tamanho_x4, $tamanho_y4);
        $image4   = imagecreatefromjpeg($img4);
        imagecopyresampled($image_p4, $image4, 0, 0, 0, 0, $tamanho_x4, $tamanho_y4, $width4, $height4);
        return imagejpeg($image_p4, $nome_foto4, 100);
    }//fim reduz_imagem
?>
