/* <a href="javascript:showPic('art/freedom.jpg','HyperFastDesignLab',600,400,'#919191','#25262c');">-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	Written by Bugimus 
	Copyright © 1998-2001 Bugimus, all rights reserved.
	You may use this code for your own *personal* use provided you leave this comment block intact.  
	A link back to Bugimus' page would be much appreciated.  
	http://bugimus.com/
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */

function showPic( imgName, imgCaption, imgWidth, imgHeight, textColor, bgColor ) {
	if(textColor=="")textColor="#000000"
	if(bgColor=="")bgColor="#ffffff"
	if(imgWidth<=100)imgWidth=100
	if(imgHeight<=100)imgHeight=100
	w = window.open('','Demo','toolbar=no,left=50,top=0,location=no,directories=no,status=no,scrollbars=no,resizable=no,copyhistory=no,width='+imgWidth+',height='+imgHeight);
	w.document.write( "<html><head><title>"+imgCaption+"</title>" );
	w.document.write( "<STYLE TYPE='text/css'>" );
	w.document.write( "A {font-family: verdana; font-size: 10px; color: "+textColor+"; text-decoration : none;}" );
	w.document.write( "A:Visited {font-family: verdana;font-size: 10px; color: "+textColor+"; }" );
	w.document.write( "A:Active { font-family: verdana; font-size: 10px; color: "+textColor+"; }" );
	w.document.write( "A:Hover { font-family: verdana; font-size: 10px; color: "+textColor+"; }" );
	w.document.write( "IMG {border-color : "+textColor+";}" );
	w.document.write( "BODY { scrollbar-3dlight-color : #000000; scrollbar-arrow-color : #B0B0B0; scrollbar-base-color : #e6e6e6; scrollbar-darkshadow-color : #fbffff; scrollbar-face-color : #e6e6e6; scrollbar-highlight-color : #DDDDDD; scrollbar-shadow-color : #A9A9A9; scrollbar-track-color : #EFEFEF; font-family: verdana; font-size : 10px; font-weight: normal; color : "+textColor+"; background-color : "+bgColor+"; }" );
	w.document.write( "TABLE { background-image: url(logosmall.jpg);background-repeat: no-repeat; background-position: center; }" );
	w.document.write( "</STYLE>" );
	w.document.write( "<script language='JavaScript'>\n");
	w.document.write( "IE5=NN4=NN6=false\n");
	w.document.write( "if(document.all)IE5=true\n");
	w.document.write( "else if(document.layers)NN4=true\n");
	w.document.write( "else if(document.getElementById)NN6=true\n");
	w.document.write( "function autoSize() {\n");
	w.document.write( "	if(IE5) self.resizeTo(document.images[0].width+12,document.images[0].height+31)\n");
	w.document.write( "	else if(NN6) self.sizeToContent()\n");
	w.document.write( "	else top.window.resizeTo(document.images[0].width,document.images[0].height)\n");
	w.document.write( "	self.focus()\n");
	w.document.write( "}\n");
	w.document.write( "</script>\n");
	w.document.write( "</head><body scroll=auto leftmargin=0 topmargin=0 marginwidth=0 marginheight=0" );
	w.document.write( "<table align='center' background='logosmall.jpg' cellpadding=0 cellspacing=0 border=0 width='100%' height='100%'><tr><td align='center' valign='middle' colspan=3><a href='javascript:top.window.close();'><img src='"+imgName+"' border=0 alt='Clique para fechar a janela!'></a></td></tr>" );

	w.document.write( "</table></body></html>" );
	w.document.close();
}

