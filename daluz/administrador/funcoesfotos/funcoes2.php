<?php
    function verifica_image2($img2)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img2["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image2($img)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img2["name"], $ext2);
        return ($ext2[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image2($img2, $max_x2, $max_y2)
    {
        $dimensaoImage2 = getimagesize($img2["tmp_name"]);
        $dimensao2 = '';
        // Verifica largura
        if($dimensaoImage2[0] > $dimensaoImage2[1])
        {
            if($dimensaoImage2[0] > $max_x2)
            {
                $dimensao2 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage2[0] < $dimensaoImage2[1])
            {
                if($dimensaoImage2[1] > $max_x2)
                {
                    $dimensao2 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage2[0] == $dimensaoImage2[1])
                {
                    if($dimensaoImage2[0] > $max_x2)
                    {
                        $dimensao2 = 'largura';
                    }
                }
            }
        }
        return ($dimensao2);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem2($img2, $max_x2, $max_y2, $nome_foto2) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width2, $height2) = getimagesize($img2);
        $original_x2 = $width2;
        $original_y2 = $height2;
        // se a largura for maior que altura
        if($original_x2 > $original_y2) {
               $porcentagem2 = (100 * $max_x2) / $original_x2;      
        } 
        else {
               $porcentagem2 = (100 * $max_y2) / $original_y2;
        }
        $tamanho_x2 = $original_x2 * ($porcentagem2 / 100);
        $tamanho_y2 = $original_y2 * ($porcentagem2 / 100);
        $image_p2 = imagecreatetruecolor($tamanho_x2, $tamanho_y2);
        $image2   = imagecreatefromjpeg($img2);
        imagecopyresampled($image_p2, $image2, 0, 0, 0, 0, $tamanho_x2, $tamanho_y2, $width2, $height2);
        return imagejpeg($image_p2, $nome_foto2, 100);
    }//fim reduz_imagem
?>
