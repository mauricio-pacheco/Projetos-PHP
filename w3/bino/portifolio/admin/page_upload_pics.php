<?php
//check user
require dirname(__FILE__).'/includes/check_user.php';

$folder = $_GET['folder'];
$name = $_GET['name'];
?>
<html>
<head>
<title><?php echo $name; ?> - Upload</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
p {
	line-height: 1.5em;
}
li {
	margin-top: 10px;
	margin-left: 25px;
}
ol{
	margin-left:0px;
}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<form action="upload_pics.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="folder" value="<?php echo $folder; ?>">
	<input type="hidden" name="name" value="<?php echo $name; ?>">
  <p style="padding-left:25px"><input name="add" type="radio" value="start" checked>
    Adicionar no inicio da galeria<br>
	<input type="radio" name="add" value="end">
    Adicionar no final da galeria
	</p>
  <ol>
    <li> 
      <input name="file1" type="file" class="browse">
      <br>
      <textarea name="desc1" class="pic_desc" onBlur="this.className='pic_desc'" onFocus="this.className='pic_desc_on'"></textarea>
    </li>
    <li> 
      <input name="file2" type="file" class="browse">
      <br>
      <textarea name="desc2" class="pic_desc"  onBlur="this.className='pic_desc'" onFocus="this.className='pic_desc_on'"></textarea>
    </li>
	<li> 
      <input name="file3" type="file" class="browse">
      <br>
      <textarea name="desc3" class="pic_desc" onBlur="this.className='pic_desc'" onFocus="this.className='pic_desc_on'"></textarea>
    </li>
	<li> 
      <input name="file4" type="file" class="browse">
      <br>
      <textarea name="desc4" class="pic_desc" onBlur="this.className='pic_desc'" onFocus="this.className='pic_desc_on'"></textarea>
    </li>
	<li> 
      <input name="file5" type="file" class="browse">
      <br>
      <textarea name="desc5" class="pic_desc" onBlur="this.className='pic_desc'" onFocus="this.className='pic_desc_on'"></textarea>
    </li>
  </ol>
  <p style="padding-left:25px">
    <input type="submit" name="Submit" value="Enviar Imagens">
  </p>
</form>
</body>
</html>
