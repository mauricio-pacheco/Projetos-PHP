<?php
    function verifica_imagemenor1($imgmenor1)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imgmenor1["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_imagemenor1($imgmenor1)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imgmenor1["name"], $extmenor1);
        return ($extmenor1[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_imagemenor1($imgmenor1, $max_xmenor1, $max_ymenor1)
    {
        $dimensaoImagemenor1 = getimagesize($imgmenor1["tmp_name"]);
        $dimensaomenor1 = '';
        // Verifica largura
        if($dimensaoImagemenor1[0] > $dimensaoImagemenor1[1])
        {
            if($dimensaoImagemenor1[0] > $max_xmenor1)
            {
                $dimensaomenor1 = 'largura';
            }
        }
        else
        {
            if($dimensaoImagemenor1[0] < $dimensaoImagemenor1[1])
            {
                if($dimensaoImagemenor1[1] > $max_xmenor1)
                {
                    $dimensaomenor1 = 'altura';
                }
            }
            else
            {
                if($dimensaoImagemenor1[0] == $dimensaoImagemenor1[1])
                {
                    if($dimensaoImagemenor1[0] > $max_xmenor1)
                    {
                        $dimensaomenor1 = 'largura';
                    }
                }
            }
        }
        return ($dimensaomenor1);        
    }//fim verifica_dimensao_image
    
    function reduz_imagemmenor1($imgmenor1, $max_xmenor1, $max_ymenor1, $nome_fotomenor1) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($widthmenor1, $heightmenor1) = getimagesize($imgmenor1);
        $original_xmenor1 = $widthmenor1;
        $original_ymenor1 = $heightmenor1;
        // se a largura for maior que altura
        if($original_xmenor1 > $original_ymenor1) {
               $porcentagemmenor1 = (100 * $max_xmenor1) / $original_xmenor1;      
        } 
        else {
               $porcentagemmenor1 = (100 * $max_ymenor1) / $original_ymenor1;
        }
        $tamanho_xmenor1 = $original_xmenor1 * ($porcentagemmenor1 / 100);
        $tamanho_ymenor1 = $original_ymenor1 * ($porcentagemmenor1 / 100);
        $image_pmenor1 = imagecreatetruecolor($tamanho_xmenor1, $tamanho_ymenor1);
        $imagemenor1   = imagecreatefromjpeg($imgmenor1);
        imagecopyresampled($image_pmenor1, $imagemenor1, 0, 0, 0, 0, $tamanho_xmenor1, $tamanho_ymenor1, $widthmenor1, $heightmenor1);
        return imagejpeg($image_pmenor1, $nome_fotomenor1, 100);
    }//fim reduz_imagem
?>
