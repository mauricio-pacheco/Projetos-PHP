var OxO5ec6=["idSource","TargetUrl","value","","$4","$5","\x26","wmode=\x22transparent\x22","allowfullscreen=\x22true\x22","\x3Cembed src=\x22","\x22 width=\x22","\x22 height=\x22","\x22 "," "," type=\x22application/x-shockwave-flash\x22 pluginspage=\x22http://www.macromedia.com/go/getflashplayer\x22 \x3E\x3C/embed\x3E\x0A","\x3Cobject xcodebase=","\x22http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab\x22"," height=\x22","\x22 classid=","\x22clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\x22 \x3E"," \x3Cparam name=\x22Movie\x22 value=\x22","\x22 /\x3E","\x3Cparam name=\x22wmode\x22 value=\x22transparent\x22/\x3E","\x3Cparam name=\x22allowFullScreen\x22 value=\x22true\x22/\x3E","\x3C/object\x3E"];var idSource=Window_GetElement(window,OxO5ec6[0],true);var TargetUrl=Window_GetElement(window,OxO5ec6[1],true);var editor=Window_GetDialogArguments(window);var oldWidth,OldHeight;function do_preview(){var Ox1ee=GetEmbed();if(Ox1ee){if(idSource[OxO5ec6[2]]!=Ox1ee&&idSource[OxO5ec6[2]]!=null){idSource[OxO5ec6[2]]=Ox1ee;} ;} ;} ;function do_insert(){var Ox1ee=GetEmbed();if(Ox1ee){editor.PasteHTML(Ox1ee);} ;Window_CloseDialog(window);} ;function do_Close(){Window_CloseDialog(window);} ;function GetEmbed(){if(idSource[OxO5ec6[2]]==OxO5ec6[3]||idSource[OxO5ec6[2]]==null){return ;} ;var Ox74b=OxO5ec6[3];Ox74b=idSource[OxO5ec6[2]];var Ox74c=/(<iframe[^\>]*?)(\ssrc=\s*)\s*("|')(.+?)\3([^>]*)(.*<\/iframe>)/gi;var Ox74d=/(<object[^\>]*>[\s|\S]*?)(<embed[^\>]*?)(\ssrc=\s*)\s*("|')(.+?)\4([^>]*)(.*<\/embed>)[\s|\S]*?<\/object>/gi;if(Ox74b.match(Ox74c)){Ox74b=Ox74b.replace(Ox74c,OxO5ec6[4]);TargetUrl[OxO5ec6[2]]=Ox74b;return idSource[OxO5ec6[2]];} else {if(Ox74b.match(Ox74d)){oldWidth=Ox74b.replace(/(<object[^\>]*>[\s|\S]*?)(<embed[^\>]*?)(\swidth=\s*)\s*("|')(.+?)\4([^>]*)(.*<\/embed>)[\s|\S]*?<\/object>/gi,OxO5ec6[5]);oldHeight=Ox74b.replace(/(<object[^\>]*>[\s|\S]*?)(<embed[^\>]*?)(\sheight=\s*)\s*("|')(.+?)\4([^>]*)(.*<\/embed>)[\s|\S]*?<\/object>/gi,OxO5ec6[5]);Ox74b=Ox74b.replace(Ox74d,OxO5ec6[5]);if(Ox74b.indexOf(OxO5ec6[6])!=-1){TargetUrl[OxO5ec6[2]]=Ox74b.substring(0,Ox74b.indexOf(OxO5ec6[6]));} ;var Ox74e=OxO5ec6[3];var Ox48a=425;var Ox45e=344;var Ox4df,Ox4e0;oldWidth=parseInt(oldWidth);if(oldWidth){Ox48a=oldWidth;} ;oldHeight=parseInt(oldHeight);if(oldHeight){Ox45e=oldHeight;} ;Ox4df=true;if(Ox74b==OxO5ec6[3]){return ;} ;var Ox4e3,Ox4e5;Ox4e5=OxO5ec6[3];Ox4e3=true?OxO5ec6[7]:OxO5ec6[3];Ox4e5=true?OxO5ec6[8]:OxO5ec6[3];var Ox4eb=OxO5ec6[9]+Ox74b+OxO5ec6[10]+Ox48a+OxO5ec6[11]+Ox45e+OxO5ec6[12]+Ox4e5+OxO5ec6[13]+Ox4e3+OxO5ec6[14];var Ox4ec=OxO5ec6[15]+OxO5ec6[16]+OxO5ec6[17]+Ox45e+OxO5ec6[10]+Ox48a+OxO5ec6[18]+OxO5ec6[19]+OxO5ec6[20]+Ox74b+OxO5ec6[21];if(true){Ox4ec=Ox4ec+OxO5ec6[22];} ;if(true){Ox4ec=Ox4ec+OxO5ec6[23];} ;Ox4ec=Ox4ec+Ox4eb+OxO5ec6[24];return Ox4ec;} ;} ;} ;