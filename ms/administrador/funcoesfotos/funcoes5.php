<?php
    function verifica_image5($img5)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img5["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image5($img5)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img5["name"], $ext5);
        return ($ext5[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image5($img5, $max_x5, $max_y5)
    {
        $dimensaoImage5 = getimagesize($img5["tmp_name"]);
        $dimensao5 = '';
        // Verifica largura
        if($dimensaoImage5[0] > $dimensaoImage5[1])
        {
            if($dimensaoImage5[0] > $max_x5)
            {
                $dimensao5 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage5[0] < $dimensaoImage5[1])
            {
                if($dimensaoImage5[1] > $max_x5)
                {
                    $dimensao5 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage5[0] == $dimensaoImage5[1])
                {
                    if($dimensaoImage5[0] > $max_x5)
                    {
                        $dimensao5 = 'largura';
                    }
                }
            }
        }
        return ($dimensao5);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem5($img5, $max_x5, $max_y5, $nome_foto5) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width5, $height5) = getimagesize($img5);
        $original_x5 = $width5;
        $original_y5 = $height5;
        // se a largura for maior que altura
        if($original_x5 > $original_y5) {
               $porcentagem5 = (100 * $max_x5) / $original_x5;      
        } 
        else {
               $porcentagem5 = (100 * $max_y5) / $original_y5;
        }
        $tamanho_x5 = $original_x5 * ($porcentagem5 / 100);
        $tamanho_y5 = $original_y5 * ($porcentagem5 / 100);
        $image_p5 = imagecreatetruecolor($tamanho_x5, $tamanho_y5);
        $image5   = imagecreatefromjpeg($img5);
        imagecopyresampled($image_p5, $image5, 0, 0, 0, 0, $tamanho_x5, $tamanho_y5, $width5, $height5);
        return imagejpeg($image_p5, $nome_foto5, 100);
    }//fim reduz_imagem
?>
