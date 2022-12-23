<?php
    function verifica_image8($img8)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img8["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image8($img8)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img8["name"], $ext8);
        return ($ext8[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image8($img8, $max_x8, $max_y8)
    {
        $dimensaoImage8 = getimagesize($img8["tmp_name"]);
        $dimensao8 = '';
        // Verifica largura
        if($dimensaoImage8[0] > $dimensaoImage8[1])
        {
            if($dimensaoImage8[0] > $max_x8)
            {
                $dimensao8 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage8[0] < $dimensaoImage8[1])
            {
                if($dimensaoImage8[1] > $max_x8)
                {
                    $dimensao8 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage8[0] == $dimensaoImage8[1])
                {
                    if($dimensaoImage8[0] > $max_x8)
                    {
                        $dimensao8 = 'largura';
                    }
                }
            }
        }
        return ($dimensao8);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem8($img8, $max_x8, $max_y8, $nome_foto8) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width8, $height8) = getimagesize($img8);
        $original_x8 = $width8;
        $original_y8 = $height8;
        // se a largura for maior que altura
        if($original_x8 > $original_y8) {
               $porcentagem8 = (100 * $max_x8) / $original_x8;      
        } 
        else {
               $porcentagem8 = (100 * $max_y8) / $original_y8;
        }
        $tamanho_x8 = $original_x8 * ($porcentagem8 / 100);
        $tamanho_y8 = $original_y8 * ($porcentagem8 / 100);
        $image_p8 = imagecreatetruecolor($tamanho_x8, $tamanho_y8);
        $image8   = imagecreatefromjpeg($img8);
        imagecopyresampled($image_p8, $image8, 0, 0, 0, 0, $tamanho_x8, $tamanho_y8, $width8, $height8);
        return imagejpeg($image_p8, $nome_foto8, 100);
    }//fim reduz_imagem
?>
