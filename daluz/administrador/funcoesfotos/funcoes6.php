<?php
    function verifica_image6($img6)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img6["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image6($img6)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img6["name"], $ext6);
        return ($ext6[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image6($img6, $max_x6, $max_y6)
    {
        $dimensaoImage6 = getimagesize($img6["tmp_name"]);
        $dimensao6 = '';
        // Verifica largura
        if($dimensaoImage6[0] > $dimensaoImage6[1])
        {
            if($dimensaoImage6[0] > $max_x6)
            {
                $dimensao6 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage6[0] < $dimensaoImage6[1])
            {
                if($dimensaoImage6[1] > $max_x6)
                {
                    $dimensao6 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage6[0] == $dimensaoImage6[1])
                {
                    if($dimensaoImage6[0] > $max_x6)
                    {
                        $dimensao6 = 'largura';
                    }
                }
            }
        }
        return ($dimensao6);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem6($img6, $max_x6, $max_y6, $nome_foto6) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width6, $height6) = getimagesize($img6);
        $original_x6 = $width6;
        $original_y6 = $height6;
        // se a largura for maior que altura
        if($original_x6 > $original_y6) {
               $porcentagem6 = (100 * $max_x6) / $original_x6;      
        } 
        else {
               $porcentagem6 = (100 * $max_y6) / $original_y6;
        }
        $tamanho_x6 = $original_x6 * ($porcentagem6 / 100);
        $tamanho_y6 = $original_y6 * ($porcentagem6 / 100);
        $image_p6 = imagecreatetruecolor($tamanho_x6, $tamanho_y6);
        $image6   = imagecreatefromjpeg($img6);
        imagecopyresampled($image_p6, $image6, 0, 0, 0, 0, $tamanho_x6, $tamanho_y6, $width6, $height6);
        return imagejpeg($image_p6, $nome_foto6, 100);
    }//fim reduz_imagem
?>
