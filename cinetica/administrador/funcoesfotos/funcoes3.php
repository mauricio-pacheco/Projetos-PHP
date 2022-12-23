<?php
    function verifica_image3($img3)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img3["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image3($img3)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img3["name"], $ext3);
        return ($ext3[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image3($img3, $max_x3, $max_y3)
    {
        $dimensaoImage3 = getimagesize($img3["tmp_name"]);
        $dimensao3 = '';
        // Verifica largura
        if($dimensaoImage3[0] > $dimensaoImage3[1])
        {
            if($dimensaoImage3[0] > $max_x3)
            {
                $dimensao3 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage3[0] < $dimensaoImage3[1])
            {
                if($dimensaoImage3[1] > $max_x3)
                {
                    $dimensao3 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage3[0] == $dimensaoImage3[1])
                {
                    if($dimensaoImage3[0] > $max_x3)
                    {
                        $dimensao3 = 'largura';
                    }
                }
            }
        }
        return ($dimensao3);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem3($img3, $max_x3, $max_y3, $nome_foto3) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width3, $height3) = getimagesize($img3);
        $original_x3 = $width3;
        $original_y3 = $height3;
        // se a largura for maior que altura
        if($original_x3 > $original_y3) {
               $porcentagem3 = (100 * $max_x3) / $original_x3;      
        } 
        else {
               $porcentagem3 = (100 * $max_y3) / $original_y3;
        }
        $tamanho_x3 = $original_x3 * ($porcentagem3 / 100);
        $tamanho_y3 = $original_y3 * ($porcentagem3 / 100);
        $image_p3 = imagecreatetruecolor($tamanho_x3, $tamanho_y3);
        $image3   = imagecreatefromjpeg($img3);
        imagecopyresampled($image_p3, $image3, 0, 0, 0, 0, $tamanho_x3, $tamanho_y3, $width3, $height3);
        return imagejpeg($image_p3, $nome_foto3, 100);
    }//fim reduz_imagem
?>
