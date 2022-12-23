<?php
    function verifica_image7m($img7m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img7m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image7m($img7m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img7m["name"], $ext7m);
        return ($ext7m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image7m($img7m, $max_x7m, $max_y7m)
    {
        $dimensaoImage7m = getimagesize($img7m["tmp_name"]);
        $dimensao7m = '';
        // Verifica largura
        if($dimensaoImage7m[0] > $dimensaoImage7m[1])
        {
            if($dimensaoImage7m[0] > $max_x7m)
            {
                $dimensao7m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage7m[0] < $dimensaoImage7m[1])
            {
                if($dimensaoImage7m[1] > $max_x7m)
                {
                    $dimensao7m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage7m[0] == $dimensaoImage7m[1])
                {
                    if($dimensaoImage7m[0] > $max_x7m)
                    {
                        $dimensao7m = 'largura';
                    }
                }
            }
        }
        return ($dimensao7m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem7m($img7m, $max_x7m, $max_y7m, $nome_foto7m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width7m, $height7m) = getimagesize($img7m);
        $original_x7m = $width7m;
        $original_y7m = $height7m;
        // se a largura for maior que altura
        if($original_x7m > $original_y7m) {
               $porcentagem7m = (100 * $max_x7m) / $original_x7m;      
        } 
        else {
               $porcentagem7m = (100 * $max_y7m) / $original_y7m;
        }
        $tamanho_x7m = $original_x7m * ($porcentagem7m / 100);
        $tamanho_y7m = $original_y7m * ($porcentagem7m / 100);
        $image_p7m = imagecreatetruecolor($tamanho_x7m, $tamanho_y7m);
        $image7m   = imagecreatefromjpeg($img7m);
        imagecopyresampled($image_p7m, $image7m, 0, 0, 0, 0, $tamanho_x7m, $tamanho_y7m, $width7m, $height7m);
        return imagejpeg($image_p7m, $nome_foto7m, 100);
    }//fim reduz_imagem
?>
