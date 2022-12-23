<?php require_once "cuteeditor/cuteeditor_files/include_CuteEditor.php" ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<?php    
                //Step 2: Create Editor object.    
                $editor=new CuteEditor("texto");    
                $editor->Text="";
				$editor->Height="900";
                //Step 3: Set a unique ID to Editor    
                $editor->ID="texto";     
                //Step 4: Render Editor    
                $editor->Draw();    
            ?>
</body>
</html>