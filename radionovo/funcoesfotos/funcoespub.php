<?php
    function verifica_imagepub($imgpub)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imgpub["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_imagepub($imgpub)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imgpub["name"], $extpub);
        return ($extpub[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_imagepub($imgpub, $max_xpub, $max_ypub)
    {
        $dimensaoImagepub = getimagesize($imgpub["tmp_name"]);
        $dimensaopub = '';
        // Verifica largura
        if($dimensaoImagepub[0] > $dimensaoImagepub[1])
        {
            if($dimensaoImagepub[0] > $max_xpub)
            {
                $dimensaopub = 'largura';
            }
        }
        else
        {
            if($dimensaoImagepub[0] < $dimensaoImagepub[1])
            {
                if($dimensaoImagepub[1] > $max_xpub)
                {
                    $dimensaopub = 'altura';
                }
            }
            else
            {
                if($dimensaoImagepub[0] == $dimensaoImagepub[1])
                {
                    if($dimensaoImagepub[0] > $max_xpub)
                    {
                        $dimensaopub = 'largura';
                    }
                }
            }
        }
        return ($dimensaopub);        
    }//fim verifica_dimensao_image
    
    function reduz_imagempub($imgpub, $max_xpub, $max_ypub, $nome_fotopub) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($widthpub, $heightpub) = getimagesize($imgpub);
        $original_xpub = $widthpub;
        $original_ypub = $heightpub;
        // se a largura for maior que altura
        if($original_xpub > $original_ypub) {
               $porcentagempub = (100 * $max_xpub) / $original_xpub;      
        } 
        else {
               $porcentagempub = (100 * $max_ypub) / $original_ypub;
        }
        $tamanho_xpub = $original_xpub * ($porcentagempub / 100);
        $tamanho_ypub = $original_ypub * ($porcentagempub / 100);
        $image_ppub = imagecreatetruecolor($tamanho_xpub, $tamanho_ypub);
        $imagepub   = imagecreatefromjpeg($imgpub);
        imagecopyresampled($image_ppub, $imagepub, 0, 0, 0, 0, $tamanho_xpub, $tamanho_ypub, $widthpub, $heightpub);
        return imagejpeg($image_ppub, $nome_fotopub, 100);
    }//fim reduz_imagem
?>
