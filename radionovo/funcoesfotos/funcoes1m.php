<?php
    function verifica_image1m($img1m)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img1m["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image1m($img1m)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img1m["name"], $ext1m);
        return ($ext1m[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image1m($img1m, $max_x1m, $max_y1m)
    {
        $dimensaoImage1m = getimagesize($img1m["tmp_name"]);
        $dimensao1m = '';
        // Verifica largura
        if($dimensaoImage1m[0] > $dimensaoImage1m[1])
        {
            if($dimensaoImage1m[0] > $max_x1m)
            {
                $dimensao1m = 'largura';
            }
        }
        else
        {
            if($dimensaoImage1m[0] < $dimensaoImage1m[1])
            {
                if($dimensaoImage1m[1] > $max_x1m)
                {
                    $dimensao1m = 'altura';
                }
            }
            else
            {
                if($dimensaoImage1m[0] == $dimensaoImage1m[1])
                {
                    if($dimensaoImage1m[0] > $max_x1m)
                    {
                        $dimensao1m = 'largura';
                    }
                }
            }
        }
        return ($dimensao1m);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem1m($img1m, $max_x1m, $max_y1m, $nome_foto1m) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width1m, $height1m) = getimagesize($img1m);
        $original_x1m = $width1m;
        $original_y1m = $height1m;
        // se a largura for maior que altura
        if($original_x1m > $original_y1m) {
               $porcentagem1m = (100 * $max_x1m) / $original_x1m;      
        } 
        else {
               $porcentagem1m = (100 * $max_y1m) / $original_y1m;
        }
        $tamanho_x1m = $original_x1m * ($porcentagem1m / 100);
        $tamanho_y1m = $original_y1m * ($porcentagem1m / 100);
        $image_p1m = imagecreatetruecolor($tamanho_x1m, $tamanho_y1m);
        $image1m   = imagecreatefromjpeg($img1m);
        imagecopyresampled($image_p1m, $image1m, 0, 0, 0, 0, $tamanho_x1m, $tamanho_y1m, $width1m, $height1m);
        return imagejpeg($image_p1m, $nome_foto1m, 100);
    }//fim reduz_imagem
?>
