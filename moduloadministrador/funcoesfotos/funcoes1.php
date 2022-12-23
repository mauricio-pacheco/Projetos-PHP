<?php
    function verifica_image1($img1)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img1["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image1($img)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img1["name"], $ext1);
        return ($ext1[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image1($img1, $max_x1, $max_y1)
    {
        $dimensaoImage1 = getimagesize($img1["tmp_name"]);
        $dimensao1 = '';
        // Verifica largura
        if($dimensaoImage1[0] > $dimensaoImage1[1])
        {
            if($dimensaoImage1[0] > $max_x1)
            {
                $dimensao1 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage1[0] < $dimensaoImage1[1])
            {
                if($dimensaoImage1[1] > $max_x1)
                {
                    $dimensao1 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage1[0] == $dimensaoImage1[1])
                {
                    if($dimensaoImage1[0] > $max_x1)
                    {
                        $dimensao1 = 'largura';
                    }
                }
            }
        }
        return ($dimensao1);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem1($img1, $max_x1, $max_y1, $nome_foto1) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width1, $height1) = getimagesize($img1);
        $original_x1 = $width1;
        $original_y1 = $height1;
        // se a largura for maior que altura
        if($original_x1 > $original_y1) {
               $porcentagem1 = (100 * $max_x1) / $original_x1;      
        } 
        else {
               $porcentagem1 = (100 * $max_y1) / $original_y1;
        }
        $tamanho_x1 = $original_x1 * ($porcentagem1 / 100);
        $tamanho_y1 = $original_y1 * ($porcentagem1 / 100);
        $image_p1 = imagecreatetruecolor($tamanho_x1, $tamanho_y1);
        $image1   = imagecreatefromjpeg($img1);
        imagecopyresampled($image_p1, $image1, 0, 0, 0, 0, $tamanho_x1, $tamanho_y1, $width1, $height1);
        return imagejpeg($image_p1, $nome_foto1, 100);
    }//fim reduz_imagem
?>
