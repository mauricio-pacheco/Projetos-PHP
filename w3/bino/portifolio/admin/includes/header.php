<?php
//check user
require dirname(__FILE__).'/check_user.php';
?>
<html>
<head>
<title>Binoarte Luminosos - Descrição</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="common/lists.css"/>

<script language="JavaScript" type="text/javascript" src="tool-man/core.js"></script>
<script language="JavaScript" type="text/javascript" src="tool-man/events.js"></script>
<script language="JavaScript" type="text/javascript" src="tool-man/css.js"></script>
<script language="JavaScript" type="text/javascript" src="tool-man/coordinates.js"></script>
<script language="JavaScript" type="text/javascript" src="tool-man/drag.js"></script>
<script language="JavaScript" type="text/javascript" src="tool-man/dragsort.js"></script>

<script language="JavaScript" type="text/javascript"><!--
var ESCAPE = 27
var ENTER = 13
var TAB = 9

var coordinates = ToolMan.coordinates()
var dragsort = ToolMan.dragsort()

window.onload = function() {

	<?php if (isset($list)) : ?>
	dragsort.makeListSortable(document.getElementById("<?php echo $list; ?>_list"), setHandle)
	<?php endif; ?>

}

function setHandle(item) {
	item.toolManDragGroup.setHandle(findHandle(item))
}



function findHandle(item) {
	var children = item.getElementsByTagName("div")
	for (var i = 0; i < children.length; i++) {
		var child = children[i]

		if (child.getAttribute("class") == null) continue

		if (child.getAttribute("class").indexOf("handle") >= 0)
			return child
	}
	return item
}

function save_gal(listID) {
    var list = document.getElementById(listID);
    var items = list.getElementsByTagName("li");
    var folders = "";
	var names = "";
	var deletes = "";
	var gal_num = "";

    for (var i = 0; i < items.length; i++) {
		//get gallery number
		gal_num = items[i].id.split("_").pop();
		
		//is this folder being deleted?
		if(eval("document.form_save.delete_" + gal_num + ".checked")){
			if (deletes.length > 0){
				deletes += ",";
			}
			//add to deletes
			deletes += eval("folder_" + gal_num);
		} else {
			//add comma if there is already an entry
			if (folders.length > 0){
				folders += ",";
				names += ",";
			}
			//add to folders and names
			folders += eval("folder_" + gal_num);
			names += eval("document.form_save.name_" + gal_num + ".value");
		}
    }
	document.form_save.gal_names.value = names;
	document.form_save.gal_folders.value = folders;
	document.form_save.gal_deletes.value = deletes;
	
	return true;
}

function save_pics(listID) {
    var list = document.getElementById(listID);
    var items = list.getElementsByTagName("li");
	var names = "";
	var descs = "";
	var deletes = "";
	var pic_num = "";

    for (var i = 0; i < items.length; i++) {
		//get picture number
		pic_num = items[i].id.split("_").pop();
		
		//is this picture being deleted?
		if(eval("document.form_save.delete_" + pic_num + ".checked")){
			if (deletes.length > 0){
				deletes += ",";
			}
			//add to deletes
			deletes += eval("pic_" + pic_num);
		} else {
			//add comma if there is already an entry
			if (names.length > 0){
				names += ",";
				descs += "<break>";
			}
			//add to descs and names
			names += eval("pic_" + pic_num);
			descs += eval("document.form_save.desc_" + pic_num + ".value");
		}
    }
	
	document.form_save.pic_names.value = names;
	document.form_save.pic_descs.value = descs;
	document.form_save.pic_deletes.value = deletes;
	
	return true;
}

function showUpload(gal_name, gal_folder){
	w = 410;
	h = 600;
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars=1,resizable=0,location=0,status=0,menubar=0,toolbar=0'
	win = window.open('page_upload_pics.php?name=' + gal_name + '&folder=' + gal_folder, "upload_pics", winprops);
	if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
}

function blah(){
	var str=prompt("Digite o nome da Galeria:");
	if ((str!=null) && (str!="")) {
		//get current href
		var url = window.location.href;
		var end = url.lastIndexOf('/');
		url = url.slice(0,end);
		alert(url);
		//window.location = url + "/new_gallery.php?g=" + str;
		window.location.href = url + "/new_gallery.php";
	}
	return false;
}

function new_gallery(){
	var str=prompt("Digite o nome da Galeria:", "");
	if ((str!=null) && (str!="")) {
		//window.location = url + "/new_gallery.php?g=" + str;
		document.form_new.new_name.value = str;
		document.form_new.submit();
	}
}

function classChange(obj)
{
	obj.className = '';
} 
//-->
</script>

</head>

<body topmargin="50" leftmargin="0" bottommargin="50" rightmargin="0" marginheight="50" marginwidth="0" bgcolor="EDEDED">
<div align="center">
  <table width="700" border="0" cellpadding="0" cellspacing="8" bgcolor="#FFFFFF">
    <tr> 
      <td colspan="2"><img src="common/header.gif" width="700" height="50"></td>
    </tr>
    <tr valign="top"> 
      <td width="130" class="nav">
	  	<a href="page_galleries.php">Galerias</a>
	 </td>
      <td width="570" class="content">