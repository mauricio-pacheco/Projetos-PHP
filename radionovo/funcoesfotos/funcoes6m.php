<?php
    function verifica_image6m($img6m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img6m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image6m($img6m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img6m["name"], $ext6m);
        return ($ext6m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image6m($img6m, $max_x6m, $max_y6m)
    {
        $dimensaoImage6m = getimagesize($img6m["tmp_name"]);
        $dimensao6m = '';
        // Verifica largura
        if($dimensaoImage6m[0] > $dimensaoImage6m[1])
        {
            if($dimensaoImage6m[0] > $max_x6m)
            {
                $dimensao6m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage6m[0] < $dimensaoImage6m[1])
            {
                if($dimensaoImage6m[1] > $max_x6m)
                {
                    $dimensao6m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage6m[0] == $dimensaoImage6m[1])
                {
                    if($dimensaoImage6m[0] > $max_x6m)
                    {
                        $dimensao6m = 'largura';
                    }
                }
            }
        }
        return ($dimensao6m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem6m($img6m, $max_x6m, $max_y6m, $nome_foto6m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width6m, $height6m) = getimagesize($img6m);
        $original_x6m = $width6m;
        $original_y6m = $height6m;
        // se a largura for maior que altura
        if($original_x6m > $original_y6m) {
               $porcentagem6m = (100 * $max_x6m) / $original_x6m;      
        } 
        else {
               $porcentagem6m = (100 * $max_y6m) / $original_y6m;
        }
        $tamanho_x6m = $original_x6m * ($porcentagem6m / 100);
        $tamanho_y6m = $original_y6m * ($porcentagem6m / 100);
        $image_p6m = imagecreatetruecolor($tamanho_x6m, $tamanho_y6m);
        $image6m   = imagecreatefromjpeg($img6m);
        imagecopyresampled($image_p6m, $image6m, 0, 0, 0, 0, $tamanho_x6m, $tamanho_y6m, $width6m, $height6m);
        return imagejpeg($image_p6m, $nome_foto6m, 100);
    }//fim reduz_imagem
?>
