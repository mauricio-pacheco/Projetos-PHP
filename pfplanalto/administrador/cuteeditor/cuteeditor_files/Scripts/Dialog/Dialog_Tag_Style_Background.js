var OxOf9a7=["SetStyle","length","","GetStyle","GetText",":",";","cssText","inp_color","inp_color_Preview","tb_image","btnbrowse","sel_bgrepeat","sel_bgattach","sel_hor","tb_hor","sel_hor_unit","sel_ver","tb_ver","sel_ver_unit","outer","div_demo","onclick","value","disabled","selectedIndex","style","backgroundImage","backgroundColor","backgroundRepeat","backgroundAttachment","backgroundPositionX","options","backgroundPositionY","url(",")","background-image","backgroundPosition","none"];function pause(Ox59e){var Ox51f= new Date();var Ox59f=Ox51f.getTime()+Ox59e;while(true){Ox51f= new Date();if(Ox51f.getTime()>Ox59f){return ;} ;} ;} ;function StyleClass(Ox31d){var Ox5a1=[];var Ox5a2={};if(Ox31d){Ox5a7();} ;this[OxOf9a7[0]]=function SetStyle(name,Ox243,Ox5a4){name=name.toLowerCase();for(var i=0;i<Ox5a1[OxOf9a7[1]];i++){if(Ox5a1[i]==name){break ;} ;} ;Ox5a1[i]=name;Ox5a2[name]=Ox243?(Ox243+(Ox5a4||OxOf9a7[2])):OxOf9a7[2];} ;this[OxOf9a7[3]]=function GetStyle(name){name=name.toLowerCase();return Ox5a2[name]||OxOf9a7[2];} ;this[OxOf9a7[4]]=function Ox5a6(){var Ox31d=OxOf9a7[2];for(var i=0;i<Ox5a1[OxOf9a7[1]];i++){var Ox237=Ox5a1[i];var p=Ox5a2[Ox237];if(p){Ox31d+=Ox237+OxOf9a7[5]+p+OxOf9a7[6];} ;} ;return Ox31d;} ;function Ox5a7(){var arr=Ox31d.split(OxOf9a7[6]);for(var i=0;i<arr[OxOf9a7[1]];i++){var p=arr[i].split(OxOf9a7[5]);var Ox237=p[0].replace(/^\s+/g,OxOf9a7[2]).replace(/\s+$/g,OxOf9a7[2]).toLowerCase();Ox5a1[Ox5a1[OxOf9a7[1]]]=Ox237;Ox5a2[Ox237]=p[1];} ;} ;} ;function GetStyle(Ox25a,name){return  new StyleClass(Ox25a.cssText).GetStyle(name);} ;function SetStyle(Ox25a,name,Ox243,Ox5a8){var Ox5a9= new StyleClass(Ox25a.cssText);Ox5a9.SetStyle(name,Ox243,Ox5a8);Ox25a[OxOf9a7[7]]=Ox5a9.GetText();} ;function ParseFloatToString(Oxb){var Ox2b8=parseFloat(Oxb);if(isNaN(Ox2b8)){return OxOf9a7[2];} ;return Ox2b8+OxOf9a7[2];} ;var inp_color=Window_GetElement(window,OxOf9a7[8],true);var inp_color_Preview=Window_GetElement(window,OxOf9a7[9],true);var tb_image=Window_GetElement(window,OxOf9a7[10],true);var btnbrowse=Window_GetElement(window,OxOf9a7[11],true);var sel_bgrepeat=Window_GetElement(window,OxOf9a7[12],true);var sel_bgattach=Window_GetElement(window,OxOf9a7[13],true);var sel_hor=Window_GetElement(window,OxOf9a7[14],true);var tb_hor=Window_GetElement(window,OxOf9a7[15],true);var sel_hor_unit=Window_GetElement(window,OxOf9a7[16],true);var sel_ver=Window_GetElement(window,OxOf9a7[17],true);var tb_ver=Window_GetElement(window,OxOf9a7[18],true);var sel_ver_unit=Window_GetElement(window,OxOf9a7[19],true);var outer=Window_GetElement(window,OxOf9a7[20],true);var div_demo=Window_GetElement(window,OxOf9a7[21],true);btnbrowse[OxOf9a7[22]]=function btnbrowse_onclick(){function Ox481(Ox260){if(Ox260){tb_image[OxOf9a7[23]]=Ox260;} ;} ;editor.SetNextDialogWindow(window);if(Browser_IsSafari()){editor.ShowSelectImageDialog(Ox481,tb_image.value,tb_image);} else {editor.ShowSelectImageDialog(Ox481,tb_image.value);} ;} ;UpdateState=function UpdateState_Background(){tb_hor[OxOf9a7[24]]=sel_hor_unit[OxOf9a7[24]]=(sel_hor[OxOf9a7[25]]>0);tb_ver[OxOf9a7[24]]=sel_ver_unit[OxOf9a7[24]]=(sel_ver[OxOf9a7[25]]>0);div_demo[OxOf9a7[26]][OxOf9a7[7]]=element[OxOf9a7[26]][OxOf9a7[7]];} ;SyncToView=function SyncToView_Background(){tb_image[OxOf9a7[23]]=element[OxOf9a7[26]][OxOf9a7[27]];FixTbImage();inp_color[OxOf9a7[23]]=element[OxOf9a7[26]][OxOf9a7[28]];inp_color[OxOf9a7[26]][OxOf9a7[28]]=element[OxOf9a7[26]][OxOf9a7[28]];inp_color_Preview[OxOf9a7[26]][OxOf9a7[28]]=element[OxOf9a7[26]][OxOf9a7[28]];sel_bgrepeat[OxOf9a7[23]]=element[OxOf9a7[26]][OxOf9a7[29]];sel_bgattach[OxOf9a7[23]]=element[OxOf9a7[26]][OxOf9a7[30]];sel_hor[OxOf9a7[23]]=element[OxOf9a7[26]][OxOf9a7[31]];sel_hor_unit[OxOf9a7[25]]=0;if(sel_hor[OxOf9a7[25]]==-1){if(ParseFloatToString(element[OxOf9a7[26]].backgroundPositionX)){tb_hor[OxOf9a7[23]]=ParseFloatToString(element[OxOf9a7[26]].backgroundPositionX);for(var i=0;i<sel_hor_unit[OxOf9a7[32]][OxOf9a7[1]];i++){var Ox264=sel_hor_unit[OxOf9a7[32]][i][OxOf9a7[23]];if(Ox264&&element[OxOf9a7[26]][OxOf9a7[31]].indexOf(Ox264)!=-1){sel_hor_unit[OxOf9a7[25]]=i;break ;} ;} ;} ;} ;sel_ver[OxOf9a7[23]]=element[OxOf9a7[26]][OxOf9a7[33]];sel_ver_unit[OxOf9a7[25]]=0;if(sel_ver[OxOf9a7[25]]==-1){if(ParseFloatToString(element[OxOf9a7[26]].backgroundPositionY)){tb_ver[OxOf9a7[23]]=ParseFloatToString(element[OxOf9a7[26]].backgroundPositionY);for(var i=0;i<sel_ver_unit[OxOf9a7[32]][OxOf9a7[1]];i++){var Ox264=sel_ver_unit[OxOf9a7[32]][i][OxOf9a7[23]];if(Ox264&&element[OxOf9a7[26]][OxOf9a7[33]].indexOf(Ox264)!=-1){sel_ver_unit[OxOf9a7[25]]=i;break ;} ;} ;} ;} ;} ;SyncTo=function SyncTo_Background(element){if(tb_image[OxOf9a7[23]]){element[OxOf9a7[26]][OxOf9a7[27]]=OxOf9a7[34]+tb_image[OxOf9a7[23]]+OxOf9a7[35];} else {SetStyle(element.style,OxOf9a7[36],OxOf9a7[2]);} ;try{element[OxOf9a7[26]][OxOf9a7[28]]=inp_color[OxOf9a7[23]]||OxOf9a7[2];} catch(x){element[OxOf9a7[26]][OxOf9a7[28]]=OxOf9a7[2];} ;element[OxOf9a7[26]][OxOf9a7[29]]=sel_bgrepeat[OxOf9a7[23]]||OxOf9a7[2];element[OxOf9a7[26]][OxOf9a7[30]]=sel_bgattach[OxOf9a7[23]]||OxOf9a7[2];element[OxOf9a7[26]][OxOf9a7[37]]=OxOf9a7[2];if(sel_hor[OxOf9a7[25]]>0){element[OxOf9a7[26]][OxOf9a7[31]]=sel_hor[OxOf9a7[23]];} else {if(ParseFloatToString(tb_hor.value)){element[OxOf9a7[26]][OxOf9a7[31]]=ParseFloatToString(tb_hor.value)+sel_hor_unit[OxOf9a7[23]];} else {element[OxOf9a7[26]][OxOf9a7[31]]=OxOf9a7[2];} ;} ;if(sel_ver[OxOf9a7[25]]>0){element[OxOf9a7[26]][OxOf9a7[33]]=sel_ver[OxOf9a7[23]];} else {if(ParseFloatToString(tb_ver.value)){element[OxOf9a7[26]][OxOf9a7[33]]=ParseFloatToString(tb_ver.value)+sel_ver_unit[OxOf9a7[23]];} else {element[OxOf9a7[26]][OxOf9a7[33]]=OxOf9a7[2];} ;} ;} ;function FixTbImage(){var Ox264=tb_image[OxOf9a7[23]].replace(/^(\s+)/g,OxOf9a7[2]).replace(/(\s+)$/g,OxOf9a7[2]);if(Ox264.substr(0,4).toLowerCase()==OxOf9a7[34]){Ox264=Ox264.substr(4,Ox264[OxOf9a7[1]]-4);} ;if(Ox264.substr(Ox264[OxOf9a7[1]]-1,1)==OxOf9a7[35]){Ox264=Ox264.substr(0,Ox264[OxOf9a7[1]]-1);} ;if(Ox264==OxOf9a7[38]){Ox264=OxOf9a7[2];} ;tb_image[OxOf9a7[23]]=Ox264;} ;inp_color[OxOf9a7[22]]=inp_color_Preview[OxOf9a7[22]]=function inp_color_onclick(){SelectColor(inp_color,inp_color_Preview);} ;