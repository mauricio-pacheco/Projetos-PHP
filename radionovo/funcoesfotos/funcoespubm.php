<?php
    function verifica_imagepubm($imgpubm)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imgpubm["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_imagepubm($imgpubm)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imgpubm["name"], $extpubm);
        return ($extpubm[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_imagepubm($imgpubm, $max_xpubm, $max_ypubm)
    {
        $dimensaoImagepubm = getimagesize($imgpubm["tmp_name"]);
        $dimensaopubm = '';
        // Verifica largura
        if($dimensaoImagepubm[0] > $dimensaoImagepubm[1])
        {
            if($dimensaoImagepubm[0] > $max_xpubm)
            {
                $dimensaopubm = 'largura';
            }
        }
        else
        {
            if($dimensaoImagepubm[0] < $dimensaoImagepubm[1])
            {
                if($dimensaoImagepubm[1] > $max_xpubm)
                {
                    $dimensaopubm = 'altura';
                }
            }
            else
            {
                if($dimensaoImagepubm[0] == $dimensaoImagepubm[1])
                {
                    if($dimensaoImagepubm[0] > $max_xpubm)
                    {
                        $dimensaopubm = 'largura';
                    }
                }
            }
        }
        return ($dimensaopubm);        
    }//fim verifica_dimensao_image
    
    function reduz_imagempubm($imgpubm, $max_xpubm, $max_ypubm, $nome_fotopubm) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($widthpubm, $heightpubm) = getimagesize($imgpubm);
        $original_xpubm = $widthpubm;
        $original_ypubm = $heightpubm;
        // se a largura for maior que altura
        if($original_xpubm > $original_ypubm) {
               $porcentagempubm = (100 * $max_xpubm) / $original_xpubm;      
        } 
        else {
               $porcentagempubm = (100 * $max_ypubm) / $original_ypubm;
        }
        $tamanho_xpubm = $original_xpubm * ($porcentagempubm / 100);
        $tamanho_ypubm = $original_ypubm * ($porcentagempubm / 100);
        $image_ppubm = imagecreatetruecolor($tamanho_xpubm, $tamanho_ypubm);
        $imagepubm   = imagecreatefromjpeg($imgpubm);
        imagecopyresampled($image_ppubm, $imagepubm, 0, 0, 0, 0, $tamanho_xpubm, $tamanho_ypubm, $widthpubm, $heightpubm);
        return imagejpeg($image_ppubm, $nome_fotopubm, 100);
    }//fim reduz_imagem
?>
