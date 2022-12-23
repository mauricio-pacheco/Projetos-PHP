<?php
    function verifica_image7($img7)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img7["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image7($img7)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img7["name"], $ext7);
        return ($ext7[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image7($img7, $max_x7, $max_y7)
    {
        $dimensaoImage7 = getimagesize($img7["tmp_name"]);
        $dimensao7 = '';
        // Verifica largura
        if($dimensaoImage7[0] > $dimensaoImage7[1])
        {
            if($dimensaoImage7[0] > $max_x7)
            {
                $dimensao7 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage7[0] < $dimensaoImage7[1])
            {
                if($dimensaoImage7[1] > $max_x7)
                {
                    $dimensao7 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage7[0] == $dimensaoImage7[1])
                {
                    if($dimensaoImage7[0] > $max_x7)
                    {
                        $dimensao7 = 'largura';
                    }
                }
            }
        }
        return ($dimensao7);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem7($img7, $max_x7, $max_y7, $nome_foto7) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width7, $height7) = getimagesize($img7);
        $original_x7 = $width7;
        $original_y7 = $height7;
        // se a largura for maior que altura
        if($original_x7 > $original_y7) {
               $porcentagem7 = (100 * $max_x7) / $original_x7;      
        } 
        else {
               $porcentagem7 = (100 * $max_y7) / $original_y7;
        }
        $tamanho_x7 = $original_x7 * ($porcentagem7 / 100);
        $tamanho_y7 = $original_y7 * ($porcentagem7 / 100);
        $image_p7 = imagecreatetruecolor($tamanho_x7, $tamanho_y7);
        $image7   = imagecreatefromjpeg($img7);
        imagecopyresampled($image_p7, $image7, 0, 0, 0, 0, $tamanho_x7, $tamanho_y7, $width7, $height7);
        return imagejpeg($image_p7, $nome_foto7, 100);
    }//fim reduz_imagem
?>
