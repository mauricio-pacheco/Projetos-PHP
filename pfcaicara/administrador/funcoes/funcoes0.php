<?php
    function verifica_image0($img0)
    {
        // Verifica se o mime-type do arquivo é de imagem
        if(eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $img0["type"]))
        {
            return (TRUE);
        }
        return (FALSE);
    }// fim verifica_image
    
    function verifica_extensao_image0($img0)
    {
        // Pega extensão do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $img0["name"], $ext0);
        return ($ext0[1]);
    }//fim verifica_extensao_imag
    
    function verifica_dimensao_image0($img0, $max_x0, $max_y0)
    {
        $dimensaoImage0 = getimagesize($img0["tmp_name"]);
        $dimensao0 = '';
        // Verifica largura
        if($dimensaoImage0[0] > $dimensaoImage0[1])
        {
            if($dimensaoImage0[0] > $max_x0)
            {
                $dimensao0 = 'largura';
            }
        }
        else
        {
            if($dimensaoImage0[0] < $dimensaoImage0[1])
            {
                if($dimensaoImage0[1] > $max_x0)
                {
                    $dimensao0 = 'altura';
                }
            }
            else
            {
                if($dimensaoImage0[0] == $dimensaoImage0[1])
                {
                    if($dimensaoImage0[0] > $max_x0)
                    {
                        $dimensao0 = 'largura';
                    }
                }
            }
        }
        return ($dimensao0);        
    }//fim verifica_dimensao_image
    
    function reduz_imagem0($img0, $max_x0, $max_y0, $nome_foto0) 
    {
        //pega o tamanho da imagem ($original_x, $original_y)
        list($width0, $height0) = getimagesize($img0);
        $original_x0 = $width0;
        $original_y0 = $height0;
        // se a largura for maior que altura
        if($original_x0 > $original_y0) {
               $porcentagem0 = (100 * $max_x0) / $original_x0;      
        } 
        else {
               $porcentagem0 = (100 * $max_y0) / $original_y0;
        }
        $tamanho_x0 = $original_x0 * ($porcentagem0 / 100);
        $tamanho_y0 = $original_y0 * ($porcentagem0 / 100);
        $image_p0 = imagecreatetruecolor($tamanho_x0, $tamanho_y0);
        $image0   = imagecreatefromjpeg($img0);
        imagecopyresampled($image_p0, $image0, 0, 0, 0, 0, $tamanho_x0, $tamanho_y0, $width0, $height0);
        return imagejpeg($image_p0, $nome_foto0, 100);
    }//fim reduz_imagem
?>
