<?php
//create the directory if doesn't exists (should have write permissons)
if(!is_dir("./files")) mkdir("./files", 0755); 
//move the uploaded file
move_uploaded_file($_FILES['Filedata']['tmp_name'], "./files/".$_FILES['Filedata']['name']);
chmod("./files/".$_FILES['Filedata']['name'], 0777);
?>