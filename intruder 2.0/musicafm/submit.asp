<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>Radio 95.9FM Online Frederico Westphalen - RS</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<LINK href="Radio95.9FM_arquivos/default.css" type=text/css rel=STYLESHEET>
<!--Code generated by Cool Web Scrollbars from Harmony Hollow Software-->
<!--http://www.harmonyhollow.net-->
<STYLE type="text/css">
<!--
BODY {
scrollbar-face-color:#0080C0;
scrollbar-highlight-color:#0080C0;
scrollbar-3dlight-color:#454545;
scrollbar-darkshadow-color:#454545;
scrollbar-shadow-color:#454545;
scrollbar-arrow-color:#FFFFFF;
scrollbar-track-color:#454545;
}
-->
</STYLE>
<!--End Cool Web Scrollbars code-->

<META content="MSHTML 6.00.2600.0" name=GENERATOR></HEAD>
<script language=Javascript>

function preview1(){
if (form.name1.value == ""){
div1.innerHTML = "<p align=center><br><br><br><br><b>A name is recomended!!<br><br><input type=text name=name2 size=20 maxlength=255 onchange=name1change()><br> Enter a title for you page and Prieview again!!</b></p>"}
else{
div1.innerHTML = "<B>"+ form.name1.value + "--" + form.date1.value + "</b><br><br>" + form.Entry1.value}
}

function name1change(){
form.name1.value = form.name2.value
}
</script>

<BODY bgColor=#292929 text="#FFFFFF" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF" leftMargin=0 topMargin=0 marginwidth="0" marginheight="0">
<font size="1" face="Verdana, Arial, Helvetica, sans-serif"> </font>
<div align="center"> 
  <p>&nbsp;</p>
  <p><img src="noticia.jpg" width="382" height="52"></p>
  <p><font size="3" face="Verdana, Arial, Helvetica, sans-serif">Not&iacute;cias 
    Administra&ccedil;&atilde;o</font></p>
  <p> <font color="#0099CC">
    <%
	Dim entry1
	dim date1
	dim name1
	
inputnum = request.querystring("inputnum")
If IsEmpty(inputnum) or inputnum = "" then


%>
    </font></p>
  <form id=form method="POST" action="submit.asp?inputnum=1">
    <div align="center"> 
      <center>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" height="48" bordercolor="#0099CC" bgcolor="#C0C0C0">
          <tr> 
            <td width="56%" height="56" bgcolor="#292929"> <p align="center"><font color="#0099CC" size="2" face="Verdana">Not&iacute;cia<br>
                <textarea rows="8" name="Entry1" cols="47" style="border-style: solid; border-width: 2"></textarea>
                <br>
                </font><font color="#0099CC"><br>
                <font face="Verdana" size="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                &nbsp; </font><br>
                <font face="Verdana" size="2">Data&nbsp;</font> 
                <input type="text" name="date1" value="<% =Date %>" size="13">
                &nbsp;&nbsp;&nbsp;<font face="Verdana" size="2">Nome</font> 
                <input type="text" name="name1" size="38" maxlength="255">
                <br>
                &nbsp;</font></p></td>
          </tr>
        </table>
      </center>
    </div>
    <div align="center">
      <center>
        <font color="#0099CC"><br>
        <input type="submit" value="ENVIAR" name="B1">
        </font> 
      </center>
    </div>
    </form>
  <p>&nbsp;</p>
  <font color="#0099CC">
  <% else
date1 = Now()
pname = request.form("name1")
pdate = request.form("date1")
entry1 = request.form("Entry1")

' Yeah I got quotes praise the lord he he he

pname = Replace(request.form("name1"), "'", "''")

pdate = request.form("date1")
entry1 = Replace(Request.Form("Entry1"), "'", "''")


	set conn = server.createobject("adodb.connection")
		DSNtemp="DRIVER={Microsoft Access Driver (*.mdb)}; "
    DSNtemp=dsntemp & "DBQ=" & server.mappath("journal.mdb")

    conn.Open DSNtemp

   SQLstmt = "INSERT INTO journal (pname,pdate,pentry)"
	SQLstmt = SQLstmt & " VALUES (" 
	SQLstmt = SQLstmt & "'" & pname & "',"
	SQLstmt = SQLstmt & "'" & pdate & "',"
	SQLstmt = SQLstmt & "'" & entry1 & "'"
	SQLstmt = SQLstmt & ")"

	Set RS = conn.execute(SQLstmt)
%>
  </font>
  <p align="center">&nbsp; </p>
  <p>&nbsp;</p>
  <p><font color="#0099CC"><br>
    </font></p>
  <p align="center"><font color="#0099CC" size="4" face="Verdana">Not&iacute;cia 
    enviada com sucesso!!!</font></p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <p align="center"><font color="#0099CC" size="2" face="Verdana"><a href="submit.asp">Escrever 
    outra not&iacute;cia</a>&nbsp; �&nbsp;&nbsp; <a href="index.asp">Ver Not&iacute;cias</a></font></p>
  <p align="center"> <font color="#0099CC">
    <%end if%>
    </font> </p>
  <p>&nbsp; </p>
</div>
</BODY></HTML>